<?php
session_start();
include("../tmpl/header.html");
$action = isset($_GET["action"]) ? $_GET["action"] : "novi";

function deleteQuote(){
    include("pdo.php");

    $quote_id = (int)$_GET['quote_id'];

    $sql = "DELETE FROM `quote` WHERE id = $quote_id";
    $query = $db->query($sql);

    
    $sql2 = "DELETE FROM `favorite` WHERE quote_id = $quote_id";
    $query = $db->query($sql);

    header("Location:homePage.php?page=$_GET[last_page]");
}

function newQuote(){
    include("pdo.php");

    //Check if empty
    $user_id = intval($_SESSION['user_id']);
    $sql = "INSERT INTO quote (`user_id`, `quote`, `autor`) VALUES ($user_id, '$_POST[quote]', '$_POST[autor]')";

    $query = $db->query($sql);
    
    header("Location:homePage.php?page=$_GET[last_page]");
}

function favoriteQuote(){
    include("pdo.php");

    $user_id = intval($_SESSION['user_id']);
    $quote_id = intval($_GET['quote_id']);

    $sql = "INSERT INTO favorite (`user_id`, `quote_id`) VALUES ($user_id, $quote_id)";

    $query = $db->query($sql);

    header("Location:homePage.php?page=$_GET[last_page]");
}

function DEfavoriteQuote(){
    include("pdo.php");

    $user_id = intval($_SESSION['user_id']);
    $quote_id = intval($_GET['quote_id']);

    $sql = "DELETE FROM `favorite` WHERE `user_id` = $user_id AND `quote_id` = $quote_id";

    $query = $db->query($sql);

    header("Location:homePage.php?page=$_GET[last_page]");
}

switch ($action) {
    case 'delete':
        deleteQuote();
        break;
    case 'new':
        newQuote();
        break;
    case 'favorite':
        favoriteQuote();
        break;
    case 'DEfavorite':
        DEfavoriteQuote();
        break;
}



?>


