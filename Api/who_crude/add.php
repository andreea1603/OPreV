<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../model/db-connect.php';

  $dir=__DIR__;
  $path=substr($dir, 0, 0).'crudeObesity.php';
  include($path);
  $category=new crudeObesity($conn);
  $data = file_get_contents("php://input");
  
  $result=json_decode($data);
  
  if(isset($result->sex))
    $category->sex=$result->sex;
  if(isset($result->country))
      $category->country[0]=$result->country[0];
  if(isset($result->year))
      $category->year=$result->year;
  if(isset($result->value))
      $category->value=$result->value;
  if($result->eroare)
     $category->add();