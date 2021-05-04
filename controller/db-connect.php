  
<?php
$servername = "localhost";
$database = "tw";
$username = "root";
$password = "ovidiu";

$conn = mysqli_connect($servername, $username, $password, $database);
  if (!$conn) {
      die('Could not connect: '. $mysqli -> error);
  }
?>