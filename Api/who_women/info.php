<?php

 // Headers
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: POST');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
//include ('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\model\db-connect.php');
include('../../model/db-connect.php');

// include_once 'Database.php';
 include_once 'womenObesity.php';
 // Instantiate DB & connect
// $database = new Database();

 //$db = $database->connect();

 $db=$conn;
 // Instantiate blog post object
 $$category = new womenObesity($db);

 $result = $category->getInfo();

$num= count($result);


if($num>0){
  $label =array();
  $label['data']= array();
  for($i=0; $i<$num ; $i++){

      $item = array(
        'id' => $result[$i]['id'],
        'country' => $result[$i]['country'],
        'value' => $result[$i]['value'],
        'year' => $result[$i]['year'],
        'sex' => $result[$i]['sex'],
        'age' => $result[$i]['age'],
      );

      array_push($label['data'], $item);
  }
  echo json_encode($label);
}
else {
  // No Categories
  echo json_encode(
    array('message' => 'No Categories Found')
  );
}
  ?>
