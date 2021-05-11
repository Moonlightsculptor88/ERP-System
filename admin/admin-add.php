<?php
session_start();
require_once '../includes/config.php';
require_once 'session.php';
if (isset($_POST['add'])) {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $dob=$_POST['dob'];
  $dept=$_POST['dept'];

$data=[
  'name'=>$name,
  'email'=>$email,
  'dob'=>$dob,
  'dept'=>$dept
];
$ref="teacher/";
$postdata = $database->getReference($ref)->push($data);

if ($postdata) {
  echo "<script>alert('Data Inserted')</script>";
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./styles/styles.css" rel="stylesheet">
    <title>ERP System</title>
  </head>
  <body>
  <?php
require_once 'sidebar.php';
?>
<div id="full-page">
<?php
require_once 'navbar.php';
?>




<div class="container add-container">
<h3 class="add-heading">Enter Details</h3>
<form method="post">
  <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Name</span>
  <input type="text" class="form-control" placeholder="First Name - Last Name" aria-label="Username" aria-describedby="basic-addon1" name="name">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">DOB</span>
  <input type="text" class="form-control" placeholder="DDMMYYYY" aria-label="Username" aria-describedby="basic-addon1" name="dob">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Email</span>
  <input type="text" class="form-control" placeholder="yourmail@gmail.com" aria-label="Username" aria-describedby="basic-addon1" name="email">
</div>
<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Department</label>
  <select name="dept" class="form-select" id="inputGroupSelect01">
   <!--<option value="0">Choose...</option>-->
    <?php
    $ref1="dept/";
    $fetchdata=$database->getReference($ref1)->getValue();
    foreach ($fetchdata as $key => $row) {
    ?>
    <option value=<?php echo $key;?>><?php echo $row['name']; ?></option>
    <?php

  }
  ?>
  </select>
</div>

<div class="d-grid gap-2 col-2 mx-auto">
  <button name="add" class="btn btn-primary" type="submit">Submit</button>
  <div style="text-align:center;">
<h5>or</h5>
</div>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Import From Excel
</button>
  
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import From Excel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body" style="text-align:center;">
        <button onclick="location.href='../import-excel/example_excel.xls'"class="btn btn-outline-dark">Download Template</button>

        <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
  <label for="formFile" class="form-label"></label>
  <input name="fileimport" class="form-control" type="file" id="formFile" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button name="import" type="submit" class="btn btn-primary">Import</button>
      </div></form>

</div>


            
            
        
    

</div>
  
  </body>
</html>

