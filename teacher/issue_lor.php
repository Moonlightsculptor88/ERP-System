<?php
session_start();
require_once '../includes/config.php';

if (isset($_POST['add'])) {
  
  $remarks=$_POST['remarks'];
  $id=$_GET['id'];

  $uniquesavename=time().uniqid(rand());
$filename = $uniquesavename.$_FILES['uploadfile']['name'];
$tempname = $_FILES['uploadfile']['tmp_name'];
$folder = "lor/".$filename;
if (move_uploaded_file($tempname, $folder)) {
  echo "Image uploaded successfully";
}else {
  echo "Failed to upload image";
}
$flag=1;
$date=date("Y-m-d");

  $data=[
  'lor'=>$filename,
  'flag'=>$flag,
  'issue_date'=>$date,
  'remarks'=>$remarks
];
$ref="request/".$id;
$postdata = $database->getReference($ref)->update($data);

if ($postdata) {
  echo "<script>alert('LOR sent')</script>";

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
  

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Remarks</label>
  <textarea name="remarks" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
</div>

<div class="form-label">LOR</div>
<div class="input-group mb-3">
  
  <input type="file" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" name="uploadfile">
</div>
<div class="d-grid gap-2 col-2 mx-auto">
  <button name="add" class="btn btn-primary lor-submit" type="submit">Submit</button>
  
</div></form>



     
     

     
     </div>
     
  
  </body>
</html>