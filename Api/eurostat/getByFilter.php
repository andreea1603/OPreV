<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include('../../model/db-connect.php');
include_once 'eurostat.php';


$category = new eurostat($conn);
$category->id = getOption('id');
$category->bmi = getOption('bmi');
$category->value = getOption('value');
$category->year = getOption('year');
if (getOption('country') != null) {

  $countries = split(getOption('country'));

  for ($i = 0; $i < count($countries); $i++) {
    array_push($category->country, $countries[$i]);
  }
} else {
  $category->country = null;
}
$result = array();
$result = $category->infoByFilter();

//print_r($result);
$num = count($result[0]);
if ($num > 0) {

  $label = array();
  $label['data'] = array();
  for ($i = 0; $i < $num; $i++) {

    $item = array(
      'country' => $result[0][$i],
      'value' => $result[1][$i]
    );

    array_push($label['data'], $item);
  }
  echo json_encode($label);
} else {
  echo json_encode(
    array('message' => 'No Categories Found')
  );
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
?>