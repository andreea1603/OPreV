<?php
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

    $query="INSERT INTO `users` (email, password) VALUES ( '{$email}', '{$crypt}')";
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


function login($email,$password){
    include('db-connect.php');
    $s = "SELECT * FROM users WHERE email ='$email' && password='$password'";
  
    $statement = $conn->prepare($s);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    $results = $statement->fetchAll();
    echo 'salut';

    if(count($results)){
        return 1;
    }else{
        return 0;
    }
}
function setSession($email){
    include('db-connect.php');
    $s = "SELECT firstname, lastname FROM users WHERE email='$email'";
    $result = $conn -> query($s);
    $row = mysqli_fetch_assoc($result);
    $firstname= $row["firstname"];
    $lastname = $row["lastname"];
    $_SESSION['firstname']=$firstname;
    $_SESSION['lastname']=$lastname;
    $_SESSION['email']=$email;
    $_SESSION['conectat']=true;
}
?>
