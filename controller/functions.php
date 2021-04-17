<?php
include('init.php');
include('db-connect.php');

function printSession() {
    echo '<hr>';
    echo '<h3> SESSION </h3>';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
}

function register($email, $crypt){
    include('init.php');
    include('db-connect.php');

    $query="INSERT INTO `users` (email, parola) VALUES ( '{$email}', '{$crypt}')";
    $conn->exec($query);
}

function checkEmail($email){
    include('init.php');
    include('db-connect.php');
    $query="SELECT * FROM `users` WHERE email='{$email}'";

    $statement = $conn->prepare($query);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $results = $statement->fetchAll();

    if (!count($results)) 
         return 0;
    return 1;

}
?>

<?php
?>