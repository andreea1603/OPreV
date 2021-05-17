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

    //print_r($resultPre[0]);
    //echo count($resultPre[0]);
    for($i=0; $i< count($resultPre[0]); $i++){
        $item=array(

            '2008' => $resultPre[1][$i], 
            '2014' => $resultPre[1][$i], 
            '2017' => $resultPre[1][$i], 
        );
        $label['Preobesity'][$resultPre[0][$i]]=array();
       // array_push( $label['Preobesity'][$resultPre[0][0]], $resultPre[1]);
       // array_push( $label['Preobesity'][$resultPre[0][0]], $resultPre[2]);
       // array_push( $label['Preobesity'][$resultPre[0][0]], $resultPre[3]);
        array_push($label['Preobesity'][$resultPre[0][$i]], $item);


    }

    //array_push($label['Preobesity'], $resultPre[0]);
   // array_push($label['Preobesity'], $resultPre[1]);

    /*$resultObe=getObese("");
    array_push($label['Obesity'], $resultObe[0]);
    array_push($label['Obesity'], $resultObe[1]);

    $resultOver=getOverweight("");
    array_push($label['Overweight'], $resultOver[0]);
    array_push($label['Overweight'], $resultOver[1]);

*/

 //   print_r($resultPre);
 //   print_r($resultObe);
 //   print_r($resultOver);

    echo json_encode($label);

}

}

$category = new eurostat($conn);

$category->getInfo();


?>