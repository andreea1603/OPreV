<?php
$servername = "localhost";
$database = "users";
$username = "root";
$password = "";

$connUsers = mysqli_connect($servername, $username, $password, $database);
  if (!$connUsers) {
      die('Could not connect: '. $mysqli -> error);
  }
  if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
?>