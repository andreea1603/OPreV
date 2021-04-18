  
<?php
$servername = "localhost";
$database = "mysql";
$username = "root";
$password = "ovidiu";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
 catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>