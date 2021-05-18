<?php

include ('../../model/functions_repres.php');
include ('../../model/db-connect.php');

class eurostat{


public $conn;
public $value;
public $bmi;
public $year;
public $country=[];



public function __construct($db)
{
  $this->conn = $db;
}

public function getInfo(){

    $label=array();
    $label['Preobesity']=array();
    $label['Obesity']=array();
    $label['Overweight']=array();

    $resultPre=getPreobesity("");

    for($i=0; $i< count($resultPre[0]); $i++){
        $item=array(

            '2008' => $resultPre[1][$i], 
            '2014' => $resultPre[1][$i], 
            '2017' => $resultPre[1][$i], 
        );
        $label['Preobesity'][$resultPre[0][$i]]=array();
 
        array_push($label['Preobesity'][$resultPre[0][$i]], $item);

    }

    echo json_encode($label);

}

}

$category = new eurostat($conn);

$category->getInfo();


?>