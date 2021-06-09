<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//include ('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\model\db-connect.php');
include('../../model/db-connect.php');
include('../../controller/getWhoOption.php');

include_once 'womenObesity.php';
  // Instantiate DB & connect
  // Instantiate blog category object

  $category = new womenObesity($conn);


  if (!verificareParam($_GET)){
    echo json_encode(
      array('message' => 'Incorect Parameters')
    );
    http_response_code(400);
  }
  else {
  $category->id = getOption('id');
  $category->area =getOption('area');
  $category->value = getOption('value');
  $category->year = getOption('year');

  
  if ( getOption('country')!=null) {

    $countries = split(getOption('country'));

    for ($i = 0; $i < count($countries); $i++) {
      array_push($category->country, $countries[$i]);
    }
  } else {
    $category->country = null;
  }

  $result =array();

  $result = $category->infoByFilter();

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
          'area' => $result[$i]['area'],
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
}
  function split($country)
{
  $countries = [];
  $oneCountry = "";
  if ($country[0] != '[') {
    array_push($countries, $country);
    return $countries;
  } else {
    for ($i = 1; $i < strlen($country); $i++) {

      if ($country[$i] == ',' || $country[$i] == ']') {
        array_push($countries, $oneCountry);
        $oneCountry = "";
      } else {
        $oneCountry = $oneCountry . $country[$i];
      }
    }
  }
  return $countries;
}
function verificareParam($parametrii)
{
  $validParam = array('country', 'area', 'year', 'value', 'id');
  foreach ($parametrii as $key => $value) {
    if (!in_array(htmlspecialchars($key), $validParam))
      return 0;
  }
  return 1;
}
