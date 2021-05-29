<?php 
include('../model/functions.php');
include('../model/db-connect.php');


if (empty($_POST['email']) || empty($_POST['password']))
   { 
       header("Location: ..\view\signUp\signUp.php");
   }
   else{

    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];


    $crypt=password_hash($password, PASSWORD_BCRYPT);
    if(checkEmail($email)==0)
       {

        register($email, $crypt, $first_name, $last_name);
        header("Location: ../view/MainPage/main.php");

       }
    else{
        $message="Adresa de email exista deja in baza de date!";
        echo "<SCRIPT> //not showing me this
        alert('$message')
        window.location.replace('../view/signUp/signUp.php');
    </SCRIPT>";
    }
   }