<?php 
include('../controller/functions.php');
include('../controller/init.php');
include('../controller/db-connect.php');


if (empty($_POST['email']) || empty($_POST['password']))
   { 
       echo "Empty";
   }
$email = $_POST['email'];
$password = $_POST['password'];

$crypt=password_hash($password, PASSWORD_BCRYPT);

$query="INSERT INTO `users` (email, parola) VALUES ( '{$email}', '{$crypt}')";
$conn->exec($query);
header("Location: ..\MainPage\main.html");