<?php

//include ('../../model/functions_repres.php');
include ('../../model/db-connect.php');
include('../../controller/getWhoOption.php');
include('../../model/dataForApiEurostat.php');

class eurostat{


public $conn;
public $value;
public $newvalue;
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
    function infoByFilter1(){

   
        include ('../../model/db-connect.php');

        $filterSelected = array();

        $filterSelected['value'] = 0;
        $filterSelected['bmi'] = 0;
        $filterSelected['year'] = 0;
        $filterSelected['country'] = 0;
    
        $this->year=2008;
        $this->country=['Austria', 'Romania'];
        $result= getObeseY($this->country, $this->year);
    

     //       print_r($result);
        $k = 0;
        return $result;
    
    }
    public function Update($valoare){

        $query="Update valori set valoare={$valoare} WHERE ";
        $k=0;
        if($this->country[0] != ""){
          $k++;
        }
        if($this->year != ""){
          $k++;
        }
        if($this->bmi != ""){
          $k++;
        }
        
        if($k==1){
          if($this->country[0]!=""){
              $query1="Select id from geo where name=? ";
              $stmt = mysqli_prepare($this->conn, $query1);
              mysqli_stmt_bind_param($stmt, 's', $this->country[0]);
              mysqli_stmt_execute($stmt);
        
              $result = mysqli_stmt_get_result($stmt);
              $row = mysqli_fetch_assoc($result); 
              $id=$row["id"];
              $query = $query . "id in ( ?,?,?,?,?,?,?,?,?)";
              $types='ddddddddd';
              $arrayParam=[$id*3,$id*3+1,$id*3+2,114+$id*3,114+$id*3+1,114+$id*3+2,228+$id*3,228+$id*3+1,228+$id*3+2];
              
          }
          else
            if($this->year!=""){

              $types="";
              $arrayParam=[];
              if($this->year==2008)
                $ok=0;
              else
               if($this->year==2014)
                $ok=1;
                else
                  $ok=2;
              $query=$query." id in(";
              array_push($arrayParam,$ok);
              $types.="d";
              $query.="?";
              for($i=$ok;$i<=340;$i+=3){
                array_push($arrayParam,$i);
                $types.="d";
                $query.=",?";
              }
              $query=$query.")";
              
              }
            else
              if($this->bmi!=""){
                if($this->bmi=="pre-obese"){
                  $query=$query."id<?";
                  $arrayParam=[];
                  $types="d";
                  array_push($arrayParam,114);
                }
                else
                  if($this->bmi=="supraponderal"){
                    $query=$query."id>=? and id<?";
                    $arrayParam=[];
                    $types="dd";
                    array_push($arrayParam,114,228);
                  }
                else
                  if($this->bmi=="obese"){
                    $query=$query."id>=? and id<?";
                    $arrayParam=[];
                    $types="dd";
                    array_push($arrayParam,228,340);
                  }
              }
        }
        else
        if($k==2){
          if($this->country[0]!="" && $this->bmi!=""){
            $query1="Select id from geo where name=? ";
            $stmt = mysqli_prepare($this->conn, $query1);
            mysqli_stmt_bind_param($stmt, 's', $this->country[0]);
            mysqli_stmt_execute($stmt);
      
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result); 
            $id=$row["id"];
            if($this->bmi=="pre-obese"){
              $ok=0;
            }
            else
              if($this->bmi=="supraponderal"){
                $ok=114;
              }
              else
                if($this->bmi=="obese"){
                  $ok=228;
                }
            $query = $query."id in ( ?,?,?)";
            $arrayParam=[$ok+$id*3,$ok+$id*3+1,$ok+$id*3+2];
            $types="ddd";
          }
          else
          if($this->country[0]!="" && $this->year!=""){
            $query1="Select id from geo where name='{$this->country[0]}'";
            $result = mysqli_query($this->conn, $query1);
            $row = mysqli_fetch_assoc($result); 
            $id=$row["id"];
            if($this->year==2008)
                $ok=0;
              else
               if($this->year==2014)
                $ok=1;
                else
                  $ok=2;
            $query = $query."id in ( ?,?,?)";
            $arrayParam=[$id*3+$ok,114+$id*3+$ok,228+$id*3+$ok];
            $types="ddd";
            
          }
          else{
              $ok=0;
              if($this->bmi=="pre-obese"){
                $query=$query."id<114";
                if($this->year==2008)
                  $ok=0;
                else
                  if($this->year==2014)
                    $ok=1;
                  else
                    $ok=2;
              }
              else
                if($this->bmi=="supraponderal"){
                  $query=$query."id>=114 and id<228";
                  if($this->year==2008)
                    $ok=114;
                  else
                  if($this->year==2014)
                    $ok=115;
                  else
                    $ok=116;
                }
              else
                if($this->bmi=="obese"){
                  $query=$query."id>=228 and id<340";
                  if($this->year==2008)
                    $ok=228;
                  else
                    if($this->year==2014)
                      $ok=229;
                    else
                      $ok=230;
                }
                
            $query=$query." and id in(?";
            $arrayParam=[];
            array_push($arrayParam,$ok);
            $types="d";
            for($i=$ok;$i<=$ok+114;$i+=3){
              $query=$query.",?";
              array_push($arrayParam,$i);
              $types.="d";
            }
            $query=$query.")";
          }
        }
        else
          if($k==3){
            $query1="Select id from geo where name=?";

            $stmt = mysqli_prepare($this->conn, $query1);
            mysqli_stmt_bind_param($stmt, 's', $this->country[0]);
            mysqli_stmt_execute($stmt);
      
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result); 
            $id=$row["id"];
            if($this->bmi=="pre-obese"){
              $ok=0;
            }
            else
              if($this->bmi=="supraponderal"){
                $ok=114;
              }
              else
                if($this->bmi=="obese"){
                  $ok=228;
                }
            $arrayParam=[];
            $types="s";
            $query.="id=?";
            if($this->year==2008)
              array_push($arrayParam,$ok+$id*3);
            else
             if($this->year==2014)
              array_push($arrayParam,$ok+$id*3+1);
            else
                if($this->year==2017)
                array_push($arrayParam,$ok+$id*3+2);
              
          }
          if($stmt = mysqli_prepare($this->conn, $query)){
            mysqli_stmt_bind_param($stmt, $types, ...$arrayParam);
            mysqli_stmt_execute($stmt);
          }
          
    }


    public function add (){

      $query="Insert into valori values(?,?)";
      $query1="Select id from geo where name=?";


      $stmt = mysqli_prepare($this->conn, $query1);
      mysqli_stmt_bind_param($stmt, 's', $this->country[0]);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($result);
      $id=$row["id"];
      $arrayParam=[];
      $types="dd";
      if($this->bmi=="pre-obese")
        $ok=0;
      else
        if($this->bmi=="supraponderal")
          $ok=114;
        else
          if($this->bmi=="obese")
            $ok=228;
      if($this->year==2008)
          array_push($arrayParam,$ok+$id*3);
        else
          if($this->year==2014)
            array_push($arrayParam,$ok+$id*3+1);
          else
            array_push($arrayParam,$ok+$id*3+2);
      array_push($arrayParam,$this->value);
      echo $query;
      try{
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, $types, ...$arrayParam);
        mysqli_stmt_execute($stmt);
      }
      catch(Exception $e){
        var_dump("exceptie");
      }
    }
  }

?>