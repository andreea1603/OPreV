<?php

class crudeObesity{

    public $conn;
    public $table= 'whocrude';
    public $id;
    public $spatialdim;
    public $country=[];
    public $value;
    public $year;
    public $sex;

    public function __construct($db) {
        $this->conn = $db;
      }

      public function getInfo(){

        $get_result=[];

        $query='SELECT id, spatialdim, country, value, year, sex from whocrude order by id asc';

         $result = mysqli_query($this->conn, $query);


         $n= $result->num_rows;

         for($i=0; $i<$n; $i++)
         if (mysqli_num_rows($result)) {
                 if ($row = mysqli_fetch_assoc($result)) {
                    array_push($get_result, $row);
             }
         }
   
         return $get_result;
      }

    public function infoByFilter(){
      // Create query
    $result = array();

    $filterSelected = array();
    $filterSelected['id'] = 0;
    $filterSelected['spatialdim'] = 0;
    $filterSelected['country'] = 0;
    $filterSelected['value'] = 0;
    $filterSelected['year'] = 0;
    $filterSelected['sex'] = 0;
    $k = 0;

    $typeOfParams='';
    $array= array();


    $query = "SELECT id,spatialdim, country, value, year, sex FROM whocrude WHERE ";

    if ($this->id != null) {
      $filterSelected['id'] = 1;
      $query = $query . "id=? ";
      $typeOfParams=$typeOfParams.'d';
      array_push($array, $this->id);
      $k++;
    }
    if ($this->spatialdim != null) {
      $filterSelected['spatialdim'] = 1;
      if ($k == 0)
        $query = $query . " spatialdim=? ";
      else {
        $query = $query . " AND spatialdim=? ";
      }
      $typeOfParams=$typeOfParams.'s';
      array_push($array, $this->spatialdim);

      $k++;
    }
    if ($this->country != null) {
      $filterSelected['country'] = 1;
      if ($k == 0){
        $query= $query . " country in ( ?";
      }
      else {
          $query = $query . " AND country in ( ?";
      }
      
      if(count($this->country)==1)
        $query = $query . " )";
      else{
        array_push($array, $this->country[0]);
        $typeOfParams=$typeOfParams.'s';
        for($i=1;$i<count($this->country);$i++){
          $query = $query . " , ?";
          $typeOfParams=$typeOfParams.'s';
          array_push($array, $this->country[$i]);
        }
        $query = $query . ")";
      }
        $k++;
  }

  if ($this->value != null) {
    $filterSelected[2] = 1;
    if ($k == 0)
      $query = $query . " value=? ";
    else {
      $query = $query . " AND value=? ";
    }
    $typeOfParams=$typeOfParams.'d';
    array_push($array, $this->value);

    $k++;
  }

    if ($this->value != null) {
      $filterSelected[2] = 1;
      if ($k == 0)
        $query = $query . " value=? ";
      else {
        $query = $query . " AND value=? ";
      }
      $typeOfParams=$typeOfParams.'d';
      array_push($array, $this->value);

      $k++;
    }

    if ($this->year != null) {
      $filterSelected[3] = 1;
      if ($k == 0)
        $query = $query . " year=? ";

      else {
        $query = $query . " AND year=? ";
      }
      $typeOfParams=$typeOfParams.'d';
      array_push($array, $this->year);

      $k++;
    }

    if ($this->sex != null) {
      $filterSelected[4] = 1;
      if ($k == 0)
        $query = $query . " sex=? ";
      else {
        $query = $query . " AND sex=? ";
      }
      $typeOfParams=$typeOfParams.'s';
      array_push($array, $this->sex);

      $k++;
    }
    $types =array();
    $types=['id', 'spatialdim','country', 'value', 'year', 'sex'];
    
    $get_result = array();
    if ($stmt = mysqli_prepare($this->conn, $query)) {
      
      foreach(array_keys($filterSelected) as $key){
          if($filterSelected[$key]==1)
                  mysqli_stmt_bind_param($stmt, $typeOfParams, ...$array);
          }
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      while ($row = mysqli_fetch_array($result)) {
        array_push($get_result, $row);
      }
    }
      
    return $get_result;
    }
    public function delete1(){

      $query="DELETE FROM whocrude WHERE ";
      $k=0;
      if($this->country[0] != null){
        $query=$query." country='{$this->convertCountry($this->country[0])}'";
        $k=$k+1;
      }
      if($this->year!=null){
        if($k==0){
          $query=$query." year={$this->year}";
        }
        else{
          $query=$query." and year={$this->year}";
        }
        $k=$k+1;

      }
      if($this->sex!=null){
        if($k==0){
          $query=$query." sex='{$this->convertSex($this->sex)}'";
        }
        else{
          $query=$query." and sex='{$this->convertSex($this->sex)}'";
        }
        $k=$k+1;

      }
      if ($this->conn->query($query)) {
        printf("Table tutorials_tbl record deleted successfully.<br />");
      }
      if ($this->conn->errno) {
        printf("Could not delete record from table: %s<br />", $this->conn->error);
      }      
    }
    public function convertSex($sex){
      if(strtoupper($sex)=='FEMALE')
        return 'FMLE';
      if(strtoupper($sex)=='MALE')
        return 'MLE';
    return 'BTSX';
  }

    public function convertCountry($country){
      $country2=strtoupper($country);

      $query="SELECT code3 from countries where upper(nume)=upper('{$country2}')";
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
  
  public function add(){
    //se adauga si regiuni? :(
  
      if($this->checkIfExists()==false)
      {
        $id=$this->getIndex();
      $query="INSERT INTO  whocrude values ( {$id}, 'COUNTRY', '{$this->convertCountry($this->country[0])}',
         {$this->value}, {$this->year}, '{$this->convertSex($this->sex)}') ";
      }
      else{
        echo "exista deja o inregistrare asa, incercati un update!";
      }

      if (mysqli_query($this->conn, $query)) {
        echo "Record updated successfully";
       }
        else {
        echo "Date introduse gresit";
       }
    } 
    public function update($typeToBeModified, $newValue){

      ///(update: verificam daca exista randul) -> pt add  warning daca exista

  //$typeToBeModified='year';
  //$newValue='afg';
  $selectQuery=""; //pentru a verifica daca exista o interogare de genul asta
  //$this->country='romania';
  if($this->country[0]!=null)
    if($this->convertCountry($this->country[0])==null)
        return "nu am gasit nimic";
    else
      $this->country[0]=$this->convertCountry($this->country[0]);

  //$this->year=2030;
  if($this->sex!=null)
    $this->sex=$this->convertSex($this->sex);
  if($typeToBeModified=='Country'){
    //vreau sa modific tara
    // in this->camp avem valorile alese in formular
    $newValue=$this->convertCountry($newValue);
    $query="UPDATE whocrude SET country='{$newValue}' WHERE country='{$this->country[0]}' ";
    $selectQuery="SELECT id from whocrude WHERE country='{$this->country[0]} '";
    if($this->year!=null){
      $query=$query." AND year={$this->year} ";
      $selectQuery=$selectQuery." AND year={$this->year} ";

    }
    if($this->sex!=null){
      $query=$query." AND sex='{$this->sex}' ";
      $selectQuery=$selectQuery." AND sex='{$this->sex}' ";


    }
    if($this->value!=null){
      $query=$query."   AND value>={$this->value}-0.01 AND value<={$this->value}   "; 
      $selectQuery=$selectQuery."   AND value>={$this->value}-0.01 AND value<={$this->value}   ";

    }

  }
  else{
    if($typeToBeModified=='Year'){
      $query="UPDATE whocrude SET year={$newValue} WHERE year= {$this->year} ";
      $selectQuery="SELECT id from whocrude WHERE year={$this->year} ";

      if($this->country[0]!=null){
        $selectQuery=$selectQuery." AND country='{$this->country[0]}' ";
        $query=$query." AND country='{$this->country[0]}' ";
      }
      if($this->sex!=null){
        $query=$query." AND sex='{$this->sex}' ";
        $selectQuery=$selectQuery." AND sex='{$this->sex}' ";


      }
      if($this->value!=null){
        $query=$query."   AND value>={$this->value}-0.01 AND value<={$this->value}   ";
        $selectQuery=$selectQuery."   AND value>={$this->value}-0.01 AND value<={$this->value}   ";

      }
    }
    else{
      if($typeToBeModified=='Sex'){
        $newValue=$this->convertSex($newValue);
        $query="UPDATE whocrude SET sex='{$newValue}' WHERE sex='{$this->sex}' ";
        $selectQuery="SELECT id from whocrude WHERE sex='{$this->sex} '";

        if($this->country[0]!=null){
          $query=$query." AND country='{$this->country[0]}' ";
          $selectQuery=$selectQuery." AND country='{$this->country[0]}' ";

        }
        if($this->year!=null){
          $query=$query." AND year={$this->year} ";
          $selectQuery=$selectQuery." AND year={$this->year} ";

  
        }
        if($this->value!=null){
          $query=$query."   AND value>={$this->value}-0.01 AND value<={$this->value}   ";
          $selectQuery=$selectQuery."   AND value>={$this->value}-0.01 AND value<={$this->value}   ";

        }
      }
      else 
        if($typeToBeModified=='Value'){
          $query="UPDATE whocrude SET value={$newValue} WHERE value={$this->value} ";
          $selectQuery="SELECT id from whocrude WHERE value={$this->value} ";
          
          if($this->country[0]!=null){
            $query=$query." AND country='{$this->country[0]}'";
            $selectQuery=$selectQuery." AND country='{$this->country[0]}' ";

          }
          if($this->sex!=null){
            $query=$query." AND sex='{$this->sex}' ";
            $selectQuery=$selectQuery." AND sex='{$this->sex}' ";

          }
          if($this->year!=null){
            $query=$query." AND year={$this->year} ";
            $selectQuery=$selectQuery." AND year={$this->year} ";

          }
        }
      }
    }
    echo $selectQuery;
$result = mysqli_query($this->conn, $selectQuery);
$n = $result->num_rows;
$ok=0;

/// OK SE FACE 1 IN CAZUL IN CARE EXISTA INREGISTRARI
  echo $query;
  if (mysqli_num_rows($result)) {
    if ($row = mysqli_fetch_assoc($result)) {
      if($row!=null)
        if($row!=0)
          $ok=1;
    }
  }

    

    
//AICI TREBUIE DECOMENTAT CA SA SE EXECUTE UPDATE-UL

if($ok==1){  //daca exista cel putin o inregistrare la care sa fac update
    if (mysqli_query($this->conn, $query)) {
      echo "Record updated successfully";
     }
     } else {
      echo "Date introduse gresit";
     }
    
      print_r($query);
  }

    public function checkIfExists(){

      //  $this->country='ROU';
      
        //$this->year=2010;
        //$this->sex='FMLE';
      
      
        $query="select id from whocrude where country='{$this->convertCountry($this->country[0])}' AND year={$this->year} AND sex='{$this->convertSex($this->sex)}'";
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
      
      public function getIndex(){
      
        $query="select count(id) maxim from whocrude";
        $result = mysqli_query($this->conn, $query);
      $index=[];
        if (mysqli_num_rows($result)) {
          if ($row = mysqli_fetch_assoc($result)) {
            array_push($index, $row);
          }
        }
        
        return  $index[0]['maxim'];;
      
      }

  }
      
?>
