<?php 
  class Database {
    // DB Params


    private $servername = "localhost";
    private $database = "tw";
    private $username = "root";
    private $password = "";
    private $conn;



    // DB Connect
    public function connect() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            die('Could not connect: '. $this->mysqli -> error);
        }
    }
  }
  ?>