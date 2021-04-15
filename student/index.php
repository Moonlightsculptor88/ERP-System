<?php
session_start();
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
          header('Location:../login.php');

}
// echo $_SESSION['id'];


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
require_once 'navbar.php';
?>

<div class="container basic-details">
<div class="card stud-info-card name-card">
  <h5 class="card-header"><div >
                  <div class="student-card">
                    <div><ul>
                    <li>Name: Anapalli Mahi Pritam Reddy 
                    </li>
                    <li>
                      Reg-No: 189301049
                    </li>
                    <li>
                      Branch: CSE
                    </li>
                    <li>
                      Section: C
                    </li>
                    <li>
                      Batch: 2018
                    </li>
                  </ul>
                 
                </div>
                  
                  <div class="student-pic">
                    <img class="student-info-img" src="./img/person.png" alt="some">
                  </div>
                </div>
  
</div>

</div>






     
  
  </body>
</html>

