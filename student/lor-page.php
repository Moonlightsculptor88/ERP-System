<?php
session_start();
require_once '../includes/config.php';

if (isset($_POST['add'])) {
  $student=$_SESSION['id'];
  $dept=$_POST['dept'];
  $lect=$_POST['lect'];
  $purpose=$_POST['purpose'];
  $info=$_POST['info'];

  $uniquesavename=time().uniqid(rand());
$filename = $uniquesavename.$_FILES['uploadfile']['name'];
$tempname = $_FILES['uploadfile']['tmp_name'];
$folder = "uploads/".$filename;
if (move_uploaded_file($tempname, $folder)) {
  echo "Image uploaded successfully";
}else {
  echo "Failed to upload image";
}
$flag=0;
$date=date("Y-m-d");

  $data=[
  'student_id'=>$student,
  'dept'=>$dept,
  'teacher_id'=>$lect,
  'purpose'=>$purpose,
  'file'=>$filename,
  'info'=>$info,
  'flag'=>$flag,
  'date'=>$date
];
$ref="request/";
$postdata = $database->getReference($ref)->push($data);

if ($postdata) {
  echo "<script>alert('Request Sent')</script>";

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
<form method="post" enctype="multipart/form-data">
  <!--<div class="input-group mb-3">
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
</div>-->
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
<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Lecturer</label>
  <select name="lect" class="form-select" id="inputGroupSelect01">
   <?php
    $ref1="teacher/";
    $fetchdata=$database->getReference($ref1)->getValue();
    foreach ($fetchdata as $key => $row) {
    ?>
    <option value=<?php echo $key;?>><?php echo $row['name']; ?></option>
    <?php

  }
  ?>

  </select>
</div>
<div class="input-group mb-3">
  <!--<span class="input-group-text" id="basic-addon1"></span>-->
  <input type="file" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" name="uploadfile">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Interships or Research papers</label>
  <textarea name="info" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Purpose of LOR</label>
  <textarea name="purpose" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>

<div class="d-grid gap-2 col-2 mx-auto">
  <button name="add" class="btn btn-primary lor-submit" type="submit">Submit</button>
  
</div></form>



     
     

     
     </div>
     
  
  </body>
</html>