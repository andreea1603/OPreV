<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//include ('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\model\db-connect.php');
include('../../model/db-connect.php');
include_once 'agestdObesity.php';
  // Instantiate DB & connect
  // Instantiate blog category object

  $category = new agestdObesity($conn);

  $category->id = isset($_GET['id']) ? $_GET['id'] : null;
  $category->age = isset($_GET['spatialdim']) ? $_GET['spatialdim'] : null;
  $category->country = isset($_GET['country']) ? $_GET['country'] : null;
  $category->value = isset($_GET['value']) ? $_GET['value'] : null;
  $category->year = isset($_GET['year']) ? $_GET['year'] : null;
  $category->sex = isset($_GET['sex']) ? $_GET['sex'] : null;

  //echo "salutare";
  // Get post
  $result =array();

  $result = $category->infoByFilter();

  $num= count($result);

  if($num>0){

    $label =array();
    $label['data']= array();
    for($i=0; $i<$num ; $i++){
  
        $item = array(
          'id' => $result[$i]['id'],
          'spatialdim' => $result[$i]['spatialdim'],
          'country' => $result[$i]['country'],
          'value' => $result[$i]['value'],
          'year' => $result[$i]['year'],
          'sex' => $result[$i]['sex'],
        );
  
        array_push($label['data'], $item);
    }
    echo json_encode($label);
  }
  else {
  //   No Categories
    echo json_encode(
      array('message' => 'No Categories Found')
    );
  }

  ?>