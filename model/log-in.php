<?php 
include('../controller/functions.php');
include('../controller/init.php');
include('../controller/db-connect.php');

if (!empty($_POST['email']) && !empty($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $crypt=password_hash($password, PASSWORD_BCRYPT);
    if(checkEmail($email))
        if(login($email,$crypt)==0){
            setSession($email);
            header("Location: ../view/Admin/admin.php");
        }
        else{
            header("Location: ../view/login/login.php");
        }
    else
        header("Location: ../view/login/login.php");
   }
?>