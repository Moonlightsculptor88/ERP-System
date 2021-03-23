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
<!-- Student Info -->


<div class="container student-info">


<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="#" class="black">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Student name</li>
  </ol>
</nav> 



<div class="card stud-info-card">
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
                      Year/batch:2018
                    </li>
                  </ul>
                 
                </div>
                  
                  <div class="student-pic">
                    <img class="student-info-img" src="./img/person.png" alt="some">
                  </div>
                </div>
  <div class="card-body">
    
    
    <p class="card-text">Info about internship here.</p>


    <button type="button" class="btn btn-primary btn-md">Issue LOR</button>
<button type="button" class="btn btn-secondary btn-md">Reject LOR</button>
    
  </div>
</div>






</div>









</div>
  
  </body>
</html>
