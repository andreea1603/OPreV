<?php
include('../model/functions.php');
include('../model/init.php');
include('../model/db-connect.php');
     
if (!empty($_POST['email']) && !empty($_POST['password'])){
    
    session_unset();

    $email = $_POST['email'];
    $pass = $_POST['password'];

    if(checkEmail($email)){ 
  
        $num=login($email, $pass);
        if($num==1){
            setSession($email);
            header("Location: ../view/Admin/admin.php");
        }
        else{
            header("Location: ../view/login/login.php");    
        }
    }
    else
        header("Location: ../view/login/login.php");
}
?> 