<?php

class womenObesity{

    public $conn;
    public $table= 'whowomen';
    public $id;
    public $country=[];
    public $value;
    public $year;
    public $area;

    public function __construct($db) {
        $this->conn = $db;
      }

      public function getInfo(){

        $get_result=[];

        $query='SELECT id, country, value, year, area from whowomen order by id asc';

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
    
        $result = array();

        $filterSelected = array();
        $filterSelected['id'] = 0;
        $filterSelected['country'] = 0;
        $filterSelected['value'] = 0;
        $filterSelected['year'] = 0;
        $filterSelected['area'] = 0;
        $k = 0;

        $typeOfParams='';
        $array= array();


        $query = "SELECT id, country, value, year, area from whowomen WHERE ";
        
        if ($this->id != null) {
          $filterSelected['id'] = 1;
          $query = $query . "id=? ";
          $typeOfParams=$typeOfParams.'d';
          array_push($array, $this->id);
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

        if ($this->area != null) {
          $filterSelected[4] = 1;
          if ($k == 0)
            $query = $query . " area=? ";
          else {
            $query = $query . " AND area=? ";
          }
          $typeOfParams=$typeOfParams.'s';
          array_push($array, $this->area);

          $k++;
        }
        
        $types =array();
        $types=['id','country', 'value', 'year', 'area'];

        
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

        $query="DELETE FROM whowomen WHERE ";
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
        }
        if($this->area!=null){
          if($k==0){
            $query=$query." area='{$this->area}'";
          }
          else{
            $query=$query." and area='{$this->area}'";
          }
        }
        if ($this->conn->query($query)) {
          printf("Table tutorials_tbl record deleted successfully.<br />");
        }
        if ($this->conn->errno) {
          printf("Could not delete record from table: %s<br />", $this->conn->error);
        }        
      }
        public function checkIfExists(){

          //  $this->country='ROU';
          
            //$this->year=2010;
            //$this->sex='FMLE';
          
            $query="select id from whowomen where country=? AND year=? AND area=?";
           
          
            if ($stmt = mysqli_prepare($this->conn, $query)){
          
              $first=$this->convertCountry($this->country[0]);
              $second=$this->year;
              $third=$this->area;
              
              mysqli_stmt_bind_param($stmt, 'sds', $first, $second, $third);
          }
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          $num= mysqli_num_rows($result);
          
          if ($num>0) 
               return "deja exista o inregistrare";
          
            return false;
          
          }
        public function getIndex(){
      
          $query="select count(id) maxim from whowomen";
          $result = mysqli_query($this->conn, $query);
        $index=[];
          if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
              array_push($index, $row);
            }
          }
          return  $index[0]['maxim'];;
      
        }
      public function add(){
        //se adauga si regiuni? :(
      
          if($this->checkIfExists()==false)
          {
            $id=$this->getIndex();
          $query="INSERT INTO  whowomen values ( {$id}, 'COUNTRY', ? ,
             ? , ? , ? ) ";
          
          if ($stmt = mysqli_prepare($this->conn, $query)){
            $first=$this->convertCountry($this->country[0]);
            $second= $this->value;
            $third= $this->year;
            $fourth=$this->area;
            $stmt->bind_param('sdds', $first, $second, $third, $fourth);
        }
          mysqli_stmt_execute($stmt);
          $stmt->close();
        
        }
          else{
            echo "exista deja o inregistrare asa, incercati un update!";
          }
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


if($typeToBeModified=='Country'){
  //vreau sa modific tara
  // in this->camp avem valorile alese in formular
  $newValue=$this->convertCountry($newValue);
  $query="UPDATE whowomen SET country='{$newValue}' WHERE country='{$this->country[0]}' ";
  $selectQuery="SELECT id from whowomen WHERE country='{$this->country[0]} '";
  if($this->year!=null){
    $query=$query." AND year={$this->year} ";
    $selectQuery=$selectQuery." AND year={$this->year} ";

  }
  if($this->area!=null){
    $query=$query." AND area='{$this->area}' ";
    $selectQuery=$selectQuery." AND area='{$this->area}' ";


  }
  if($this->value!=null){
    $query=$query."   AND value>={$this->value}-0.01 AND value<={$this->value}   "; 
    $selectQuery=$selectQuery."   AND value>={$this->value}-0.01 AND value<={$this->value}   ";

  }

}
else{
  if($typeToBeModified=='Year'){
    $query="UPDATE whowomen SET year={$newValue} WHERE year= {$this->year} ";
    $selectQuery="SELECT id from whowomen WHERE year={$this->year} ";

    if($this->country[0]!=null){
      $selectQuery=$selectQuery." AND country='{$this->country[0]}' ";
      $query=$query." AND country='{$this->country[0]}' ";
    }
    if($this->area!=null){
      $query=$query." AND area='{$this->area}' ";
      $selectQuery=$selectQuery." AND area='{$this->area}' ";


    }
    if($this->value!=null){
      $query=$query."   AND value>={$this->value}-0.01 AND value<={$this->value}   ";
      $selectQuery=$selectQuery."   AND value>={$this->value}-0.01 AND value<={$this->value}   ";

    }
  }
  else{
    if($typeToBeModified=='Area'){
      $query="UPDATE whowomen SET area='{$newValue}' WHERE area='{$this->area}' ";
      $selectQuery="SELECT id from whowomen WHERE area='{$this->area} '";

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
        $query="UPDATE whowomen SET value={$newValue} WHERE value={$this->value} ";
        $selectQuery="SELECT id from whowomen WHERE value={$this->value} ";
        
        if($this->country[0]!=null){
          $query=$query." AND country='{$this->country[0]}'";
          $selectQuery=$selectQuery." AND country='{$this->country[0]}' ";

        }
        if($this->area!=null){
          $query=$query." AND area='{$this->area}' ";
          $selectQuery=$selectQuery." AND area='{$this->area}' ";

        }
        if($this->year!=null){
          $query=$query." AND year={$this->year} ";
          $selectQuery=$selectQuery." AND year={$this->year} ";

        }
      }
    }
    $result = mysqli_query($this->conn, $selectQuery);
$n = $result->num_rows;
$ok=0;

/// OK SE FACE 1 IN CAZUL IN CARE EXISTA INREGISTRARI
  //echo $query;
  if (mysqli_num_rows($result)) {
    if ($row = mysqli_fetch_assoc($result)) {
      if($row!=null)
        if($row!=0)
          $ok=1;
    }
  }
  if($ok==1){  //daca exista cel putin o inregistrare la care sa fac update
    if (mysqli_query($this->conn, $query)) {
      echo "Record updated successfully";
     }
     } else {
      echo "Date introduse gresit";
     }
    
}
  }

}
?>
