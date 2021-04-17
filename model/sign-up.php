<?php 
include('../controller/functions.php');
include('../controller/init.php');
include('../controller/db-connect.php');


if (empty($_POST['email']) || empty($_POST['password']))
   { 
       header("Location: ..\view\signUp\signUp.php");
   }
   else{

    $email = $_POST['email'];
    $password = $_POST['password'];

    $crypt=password_hash($password, PASSWORD_BCRYPT);
    if(checkEmail($email)==0)
       {

        register($email, $crypt);
        header("Location: ..\MainPage\main.html");

       }
    else{

        header("Location: ..\MainPage\main.html");
    }
   }