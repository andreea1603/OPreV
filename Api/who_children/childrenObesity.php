<?php

class childrenObesity
{

  public $conn;
  public $table = 'whoage';
  public $id;
  public $country = [];
  public $value;
  public $year;
  public $sex;
  public $age;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function getInfo()
  {

    $get_result = [];

    $query = 'SELECT id, country, value, year, sex, age from whoage
        order by id asc';

    $result = mysqli_query($this->conn, $query);


    $n = $result->num_rows;
    echo $n;

    for ($i = 0; $i < $n; $i++)
      if (mysqli_num_rows($result)) {
        if ($row = mysqli_fetch_assoc($result)) {
          array_push($get_result, $row);
        }
      }

    return $get_result;
  }

  public function infoByFilter()
  {
    // Create query
    $result = array();

    $filterSelected = array();
    $filterSelected['id'] = 0;
    $filterSelected['country'] = 0;
    $filterSelected['value'] = 0;
    $filterSelected['year'] = 0;
    $filterSelected['age'] = 0;
    $filterSelected['sex'] = 0;
    $k = 0;

    $typeOfParams = '';
    $array = array();


    $query = "SELECT id, country, value, year, age, sex FROM whoage WHERE ";

    if ($this->id != null) {
      $filterSelected['id'] = 1;
      $query = $query . "id=? ";
      $typeOfParams = $typeOfParams . 'd';
      array_push($array, $this->id);
      $k++;
    }
    if ($this->country != null) {
      $filterSelected['country'] = 1;
      if ($k == 0) {
        $query = $query . " country in ( ?";
      } else {
        $query = $query . " AND country in ( ?";
      }
      if (count($this->country) == 1) {
        $query = $query . " )";
        $typeOfParams = $typeOfParams . 's';
      } else {
        array_push($array, $this->country[0]);
        $typeOfParams = $typeOfParams . 's';
        for ($i = 1; $i < count($this->country); $i++) {
          $query = $query . " , ?";
          $typeOfParams = $typeOfParams . 's';
          array_push($array, $this->country[$i]);
        }
        $query = $query . ")";
      }
      $k++;
    }

    if ($this->value != null) {
      $filterSelected['value'] = 1;
      if ($k == 0)
        $query = $query . " value=? ";
      else {
        $query = $query . " AND value=? ";
      }
      $typeOfParams = $typeOfParams . 'd';
      array_push($array, $this->value);

      $k++;
    }

    if ($this->year != null) {
      $filterSelected['year'] = 1;
      if ($k == 0)
        $query = $query . " year=? ";

      else {
        $query = $query . " AND year=? ";
      }
      $typeOfParams = $typeOfParams . 'd';
      array_push($array, $this->year);

      $k++;
    }

    if ($this->sex != null) {
      $filterSelected['sex'] = 1;
      if ($k == 0)
        $query = $query . " sex=? ";
      else {
        $query = $query . " AND sex=? ";
      }
      $typeOfParams = $typeOfParams . 's';
      array_push($array, $this->sex);

      $k++;
    }
    if ($this->age != null) {
      $filterSelected['age'] = 1;
      if ($k == 0)
        $query = $query . " age=? ";
      else {
        $query = $query . " AND age=? ";
      }
      $typeOfParams = $typeOfParams . 's';
      array_push($array, $this->age);

      $k++;
    }

    $types = array();
    $types = ['id', 'country', 'value', 'year', 'sex', 'age'];


    if ($stmt = mysqli_prepare($this->conn, $query)) {

      foreach (array_keys($filterSelected) as $key) {
        if ($filterSelected[$key] == 1)
          mysqli_stmt_bind_param($stmt, $typeOfParams, ...$array);
      }
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      $get_result = array();


      while ($row = mysqli_fetch_array($result)) {
        array_push($get_result, $row);
      }
    }

    return $get_result;
  }
  public function convertSex($sex)
  {
    if (strtoupper($sex) == 'FEMALE')
      return 'FMLE';
    if (strtoupper($sex) == 'MALE')
      return 'MLE';
    return 'BTSX';
  }

  public function convertCountry($country)
  {
    $country2 = strtoupper($country);

    $query = "SELECT code3 from countries where upper(nume)=upper('{$country2}')";
    $result = mysqli_query($this->conn, $query);


    $code3 = [];
    $n = $result->num_rows;

    if ($n != 0) {
      if (mysqli_num_rows($result)) {
        if ($row = mysqli_fetch_assoc($result)) {
          array_push($code3, $row);
        }
      }
    } else
      return null;
    return ($code3[0]['code3']);
  }
  public function delete1()
  {

    $query = "DELETE FROM whoage WHERE ";
    $k = 0;
    if ($this->country != null) {
      if ($this->country[0] != null) {
        $query = $query . " country='{$this->convertCountry($this->country[0])}'";
        $k = $k + 1;
      }
    }
    if ($this->year != null) {
      if ($k == 0) {
        $query = $query . " year={$this->year}";
      } else {
        $query = $query . " and year={$this->year}";
      }
      $k = $k + 1;
    }
    if ($this->sex != null) {
      if ($k == 0) {
        $query = $query . " sex='{$this->convertSex($this->sex)}'";
      } else {
        $query = $query . " and sex='{$this->convertSex($this->sex)}'";
      }
      $k = $k + 1;
    }
    if ($this->age != null) {
      if ($k == 0) {
        $query = $query . " age='{$this->age}'";
      } else {
        $query = $query . " and age='{$this->age}'";
      }
      $k = $k + 1;
    }
    //echo $query;
    if ($this->conn->query($query)) {
      printf("Table tutorials_tbl record deleted successfully.<br />");
    }
    if ($this->conn->errno) {
      printf("Could not delete record from table: %s<br />", $this->conn->error);
    }
    //echo $query;
  }
  public function add()
  {
    //se adauga si regiuni? :(

    if ($this->checkIfExists() == false) {
      $id = $this->getIndex();
      $query = "INSERT INTO  whoage values ( {$id}, 'COUNTRY', '{$this->convertCountry($this->country[0])}',
         {$this->value}, {$this->year}, '{$this->convertSex($this->sex)}' , '{$this->age}') ";
    } else {
      echo "exista deja o inregistrare asa, incercati un update!";
    }
  
    if (mysqli_query($this->conn, $query)) {
      echo "Record updated successfully";
     }
      else {
      echo "Date introduse gresit";
     }
  }
  public function update($typeToBeModified, $newValue)
  {

    ///(update: verificam daca exista randul) -> pt add  warning daca exista

    //$typeToBeModified='year';
    //$newValue='afg';
    $selectQuery = ""; //pentru a verifica daca exista o interogare de genul asta
    //$this->country='romania';
    if ($this->country[0] != null)
      if ($this->convertCountry($this->country[0]) == null)
        return "nu am gasit nimic";
      else
        $this->country[0] = $this->convertCountry($this->country[0]);

    //$this->year=2030;
    if ($this->sex != null)
      $this->sex = $this->convertSex($this->sex);


    if ($typeToBeModified == 'Country') {
      //vreau sa modific tara
      // in this->camp avem valorile alese in formular
      $newValue = $this->convertCountry($newValue);
      $query = "UPDATE whoage SET country='{$newValue}' WHERE country='{$this->country[0]}' ";
      $selectQuery = "SELECT id from whoage WHERE country='{$this->country[0]} '";

      if ($this->year != null) {
        $query = $query . " AND year={$this->year} ";
        $selectQuery = $selectQuery . " AND year={$this->year} ";
      }
      if ($this->sex != null) {
        $query = $query . " AND sex='{$this->sex}' ";
        $selectQuery = $selectQuery . " AND sex='{$this->sex}' ";
      }
      if ($this->value != null) {
        $query = $query . " AND value={$this->value} ";
        $selectQuery = $selectQuery . " AND value={$this->value} ";
      }
      if ($this->age != null) {
        $query = $query . " AND age='{$this->age}' ";
        $selectQuery = $selectQuery . " AND age='{$this->age}' ";
      }
    } else {
      if ($typeToBeModified == 'Year') {
        $query = "UPDATE whoage SET year={$newValue} WHERE year= {$this->year} ";
        $selectQuery = "SELECT id from whoage WHERE year={$this->year} ";

        if ($this->country[0] != null) {
          $selectQuery = $selectQuery . " AND country='{$this->country[0]}' ";
          $query = $query . " AND country='{$this->country[0]}' ";
        }
        if ($this->sex != null) {
          $query = $query . " AND sex='{$this->sex}' ";
          $selectQuery = $selectQuery . " AND sex='{$this->sex}' ";
        }
        if ($this->value != null) {
          $query = $query . " AND value={$this->value} ";
          $selectQuery = $selectQuery . " AND value={$this->value} ";
        }
        if ($this->age != null) {
          $query = $query . " AND age='{$this->age}' ";
          $selectQuery = $selectQuery . " AND age='{$this->age}' ";
        }
      } else {
        if ($typeToBeModified == 'Sex') {
          $newValue = $this->convertSex($newValue);
          $query = "UPDATE whoage SET sex='{$newValue}' WHERE sex='{$this->sex}' ";
          $selectQuery = "SELECT id from whoage WHERE sex='{$this->sex} '";

          if ($this->country[0] != null) {
            $query = $query . " AND country='{$this->country[0]}' ";
            $selectQuery = $selectQuery . " AND country='{$this->country[0]}' ";
          }
          if ($this->year != null) {
            $query = $query . " AND year={$this->year} ";
            $selectQuery = $selectQuery . " AND year={$this->year} ";
          }
          if ($this->value != null) {
            $query = $query . " AND value={$this->value} ";
            $selectQuery = $selectQuery . " AND value={$this->value} ";
          }
          if ($this->age != null) {
            $query = $query . " AND age='{$this->age}' ";
            $selectQuery = $selectQuery . " AND age='{$this->age}' ";
          }
        } else 
        if ($typeToBeModified == 'Value') {
          $query = "UPDATE whoage SET value={$newValue} WHERE value={$this->value} ";
          $selectQuery = "SELECT id from whoage WHERE value={$this->value} ";

          if ($this->country[0] != null) {
            $query = $query . " AND country='{$this->country[0]}'";
            $selectQuery = $selectQuery . " AND country='{$this->country[0]}' ";
          }
          if ($this->sex != null) {
            $query = $query . " AND sex='{$this->sex}' ";
            $selectQuery = $selectQuery . " AND sex='{$this->sex}' ";
          }
          if ($this->year != null) {
            $query = $query . " AND year={$this->year} ";
            $selectQuery = $selectQuery . " AND year={$this->year} ";
          }
          if ($this->age != null) {
            $query = $query . " AND age='{$this->age}' ";
            $selectQuery = $selectQuery . " AND age='{$this->age}' ";
          }
        } else
          if ($typeToBeModified == 'Age') {
          $query = "UPDATE whoage SET age='{$newValue}' WHERE age='{$this->age}' ";
          $selectQuery = "SELECT id from whoage WHERE age='{$this->age}' ";

          if ($this->country[0] != null) {
            $query = $query . " AND country='{$this->country[0]}'";
            $selectQuery = $selectQuery . " AND country='{$this->country[0]}' ";
          }
          if ($this->sex != null) {
            $query = $query . " AND sex='{$this->sex}' ";
            $selectQuery = $selectQuery . " AND sex='{$this->sex}' ";
          }
          if ($this->year != null) {
            $query = $query . " AND year={$this->year} ";
            $selectQuery = $selectQuery . " AND year={$this->year} ";
          }
          if ($this->value != null) {
            $query = $query . " AND value={$this->value} ";
            $selectQuery = $selectQuery . " AND value={$this->value} ";
          }
        }
      }
    }

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
      if($ok==1){  //daca exista cel putin o inregistrare la care sa fac update
        if (mysqli_query($this->conn, $query)) {
          echo "Record updated successfully";
         }
         } else {
          echo "Date introduse gresit";
         }
          }

  public function checkIfExists()
  {

    //  $this->country='ROU';

    //$this->year=2010;
    //$this->sex='FMLE';


    $query = "select id from whoage where country='{$this->convertCountry($this->country[0])}' AND year={$this->year} AND sex='{$this->convertSex($this->sex)}'";
    $result = mysqli_query($this->conn, $query);
    $n = $result->num_rows;

    echo $query;
    if (mysqli_num_rows($result)) {
      if ($row = mysqli_fetch_assoc($result)) {
        if ($row != null)
          //echo $row;
          return "deja exista o inregistrare";
      }
    }
    return false;
  }

  public function getIndex()
  {

    $query = "select count(id) maxim from whoage";
    $result = mysqli_query($this->conn, $query);
    $index = [];
    if (mysqli_num_rows($result)) {
      if ($row = mysqli_fetch_assoc($result)) {
        array_push($index, $row);
      }
    }

    return  $index[0]['maxim'];;
  }
}
