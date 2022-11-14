<?php
include_once 'Dbconnect.php';

class College extends Dbconnect{

    public function __construct(){

        Parent :: __construct();   // to include the construtor of Parent class (here, Dbconnect class!!)
    }

    public function insert($collegename, $collegetype, $collegeimage, $collegefacilities ){

        $sql = "INSERT INTO college(collegename,collegetype,collegefacilities,collegeimage)VALUES('".$collegename."', '".$collegetype."', '".$collegefacilities."', '".$collegeimage."');";

        if($this->conn->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public function update($collegename, $collegetype, $collegefacilities, $collegeimage, $id){

        $sql = "UPDATE college SET collegename = '".$collegename."',collegetype = '".$collegetype."', collegefacilities = '".$collegefacilities."', collegeimage = '".$collegeimage."' WHERE id = $id";

        
        if($this->conn->query($sql) === true){

            return true;
        }
        else{

            return false;
        }

    }

    public function delete($id){

        $sql = "DELETE FROM college WHERE id = $id;";
        
        if($this->conn->query($sql) === true){

            return true;
        }
        else{

            return false;
        }

    }



    public function getDataById($id){

        $sql = "SELECT * FROM college WHERE id = $id;";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){

            $row = $result->fetch_assoc();
            // var_dump($row);
            
            return $row;
        }
        else{

            return false;
        }
          
    }

    public function displayAllColleges(){

        $sql = "SELECT * FROM college;";

        $result = $this->conn->query($sql);

        if($result->num_rows > 0){

            while($row = $result->fetch_assoc()){

                $data[] = array(

                    "id" =>$row['id'],
                    "collegename" =>$row['collegename'],
                    "collegetype" =>$row['collegetype'],
                    "collegefacilities" =>$row['collegefacilities'],
                    "collegeimage" =>$row['collegeimage']
                );
            }

            return $data;
        }
        else{

            return false;
        }
    }
}

$crud = new College();


?>