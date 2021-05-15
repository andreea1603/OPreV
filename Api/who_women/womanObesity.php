<?php

class womenObesity{

    public $conn;
    public $table= 'whowomen';
    public $id;
    public $country;
    public $value;
    public $year;
    public $area;

    public function __construct($db) {
        $this->conn = $db;
      }

      public function getInfo(){

        $get_result=[];

        $query='SELECT id, country, value, year, age, area from whowomen order by id asc';

         $result = mysqli_query($this->conn, $query);


         $n= $result->num_rows;
         echo $n;

         for($i=0; $i<$n; $i++)
         if (mysqli_num_rows($result)) {
                 if ($row = mysqli_fetch_assoc($result)) {
                    array_push($get_result, $row);
             }
         }
   
         return $get_result;
      }

      public function infoByFilter(){
    
    ///vector de pozitii pentru linie  ['id'], ['country ']......
       if($stmt = mysqli_prepare($this->conn, "SELECT id, country, value, year, age, sex FROM whowomen WHERE id = ?")){
            mysqli_stmt_bind_param($stmt, 'd', $this->id);
    
            mysqli_stmt_execute($stmt);
        
            $result= mysqli_stmt_get_result($stmt);

            $get_result=array();
            

            while ($row = mysqli_fetch_array($result))
            array_push($get_result, $row);
            }

        return $get_result;
      }
}
?>
