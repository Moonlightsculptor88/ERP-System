<?php
//session_unset();
session_start();
require_once 'includes/config.php';


if (isset($_POST['login'])) {
    $ref="admin/";
    $fetchdata=$database->getReference($ref)->getValue();

foreach ($fetchdata as $key => $row) {
    if($_POST['email']==str_replace(' ', '',$row['id']) && $_POST['Password']==$row['password']){
        $_SESSION['id']=$key;
        $_SESSION['type']=3;
        header('Location:admin/index.php');
       // break;
    }
    
}
$ref1="student/";
    $fetchdata1=$database->getReference($ref1)->getValue();
    foreach ($fetchdata1 as $key => $row) {
    if($_POST['email']==str_replace(' ', '',$row['reg'])&& $_POST['Password']==$row['password']){
        $_SESSION['id']=$key;
        $_SESSION['type']=1;
        header('Location:student/index.php');
       // break;
    }
    
}
$ref1="teacher/";
    $fetchdata2=$database->getReference($ref1)->getValue();
    foreach ($fetchdata2 as $key => $row) {
    if($_POST['email']==str_replace(' ', '',$row['email']) && $_POST['Password']==$row['password']){
        $_SESSION['id']=$key;
        $_SESSION['type']=2;
        header('Location:teacher/index.php');
       // break;
    }
    
}
if (!isset($_SESSION['status'])) {
    echo "<script>alert('Your credentials are invaid')</script>";
//header('Location:index.php');
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
    <link href="admin/styles/styles.css" rel="stylesheet">
    <title>ERP System</title>
  </head>
  <body>
    <div class="card card-login" style="width: 20rem;">
        <img src="./img/logo.png" class="card-img-top" alt="...">
        <div class="card-body d-flex justify-content-center">
            <form method="post">
                <input class="form-control login-form " type="text" placeholder="LoginID" name="email">
                <input class="form-control login-form " type="password" placeholder="Password" name="Password">
                <input class="btn btn-outline-success login-btn" type="submit" name="login">
            </form>
        </div>
      </div>

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>