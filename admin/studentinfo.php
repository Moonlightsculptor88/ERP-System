<?php
session_start();
require_once '../includes/config.php';
require_once 'session.php';
$ref2="student/".$_GET['id']."/";
 //echo $ref2;
    $fetchdata2=$database->getReference($ref2)->getValue();
// echo $_SESSION['id'];
$ref3="branch/".$fetchdata2['branch']."/";
 //echo $ref2;
    $fetchdata3=$database->getReference($ref3)->getValue();


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
                    <li>Name: <?php echo $fetchdata2['name'];?>
                    </li>
                    <li>
                      Reg-No: <?php echo $fetchdata2['reg'];?>
                    </li>
                    <li>
                      Branch: <?php echo $fetchdata2['branch'];?>
                    </li>
                    <li>
                      Section: <?php echo $fetchdata2['section'];?>
                    </li>
                    <li>
                      DOB: <?php echo $fetchdata2['dob'];?>
                    </li>
                    <li>
                      Batch: <?php echo $fetchdata2['batch'];?>
                    </li>
                  </ul>
                 
                </div>
                  
                  <div class="student-pic">
                    <img class="student-info-img" src="./img/person.png" alt="some">
                  </div>
                </div>
  <div class="card-body">
    
    <section id="internship-details">
    <div class="container-fluid internship-deets">


      <h4>Internship Details
        <!-- Button trigger modal -->
        

      </h4>
     <?php
$ref4="student/".$_GET['id']."/";
$fetchdata4=$database->getReference($ref4)->getSnapshot();

if($fetchdata4->hasChild("internship")){
  $ref5="student/".$_GET['id']."/internship/";
    $fetchdata5=$database->getReference($ref5)->getValue();
    foreach($fetchdata5 as $key1=>$row){
      
?>
      <div class="full-internship-deets">
        <div class="row basic-internship-deets">
          <div class="col-lg-6 company-name">
             <?php echo $row['company']; ?>

          </div>
          <div class="col-lg-5 working-date">
            <?php echo $row['start']; ?>
            -
            <?php echo $row['end']; ?>


          </div>

          <div class="col-lg-1 float-right">
            
          

          </div>


          <div class="col-lg-6 working-role">
            <?php echo $row['position']; ?>



          </div>
        </div>
        <div class="internship-info">
           <p><?php echo $row['details']; ?>
          </p>
        </div>
      </div>
       <?php

}
}else{
  echo "None";
}
?>

    </div>



    <div>

    </div>



  </section>
    <section id="Projects">



    <div class="container-fluid project-deets">


      <h4>Project Details
        <!-- Button trigger modal -->
        

      </h4>
      <?php
$ref7="student/".$_GET['id']."/";
$fetchdata7=$database->getReference($ref7)->getSnapshot();

if($fetchdata7->hasChild("projects")){
$ref8="student/".$_GET['id']."/projects/";
$fetchdata8=$database->getReference($ref8)->getValue();
foreach($fetchdata8 as $key1=>$row){
  ?>
      <div class="full-internship-deets">
        <div class="row basic-internship-deets">
          <div class="col-lg-6 company-name">
           <?php echo $row['project']; ?>

          </div>
          <div class="col-lg-5 working-date">
            <?php echo $row['start']; ?>
            -
            <?php echo $row['end']; ?>


          </div>
          

          <div class="col-lg-6 working-role">
            <?php echo $row['associated']; ?>

           


          </div>

          <div class="col-lg-12 project-url">
            
            <a href="<?php echo $row['project-url']; ?>">Project Url</a>


          </div>
        </div>

        <div class="internship-info">
          <p><?php echo $row['details']; ?>
          </p>
        </div>
      </div>
<?php
}
}else{
  echo "None";
}
?>
    </div>



    <div>

    </div>


  </section>

  <section id="Certificates">



<div class="container-fluid certificates">


  <h4>Certificates
    <!-- Button trigger modal -->
   

  </h4>


<?php
$ref4="student/".$_GET['id']."/";
$fetchdata4=$database->getReference($ref4)->getSnapshot();

if($fetchdata4->hasChild("certificates")){
$ref9="student/".$_GET['id']."/certificates/";
$fetchdata9=$database->getReference($ref9)->getValue();
foreach($fetchdata9 as $key1=>$row){
  ?>
  
  <div class="full-internship-deets">
    <div class="row basic-internship-deets">
      <div class="col-lg-6 company-name">
        <?php echo $row['title']; ?>

      </div>
      <div class="col-lg-5 working-date">
       <?php echo $row['start']; ?>
        -
        <?php echo $row['end']; ?>



      </div>
      
      <div class="col-lg-6 working-role">
       <?php echo $row['issued-by']; ?>
        
      </div>
      <div class="col-lg-12 project-url">
        
        <a href="<?php echo $row['certificate-url']; ?>">See Credential</a>


        </div>
        <div class="col-lg-6 working-role">
       <?php echo $row['id']; ?>


        
      </div>
    </div>

   
  </div>
  <?php
}
}else{
  echo "None";
}
  ?>

</div>



<div>

</div>


</section>

  </div>
</div>






</div>









</div>
  
  </body>
</html>
