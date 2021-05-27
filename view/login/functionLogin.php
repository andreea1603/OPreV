<?php
include('../../model/db-connect.php');
include('../../model/init.php');

$request=file_get_contents("php://input");
$object=json_decode($request,true);

$existaEmail=checkEmail($object["email"][0]);

if($existaEmail!=0)
    if(login($object["email"][0],$object["password"][0])==1){
        setSession($object["email"][0]);
        echo 1;
    }
    else
        echo 0;
function checkEmail($email){
    include('../../model/db-connect.php');
    $query="SELECT * FROM `users` WHERE email=?";
    $typeOfParam='s';

    if ($stmt = mysqli_prepare($conn, $query)){
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
    session_unset();
    include('../../model/db-connect.php');

    $query = "SELECT password FROM users WHERE email = ? ";


    if ($stmt = mysqli_prepare($conn, $query)){

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

    include('../../model/db-connect.php');
    $query = "SELECT firstname, lastname FROM users WHERE email= ?";

    if ($stmt = mysqli_prepare($conn, $query)){

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