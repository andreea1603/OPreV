<?php
include('../controller/functions.php');
include('../controller/init.php');
include('../controller/db-connect.php');
     
if (!empty($_POST['email']) && !empty($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $crypt=password_hash($password, PASSWORD_BCRYPT);
    if(checkEmail($email)){ 
        
        $s = "SELECT * FROM users WHERE email ='$email' && password='$crypt'";
        
        $result = $conn -> query($s);
        $num= mysqli_num_rows($result);
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