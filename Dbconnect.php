<?php

class Dbconnect{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "college_man"; 
    protected $conn;                   
    public function __construct(){
 
        if(!isset($this->conn)){     

            $this->conn = mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);
        }

        return $this->conn;
    }

    
}



?>