<?php

class childrenObesity{

    public $conn;
    public $table= 'whoage';
    public $id;
    public $country;
    public $value;
    public $year;
    public $sex;
    public $age;

    public function __construct($db) {
        $this->conn = $db;
      }

      public function getInfo(){

        $get_result=[];
        $query='SELECT id, country, value, year, sex, age from whoage
        order by id asc';

         $result = mysqli_query($this->conn, $query);
        
         if (mysqli_num_rows($result)) {
                 if ($row = mysqli_fetch_assoc($result)) {
                    array_push($get_result, $row);
             }
         }
   
         return $get_result;
      }
}


?>
