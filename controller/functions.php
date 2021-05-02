<?php
include('db-connect.php');

function printSession() {
    echo '<hr>';
    echo '<h3> SESSION </h3>';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
}

function register($email, $crypt, $firstname, $lastname){
    include('init.php');
    include('db-connect.php');
    $query="INSERT INTO `users` (email, password, firstname, lastname) VALUES ( '{$email}', '{$crypt}' , '{$firstname}', '{$lastname}')";
    mysqli_query($conn,$query);
}


function checkEmail($email){
    include('init.php');
    include('db-connect.php');
    $query="SELECT * FROM `users` WHERE email='{$email}'";

    $result = mysqli_query($conn,$query);
    $num= mysqli_num_rows($result);

    if (!$num) 
         return 0;
    return 1;
}


function login($email, $pass){
    session_unset();
    include('db-connect.php');

    $s = "SELECT password FROM users WHERE email ='$email'";
        
    $result = $conn -> query($s);

    $row=$result->fetch_assoc();
    $verif=$row["password"];
    echo "verificare".$verif."verificare";

    if(password_verify($pass, $verif)){
        return 1;
    }
    else
        return 0;
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
