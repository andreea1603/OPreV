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
    public function Update($camp,$valoare){

        $query="Update valori set {$camp}={$valoare} WHERE ";
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
              $query1="Select id from geo where name='{$this->country[0]}'";
              $result = mysqli_query($this->conn, $query1);
              $row = mysqli_fetch_assoc($result); 
              $id=$row["id"];
              $query=$query."id in(".$id*3;
              $query=$query.",".$id*3+1;
              $query=$query.",".$id*3+2;
              $query=$query.",".(114+$id*3);
              $query=$query.",".(114+$id*3+1);
              $query=$query.",".(114+$id*3+2);
              $query=$query.",".(228+$id*3);
              $query=$query.",".(228+$id*3+1);
              $query=$query.",".(228+$id*3+2);
              $query=$query.")";
              echo $query;
          }
          else
            if($this->year!=""){
              if($this->year==2008)
                $ok=0;
              else
               if($this->year==2014)
                $ok=1;
                else
                  $ok=2;
              $query=$query." year in(".$ok;
              for($i=$ok;$i<=340;$i+=3)
                $query=$query.",".$i;
              $query=$query.")";
              echo $query;
              }
            else
              if($this->bmi!=""){
                if($this->bmi=="pre-obese"){
                  $query=$query."id<114";
                }
                else
                  if($this->bmi=="supraponderal"){
                    $query=$query."id>=114 and id<228";
                  }
                else
                  if($this->bmi=="obese"){
                    $query=$query."id>=228 and id<340";
                  }
                echo $query;
              }
        }
        else
        if($k==2){
          if($this->country[0]!="" && $this->bmi!=""){
            $query1="Select id from geo where name='{$this->country[0]}'";
            $result = mysqli_query($this->conn, $query1);
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
            $query = $query."id in (".($ok+$id*3);
            $query = $query.",".($ok+$id*3+1);
            $query = $query.",".($ok+$id*3+2);
            $query = $query.")";
            echo $query;
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
            $query = $query."id in (".($id*3+$ok);
            $query = $query.",".(114+$id*3+$ok);
            $query = $query.",".(228+$id*3+$ok);
            $query = $query.")";
            echo $query;
          }
          else{
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
            $query=$query." year in(".$ok;
            for($i=$ok;$i<=$ok+114;$i+=3)
              $query=$query.",".$i;
            $query=$query.")";
            echo $query;
          }
        }
        else
          if($k==3){
            $query1="Select id from geo where name='{$this->country[0]}'";
            $result = mysqli_query($this->conn, $query1);
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
            if($this->year==2008)
              $query=$query."id = " . ($ok+$id*3);
            else
             if($this->year==2014)
                $query=$query."id = " . ($ok+$id*3+1);
            else
              $query=$query."id = " . ($ok+$id*3+2);
            echo $query;
          }
        /*    
        if ($this->conn->query($query)) {
          printf("Table tutorials_tbl record deleted successfully.<br />");
        }
        if ($this->conn->errno) {
          printf("Could not delete record from table: %s<br />", $this->conn->error);
        }
        */
    }


    public function add (){

      $query="Insert into valori values(";
      $query1="Select id from geo where name='{$this->country[0]}'";
      $result = mysqli_query($this->conn, $query1);
      $row = mysqli_fetch_assoc($result);
      $id=$row["id"];
      if($this->bmi=="pre-obese")
        $ok=0;
      else
        if($this->bmi=="supraponderal")
          $ok=114;
        else
          if($this->bmi=="obese")
            $ok=228;
      if($this->year==2008)
          $query=$query." " . ($ok+$id*3);
        else
          if($this->year==2014)
              $query=$query." " . ($ok+$id*3+1);
          else
              $query=$query." " . ($ok+$id*3+2);
      $query=$query.",".$this->value;
      $query=$query.")";
      echo $query;
    }
  }

?>