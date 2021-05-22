<?php

//include ('../../model/functions_repres.php');
include ('../../model/db-connect.php');
include('../../controller/getWhoOption.php');
include('../../model/dataForApiEurostat.php');

class eurostat{


public $conn;
public $value;
public $bmi;
public $year;
public $country=[];

///pentru delete: daca se pune doar tara => punem in locul tarii null
///             daca se alege tara+ bmi => punem null pentru valoarea de la bmi ul respectiv
///             daca se alege tara+ bmi+ani => punem null pentru valoarea de la bmi, an
///pentru update : --> sa se poata modifica doar cate un camp
///pentru add --> 
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
    public function delete1(){

        $query="DELETE FROM agestd WHERE ";
        $k=0;
        if($this->country[0] != null){
          $query=$query." country='{$this->convertCountry($this->country[0])}' ";
          $k=$k+1;
        }
        if($this->year!=null){
          if($k==0){
            $query=$query." year={$this->year} ";
          }
          else{
            $query=$query." and year={$this->year} ";
          }
          $k=$k+1;
    
        }
        if($this->bmi!=null){
            if($k==0)
                $query=$query." ";
          $k=$k+1;
    
        }
        if ($this->conn->query($query)) {
          printf("Table tutorials_tbl record deleted successfully.<br />");
        }
        if ($this->conn->errno) {
          printf("Could not delete record from table: %s<br />", $this->conn->error);
        }    
    
      }
    /*
    function add(){
        if($this->checkIfExists()==false)
        {
          $id=$this->getIndex();
        $query="INSERT INTO  whoagestd values ( {$id}, 'COUNTRY', '{$this->convertCountry($this->country[0])}',
           {$this->value}, {$this->year}, '{$this->convertSex($this->sex)}') ";
        }
        else{
          echo "exista deja o inregistrare asa, incercati un update!";
        }
        //echo $query;
        if (mysqli_query($this->conn, $query)) {
          echo "Record updated successfully";
         }
          else {
          echo "Date introduse gresit";
         }

    }
    public function checkIfExists(){

        //  $this->country='ROU';
        
          //$this->year=2010;
          //$this->sex='FMLE';
        
          $query="select id from whoagestd where country='{$this->convertCountry($this->country[0])}' AND year={$this->year} AND sex='{$this->convertSex($this->sex)}'";
          $result = mysqli_query($this->conn, $query);
          $n = $result->num_rows;
        
          echo $query;
          if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
              if($row!=null)
                //echo $row;
                  return "deja exista o inregistrare";
            }
          }
          return false;
        
        }

        */
        public function convertCountry($country){
            $country2=strtoupper($country);
      
            $query="SELECT code2 from countries where upper(nume)=upper('{$country2}')";
            $result = mysqli_query($this->conn, $query);
      
      
            $code3=[];
            $n = $result->num_rows;
        
            if($n!=0){
              if (mysqli_num_rows($result)) {
                if ($row = mysqli_fetch_assoc($result)) {
                  array_push($code3, $row);
                }
              }
            }
              else 
                  return null;
              return ($code3[0]['code3']);
        
        }

    }

?>