<?php
include('db-connectUsers.php');

function register($object)
{
    include('db-connectUsers.php');
    $query = "select email from users";
    $result = mysqli_query($connUsers, $query);
    $ok = 1;
    while ($row = $result->fetch_assoc()) {
        if ($row["email"] == $object["email"][0]) {
            $ok = 0;
            break;
        }
    }
    if ($ok == 0) {
        echo 0;
    } else {
        $crypt = password_hash($object["password"][0], PASSWORD_BCRYPT);
        $query = "INSERT INTO users (firstname, lastname,email, password) VALUES ( ? , ? , ? , ? )";
        if ($stmt = mysqli_prepare($connUsers, $query)) {
            $stmt->bind_param('ssss', $object["firstName"][0], $object["lastName"][0], $object["email"][0], $crypt);
        }
        mysqli_stmt_execute($stmt);
        $stmt->close();
        echo 1;
    }
}

function checkEmail($email){
    include('db-connectUsers.php');
    $query="SELECT * FROM `users` WHERE email=?";
    $typeOfParam='s';

    if ($stmt = mysqli_prepare($connUsers, $query)){
        mysqli_stmt_bind_param($stmt, $typeOfParam, $email);
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $num= mysqli_num_rows($result);

    if ($num==0) 
            return 0;
    return 1;
}
function login($email, $pass){
    include('db-connectUsers.php');

    $query = "SELECT password FROM users WHERE email = ? ";


    if ($stmt = mysqli_prepare($connUsers, $query)){

        mysqli_stmt_bind_param($stmt, 's', $email);
    }        

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $row= mysqli_fetch_array($result);
    $verif=$row["password"];

    if(password_verify($pass, $verif)){
        return 1;
    }
    else
        return 0;
}
function setSession($email){

    include('db-connectUsers.php');
    $query = "SELECT firstname, lastname FROM users WHERE email= ?";

    if ($stmt = mysqli_prepare($connUsers, $query)){

        mysqli_stmt_bind_param($stmt, 's', $email);
    }        

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $row= mysqli_fetch_array($result);
    $firstname= $row["firstname"];
    $lastname = $row["lastname"];
    $_SESSION['firstname']=$firstname;
    $_SESSION['lastname']=$lastname;
    $_SESSION['email']=$email;
    $_SESSION['conectat']=true;
    }
?>