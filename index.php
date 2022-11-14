<?php
include_once 'College.php';

$crud = new College;
$result = $crud->displayAllColleges();


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>College Managment</title>

    <style>
      .container{
        margin: auto;
  width: 100%;
  border: 3px solid green;
  padding: 10px;
  margin-top:60px;
      }
    </style>
  </head>
  <body>

    <div class="container">
<h1 class="text-center text-primary m-3">Dashboard View Details:</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">College Name</th>
      <th scope="col">College Type</th>
      <th scope="col">College Facilities</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
<?php 
if($result !== false){

  foreach($result as $data){

?>

<tr>
<td><?=$data['id']?></td>
  <td><?=$data['collegename']?></td>
  <td><?=$data['collegetype']?></td>
  <td><?=$data['collegefacilities']?></td>
  <td><image width="100" height="100" src="uploads/<?=$data['collegeimage']?>"></td>
  <td><button class="btn btn-primary bg-light"><a href="edit.php?id=<?=$data['id']?>">Edit</a></button></td>
  <td><button class="btn btn-danger bg-light"><a href="delete.php?id=<?=$data['id']?>">Delete</a></button></td>

</tr>

<?php
  }

  }
  else{
  ?>

  <tr><td colspan="4">No data found!!</td></tr>

  <?php
  }
  ?>


  </tbody>
</table>


<!--<button type="submit">Submit</button>-->

</div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>