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
<div class="container display-list" style="padding-top:50px;">

<div class="list-group">
  <?php
    $ref1="request/";
    $fetchdata=$database->getReference($ref1)->getValue();
    foreach ($fetchdata as $key => $row) {
      
//$p=$row['student_id'];
//echo $row['student_id'];
      if($row['flag']==1 ){
    ?>
    <div class="list-group-item list-group-item-action " aria-current="true">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"><?php
 $ref2="teacher/".$row['teacher_id']."/";
 //echo $ref2;
    $fetchdata2=$database->getReference($ref2)->getValue();
    echo "Issued By: ";
    echo $fetchdata2['name'];

?></h5>

      <small> Issued On <?php echo $row['issue_date'];?></small>
    </div>
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"><?php
 $ref4="student/".$row['student_id']."/";
 //echo $ref2;
    $fetchdata4=$database->getReference($ref4)->getValue();
    echo "Issued To: ";
    echo $fetchdata4['name'];

?></h5>
 <small> Requested On <?php echo $row['date'];?></small>
    </div>
    <div class="d-flex w-100 justify-content-between">
    
    <h6 class="mb-1"><?php echo $row['info'];?></h6>

    <small> 
     <button class="btn btn-primary" onclick="location.href='../teacher/lor/<?php echo $row['lor'];?>'" >View LOR </button>
     
      
  </div>
    <?php

  }}
  ?>
  
 <!-- <a href="#" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small class="text-muted">3 days ago</small>
    </div>
    <p class="mb-1">Some placeholder content in a paragraph.</p>
    <small class="text-muted">And some muted small print.</small>
  </a>-->
  
</div>


</div>


        
    
     


</div>
  
  </body>
</html>

