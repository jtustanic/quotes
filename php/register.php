<?php
session_start();
?>

<?php
include("../tmpl/register.html");
include("pdo.php");
?>
 
<div class="row">
<div class="medium-12 large-12 columns">

<?php

$action_login = isset($_POST["Submit"]) ? $_POST["Submit"] : false;


if($action_login === "REGISTER"){

    if(strlen($_POST['username']) === 0){
        echo('<div class="warningMSG"><p>Username field can\'t be empty!</p></div>');
    }else if(strlen($_POST['password']) === 0){
        echo('<div class="warningMSG"><p>Password field can\'t be empty</p></div>');
    }else if($_POST['Cnf_password'] !== $_POST['password']){
        echo('<div class="warningMSG"><p>Passwords don\'t match!</p></div>');
    }else if(strlen($_POST['name']) === 0){
        echo('<div class="warningMSG"><p>Name field can\'t be empty!</p></div>');
    }else if(strlen($_POST['surname']) === 0){
        echo('<div class="warningMSG"><p>Surname field can\'t be empty!</p></div>');
    }else{

        $sql = "INSERT INTO `user`(`username`, `password`, `name`, `surname`) VALUES ('$_POST[username]', '$_POST[password]', '$_POST[name]', '$_POST[surname]')";
        $query = $db->query($sql);
        
        $sql2 = "SELECT id FROM `user` WHERE `username` = '$_POST[username]' AND  `password` = '$_POST[password]'";
        $query2 = $db->query($sql2);


        $rezultati = $query2->fetchAll();

        $_SESSION["user_id"] = $rezultati[0]['id'];
        $_SESSION["loggedIn"] = true;

        header("Location:homePage.php?page=home");
    }
}

?>

<div class="properties">
<h4 class>Register</h4>
<form method="post" action="">
Username: <input type="text" name="username" value=""><br>
Password: <input type="password" name="password" value=""><br>
Confirm password: <input type="password" name="Cnf_password" value=""><br>
First name: <input type="text" name="name" value=""><br>
Surname: <input type="text" name="surname" value=""><br>
<input type="submit" name="Submit" value="REGISTER" class="button">
</form>
</div>

<?php
include("../tmpl/footer.html");
?>
