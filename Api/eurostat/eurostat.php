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
            '2014' => $resultPre[2][$i], 
            '2017' => $resultPre[3][$i], 
        );
        $label['Preobesity'][$resultPre[0][$i]]=array();
 
        array_push($label['Preobesity'][$resultPre[0][$i]], $item);

    }

    $resultObe=getObese("");
    for($i=0; $i< count($resultObe[0]); $i++){
        $item=array(

            '2008' => $resultObe[1][$i], 
            '2014' => $resultObe[2][$i], 
            '2017' => $resultObe[3][$i], 
        );
        $label['Obesity'][$resultObe[0][$i]]=array();
 
        array_push($label['Obesity'][$resultObe[0][$i]], $item);

    }

    $resultOver=getOverweight("");
    for($i=0; $i< count($resultOver[0]); $i++){
        $item=array(

            '2008' => $resultOver[1][$i], 
            '2014' => $resultOver[2][$i], 
            '2017' => $resultOver[3][$i], 
        );
        $label['Overweight'][$resultOver[0][$i]]=array();
 
        array_push($label['Overweight'][$resultOver[0][$i]], $item);

    }
    echo json_encode($label);

}

public function infoByFilter(){
    $respond=[];
    if($this->bmi!=null){
        if($this->bmi=='pre-obese'){
            $respond=getPreobeseY($this->country,$this->year);
        }
        else
            if($this->bmi=='obese'){
                $respond=getObeseY($this->country,$this->year);
            }
            else
                if($this->bmi=='overweight'){
                    $respond=getOverweightY($this->country,$this->year);
                }
    }
    return $respond;
    }
}




?>