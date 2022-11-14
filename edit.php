<?php
include_once 'College.php';
$crud = new College;
$result = $crud->getDataById($_GET['id']);

if(isset($_POST["submit"])){

    

$uploads = 'uploads/';
$file_name = rand(1000,9999).'.jpg';
$target = $uploads.$file_name;

move_uploaded_file($_FILES['imagefile']['tmp_name'], $target);

  $id = $_POST['hiddenId'];
  $collegename = $_POST['collegename'];
  $collegetype = $_POST['radio'];
  $collegefacilities = implode(',',$_POST['collegefacilities']);   
  $collegeimage = $file_name;

  
  $mydata = $crud->update($collegename, $collegetype, $collegefacilities, $collegeimage, $id);




}


if($result !== false){
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Edit Form</title>
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


<form action="" method='POST' enctype="multipart/form-data">
<div class="container">
    <h1 class="text-center text-danger">Edit Your Form</h1>
  <div class="form-group">
    <label>College Name</label>
    <input type="text"  class="form-control" name="collegename" value="<?=isset($result['collegename']) ? $result['collegename'] : ''?>">
  </div>

  <div class="form-group">
    <label>College Type</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="radio" id="exampleRadios1" value="bsc" <?=isset($result['collegetype']) && $result['collegetype'] == 'bsc' ? 'checked' : ''?>>
  <label class="form-check-label" for="exampleRadios1">
   BSC
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="radio" id="exampleRadios2" value="it" <?=isset($result['collegetype']) && $result['collegetype'] == 'it' ? 'checked' : ''?>>
  <label class="form-check-label" for="exampleRadios2">
   IT
  </label>

  <br>
 
  <label>College Facilities</label>
  <br>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" id="defaultCheck1" name="collegefacilities[]" value="liabry" <?php if(isset($result['collegefacilities']) && strpos($result['collegefacilities'], 'liabry') !== false) {
?>
checked
<?php
  }
  else{

  }
?> > 

  <label class="form-check-label" for="defaultCheck1">
   Liabry
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox"  id="defaultCheck1" name="collegefacilities[]" value="canteen" <?php if(isset($result['collegefacilities']) && strpos($result['collegefacilities'], 'canteen') !== false) {
?>
checked
<?php
  }
  else{

  }
?> >
  <label class="form-check-label">
   Canteen
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox"  id="defaultCheck1" name="collegefacilities[]" value="playground" <?php if(isset($result['collegefacilities']) && strpos($result['collegefacilities'], 'playground') !== false) {
?>
checked
<?php
  }
  else{

  }
?> >
  <label class="form-check-label" >
  Playground
  </label>
</div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Image</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name = "imagefile">
  </div>

  <input type="hidden" name="hiddenId" value="<?=$result['id']?>">    <!-- Value visible during inspect of page -->

  <input type="submit" class="btn btn-primary" name="submit"/>
</div>
</form>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>





<?php



}
else{

    echo "No records found";
    exit;        

}
?>

