<?php
session_start();
require_once '../includes/config.php';
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
          header('Location:../login.php');

}
$ref2="student/".$_SESSION['id']."/";
 //echo $ref2;
    $fetchdata2=$database->getReference($ref2)->getValue();
// echo $_SESSION['id'];
$ref3="branch/".$fetchdata2['branch']."/";
 //echo $ref2;
    $fetchdata3=$database->getReference($ref3)->getValue();

    if(isset($_POST['add'])){
      if(isset($_POST['curr']) && $_POST['curr']=="yes"){
        $end="current";
      }else{
        $end=$_POST['end-month'].",".$_POST['end-year'];
      }
      $data=[
  'company'=>$_POST['company-name'],
  'position'=>$_POST['pos'],
  'details'=>$_POST['details'],
  'start'=>$_POST['start-month'].",".$_POST['start-year'],
  'end'=>$end
];
      /*$ref4="student/".$_SESSION['id']."/";
$fetchdata4=$database->getReference($ref4)->getSnapshot();*/
        $ref="student/".$_SESSION['id']."/internship";
$postdata = $database->getReference($ref)->push($data);
      
      
    }

    

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Orelega+One&family=Oswald&display=swap" rel="stylesheet">
  <script src="https://use.fontawesome.com/468c63f4d9.js"></script>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="./styles/styles.css" rel="stylesheet">
  <title>ERP System</title>
</head>

<body>
  <?php
require_once 'navbar.php';
?>

  <!-- <div class="container basic-details">
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

</div> -->

  <section id="Student-Info">
    <div class="container-fluid basic-deets">

      <div class="row">
        <div class="col-lg-6 text-deets">
          <div class="module">Name: <?php echo $fetchdata2['name'];?> <br>
            Reg-No: <?php echo $fetchdata2['reg'];?> <br>
            DOB: <?php echo $fetchdata2['dob'];?> <br>
            Batch: <?php echo $fetchdata2['batch'];?> <br>
            Branch: <?php echo $fetchdata3['name'];?> <br>


          </div>

        </div>

        <div class="col-lg-6 img-deets">
          <img class="profile-img" src="./img/person.png" alt="">

        </div>

      </div>

    </div>

  </section>


  <section id="internship-details">
    <div class="container-fluid internship-deets">


      <h1>Internship Details
        <!-- Button trigger modal -->
        <button type="button" class="btn add-internship-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
          +
        </button>

      </h1>




      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enter Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
              <div class="modal-body">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Company Name</span>
                  <input required type="text" name="company-name" class="form-control" placeholder=""
                    aria-label="company-name" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Start Date </span>
                  <select name="start-month" class="form-control" aria-label="start" aria-describedby="basic-addon1">
                    <option value="Jaunary">January
                    </option>
                    <option value="February">February
                    </option>
                    <option value="March">March
                    </option>
                    <option value="April">April
                    </option>
                    <option value="May">May
                    </option>
                    <option value="June">June
                    </option>
                    <option value="July">July
                    </option>
                    <option value="August">August
                    </option>
                    <option value="September">September
                    </option>
                    <option value="October">October
                    </option>
                    <option value="November">November
                    </option>
                    <option value="December">December
                    </option>
                  </select>
                  <select name="start-year" class="form-control" aria-label="end" aria-describedby="basic-addon1">
                    <?php 
    $y=date("Y");
    //echo $y;
while($y>2000){
  ?>
                    <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                    <?php
  $y--;
}
    ?>

                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="form-check form-switch">
                    <input name="curr" value="yes" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                      onclick="myFunction()" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Are You Currently Working here?</label>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">End Date </span>
                  <select id="end-month" name="end-month" class="form-control" aria-label="start"
                    aria-describedby="basic-addon1" disabled>
                    <option value="Jaunary">January
                    </option>
                    <option value="February">February
                    </option>
                    <option value="March">March
                    </option>
                    <option value="April">April
                    </option>
                    <option value="May">May
                    </option>
                    <option value="June">June
                    </option>
                    <option value="July">July
                    </option>
                    <option value="August">August
                    </option>
                    <option value="September">September
                    </option>
                    <option value="October">October
                    </option>
                    <option value="November">November
                    </option>
                    <option value="December">December
                    </option>
                  </select>
                  <select name="end-year" disabled id="end-year" class="form-control" aria-label="end"
                    aria-describedby="basic-addon1">
                    <?php 
    $y=date("Y");
    //echo $y;
while($y>2000){
  ?>
                    <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                    <?php
  $y--;
}
    ?>

                  </select>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Position</span>
                  <input name="pos" type="text" class="form-control" placeholder="" aria-label="Position"
                    aria-describedby="basic-addon1">
                </div>

                <div class="input-group">
                  <span class="input-group-text">Details</span>
                  <textarea name="details" class="form-control" aria-label="details"></textarea>
                </div>



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="add" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>
        </div>

      </div>


      <?php
$ref4="student/".$_SESSION['id']."/";
$fetchdata4=$database->getReference($ref4)->getSnapshot();

if($fetchdata4->hasChild("internship")){
  $ref5="student/".$_SESSION['id']."/internship/";
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
          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

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
}
?>

    </div>



    <div>

    </div>



  </section>



  <section id="Projects">



    <div class="container-fluid project-deets">


      <h1>Project Details
        <!-- Button trigger modal -->
        <button type="button" class="btn add-project-btn" data-bs-toggle="modal" data-bs-target="#exampleModal1">
          +
        </button>

      </h1>




      <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Enter Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
              <div class="modal-body">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Project Name</span>
                  <input required type="text" name="company-name" class="form-control" placeholder=""
                    aria-label="company-name" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Start Date </span>
                  <select name="start-month" class="form-control" aria-label="start" aria-describedby="basic-addon1">
                    <option value="Jaunary">January
                    </option>
                    <option value="February">February
                    </option>
                    <option value="March">March
                    </option>
                    <option value="April">April
                    </option>
                    <option value="May">May
                    </option>
                    <option value="June">June
                    </option>
                    <option value="July">July
                    </option>
                    <option value="August">August
                    </option>
                    <option value="September">September
                    </option>
                    <option value="October">October
                    </option>
                    <option value="November">November
                    </option>
                    <option value="December">December
                    </option>
                  </select>
                  <select name="start-year" class="form-control" aria-label="end" aria-describedby="basic-addon1">
                    <?php 
$y=date("Y");
//echo $y;
while($y>2000){
?>
                    <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                    <?php
$y--;
}
?>

                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="form-check form-switch">
                    <input name="curr" value="yes" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                      onclick="myFunction()" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Are You Currently Working on this project? </label>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">End Date </span>
                  <select id="end-month" name="end-month" class="form-control" aria-label="start"
                    aria-describedby="basic-addon1" disabled>
                    <option value="Jaunary">January
                    </option>
                    <option value="February">February
                    </option>
                    <option value="March">March
                    </option>
                    <option value="April">April
                    </option>
                    <option value="May">May
                    </option>
                    <option value="June">June
                    </option>
                    <option value="July">July
                    </option>
                    <option value="August">August
                    </option>
                    <option value="September">September
                    </option>
                    <option value="October">October
                    </option>
                    <option value="November">November
                    </option>
                    <option value="December">December
                    </option>
                  </select>
                  <select name="end-year" disabled id="end-year" class="form-control" aria-label="end"
                    aria-describedby="basic-addon1">
                    <?php 
$y=date("Y");
//echo $y;
while($y>2000){
?>
                    <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                    <?php
$y--;
}
?>

                  </select>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Associated With</span>
                  <input name="pos" type="text" class="form-control" placeholder="" aria-label="Associated With"
                    aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Project URL</span>
                  <input name="url" type="text" class="form-control" placeholder="" aria-label="Project URL"
                    aria-describedby="basic-addon1">
                </div>

                <div class="input-group">
                  <span class="input-group-text">Details</span>
                  <textarea name="details" class="form-control" aria-label="details"></textarea>
                </div>



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="add" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>
        </div>

      </div>


      <?php
$ref4="student/".$_SESSION['id']."/";
$fetchdata4=$database->getReference($ref4)->getSnapshot();

if($fetchdata4->hasChild("internship")){
$ref5="student/".$_SESSION['id']."/internship/";
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
          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

          </div>

          <div class="col-lg-6 working-role">
            <?php echo $row['position']; ?>

           


          </div>

          <div class="col-lg-12 project-url">
            
            <a href="#">Project Url</a>


          </div>
        </div>

        <div class="internship-info">
          <p><?php echo $row['details']; ?>
          </p>

        </div>
      </div>
      <?php

}
}
?>

    </div>



    <div>

    </div>


  </section>


  <section id="Certificates">



<div class="container-fluid certificates">


  <h1>Certificates
    <!-- Button trigger modal -->
    <button type="button" class="btn add-certificates-btn" data-bs-toggle="modal" data-bs-target="#exampleModal2">
      +
    </button>

  </h1>




  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Enter Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post">
          <div class="modal-body">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Certificate Title</span>
              <input required type="text" name="company-name" class="form-control" placeholder=""
                aria-label="company-name" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Start Date </span>
              <select name="start-month" class="form-control" aria-label="start" aria-describedby="basic-addon1">
                <option value="Jaunary">January
                </option>
                <option value="February">February
                </option>
                <option value="March">March
                </option>
                <option value="April">April
                </option>
                <option value="May">May
                </option>
                <option value="June">June
                </option>
                <option value="July">July
                </option>
                <option value="August">August
                </option>
                <option value="September">September
                </option>
                <option value="October">October
                </option>
                <option value="November">November
                </option>
                <option value="December">December
                </option>
              </select>
              <select name="start-year" class="form-control" aria-label="end" aria-describedby="basic-addon1">
                <?php 
$y=date("Y");
//echo $y;
while($y>2000){
?>
                <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                <?php
$y--;
}
?>

              </select>
            </div>
            <div class="input-group mb-3">
              <div class="form-check form-switch">
                <input name="curr" value="yes" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                  onclick="myFunction()" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Are You Currently Working on this project? </label>
              </div>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">End Date </span>
              <select id="end-month" name="end-month" class="form-control" aria-label="start"
                aria-describedby="basic-addon1" disabled>
                <option value="Jaunary">January
                </option>
                <option value="February">February
                </option>
                <option value="March">March
                </option>
                <option value="April">April
                </option>
                <option value="May">May
                </option>
                <option value="June">June
                </option>
                <option value="July">July
                </option>
                <option value="August">August
                </option>
                <option value="September">September
                </option>
                <option value="October">October
                </option>
                <option value="November">November
                </option>
                <option value="December">December
                </option>
              </select>
              <select name="end-year" disabled id="end-year" class="form-control" aria-label="end"
                aria-describedby="basic-addon1">
                <?php 
$y=date("Y");
//echo $y;
while($y>2000){
?>
                <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                <?php
$y--;
}
?>

              </select>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Issuing Organization</span>
              <input name="pos" type="text" class="form-control" placeholder="" aria-label="Associated With"
                aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Certificate URL</span>
              <input name="url" type="text" class="form-control" placeholder="" aria-label="Project URL"
                aria-describedby="basic-addon1">
            </div>

            <div class="input-group">
              <span class="input-group-text">Credential ID</span>
              <input name="url" type="text" class="form-control" placeholder="" aria-label="Project URL"
                aria-describedby="basic-addon1">
            </div>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="add" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>

  </div>


  <?php
$ref4="student/".$_SESSION['id']."/";
$fetchdata4=$database->getReference($ref4)->getSnapshot();

if($fetchdata4->hasChild("internship")){
$ref5="student/".$_SESSION['id']."/internship/";
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
      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

      </div>

      <div class="col-lg-6 working-role">
        <?php echo $row['position']; ?>

        
      </div>
      <div class="col-lg-12 project-url">
        
        <a href="#">Project Url</a>


        </div>
        <div class="col-lg-6 working-role">
        <?php echo $row['position']; ?>

        
      </div>
    </div>

   
  </div>
  <?php

}
}
?>

</div>



<div>

</div>


</section>





</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</html>
<script type="text/javascript">
  function myFunction() {
    if (document.getElementById('flexSwitchCheckChecked').checked) {
      document.getElementById("end-year").disabled = true;
      document.getElementById("end-month").disabled = true;
    } else {
      document.getElementById("end-year").disabled = false;
      document.getElementById("end-month").disabled = false;
    }


  }
</script>