<?php

include('db-connect.php');

function setSession($email){

    include('db-connectUsers.php');
    $query = "SELECT firstname, lastname FROM users WHERE email= ?";

    if ($stmt = mysqli_prepare($connUse, $query)){

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