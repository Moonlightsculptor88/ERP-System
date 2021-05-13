<?php
session_start();
require '../import-excel/vendor/autoload.php';
include '../import-excel/excel_reader2.php';
include '../includes/config.php';
require_once 'session.php';
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
 
    $ref1="teacher/".$_SESSION['id']."/";
    $fetchdata=$database->getReference($ref1)->getValue();
   // echo $fetchdata['dept'];
if (isset($_POST['add'])) {


  $name=$_POST['name'];
  $email=$_POST['email'];
  $dob=$_POST['dob'];
  $batch=$_POST['batch'];
  $branch=$fetchdata['branch'];
  $section=$_POST['section'];
  $reg=$_POST['reg'];

$data=[
  'name'=>$name,
  'email'=>$email,
  'dob'=>$dob,
  'batch'=>$batch,
  'branch'=>$branch,
  'section'=>$section,
  'reg'=>$reg,
  'teacher_id'=>$_SESSION['id']
];
$ref="student/";
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
                    $reg    = $data->val($i, 1, 0);
                    $name  = $data->val($i, 2, 0);
                    $batch  = $data->val($i, 3, 0);
                    //$branch  = $data->val($i, 4, 0);
                    $dob  = $data->val($i, 4, 0);
                  $section  = $data->val($i, 5, 0);
                  $email  = $data->val($i, 6, 0);
                    //Masukkan data hasil import ke firebase
                    $database->getReference('student')->push([
                        'reg' => $reg,
                        'name' => $name,
                        'batch' => $batch,
                        'branch' => $fetchdata['branch'],
                        'dob' => $dob,
                        'section' => $section,
                        'email' => $email,
                        'teacher_id'=>$_SESSION['id']
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
  <span class="input-group-text" id="basic-addon1">Batch</span>
  <input type="text" class="form-control" placeholder="2007" aria-label="Username" aria-describedby="basic-addon1" name="batch">
</div>

 <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Section</span>
  <input type="text" class="form-control" placeholder="C" aria-label="Username" aria-describedby="basic-addon1" name="section">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Registration Number</span>
  <input type="text" class="form-control" placeholder="189301049" aria-label="Username" aria-describedby="basic-addon1" name="reg">
</div>
<div class="d-grid gap-2 col-2 mx-auto">
  <button name="add" class="btn btn-primary" type="submit">Submit</button>
  
</div></form>
<div style="text-align:center;">
<h5>or</h5>
</div>


<div class="d-grid gap-2 col-2 mx-auto">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Import From Excel
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import From Excel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body" style="text-align:center;">
        <button onclick="location.href='student.xls'" class="btn btn-outline-dark">Download Template</button>

        <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
  <label for="formFile" class="form-label"></label>
  <input name="fileimport" class="form-control" type="file" id="formFile" accept="application/vnd.ms-excel" required>
</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button name="import" type="submit" class="btn btn-primary">Import</button>
      </div>
    </form>
    </div>
  </div>
</div>
  
</div>

</div>


            
            
        
    

</div>
  
  </body>
</html>

