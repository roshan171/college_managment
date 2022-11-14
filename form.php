<?php
include_once 'College.php'; 
$fileError = "";

if(isset($_POST["submit"])){

// var_dump($_POST);

// file upload operation

$uploads = 'uploads/';
$file_name = rand(1000,9999).'.jpg';
$target = $uploads.$file_name;

if(isset($_FILES['imagefile'])){

  $file_size = $_FILES['imagefile']['size'];

  if($file_size > 5000000){          // 1kb == 1000

    $fileError = "Sorry, file should be less than 5000kb";

  }else{
    $move_uploaded_file = move_uploaded_file($_FILES['imagefile']['tmp_name'], $target);

  }

}


$data = [

  "collegename" => $_POST['collegename'],
  "collegetype" => $_POST['radio'],
   "collegefacilities" => implode(',',$_POST['collegefacilities']),   
  "collegeimage" => $file_name,
 
];


$crud = new College;

$result = $crud->insert($data['collegename'], $data['collegetype'], $data['collegeimage'], $data['collegefacilities']);
var_dump($result);

if($result===true){

  echo "successful";
}
else{

  return "unsuccessful";
}

}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>College Managment Form</title>
    <style>
      .container{
        margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
  margin-top:60px;
 
      }

      .data{
        display:flex;
        justify-content:center;
        align-items:center;
      }

      label{
        font-size:21px;
        
      }
    </style>
  
  </head>
  <body>

<form action="" method='POST' enctype="multipart/form-data" class="data">
  <div class="container">
    <h1 class="text-center text-danger">Managment Form</h1>
   
  <div class="form-group m-3">
    <label>College Name:</label>
    <input type="text"  class="form-control" name="collegename">
  </div>

  <div class="form-group m-3">
    <label>College Type:</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="radio" id="exampleRadios1" value="BSC">
  <label class="form-check-label" for="exampleRadios1">
   BSC
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="radio" id="exampleRadios2" value="IT">
  <label class="form-check-label" for="exampleRadios2">
   IT
  </label>
</div>
  <br>
 
  <label>College Facilities:</label>
  <br>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="liabry" id="defaultCheck1" name="collegefacilities[]">  <!--  color[] since it will be storing multiple values!!-->
  <label class="form-check-label" for="defaultCheck1">
   Liabry
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="canteen" id="defaultCheck1" name="collegefacilities[]">
  <label class="form-check-label">
   Canteen
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="playground" id="defaultCheck1" name="collegefacilities[]">
  <label class="form-check-label" >
   Playground
  </label>
</div>
<br>
  <div class="form-group">
    <label for="exampleFormControlFile1">Image:</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name = "imagefile">
    <span><?=$fileError?></span>
  </div>


  <input type="submit" class="btn btn-primary" name="submit"/>
  </div>
 
</form>
    
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>
