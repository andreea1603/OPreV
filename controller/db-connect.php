  
<?php
$servername = "localhost";
$database = "mysql";
$username = "root";
$password = "ovidiu";

$conn = mysqli_connect($servername, $username, $password, $database);
  if (!$conn) {
      die('Could not connect: '. mysqli_error(1));
  }
?>