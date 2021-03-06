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
<h1 class="heading-main">Pending LOR</h1>
<div class="container display-list" style="padding-top:50px;">

<div class="list-group">
  <?php
    $ref1="request/";
    $fetchdata=$database->getReference($ref1)->getValue();
    foreach ($fetchdata as $key => $row) {

      if($row['teacher_id']==$_SESSION['id'] && $row['flag']==0){
    ?>
    <a href="lor-details.php?id=<?php echo $key;?>" class="list-group-item list-group-item-action " aria-current="true">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"><?php
 $ref2="student/".$row['student_id']."/";
 //echo $ref2;
    $fetchdata2=$database->getReference($ref2)->getValue();
    echo $fetchdata2['name'];

?></h5>
      <small><?php echo $row['date'];?></small>
    </div>
    <p class="mb-1"><?php
 
    echo $fetchdata2['branch'];
    echo " ";
    echo $fetchdata2['batch'];
?></p>
    <small><?php echo $row['info'];?></small>
  </a>
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

