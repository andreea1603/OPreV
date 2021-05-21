<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../model/db-connect.php';
  include_once 'D:\Xamp\htdocs\proiect\OPreV\Api\who_agestd\agestdObesity.php';


$category=new agestdObesity($conn);
$data = file_get_contents("php://input");

$result=json_decode($data);
print_r($result);

//print_r($data['id']);

//$category->country[0]=$data["Country"][0];

//echo $category->country[0];