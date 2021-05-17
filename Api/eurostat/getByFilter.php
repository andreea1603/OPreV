<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include('../../model/db-connect.php');
include('../../controller/getWhoOption.php');
include_once 'eurostat.php';


$category = new eurostat($conn);
$category->id = getOption('id');
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
?>