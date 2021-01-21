<?php
session_start();
?>

<?php
include("../tmpl/login.html");
include("pdo.php");
?>
 
<div class="row">
<div class="medium-12 large-12 columns">

<?php

$action_login = isset($_POST["Submit"]) ? $_POST["Submit"] : false;


if($action_login === "LOGIN"){
    //poziv na bazu za login
    $sql = "SELECT id, username, password FROM user WHERE username = '$_POST[username]' AND password = '$_POST[password]'";
    
    $query = $db->query($sql);
    $rezultati = $query->fetchAll();

    //provjera rezultata iz baze
    if(count($rezultati) == 1){
        //spremi u session za daljnje radnje
        $_SESSION["user_id"] = $rezultati[0]['id'];
        $_SESSION["loggedIn"] = true;
        
        //prebaci se na homepage
        header("Location:homePage.php?page=home");
    }

}

?>

<div class="properties">
<h4>Login</h4>
<form method="post" action="">
Username: <input type="text" name="username" value=""><br>
Password: <input type="password" name="password" value=""><br>
<input type="submit" name="Submit" value="LOGIN" class="button">
</form>
</div>


<?php
include("../tmpl/footer.html");
?>
