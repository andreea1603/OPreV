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

        $query='SELECT id, country, value, year, area from whowomen order by id asc';

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
        
        echo $this->country;
        echo $this->area;
        if ($this->id != null) {
          $filterSelected['id'] = 1;
          $query = $query . "id=? ";
          $typeOfParams=$typeOfParams.'d';
          array_push($array, $this->id);
          $k++;
        }
        if ($this->country != null) {
          $filterSelected['country'] = 1;
          if ($k == 0)
            $query = $query . " country=? ";
          else {
            $query = $query . " AND country=? ";
          }
          $typeOfParams=$typeOfParams.'s';
          array_push($array, $this->country);

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
        

        echo $query;

        echo $typeOfParams;
        $types =array();
        $types=['id','country', 'value', 'year', 'area'];


        foreach($filterSelected as $filter){

          echo $filter;
        }

        print_r($array);
        
        $get_result = array();
        if ($stmt = mysqli_prepare($this->conn, $query)) {
          echo "K este:  ".$k.'\n';
          
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
}
?>
