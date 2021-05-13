<?php
session_start();
require '../import-excel/vendor/autoload.php';
include '../import-excel/excel_reader2.php';
require_once '../includes/config.php';
require_once 'session.php';
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
if (isset($_POST['add'])) {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $dob=$_POST['dob'];
  $dept=$_POST['dept'];
  $phone=$_POST['phone'];

$data=[
  'name'=>$name,
  'email'=>$email,
  'dob'=>$dob,
  'branch'=>$dept,
  'mobile'=>$phone
];
$ref="teacher/";
$postdata = $database->getReference($ref)->push($data);

if ($postdata) {
  echo "<script>alert('Data Inserted')</script>";
}
}
if (isset($_POST['import'])) {
  if (isset($_FILES['fileimport'])) {

                $target = basename($_FILES['fileimport']['name']) ;
                move_uploaded_file($_FILES['fileimport']['tmp_name'], $target);
                
                
                chmod($_FILES['fileimport']['name'],0777);
                
                
                $data = new Spreadsheet_Excel_Reader($_FILES['fileimport']['name'],false);
                
                
                $count = $data->rowcount(0);
                
                for ($i=2; $i<=$count; $i++) {
                    if(strlen($data->val($i, 1, 0))>2 && strlen($data->val($i, 2, 0))>2){
                    $name    = $data->val($i, 1, 0);
                    $email  = $data->val($i, 2, 0);
                    $dob  = $data->val($i, 3, 0);
                    $dept  = $data->val($i, 4, 0);
                    $phone  = $data->val($i, 5, 0);
                    
                    //Masukkan data hasil import ke firebase
                    $database->getReference('teacher')->push([
                        'name'=>$name,
                        'email'=>$email,
                        'dob'=>$dob,
                        'branch'=>$dept,
                        'mobile'=>$phone
                        ]
                    );
                }
              }
    
                unlink($_FILES['fileimport']['name']);
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
  <span class="input-group-text" id="basic-addon1">Mobile Number</span>
  <input type="tel" class="form-control" placeholder="9847547845" aria-label="Username" aria-describedby="basic-addon1" name="phone" pattern="[0-9]{10}">
</div>
<div class="input-group mb-3">
  <label class="input-group-text" for="branch">Branch</label>
  <select name="dept" class="form-select" id="branch">
   <!--<option value="0">Choose...</option>-->
    <?php
    $ref1="branch/";
    $fetchdata=$database->getReference($ref1)->getValue();
    foreach ($fetchdata as $key => $row) {
    ?>
    <option value="<?php echo $row['name'];?>"><?php echo $row['name']; ?></option>
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
</form>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import From Excel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body" style="text-align:center;">
        <button onclick="location.href='teacher.xls'" class="btn btn-outline-dark">Download Template</button>

        <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
  <label for="formFile" class="form-label"></label>
  <input name="fileimport" class="form-control" type="file" id="formFile" accept="application/vnd.ms-excel" required>
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

