<?php
session_start();
require_once '../includes/config.php';
require_once 'session.php';

if(isset($_POST['add'])){
  $ref2="student/".$_SESSION['id']."/";
  $fetchdata2=$database->getReference($ref2)->getValue();
  if($_POST['current']==$fetchdata2['password']){
$data=[
  'password'=>$_POST['new']
];
      /*$ref4="student/".$_SESSION['id']."/";
$fetchdata4=$database->getReference($ref4)->getSnapshot();*/
        
$postdata = $database->getReference($ref2)->update($data);
echo "<script>alert('Password Updated')</script>";
  }else{
    echo "<script>alert('Wrong password')</script>";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="./styles/styles.css" rel="stylesheet">
    <title>ERP System</title>
  </head>
  <body>
 
<div id="full-page">
<?php
require_once 'navbar.php';
?>

<div class="container add-container">
<h3 class="add-heading">Enter Details</h3>
<form method="post" >
  

<div  class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Current Password</label>
  <input required type="text" name="current" class="form-control" id="exampleFormControlInput1" >
</div>
<div  class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">New Password</label>
  <input required type="text" name="new" class="form-control" id="exampleFormControlInput1" >
</div>


<div class="d-grid gap-2 col-2 mx-auto">
  <button name="add" class="btn btn-primary lor-submit" type="submit">Update</button>
  
</div></form>

     </div>
     
  
  </body>
</html>

