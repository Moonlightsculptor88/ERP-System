<?php
session_start();
require_once '../includes/config.php';
require_once 'session.php';

$ref2="student/".$_SESSION['id']."/";
 //echo $ref2;
    $fetchdata2=$database->getReference($ref2)->getValue();
// echo $_SESSION['id'];
$ref3="branch/".$fetchdata2['branch']."/";
 //echo $ref2;
    $fetchdata3=$database->getReference($ref3)->getValue();
if(isset($_POST['deli'])){
  $ref="student/".$_SESSION['id']."/internship/".$_POST['id'];
$postdata = $database->getReference($ref)->remove();

}
if(isset($_POST['delp'])){
  $ref="student/".$_SESSION['id']."/projects/".$_POST['id'];
$postdata = $database->getReference($ref)->remove();

}
if(isset($_POST['delc'])){
  $ref="student/".$_SESSION['id']."/certificates/".$_POST['id'];
$postdata = $database->getReference($ref)->remove();

}
    if(isset($_POST['add'])){
      if(isset($_POST['curr']) && $_POST['curr']=="yes"){
        $end="current";
      }else{
        $end=$_POST['end-month'].",".$_POST['end-year'];
      }
      
      $uniquesavename=time().uniqid(rand());
$filename = $uniquesavename.$_FILES['offer']['name'];
$tempname = $_FILES['offer']['tmp_name'];
$folder = "uploads/".$filename;
if (move_uploaded_file($tempname, $folder)) {
  echo "Image uploaded successfully";
}else {
  echo "Failed to upload image";
}


if (strlen($_FILES['certificate']['name'])>2) {
        $uniquesavename=time().uniqid(rand());
$filename1 = $uniquesavename.$_FILES['certificate']['name'];
$tempname = $_FILES['certificate']['tmp_name'];
$folder = "uploads/".$filename1;
if (move_uploaded_file($tempname, $folder)) {
  echo "Image uploaded successfully";
}else {
  echo "Failed to upload image";
}

      }
      else{
        $filename1="-";
}

      $data=[
      
  'company'=>$_POST['company-name'],
  'offer-letter'=>$filename,
  'position'=>$_POST['pos'],
  'details'=>$_POST['details'],
  'certificate'=>$filename1,
  'start'=>$_POST['start-month'].",".$_POST['start-year'],
  'end'=>$end
];
      /*$ref4="student/".$_SESSION['id']."/";
$fetchdata4=$database->getReference($ref4)->getSnapshot();*/
        $ref="student/".$_SESSION['id']."/internship";
$postdata = $database->getReference($ref)->push($data);
      
      
    }

    if(isset($_POST['add-pro'])){
      if(isset($_POST['curr-pro']) && $_POST['curr-pro']=="yes"){
        $end="current";
      }else{
        $end=$_POST['end-month-pro'].",".$_POST['end-year-pro'];
      }
      $data=[
  'project'=>$_POST['project-name'],
  'associated'=>$_POST['asso'],
  'project-url'=>$_POST['pro-url'],
  'details'=>$_POST['details'],
  'start'=>$_POST['start-month-pro'].",".$_POST['start-year-pro'],
  'end'=>$end
];
      /*$ref4="student/".$_SESSION['id']."/";
$fetchdata4=$database->getReference($ref4)->getSnapshot();*/
        $ref="student/".$_SESSION['id']."/projects";
$postdata = $database->getReference($ref)->push($data);
      
      
    }
if(isset($_POST['add-certi'])){
      if(isset($_POST['curr-certi']) && $_POST['curr-certi']=="yes"){
        $end="No expiration Date";
      }else{
        $end=$_POST['end-month-certi'].",".$_POST['end-year-certi'];
      }

      if($_POST['issue']=="Other"){
        $data1=[
  'name'=>$_POST['other']
];

$ref1="organization/";
$postdata = $database->getReference($ref1)->push($data1);
        $issue=$_POST['other'];
      }else{
        $issue=$_POST['issue'];
      }
      $data=[
  'title'=>$_POST['title'],
  'issued-by'=>$issue,
  'certificate-url'=>$_POST['certi-url'],
  'id'=>$_POST['credential'],
  'start'=>$_POST['start-month-certi'].",".$_POST['start-year-certi'],
  'end'=>$end
];
      /*$ref4="student/".$_SESSION['id']."/";
$fetchdata4=$database->getReference($ref4)->getSnapshot();*/
        $ref="student/".$_SESSION['id']."/certificates";
$postdata = $database->getReference($ref)->push($data);
      
      
    }
    
   if(isset($_POST['edit-intern'])){
      if(isset($_POST['curr']) && $_POST['curr']=="yes"){
        $end="current";
      }else{
        $end=$_POST['end-month'].",".$_POST['end-year'];
      }

if (strlen($_FILES['certificate']['name'])>2) {
        $uniquesavename=time().uniqid(rand());
$filename1 = $uniquesavename.$_FILES['certificate']['name'];
$tempname = $_FILES['certificate']['tmp_name'];
$folder = "uploads/".$filename1;
if (move_uploaded_file($tempname, $folder)) {
  echo "Image uploaded successfully";
}else {
  echo "Failed to upload image";
}

      }
      else{
        $filename1=$_POST['h-certi'];
}

      $data=[
  'company'=>$_POST['company-name'],
  'position'=>$_POST['pos'],
  'details'=>$_POST['details'],
  'start'=>$_POST['start-month'].",".$_POST['start-year'],
  'end'=>$end,
  'certificate'=>$filename1
];
      /*$ref4="student/".$_SESSION['id']."/";
$fetchdata4=$database->getReference($ref4)->getSnapshot();*/
        $ref="student/".$_SESSION['id']."/internship/".$_POST['id']."/";
$postdata = $database->getReference($ref)->update($data);
      
      
    } 

    if(isset($_POST['edit-pro'])){
      if(isset($_POST['curr']) && $_POST['curr']=="yes"){
        $end="current";
      }else{
        $end=$_POST['end-month-pro'].",".$_POST['end-year-pro'];
      }
      $data=[
 'project'=>$_POST['project-name'],
  'associated'=>$_POST['asso'],
  'project-url'=>$_POST['pro-url'],
  'details'=>$_POST['details'],
  'start'=>$_POST['start-month-pro'].",".$_POST['start-year-pro'],
  'end'=>$end
];
      /*$ref4="student/".$_SESSION['id']."/";
$fetchdata4=$database->getReference($ref4)->getSnapshot();*/
        $ref="student/".$_SESSION['id']."/projects/".$_POST['id']."/";
$postdata = $database->getReference($ref)->update($data);
      
      
    } 


    if(isset($_POST['edit-certi'])){
      if(isset($_POST['curr-certi']) && $_POST['curr-certi']=="yes"){
        $end="No expiration Date";
      }else{
        $end=$_POST['end-month-certi'].",".$_POST['end-year-certi'];
      }

      if($_POST['issue']=="Other"){
        $data1=[
  'name'=>$_POST['other']
];

$ref1="organization/";
$postdata = $database->getReference($ref1)->push($data1);
        $issue=$_POST['other'];
      }else{
        $issue=$_POST['issue'];
      }

      $data=[
  'title'=>$_POST['title'],
  'issued-by'=>$issue,
  'certificate-url'=>$_POST['certi-url'],
  'id'=>$_POST['credential'],
  'start'=>$_POST['start-month-certi'].",".$_POST['start-year-certi'],
  'end'=>$end
];
      /*$ref4="student/".$_SESSION['id']."/";
$fetchdata4=$database->getReference($ref4)->getSnapshot();*/
        $ref="student/".$_SESSION['id']."/certificates/".$_POST['id']."/";
$postdata = $database->getReference($ref)->update($data);
      
      
    }

    if(isset($_POST['edit-offer'])){
$uniquesavename=time().uniqid(rand());
$filename = $uniquesavename.$_FILES['offer']['name'];
$tempname = $_FILES['offer']['tmp_name'];
$folder = "uploads/".$filename;
if (move_uploaded_file($tempname, $folder)) {
  echo "Image uploaded successfully";
}else {
  echo "Failed to upload image";
}

$data=[
  'offer-letter'=>$filename,
  ];

  $ref="student/".$_SESSION['id']."/internship/".$_POST['id']."/";
$postdata = $database->getReference($ref)->update($data);
    }

if(isset($_POST['edit-c'])){
$uniquesavename=time().uniqid(rand());
$filename = $uniquesavename.$_FILES['certificate']['name'];
$tempname = $_FILES['certificate']['tmp_name'];
$folder = "uploads/".$filename;
if (move_uploaded_file($tempname, $folder)) {
  echo "Image uploaded successfully";
}else {
  echo "Failed to upload image";
}

$data=[
  'certificate'=>$filename,
  ];

  $ref="student/".$_SESSION['id']."/internship/".$_POST['id']."/";
$postdata = $database->getReference($ref)->update($data);
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
<section id="Student-Info">
    <div class="container-fluid basic-deets">

      <div class="row">
        <div class="col-lg-6 text-deets">
          <div class="module">Name: <?php echo $fetchdata2['name'];?> <br>
            Reg-No: <?php echo $fetchdata2['reg'];?> <br>
            DOB: <?php echo $fetchdata2['dob'];?> <br>
            Batch: <?php echo $fetchdata2['batch'];?> <br>
            Branch: <?php echo $fetchdata2['branch'];?> <br>


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
            <form method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Company Name</span>
                  <input required type="text" name="company-name" class="form-control" placeholder=""
                    aria-label="company-name" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Start Date </span>
                  <select name="start-month" class="form-control" aria-label="start" aria-describedby="basic-addon1">
                    <option value="January">January
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
                    <option value="January">January
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

                <div class="input-group mb-3">
                  <span class="input-group-text">Details</span>
                  <textarea name="details" class="form-control" aria-label="details"></textarea>
                </div>
                
<div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Offer Letter</span>
                  <input required name="offer" type="file" class="form-control" placeholder="" aria-label="Position"
                    aria-describedby="basic-addon1">
                </div>

                <div style="display: none;" class="input-group mb-3" id="c">
                  <span class="input-group-text" id="basic-addon1">Certificate</span>
                  <input id="certificate" name="certificate" type="file" class="form-control" placeholder="" aria-label="Position"
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
      $str = $row['start'];
      unset($p1);
      $p=array();
 $p=(explode(",",$str));
    $str1 = $row['end'];
    if($str1!="current"){
      $p1=array();
    
 $p1=(explode(",",$str1));
}
?>
      <div class="full-internship-deets">
        <div class="row basic-internship-deets">
          <div class="col-lg-6 company-name">
            <?php echo $row['company']; ?>

          </div>
          <div class="col-lg-4 working-date">
            <?php echo $row['start']; ?>
            -
            <?php echo $row['end']; ?>



          </div>

          <div class="col-lg-1 float-right">
            <form method="post" >
            <input type="hidden" name="id" value="<?php echo $key1; ?>">
            <button type="submit" name="deli" class="btn add-internship-btn" >
          <i class="fa fa-trash-o" aria-hidden="true"></i>
        </button>
      </form>
      </div>

          <div class="col-lg-1 float-right">

            <button type="button" class="btn add-internship-btn" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $key1; ?>">
          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        </button>

          <div class="modal fade" id="exampleModal<?php echo $key1; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Internship</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
              <div class="modal-body">
                <input type="hidden" value="<?php echo $key1; ?>" name="id">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Company Name</span>
                  <input value="<?php echo $row['company']; ?>" required type="text" name="company-name" class="form-control" placeholder=""
                    aria-label="company-name" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Start Date </span>
                  <select name="start-month" class="form-control" aria-label="start" aria-describedby="basic-addon1">
                    <option <?php if($p[0]=="January") echo "selected";?> value="January">January
                    </option>
                    <option <?php if($p[0]=="February") echo "selected";?> value="February">February
                    </option>
                    <option <?php if($p[0]=="March") echo "selected";?> value="March">March
                    </option>
                    <option <?php if($p[0]=="April") echo "selected";?> value="April">April
                    </option>
                    <option <?php if($p[0]=="May") echo "selected";?> value="May">May
                    </option>
                    <option <?php if($p[0]=="June") echo "selected";?> value="June">June
                    </option>
                    <option <?php if($p[0]=="July") echo "selected";?> value="July">July
                    </option>
                    <option <?php if($p[0]=="August") echo "selected";?> value="August">August
                    </option>
                    <option <?php if($p[0]=="September") echo "selected";?> value="September">September
                    </option>
                    <option <?php if($p[0]=="October") echo "selected";?> value="October">October
                    </option>
                    <option <?php if($p[0]=="November") echo "selected";?> value="November">November
                    </option>
                    <option <?php if($p[0]=="December") echo "selected";?> value="December">December
                    </option>
                  </select>
                  <select name="start-year" class="form-control" aria-label="end" aria-describedby="basic-addon1">
                    <?php 
    $y=date("Y");
    //echo $y;
while($y>2000){
  ?>
                    <option <?php if($p[1]==$y) echo "selected";?> value="<?php echo $y; ?>"><?php echo $y; ?></option>
                    <?php
  $y--;
}
    ?>

                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="form-check form-switch">
                    <input name="curr" value="yes" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked<?php echo $key1; ?>"
                      onclick="myFunction3('<?php echo $key1; ?>')" <?php if($row['end']=="current") echo "checked";?>>
                    <label class="form-check-label" for="flexSwitchCheckChecked<?php echo $key1; ?>">Are You Currently Working here?</label>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">End Date </span>
                  <select id="end-month-edit<?php echo $key1; ?>" name="end-month" class="form-control" aria-label="start"
                    aria-describedby="basic-addon1" 
                    <?php if($row['end']=="current") echo "disabled";?> >
                    <option <?php if(isset($p1) && $p1[0]=="January") echo "selected";?> value="January">January
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="February") echo "selected";?> value="February">February
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="March") echo "selected";?> value="March">March
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="April") echo "selected";?> value="April">April
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="May") echo "selected";?> value="May">May
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="June") echo "selected";?> value="June">June
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="July") echo "selected";?> value="July">July
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="August") echo "selected";?> value="August">August
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="September") echo "selected";?> value="September">September
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="October") echo "selected";?> value="October">October
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="November") echo "selected";?> value="November">November
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="December") echo "selected";?> value="December">December
                    </option>
                  </select>
                  <select <?php if($row['end']=="current") echo "disabled";?>  name="end-year" id="end-year-edit<?php echo $key1; ?>" class="form-control" aria-label="end"
                    aria-describedby="basic-addon1">
                    <?php 
    $y=date("Y");
    //echo $y;
while($y>2000){
  ?>
                    <option <?php if(isset($p1) && $p1[1]==$y) echo "selected";?> value="<?php echo $y; ?>"><?php echo $y; ?></option>
                    <?php
  $y--;
}
    ?>

                  </select>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Position</span>
                  <input value="<?php echo $row['position']; ?>
" name="pos" type="text" class="form-control" placeholder="" aria-label="Position"
                    aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text">Details</span>
                  <textarea name="details" class="form-control" aria-label="details"><?php echo $row['details']; ?>
</textarea>

                </div>
                <input type="hidden" name="h-certi" value="<?php echo $row['certificate'];?>">
                <div style="display: none;" class="input-group mb-3 " id="ci<?php echo $key1 ?>">
                  <span class="input-group-text">Certificate</span>
                  <input name="certificate" type="file" class="form-control" placeholder="" aria-label="Position"
                    aria-describedby="basic-addon1">
                </div>



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="edit-intern" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>
        </div>

      </div>

          </div>


          <div class="col-lg-6 working-role">
            <?php echo $row['position']; ?>


          </div>
        </div>
        <div class="internship-info">
          <p><?php echo $row['details']; ?>
          </p>

        </div>
        <div class="internship-info">
          <a target="_blank" href="uploads/<?php echo $row['offer-letter'];?>">See Offer Letter</a>
           <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal-of<?php echo $key1; ?>">
          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        </button>
         <div class="modal fade" id="exampleModal-of<?php echo $key1; ?>" tabindex="-1" aria-labelledby="exampleModalLabel-of<?php echo $key1; ?>" aria-hidden="true">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Offer Letter</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data">
              <div class="modal-body"> 
<div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Offer Letter</span>
                  <input required name="offer" type="file" class="form-control" placeholder="" aria-label="Position"
                    aria-describedby="basic-addon1">
                </div>
               <input type="hidden" value="<?php echo $key1; ?>" name="id">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="edit-offer" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
        </div>

      </div>
          <?php
if ( isset($row['certificate']) && $row['certificate']!='-') {
 ?>
<a target="_blank" href="uploads/<?php echo $row['certificate'];?>">See Certificate</a>
  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal-ce<?php echo $key1; ?>">
          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        </button>
         <div class="modal fade" id="exampleModal-ce<?php echo $key1; ?>" tabindex="-1" aria-labelledby="exampleModalLabel-ce<?php echo $key1; ?>" aria-hidden="true">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Certificate</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data">
              <div class="modal-body"> 
<div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Certificate</span>
                  <input required name="certificate" type="file" class="form-control" placeholder="" aria-label="Position"
                    aria-describedby="basic-addon1">
                </div>
               <input type="hidden" value="<?php echo $key1; ?>" name="id">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="edit-c" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
        </div>

      </div>
 <?php
}
          ?>

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
                  <input required type="text" name="project-name" class="form-control" placeholder=""
                    aria-label="company-name" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Start Date </span>
                  <select name="start-month-pro" class="form-control" aria-label="start" aria-describedby="basic-addon1">
                    <option value="January">January
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
                  <select name="start-year-pro" class="form-control" aria-label="end" aria-describedby="basic-addon1">
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
                    <input name="curr-pro" value="yes" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked1"
                      onclick="myFunction1()" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked1">Are You Currently Working on this project? </label>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">End Date </span>
                  <select id="end-month-pro" name="end-month-pro" class="form-control" aria-label="start"
                    aria-describedby="basic-addon1" disabled>
                    <option value="January">January
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
                  <select name="end-year-pro" disabled id="end-year-pro" class="form-control" aria-label="end"
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
                  <input name="asso" type="text" class="form-control" placeholder="" aria-label="Associated With"
                    aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Project URL</span>
                  <input name="pro-url" type="url" class="form-control" placeholder="" aria-label="Project URL"
                    aria-describedby="basic-addon1">
                </div>

                <div class="input-group">
                  <span class="input-group-text">Abstract</span>
                  <textarea rows="5" cols="40" name="details" class="form-control" aria-label="details" maxlength="200"></textarea>
                </div>



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="add-pro" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>
        </div>

      </div>


      <?php
$ref7="student/".$_SESSION['id']."/";
$fetchdata7=$database->getReference($ref7)->getSnapshot();

if($fetchdata7->hasChild("projects")){
$ref8="student/".$_SESSION['id']."/projects/";
$fetchdata8=$database->getReference($ref8)->getValue();
foreach($fetchdata8 as $key1=>$row){
$str = $row['start'];
unset($p1);
      $p=array();
 $p=(explode(",",$str));
    $str1 = $row['end'];
    if($str1!="current"){
      $p1=array();
    
 $p1=(explode(",",$str1));
}
?>
      <div class="full-internship-deets">
        <div class="row basic-internship-deets">
          <div class="col-lg-6 company-name">
            <?php echo $row['project']; ?>

          </div>
          <div class="col-lg-4 working-date">
            <?php echo $row['start']; ?>
            -
            <?php echo $row['end']; ?>



          </div>
          <div class="col-lg-1 float-right">
            <form method="post" >
            <input type="hidden" name="id" value="<?php echo $key1; ?>">
            <button type="submit" name="delp" class="btn add-internship-btn" >
          <i class="fa fa-trash-o" aria-hidden="true"></i>
        </button>
      </form>
      </div>
          <div class="col-lg-1 float-right">
           <button type="button" class="btn add-project-btn" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $key1; ?>">
          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

        </button> 
          <div class="modal fade" id="exampleModal<?php echo $key1; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $key1; ?>" aria-hidden="true">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Edit Project</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
              <div class="modal-body">
                <input type="hidden" name="id" value="<?php echo $key1; ?>">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Project Name</span>
                  <input value="<?php echo $row['project']; ?>" required type="text" name="project-name" class="form-control" placeholder=""
                    aria-label="company-name" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Start Date </span>
                  <select name="start-month-pro" class="form-control" aria-label="start" aria-describedby="basic-addon1">
                    <option <?php if($p[0]=="January") echo "selected";?> value="January">January
                    </option>
                    <option <?php if($p[0]=="February") echo "selected";?> value="February">February
                    </option>
                    <option <?php if($p[0]=="March") echo "selected";?> value="March">March
                    </option>
                    <option <?php if($p[0]=="April") echo "selected";?> value="April">April
                    </option>
                    <option <?php if($p[0]=="May") echo "selected";?> value="May">May
                    </option>
                    <option <?php if($p[0]=="June") echo "selected";?> value="June">June
                    </option>
                    <option <?php if($p[0]=="July") echo "selected";?> value="July">July
                    </option>
                    <option <?php if($p[0]=="August") echo "selected";?> value="August">August
                    </option>
                    <option <?php if($p[0]=="September") echo "selected";?> value="September">September
                    </option>
                    <option <?php if($p[0]=="October") echo "selected";?> value="October">October
                    </option>
                    <option <?php if($p[0]=="November") echo "selected";?> value="November">November
                    </option>
                    <option <?php if($p[0]=="December") echo "selected";?> value="December">December
                    </option>
                  </select>
                  <select name="start-year-pro" class="form-control" aria-label="end" aria-describedby="basic-addon1">
                    <?php 
$y=date("Y");
//echo $y;
while($y>2000){
?>
                    <option <?php if($p[1]==$y) echo "selected";?> value="<?php echo $y; ?>"><?php echo $y; ?></option>
                    <?php
$y--;
}
?>

                  </select>
                </div>
                <div class="input-group mb-3">

                  <div class="form-check form-switch">
                    <input name="curr-pro" value="yes" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked<?php echo $key1; ?>"
                      onclick="myFunction4('<?php echo $key1; ?>')" <?php if($row['end']=="current") echo "checked";?>>
                    <label class="form-check-label" for="flexSwitchCheckChecked<?php echo $key1; ?>">Are You Currently Working on this project? </label>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">End Date </span>
                  <select id="end-prom-edit<?php echo $key1; ?>" name="end-month-pro" class="form-control" aria-label="start"
                    aria-describedby="basic-addon1" <?php if($row['end']=="current") echo "disabled";?> >
                    <option <?php if(isset($p1) && $p1[0]=="January") echo "selected";?> value="January">January
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="February") echo "selected";?> value="February">February
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="March") echo "selected";?> value="March">March
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="April") echo "selected";?> value="April">April
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="May") echo "selected";?> value="May">May
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="June") echo "selected";?> value="June">June
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="July") echo "selected";?> value="July">July
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="August") echo "selected";?> value="August">August
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="September") echo "selected";?> value="September">September
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="October") echo "selected";?> value="October">October
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="November") echo "selected";?> value="November">November
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="December") echo "selected";?> value="December">December
                    </option>
                  </select>
                  <select name="end-year-pro" <?php if($row['end']=="current") echo "disabled";?>  id="end-proe-edit<?php echo $key1; ?>" class="form-control" aria-label="end"
                    aria-describedby="basic-addon1">
                    <?php 
$y=date("Y");
//echo $y;
while($y>2000){
?>
                    <option <?php if(isset($p1) && $p1[1]==$y) echo "selected";?> value="<?php echo $y; ?>"><?php echo $y; ?></option>
                    <?php
$y--;
}
?>

                  </select>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Associated With</span>
                  <input value="<?php echo $row['associated']; ?>" name="asso" type="text" class="form-control" placeholder="" aria-label="Associated With"
                    aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Project URL</span>
                  <input value="<?php echo $row['project-url']; ?>" name="pro-url" type="url" class="form-control" placeholder="" aria-label="Project URL"
                    aria-describedby="basic-addon1">
                </div>

                <div class="input-group">
                  <span class="input-group-text">Details</span>
                  <textarea name="details" class="form-control" aria-label="details"><?php echo $row['details']; ?></textarea>
                </div>



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="edit-pro" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
        </div>

      </div>
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
              <input required type="text" name="title" class="form-control" placeholder=""
                aria-label="company-name" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Issue Date </span>
              <select name="start-month-certi" class="form-control" aria-label="start" aria-describedby="basic-addon1">
                <option value="January">January
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
              <select name="start-year-certi" class="form-control" aria-label="end" aria-describedby="basic-addon1">
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
                <input name="curr-certi" value="yes" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked2"
                  onclick="myFunction2()" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked2">This credentail does not expire </label>
              </div>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Expiration Date </span>
              <select id="end-month-certi" name="end-month-certi" class="form-control" aria-label="start"
                aria-describedby="basic-addon1" disabled>
                <option value="January">January
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
              <select name="end-year-certi" disabled id="end-year-certi" class="form-control" aria-label="end"
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
                <select id="or" onclick="or1()" name="issue">
                  <?php
    $ref1="organization/";
    $fetchdata=$database->getReference($ref1)->getValue();
    foreach ($fetchdata as $key => $row) {
    ?>
    <option value=<?php echo $row['name'];?>><?php echo $row['name']; ?></option>
    <?php

  }
  ?>
  <option value="Other">Other</option>

                </select>
            </div>
            <div style="display: none;" class="input-group mb-3" id="name">
              <span class="input-group-text" id="basic-addon1">Name</span>
              <input name="other" type="text" class="form-control" placeholder="" aria-label="Issuing Organization"
                aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Certificate URL</span>
              <input name="certi-url" type="url" class="form-control" placeholder="" aria-label="Certificate URL"
                aria-describedby="basic-addon1">
            </div>

            <div class="input-group">
              <span class="input-group-text">Credential ID</span>
              <input name="credential" type="text" class="form-control" placeholder="" aria-label="Credential ID"
                aria-describedby="basic-addon1">
            </div>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="add-certi" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>

  </div>


  <?php
$ref4="student/".$_SESSION['id']."/";
$fetchdata4=$database->getReference($ref4)->getSnapshot();

if($fetchdata4->hasChild("certificates")){
$ref9="student/".$_SESSION['id']."/certificates/";
$fetchdata9=$database->getReference($ref9)->getValue();
foreach($fetchdata9 as $key1=>$row){
$str = $row['start'];
unset($p1);
      $p=array();
 $p=(explode(",",$str));
    $str1 = $row['end'];
    if($str1!="No expiration Date"){
      $p1=array();
    
 $p1=(explode(",",$str1));
}
?>
  <div class="full-internship-deets">
    <div class="row basic-internship-deets">
      <div class="col-lg-6 company-name">
        <?php echo $row['title']; ?>

      </div>
      <div class="col-lg-4 working-date">
        <?php echo $row['start']; ?>
        -
        <?php echo $row['end']; ?>



      </div>
      <div class="col-lg-1 float-right">
            <form method="post" >
            <input type="hidden" name="id" value="<?php echo $key1; ?>">
            <button type="submit" name="delc" class="btn add-internship-btn" >
          <i class="fa fa-trash-o" aria-hidden="true"></i>
        </button>
      </form>
      </div>
      <div class="col-lg-1 float-right">
        <button type="button" class="btn add-certificates-btn" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $key1; ?>">
      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </button>
      
<div class="modal fade" id="exampleModal<?php echo $key1; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $key1; ?>" aria-hidden="true">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel<?php echo $key1; ?>">Edit Certificate</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post">
          <div class="modal-body">
            <input type="hidden" name="id" value="<?php echo $key1;?>">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Certificate Title</span>
              <input value="<?php echo $row['title']; ?>" required type="text" name="title" class="form-control" placeholder=""
                aria-label="company-name" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Issue Date </span>
              <select name="start-month-certi" class="form-control" aria-label="start" aria-describedby="basic-addon1">
                <option <?php if($p[0]=="January") echo "selected";?> value="January">January
                    </option>
                    <option <?php if($p[0]=="February") echo "selected";?> value="February">February
                    </option>
                    <option <?php if($p[0]=="March") echo "selected";?> value="March">March
                    </option>
                    <option <?php if($p[0]=="April") echo "selected";?> value="April">April
                    </option>
                    <option <?php if($p[0]=="May") echo "selected";?> value="May">May
                    </option>
                    <option <?php if($p[0]=="June") echo "selected";?> value="June">June
                    </option>
                    <option <?php if($p[0]=="July") echo "selected";?> value="July">July
                    </option>
                    <option <?php if($p[0]=="August") echo "selected";?> value="August">August
                    </option>
                    <option <?php if($p[0]=="September") echo "selected";?> value="September">September
                    </option>
                    <option <?php if($p[0]=="October") echo "selected";?> value="October">October
                    </option>
                    <option <?php if($p[0]=="November") echo "selected";?> value="November">November
                    </option>
                    <option <?php if($p[0]=="December") echo "selected";?> value="December">December
                    </option>
              </select>
              <select name="start-year-certi" class="form-control" aria-label="end" aria-describedby="basic-addon1">
                <?php 
$y=date("Y");
//echo $y;
while($y>2000){
?>
                <option <?php if($p[1]==$y) echo "selected";?> value="<?php echo $y; ?>"><?php echo $y; ?></option>
                <?php
$y--;
}
?>

              </select>
            </div>
            <div class="input-group mb-3">
              <div class="form-check form-switch">
                <input name="curr-certi" value="yes" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked<?php echo $key1; ?>" onclick="myFunction5('<?php echo $key1; ?>')" <?php if($row['end']=="No expiration Date") echo "checked";?>>
                <label class="form-check-label" for="flexSwitchCheckChecked<?php echo $key1; ?>">This credentail does not expire </label>
              </div>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Expiration Date </span>
              <select id="end-cerm-edit<?php echo $key1; ?>" name="end-month-certi" class="form-control" aria-label="start"
                aria-describedby="basic-addon1" <?php if($row['end']=="No expiration Date") {echo "disabled";}?>>
                <option <?php if(isset($p1) && $p1[0]=="January") echo "selected";?> value="January">January
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="February") echo "selected";?> value="February">February
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="March") echo "selected";?> value="March">March
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="April") echo "selected";?> value="April">April
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="May") echo "selected";?> value="May">May
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="June") echo "selected";?> value="June">June
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="July") echo "selected";?> value="July">July
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="August") echo "selected";?> value="August">August
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="September") echo "selected";?> value="September">September
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="October") echo "selected";?> value="October">October
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="November") echo "selected";?> value="November">November
                    </option>
                    <option <?php if(isset($p1) && $p1[0]=="December") echo "selected";?> value="December">December
                    </option>
              </select>
              <select name="end-year-certi" <?php if($row['end']=="No expiration Date") {echo "disabled";}?> id="end-cere-edit<?php echo $key1; ?>" class="form-control" aria-label="end"
                aria-describedby="basic-addon1">
                <?php 
$y=date("Y");
//echo $y;
while($y>2000){
?>
                <option <?php if(isset($p1) && $p1[1]==$y) echo "selected";?>  value="<?php echo $y; ?>"><?php echo $y; ?></option>
                <?php
$y--;
}
?>

              </select>
            </div>
<div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Issuing Organization</span>
                <select id="or<?php echo $key1; ?>" onclick="or12('<?php echo $key1; ?>')" name="issue">
                  <?php
    $ref1="organization/";
    $fetchdata=$database->getReference($ref1)->getValue();
    foreach ($fetchdata as $key => $row1) {
    ?>
    <option <?php if ($row1['name']==$row['issued-by']) {
      echo "selected";
    }?> value=<?php echo $row1['name'];?>><?php echo $row1['name']; ?></option>
    <?php

  }
  ?>
  <option value="Other">Other</option>

                </select>
            </div>
            <div style="display: none;" class="input-group mb-3" id="name<?php echo $key1; ?>">
              <span class="input-group-text" id="basic-addon1">Name</span>
              <input name="other" type="text" class="form-control" placeholder="" aria-label="Issuing Organization"
                aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Certificate URL</span>
              <input value="<?php echo $row['certificate-url']; ?>" name="certi-url" type="url" class="form-control" placeholder="" aria-label="Certificate URL"
                aria-describedby="basic-addon1">
            </div>

            <div class="input-group">
              <span class="input-group-text">Credential ID</span>
              <input value="<?php echo $row['id']; ?>" name="credential" type="text" class="form-control" placeholder="" aria-label="Credential ID"
                aria-describedby="basic-addon1">
            </div>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="edit-certi" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>

  </div>
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
      document.getElementById("c").style.display = "none";
    } else {
      document.getElementById("end-year").disabled = false;
      document.getElementById("end-month").disabled = false;
      document.getElementById("c").style.display = "flex";
    }


  }

  function myFunction1() {
    if (document.getElementById('flexSwitchCheckChecked1').checked) {
      document.getElementById("end-year-pro").disabled = true;
      document.getElementById("end-month-pro").disabled = true;
    } else {
      document.getElementById("end-year-pro").disabled = false;
      document.getElementById("end-month-pro").disabled = false;
    }


  }
  function myFunction2() {
    if (document.getElementById('flexSwitchCheckChecked2').checked) {
      document.getElementById("end-year-certi").disabled = true;
      document.getElementById("end-month-certi").disabled = true;
    } else {
      document.getElementById("end-year-certi").disabled = false;
      document.getElementById("end-month-certi").disabled = false;
    }


  }

  function myFunction3(id) {
   var c="flexSwitchCheckChecked";
   //var d=id;
   var t="ci";
   var i=t + id;
   var res=c + id;
   console.log(res);
var e="end-year-edit";
var f=e + id;
var g="end-month-edit";
var h=g + id;
    if (document.getElementById(res).checked) {
      document.getElementById(f).disabled = true;
      document.getElementById(h).disabled = true;
       document.getElementById(i).style.display = "none";
    } else {
      document.getElementById(f).disabled = false;
      document.getElementById(h).disabled = false;
      document.getElementById(i).style.display = "flex";
    }


  }
  function myFunction4(id) {
   var c="flexSwitchCheckChecked";
   //var d=id;
   var res=c + id;
   console.log(res);
var e="end-proe-edit";
var f=e + id;
var g="end-prom-edit";
var h=g + id;
    if (document.getElementById(res).checked) {
      document.getElementById(f).disabled = true;
      document.getElementById(h).disabled = true;
    } else {
      document.getElementById(f).disabled = false;
      document.getElementById(h).disabled = false;
    }


  }

  function myFunction5(id) {
   var c="flexSwitchCheckChecked";
   //var d=id;
   var res=c + id;
   console.log(res);
var e="end-cere-edit";
var f=e + id;
var g="end-cerm-edit";
var h=g + id;
    if (document.getElementById(res).checked) {
      document.getElementById(f).disabled = true;
      document.getElementById(h).disabled = true;
    } else {
      document.getElementById(f).disabled = false;
      document.getElementById(h).disabled = false;
    }


  }

  function or1(){
    var o=document.getElementById("or").value;
    if(o=="Other"){
      document.getElementById("name").style.display = "flex";
    }else{
      document.getElementById("name").style.display = "none";
    }
  }
  function or12(id){
    var c="or";
   var d="name";
   var res=c + id;
   var e=d + id;
    var o=document.getElementById(res).value;
    if(o=="Other"){
      document.getElementById(e).style.display = "flex";
    }else{
      document.getElementById(e).style.display = "none";
    }
  }
</script>