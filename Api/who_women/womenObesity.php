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
        if($this->area!=null){
          if($k==0){
            $query=$query." area=? ";
          }
          else{
            $query=$query." and area=? ";
          }
          $k=$k+1;
          array_push($arrayParam,$this->area);
          array_push($arrayTypes,'s');
          $param=$param.'s';
    
        }
        $stmt = mysqli_prepare($this->conn, $query);
    
          mysqli_stmt_bind_param($stmt, $param, ...$arrayParam);
    
          mysqli_stmt_execute($stmt);
          
          echo "Am sters cu succes";
      }
        public function checkIfExists(){

          //  $this->country='ROU';
          
            //$this->year=2010;
            //$this->area='FMLE';
          
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
            echo "Am adaugat cu succes";
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
    if($this->area!=null)
      $this->area=$this->area;


    if($typeToBeModified=='Country'){
      //vreau sa modific tara
      // in this->camp avem valorile alese in formular
      $newValue=$this->convertCountry($newValue);
      array_push($arrayParam, $newValue);
      array_push($arrayParam, $this->country[0]);
      $types=$types.'s'.'s';

      $query="UPDATE whowomen SET country=? WHERE country=? ";


      $selectQuery="SELECT id from whowomen WHERE country=? ";

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
      if($this->area!=null){
        $query=$query." AND area=? ";
        $selectQuery=$selectQuery." AND area=? ";
        array_push($arrayParam, $this->area);
        array_push($arrayParamSelect, $this->area);
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


        $query="UPDATE whowomen SET year=? WHERE year=? ";
        $selectQuery="SELECT id from whowomen WHERE year=?";
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
        if($this->area!=null){
          $query=$query." AND area=?  ";
          $selectQuery=$selectQuery." AND area=? ";  
          array_push($arrayParam, $this->area);
          array_push($arrayParamSelect, $this->area);
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
        if($typeToBeModified=='Area'){
          $newValue = $newValue;
          $query="UPDATE whowomen SET area=? WHERE area=? ";
          $selectQuery="SELECT id from whowomen WHERE area=? ";

          array_push($arrayParam, $newValue);
          array_push($arrayParam, $this->area);
          array_push($arrayParamSelect, $this->area);
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
            $query="UPDATE whowomen SET value=? WHERE value=? ";
            $selectQuery="SELECT id from whowomen WHERE value=? ";
  
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
            if($this->area!=null){
              $query=$query." AND area=?  ";
              $selectQuery=$selectQuery." AND area=? ";  
              array_push($arrayParam, $this->area);
              array_push($arrayParamSelect, $this->area);
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

$stmt = mysqli_prepare($this->conn, $selectQuery);

mysqli_stmt_bind_param($stmt, $typesSelect, ...$arrayParamSelect);

mysqli_stmt_execute($stmt);



$result = mysqli_stmt_get_result($stmt);
$num= mysqli_num_rows($result);

$ok=0;


/// OK SE FACE 1 IN CAZUL IN CARE EXISTA INREGISTRARI
if($num!=0)
    $ok=1;

    
    
//AICI TREBUIE DECOMENTAT CA SA SE EXECUTE UPDATE-UL

if($ok==1){  //daca exista cel putin o inregistrare la care sa fac update
    
  $stmt = mysqli_prepare($this->conn, $query);

  mysqli_stmt_bind_param($stmt, $types, ...$arrayParam);
  
  mysqli_stmt_execute($stmt);
}
echo "Am actualizat ".$num." inregistrari";
  }

}
?>
