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

<div class="container">
        <div class="row">
            <div class="col-lg-4  panel-pad-10">
                <div class="panel panel-default">
                  <div class="panel-body">Recently visited 1</div>
                </div>
            </div>
            <div class="col-lg-4  panel-pad-10"> 
                <div class="panel panel-default">
                  <div class="panel-body">Recently visited 2</div>
                </div>
            </div>
            <div class="col-lg-4 panel-pad-10">
                <div class="panel panel-default">
                  <div class="panel-body">Recently visited 3</div>
                </div>
            </div>
        </div>
        
    
     </div>
     <div class="container">
        <div class="row">
            <div class="col-lg-4  panel-pad-10">
                <div class="panel panel-default ">
                  <div class="panel-body ">Recently visited 4</div>
                </div>
            </div>
            <div class="col-lg-4  panel-pad-10"> 
                <div class="panel panel-default">
                  <div class="panel-body">Recently visited 5</div>
                </div>
            </div>
            <div class="col-lg-4  panel-pad-10">
                <div class="panel panel-default">
                  <div class="panel-body">Recently visited 6</div>
                </div>
            </div>
        
        
    </div>
     </div>
     <div class="container">
        <div class="row">
            <div class="col-lg-4  panel-pad-10">
                <div class="panel panel-default">
                  <div class="panel-body">Recently visited 7</div>
                </div>
            </div>
            <div class="col-lg-4  panel-pad-10"> 
                <div class="panel panel-default">
                  <div class="panel-body">Recently visited 8</div>
                </div>
            </div>
            <div class="col-lg-4  panel-pad-10">
                <div class="panel panel-default">
                  <div class="panel-body">Recently visited 9</div>
                </div>
            </div>
        </div>
        
    
     


</div>
  
  </body>
</html>

