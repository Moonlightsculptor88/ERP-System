<?php
session_start();
require_once '../includes/config.php';
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

<div class="container filter-row">
  
<h3>Filter:</h3>

<div class="dropdown">
  <button class="btn filter-dropdown dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Batch
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>

<div class="dropdown">
  <button class="btn filter-dropdown dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Branch
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>

<div class="dropdown">
  <button class="btn filter-dropdown dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Section
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>

<div class="dropdown">
  <button class="btn filter-dropdown dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
</div>

<div class="container">
     <div class="row">
      <?php
$ref2="student/";
 //echo $ref2;
    $fetchdata2=$database->getReference($ref2)->getValue();
    foreach($fetchdata2 as $key1=>$row){
      $ref3="branch/".$row['branch']."/";
 //echo $ref2;
    $fetchdata3=$database->getReference($ref3)->getValue();
      ?>
            <div class="col-lg-6  panel-pad-10">
                <div class="panel panel-default">
                  <div class="panel-body">
                  <div class="student-card">
                    <div><ul>
                    <li>Name:  <?php echo $row['name']; ?>
                    </li>
                    <li>
                      Reg-No:  <?php echo $row['reg']; ?>
                    <li>
                      Branch:  <?php echo $fetchdata3['name']; ?>
                    </li>
                    <li>
                      Section:  <?php echo $row['section']; ?>
                    </li>
                  </ul>
                  <button onclick="location.href='studentinfo.php?id=<?php echo $key1;?>'" type="button" class="btn btn-primary more-info">More Info</button>
                </div>
                  
                  <div class="student-pic">
                    <img class="student-img" src="./img/person.png" alt="some">
                  </div>
                  </div>
                 
                </div>
                 
                </div>
            </div>
            <?php

          }
          ?>
            


     
    
    
     


     
            

           
            
            
            <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item ">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
            
        
    

</div>
  </div>
  
  </body>
  
</html>

