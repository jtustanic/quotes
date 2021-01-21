<?php
session_start();
include("../tmpl/header.html");
include("pdo.php");
?>

<?php
//check if user is logged in
//ako nije ulogiran vrati ga na login
if(!$_SESSION['loggedIn']){
    header("Location:login.php");
}

?>
<div class="mainNavigation">
<?php
if(isset($_GET['page'])){
    switch ($_GET['page']) {
        case 'home':
            echo('<div class="subMainNavigation active">Home<i class="fas fa-home"></i></div>
            <a href="homePage.php?page=myquotes"><div class="subMainNavigation">My quotes<i class="fas fa-user"></i></div></a>
            <a href="homePage.php?page=favorites"><div class="subMainNavigation">Favorites<i class="fas fa-heart"></i></div></a>
            <a href="homePage.php?page=logout"><div class="subMainNavigation">Log out<i class="fas fa-sign-out-alt"></i></div></a>
            </div>
            <div class="headline">
                <h2>Home page</h2>
            </div>');
            break;
        case 'myquotes':
            echo('<a href="homePage.php?page=home"><div class="subMainNavigation">Home<i class="fas fa-home"></i></div></a>
            <div class="subMainNavigation active">My quotes<i class="fas fa-user"></i></div>
            <a href="homePage.php?page=favorites"><div class="subMainNavigation">Favorites<i class="fas fa-heart"></i></div></a>
            <a href="homePage.php?page=logout"><div class="subMainNavigation">Log out<i class="fas fa-sign-out-alt"></i></div></a>
            </div>
            <div class="headline">
                <h2>My quotes</h2>
            </div>');
            break;
        case 'favorites':
            echo('<a href="homePage.php?page=home"><div class="subMainNavigation">Home<i class="fas fa-home"></i></div></a>
            <a href="homePage.php?page=myquotes"><div class="subMainNavigation">My quotes<i class="fas fa-user"></i></div></a>
            <div class="subMainNavigation active">Favorites<i class="fas fa-heart"></i></div>
            <a href="homePage.php?page=logout"><div class="subMainNavigation">Log out<i class="fas fa-sign-out-alt"></i></div></a>
            </div>
            <div class="headline">
                <h2>Favorites</h2>
            </div>');
            break;
        case 'logout':
            $_SESSION['loggedIn'] = false;
            header("Location:../index.html");
            break; 
        default:
        echo('<div class="subMainNavigation active">Home<i class="fas fa-home"></i></div>
            <a href="homePage.php?page=myquotes"><div class="subMainNavigation">My quotes<i class="fas fa-user"></i></div></a>
            <a href="homePage.php?page=favorites"><div class="subMainNavigation">Favorites<i class="fas fa-heart"></i></div></a>
            <a href="homePage.php?page=logout"><div class="subMainNavigation">Log out<i class="fas fa-sign-out-alt"></i></div></a>
            </div>
            <div class="headline">
                <h2>Home page</h2>
            </div>');
            break;
    }
}else{
    header("Location:login.php");
}
?>

<div class="mainContainer">
    <div class="tableContainer">
        <table class="mainTable">
            <tr>
                <td class="one">Quote</td>
                <td class="two"><i>Author</i></td>
                <td class="textSettings"></td>
            </tr>

<?php

//prazna query varijabla
$query;

//postavljamo query za bazu podataka prema stranici koju želimo prikazati
switch ($_GET['page']) {
    case 'home':
        $query = $db->query("SELECT * FROM quote");
        break;
    case 'myquotes':
        $query = $db->query("SELECT * FROM quote WHERE user_id = $_SESSION[user_id]");
        break;
    case 'favorites':
        $query = $db->query("SELECT quote.quote, quote.user_id, quote.id, quote.autor FROM quote JOIN favorite ON quote.id = favorite.quote_id WHERE favorite.user_id = $_SESSION[user_id]");
        break;
    default:
        $query = $db->query("SELECT * FROM quote");
        break;
}

$rezultati = $query->fetchAll();

//query2 je postavljen da dohvati sve iz favorite-a kako bi mogli postaviti srceta pravilno
$query2 = $db->query("SELECT * FROM favorite WHERE user_id = $_SESSION[user_id]");
$rezultati2 = $query2->fetchAll();

$foundFavorite = false;

//provjera sa koje stranice smo kliknuli na favorite da bi nas znalo vratiti
$last_page = $_GET['page'];

foreach($rezultati as $quote){
    echo("<tr><td>");
    echo("$quote[quote]</td>");
    echo("<td>$quote[autor]</td>");

    //primjer nested petlje

    foreach($rezultati2 as $favorite){

        if($favorite['quote_id'] == $quote['id']){
            echo("<td><a href='actions.php?quote_id=$quote[id]&last_page=$last_page&action=DEfavorite'><i id='DEfavoriteQ' class='fas fa-heart'></i></a> <a href='actions.php?quote_id=$quote[id]&last_page=$last_page&action=delete'><i id='trashCans' class='fas fa-trash-alt'></i></a>");
            $foundFavorite = true;
            break;
        }else{
            $foundFavorite = false;
        }
    }

    if(!$foundFavorite){
        echo("<td><a href='actions.php?quote_id=$quote[id]&last_page=$last_page&action=favorite'><i id='favoriteQ' class='fas fa-heart'></i></a> <a href='actions.php?quote_id=$quote[id]&last_page=$last_page&action=delete'><i id='trashCans' class='fas fa-trash-alt'></i></a>");
    }

    echo("</tr></td>");
}
?>

        </table>
    </div>
    <div>
        <form method="get" action="new.php">
            <button class="addQuote" type="submit">Add<i class="fas fa-plus"></i></button>
        </form>
    </div>
</div>

<?php
    include("../tmpl/footer.html");
    ?>