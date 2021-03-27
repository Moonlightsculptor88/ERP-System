<?php
session_start();
require_once '../includes/config.php';

 $ref1="request/".$_GET['id']."/";
 //echo $ref2;
    $fetchdata1=$database->getReference($ref1)->getValue();
    //echo $fetchdata2['name'];


 $ref2="student/".$fetchdata1['student_id']."/";
 //echo $ref2;
    $fetchdata2=$database->getReference($ref2)->getValue();
    


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
<!-- Student Info -->


<div class="container student-info">


<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="#" class="black">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $fetchdata2['name'];?></li>
  </ol>
</nav> 



<div class="card stud-info-card">
  <h5 class="card-header"><div >
                  <div class="student-card">
                    <div><ul>
                    <li><?php echo $fetchdata2['name'];?> 
                    </li>
                    <li>
                      Reg-No: <?php echo $fetchdata2['reg'];?>
                    </li>
                    <li>
                      Branch: <?php
 $ref4="branch/".$fetchdata2['branch']."/";
 //echo $ref3;
    $fetchdata4=$database->getReference($ref4)->getValue();
    echo $fetchdata4['name'];
    
?>
                    </li>
                    <li>
                      Section: <?php echo $fetchdata2['section'];?>
                    </li>
                    <li>
                      Year/batch:<?php echo $fetchdata2['batch'];?>
                    </li>
                  </ul>
                 
                </div>
                  
                  <div class="student-pic">
                    <img class="student-info-img" src="./img/person.png" alt="some">
                  </div>
                </div>
  <div class="card-body">
    
    
    <p class="card-text"><?php echo $fetchdata1['info']; ?></p>
<p class="card-text"><?php echo $fetchdata1['purpose']; ?></p>
<a href="../student/uploads/<?php echo $fetchdata1['file'];?>" target="_blank">View document uploaded</a>
    <button type="button" class="btn btn-primary btn-md">Issue LOR</button>
<button type="button" class="btn btn-secondary btn-md">Reject LOR</button>
    
  </div>
</div>






</div>









</div>
  
  </body>
</html>
