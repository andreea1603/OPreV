<?php
include('../../model/db-connect.php');

$request=file_get_contents("php://input");
$object=json_decode($request,true);
//var_dump($object);
echo "salut";
$query="select email from users";
$result = mysqli_query($conn,$query);
while ($row = $result->fetch_assoc()){
    if($row["email"]==$object["email"][0])
        echo 0;
    else
        echo 1;
}
?>