<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../model/db-connect.php';
  include_once 'D:\Xamp\htdocs\proiect\OPreV\Api\who_women\womenObesity.php';

  $category=new womenObesity($conn);
  $data = file_get_contents("php://input");
  
  $result=json_decode($data);
  
  if(isset($result->area))
    $category->area=$result->area;
  if(isset($result->country))
      $category->country[0]=$result->country;
  if(isset($result->year))
      $category->year=$result->year;
  if(isset($result->value))
      $category->value=$result->value;
 
     $category->add();

     ?>