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
      $arrayParam=[];
      $arrayTypes=[];
      $param='';
      if($this->country[0] != null){
        $query=$query." country=? ";
        array_push($arrayParam,$this->convertCountry($this->country[0]) );
        array_push($arrayTypes,'s');
          $param=$param.'s';
        $k=$k+1;
  
      }
      if($this->year!=null){
        if($k==0){
          $query=$query." year=? ";
        }
        else{
          $query=$query." and year=? ";
        }
        array_push($arrayParam,$this->year );
        array_push($arrayTypes,'d');
        $param=$param.'d';
  
  
  
        $k=$k+1;
  
      }
      if($this->sex!=null){
        if($k==0){
          $query=$query." sex=? ";
        }
        else{
          $query=$query." and sex=? ";
        }
        $k=$k+1;
        array_push($arrayParam,$this->convertSex($this->sex));
        array_push($arrayTypes,'s');
        $param=$param.'s';
  
      }
      $stmt = mysqli_prepare($this->conn, $query);
  
        mysqli_stmt_bind_param($stmt, $param, ...$arrayParam);
  
        mysqli_stmt_execute($stmt);
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

      $query="INSERT INTO  whocrude values ( {$id}, 'COUNTRY', ? ,
         ? , ?, ? ) ";

       if ($stmt = mysqli_prepare($this->conn, $query)){
         
        $first=$this->convertCountry($this->country[0]);
        $second= $this->value;
        $third= $this->year;
        $fourth=$this->convertSex($this->sex);
        $stmt->bind_param('sdds', $first, $second, $third, $fourth);
    }
  
      mysqli_stmt_execute($stmt);
      $stmt->close();
    
    }
      else{
        echo "exista deja o inregistrare asa, incercati un update!";
      }
    } 
    public function update($typeToBeModified, $newValue){

           ///(update: verificam daca exista randul) -> pt add  warning daca exista

    //$typeToBeModified='year';
    //$newValue='afg';
    $selectQuery=""; //pentru a verifica daca exista o interogare de genul asta
    //$this->country='romania';
    print_r($this->country);
    echo "lala <br>";
    print_r($this->country[0]);

    $types='';
    $arrayParam=[];
    $arrayParamSelect=[];
    $typesSelect='';

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
      array_push($arrayParam, $newValue);
      array_push($arrayParam, $this->country[0]);
      $types=$types.'s'.'s';

      $query="UPDATE whocrude SET country=? WHERE country=? ";


      $selectQuery="SELECT id from whocrude WHERE country=? ";

      array_push($arrayParamSelect, $this->country[0]);
      $typesSelect=$typesSelect.'s';

      if($this->year!=null){
        $query=$query." AND year=?  ";
        $selectQuery=$selectQuery." AND year=? ";

        array_push($arrayParam, $this->year);
        array_push($arrayParamSelect, $this->year);
        $types=$types.'d';
        $typesSelect=$typesSelect.'d';

      }
      if($this->sex!=null){
        $query=$query." AND sex=? ";
        $selectQuery=$selectQuery." AND sex=? ";
        array_push($arrayParam, $this->sex);
        array_push($arrayParamSelect, $this->sex);
        $types=$types.'s';
        $typesSelect=$typesSelect.'s';


      }
      if($this->value!=null){

        
        $query=$query." AND value>=?-0.01  AND value<=? "; 
        $selectQuery=$selectQuery." AND value>=?-0.01 AND value<=? ";
        array_push($arrayParam, $this->value);
        array_push($arrayParamSelect, $this->value);
        $types=$types.'d';
        $typesSelect=$typesSelect.'d';
        array_push($arrayParam, $this->value);
        array_push($arrayParamSelect, $this->value);
        $types=$types.'d';
        $typesSelect=$typesSelect.'d';

      }

    }
    else{
      if($typeToBeModified=='Year'){


        $query="UPDATE whocrude SET year=? WHERE year=? ";
        $selectQuery="SELECT id from whocrude WHERE year=?";
        array_push($arrayParam, $newValue);
        array_push($arrayParam, $this->year);


        array_push($arrayParamSelect, $this->year);
        $types=$types.'d'.'d';
        $typesSelect=$typesSelect.'d';

        if($this->country[0]!=null){
          $selectQuery=$selectQuery." AND country=? ";
          $query=$query." AND country=? ";
          array_push($arrayParam, $this->country);
          array_push($arrayParamSelect, $this->country);
          $types=$types.'s';
          $typesSelect=$typesSelect.'s';

        }
        if($this->sex!=null){
          $query=$query." AND sex=?  ";
          $selectQuery=$selectQuery." AND sex=? ";  
          array_push($arrayParam, $this->sex);
          array_push($arrayParamSelect, $this->sex);
          $types=$types.'s';
          $typesSelect=$typesSelect.'s';

  
        }
        if($this->value!=null){
          $query=$query." AND value>=?-0.01 AND value<=? ";
          $selectQuery=$selectQuery." AND value>=?-0.01 AND value<=?";  

            array_push($arrayParam, $this->value);
        array_push($arrayParamSelect, $this->value);
        $types=$types.'d';
        $typesSelect=$typesSelect.'d';
        array_push($arrayParam, $this->value);
        array_push($arrayParamSelect, $this->value);
        $types=$types.'d';
        $typesSelect=$typesSelect.'d';
        }
      }
      else{
        if($typeToBeModified=='Sex'){
          $newValue=$this->convertSex($newValue);
          $query="UPDATE whocrude SET sex=? WHERE sex=? ";
          $selectQuery="SELECT id from whocrude WHERE sex=? ";

          array_push($arrayParam, $newValue);
          array_push($arrayParam, $this->sex);
          array_push($arrayParamSelect, $this->sex);
          $types=$types.'s'.'s';
          $typesSelect=$typesSelect.'s';


          if($this->country[0]!=null){
            $query=$query." AND country=? ";
            $selectQuery=$selectQuery." AND country=? ";

            array_push($arrayParam, $this->country[0]);
            array_push($arrayParamSelect, $this->country[0]);
            $types=$types.'s';
            $typesSelect=$typesSelect.'s';
            

          }
          if($this->year!=null){
            $query=$query." AND year=? ";
            $selectQuery=$selectQuery." AND year=? ";

            array_push($arrayParam, $this->year);
            array_push($arrayParamSelect, $this->year);
            $types=$types.'d';
            $typesSelect=$typesSelect.'d';
            

    
          }
          if($this->value!=null){
            $query=$query." AND value>=?-0.01 AND value<=? ";
            $selectQuery=$selectQuery." AND value>=?-0.01 AND value<=?";  
  
              array_push($arrayParam, $this->value);
          array_push($arrayParamSelect, $this->value);
          $types=$types.'d';
          $typesSelect=$typesSelect.'d';
          array_push($arrayParam, $this->value);
          array_push($arrayParamSelect, $this->value);
          $types=$types.'d';
          $typesSelect=$typesSelect.'d';
          }
        }
        else 
          if($typeToBeModified=='Value'){
            $query="UPDATE whocrude SET value=? WHERE value=? ";
            $selectQuery="SELECT id from whocrude WHERE value=? ";
  
              array_push($arrayParam, $newValue);
          array_push($arrayParamSelect, $this->value);
          $types=$types.'d';
          $typesSelect=$typesSelect.'d';
          array_push($arrayParam, $this->value);
          $types=$types.'d';
            
            if($this->country[0]!=null){
              $query=$query." AND country=? ";
            $selectQuery=$selectQuery." AND country=? ";

            array_push($arrayParam, $this->country[0]);
            array_push($arrayParamSelect, $this->country[0]);
            $types=$types.'s';
            $typesSelect=$typesSelect.'s';

            }
            if($this->sex!=null){
              $query=$query." AND sex=?  ";
              $selectQuery=$selectQuery." AND sex=? ";  
              array_push($arrayParam, $this->sex);
              array_push($arrayParamSelect, $this->sex);
              $types=$types.'s';
              $typesSelect=$typesSelect.'s';
    

            }
            if($this->year!=null){
              $query=$query." AND year=? ";
              $selectQuery=$selectQuery." AND year=? ";
  
              array_push($arrayParam, $this->year);
              array_push($arrayParamSelect, $this->year);
              $types=$types.'d';
              $typesSelect=$typesSelect.'d';
            }
          }
      }

    }
        
//AICI TREBUIE DECOMENTAT CA SA SE EXECUTE VERIFICAREA EXISTENTEI VALORILOR LA CARE DAU UPDATE


echo $selectQuery;


$stmt = mysqli_prepare($this->conn, $selectQuery);

mysqli_stmt_bind_param($stmt, $typesSelect, ...$arrayParamSelect);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$num= mysqli_num_rows($result);

$ok=0;

print_r($result);
print_r($stmt);

/// OK SE FACE 1 IN CAZUL IN CARE EXISTA INREGISTRARI
if($num!=0)
    $ok=1;

    
echo $ok;
    
//AICI TREBUIE DECOMENTAT CA SA SE EXECUTE UPDATE-UL

if($ok==1){  //daca exista cel putin o inregistrare la care sa fac update
    
  $stmt = mysqli_prepare($this->conn, $query);

  mysqli_stmt_bind_param($stmt, $types, ...$arrayParam);
  
  mysqli_stmt_execute($stmt);
  echo $query;



}
  }


      public function checkIfExists(){

        //  $this->country='ROU';
        
          //$this->year=2010;
          //$this->sex='FMLE';
        
          $query="select id from whocrude where country=? AND year=? AND sex=?";
         
        
          if ($stmt = mysqli_prepare($this->conn, $query)){
        
            $first=$this->convertCountry($this->country[0]);
            $second=$this->year;
            $third=$this->convertSex($this->sex);
            
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
