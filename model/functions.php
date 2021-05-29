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
    include('db-connect.php');
    $query="INSERT INTO users (email, password, firstname, lastname) VALUES 
    ( ? , ? , ? , ? )";

    if ($stmt = mysqli_prepare($conn, $query)){
        $stmt->bind_param('ssss', $email, $crypt, $firstname, $lastname);
    }

      mysqli_stmt_execute($stmt);
      $stmt->close();
?>

<script>console.log("salut");
</script>
<?php

}


function checkEmail($email){
    include('db-connect.php');
    $query="SELECT * FROM `users` WHERE email=?";
    $typeOfParam='s';

    if ($stmt = mysqli_prepare($conn, $query)){
        mysqli_stmt_bind_param($stmt, $typeOfParam, $email);
    }
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);
    $num= mysqli_num_rows($result);

    if (!$num) 
         return 0;
    return 1;
}


function login($email, $pass){
    include('db-connect.php');

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

    include('db-connect.php');
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
<script>

    function add(){
        console.log("am intrat aici");
       
s        
    }
</script>