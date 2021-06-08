<?php
//include('../../model/db-connect.php');
include('../../model/functionsLoginRegister.php');

$request=file_get_contents("php://input");
$object=json_decode($request,true);

register($object);
// $query="select email from users";
// $result = mysqli_query($conn,$query);
// $ok=1;
// while ($row = $result->fetch_assoc()){
//     if($row["email"]==$object["email"][0]){
//         $ok=0;
//         break;
//     }
// }
// if($ok==0){
//     echo 0;
// }
// else{
//     $crypt=password_hash($object["password"][0], PASSWORD_BCRYPT);
//     $query="INSERT INTO users (firstname, lastname,email, password) VALUES ( ? , ? , ? , ? )";
//     if ($stmt = mysqli_prepare($conn, $query)){
//         $stmt->bind_param('ssss', $object["firstName"][0], $object["lastName"][0], $object["email"][0], $crypt);
//     }
//     mysqli_stmt_execute($stmt);
//     $stmt->close();
//     echo 1;
// }
