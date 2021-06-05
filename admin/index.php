<?php
session_start();
require_once '../includes/config.php';
require_once 'session.php';



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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">
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
<!-- Recently visited -->

<div class="hero">
        <h1>Manipal University</h1>
     </div>

</div>

<div class="admin-main-body">
  <div class="jumbotron">
      <div class="row w-100">
          <div class="col-md-3">
              <div class="card border-info mx-sm-1 p-3">
                  <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-car" aria-hidden="true"></span></div>
                  <div class="text-info text-center mt-3"><h4>Total Students</h4></div>
                  <div class="text-info text-center mt-2"><h1>
                    <?php $ref2="student/";
 //echo $ref2;
    $fetchdata2=$database->getReference($ref2)->getSnapshot()->numChildren();
echo  $fetchdata2;
?>
                  </h1></div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card border-success mx-sm-1 p-3">
                  <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                  <div class="text-success text-center mt-3"><h4>Total Teachers</h4></div>
                  <div class="text-success text-center mt-2"><h1>
                    <?php $ref2="teacher/";
 //echo $ref2;
    $fetchdata2=$database->getReference($ref2)->getSnapshot()->numChildren();
echo  $fetchdata2;
?></h1></div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card border-danger mx-sm-1 p-3">
                  <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-heart" aria-hidden="true"></span></div>
                  <div class="text-danger text-center mt-3"><h4>Lor's issued </h4></div>
                  <div class="text-danger text-center mt-2"><h1><?php $ref2="request/";
                  $i=0;
    $fetchdata2=$database->getReference($ref2)->getValue();
    foreach($fetchdata2 as $key1=>$row){
      if($row['flag']==1){
$i++;
      }
    }
    echo $i;
?></h1></div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card border-warning mx-sm-1 p-3">
                  <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div>
                  <div class="text-warning text-center mt-3"><h4>Lor's Pending</h4></div>
                  <div class="text-warning text-center mt-2"><h1><?php $ref2="request/";
                  $i=0;
    $fetchdata2=$database->getReference($ref2)->getValue();
    foreach($fetchdata2 as $key1=>$row){
      if($row['flag']==0){
$i++;
      }
    }
    echo $i;
?></h1></div>
              </div>
          </div>
      </div>
  </div>
</div>
  </body>
</html>

