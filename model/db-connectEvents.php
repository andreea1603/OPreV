<?php
$servername = "localhost";
$database = "evenimente";
$username = "root";
$password = "";

$connEvents = mysqli_connect($servername, $username, $password, $database);
  if (!$connEvents) {
      die('Could not connect: '. $mysqli -> error);
  }
  if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
?>