  <?php
$servername = "localhost";
$database = "tw";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);
  if (!$conn) {
      die('Could not connect: '. $mysqli -> error);
  }
  if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
?>