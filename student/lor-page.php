<?php
session_start();
require_once '../includes/config.php';
require_once 'session.php';

if (isset($_POST['add'])) {
  $student=$_SESSION['id'];
  $dept=$_POST['dept'];
  $lect=$_POST['lect'];
  $purpose=$_POST['purpose'];
  $info=$_POST['info'];

  /*$uniquesavename=time().uniqid(rand());
$filename = $uniquesavename.$_FILES['uploadfile']['name'];
$tempname = $_FILES['uploadfile']['tmp_name'];
$folder = "uploads/".$filename;
if (move_uploaded_file($tempname, $folder)) {
  echo "Image uploaded successfully";
}else {
  echo "Failed to upload image";
}*/
$flag=0;
$date=date("Y-m-d");
$ref1="lor-organization/";
$f=0;
    $fetchdata=$database->getReference($ref1)->getValue();
    foreach ($fetchdata as $key => $row) {
     if($_POST['Organization']==$row['name']){
      $f=1;
     } 

    }

    if($f==0){
      $data2=['name'=>$_POST['Organization']];
      $ref2="lor-organization/";
$postdata1 = $database->getReference($ref2)->push($data2);
    }
  $data=[
  'student_id'=>$student,
  'dept'=>$dept,
  'teacher_id'=>$lect,
  'purpose'=>$purpose,
  'info'=>$info,
  'flag'=>$flag,
  'type'=>$_POST['type'],
  'organization'=>$_POST['Organization'],
  'date'=>$date
];
$ref="request/";
$postdata = $database->getReference($ref)->push($data);

$fe=$database->getReference($ref)
    // order the reference's children by the values in the field 'height'
    ->orderByKey()
    
    ->limitToLast(1)
    ->getValue();
    foreach($fe as $r=>$p){
//echo $r;
    
$rank=1;
for($i=1;$i<=9;$i++){
  $filename=NULL;
  if ( ! isset($_POST['file-type'.$i]) ) continue;
    if ( ! isset($_FILES['uploadfile'.$i]['name']) ) continue;

    $file= $_POST['file-type'.$i];
    $des = $_FILES['uploadfile'.$i]['name'];
$uniquesavename=time().uniqid(rand());
$filename = $uniquesavename.$_FILES['uploadfile'.$i]['name'];
$tempname = $_FILES['uploadfile'.$i]['tmp_name'];
$folder = "uploads/".$filename;
if (move_uploaded_file($tempname, $folder)) {
  //echo "Image uploaded successfully";
}else {
  //echo "Failed to upload image";
}
$data1=[
  'file-type'=>$_POST['file-type'.$i],
  'file-name'=>$filename,
  'file-remark'=>$_POST['remark'.$i]
  ];
  $ref67="request/".$postdata->getKey()."/file";
$postdata1 = $database->getReference($ref67)->push($data1);
//echo $postdata;
$rank++;
}
}

if ($postdata) {
  echo "<script>alert('Request Sent')</script>";

}
}
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="./styles/styles.css" rel="stylesheet">
    <title>ERP System</title>
  </head>
  <body>
 
<div id="full-page">
<?php
require_once 'navbar.php';
?>

<div class="container add-container">
<h3 class="add-heading">Enter Details</h3>
<form method="post" enctype="multipart/form-data">
  

  <div class="my-box" style="display:flex;">

<div class="input-group mb-3 small-input">
  <label class="input-group-text" for="inputGroupSelect01">Lecturer</label>
  <select name="lect" class="form-select" id="inputGroupSelect01">
   <?php
    $ref1="teacher/";
    $fetchdata=$database->getReference($ref1)->getValue();
    foreach ($fetchdata as $key => $row) {
    ?>
    <option value=<?php echo $key;?>><?php echo $row['name']; ?></option>
    <?php

  }
  ?>

  </select>
</div>
<div class="input-group mb-3 small-input">
  <label class="input-group-text " for="inputGroupSelect01">Type</label>
  <select name="type" class="form-select small-input" id="inputGroupSelect014">
   <option value="Higher Education">Higher Education</option>
   <option value="Company">Company</option>
   <option value="Other">Other</option>
  </select>
</div>
<div class="input-group mb-3 small-input">
  <label class="input-group-text " for="Organization">Organization Name</label>
  <input list="Organizations" name="Organization" id="Organization" placeholder="Select or type">
  <datalist id="Organizations">
    
    <?php
    $ref1="lor-organization/";
    $fetchdata=$database->getReference($ref1)->getValue();
    foreach ($fetchdata as $key => $row) {
    ?>
    <option value="<?php echo $row['name'];?>">
    <?php

  }
  ?>
  </datalist>
</div>
</div>

          
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Purpose Of LOR</label>
  <textarea name="purpose" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
</div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Additional Details</label>
  <textarea name="info" placeholder="Eg: I am planning on applying for masters in this course for so and so college for 2022-2024" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>

<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">File Type</label>
  <select onchange="o1()" name="file-type1" class="form-select" id="file-type">
   <option value="Offer Letter"> Offer Letter</option>
<option value="Grade Card">Grade Card</option>
<option value="Other">Other</option>
  </select>
  <button class="btn btn-outline-danger">Delete File</button>
</div>
<div style="display: none;" class="mb-3" id="remark">
  <label for="exampleFormControlTextarea1" class="form-label">Remarks</label>
  <textarea name="remark1" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
</div>

<div class=" choose-file">
<div class="input-group mb-3 ">
  <input type="file" class="form-control "  aria-label="Username" aria-describedby="basic-addon1" name="uploadfile1">
</div>
</div>
<div id="position_fields">
  
</div>
<div>
<input class="btn btn-outline-dark" type="submit" name="poss" id="addPos" value="Add Another file">
</div>
<div class="d-grid gap-2 col-2 mx-auto">
  <button name="add" class="btn btn-primary lor-submit" type="submit">Submit</button>
  
</div></form>

     </div>
     
  
  </body>
</html>
<script type="text/javascript">
  function o1(){
    var o=document.getElementById("file-type").value;
    if(o=="Other"){
      document.getElementById("remark").style.display = "block";
    }else{
      document.getElementById("remark").style.display = "none";
    }
  }
  function o2(id){
    var a="file-type";
    var b= a + id;
    var c="remark";
    var d=c +id;
    var o=document.getElementById(b).value;
    if(o=="Other"){
      document.getElementById(d).style.display = "block";
    }else{
      document.getElementById(d).style.display = "none";
    }
  }
</script>
<script>
countPos = 1;

// http://stackoverflow.com/questions/17650776/add-remove-html-inside-div-using-javascript
$(document).ready(function(){
    window.console && console.log('Document ready called');
    $('#addPos').click(function(event){
        // http://api.jquery.com/event.preventdefault/
        event.preventDefault();
        if ( countPos >= 9 ) {
            alert("Maximum of nine position entries exceeded");
            return;
        }
        countPos++;
        window.console && console.log("Adding position "+countPos);
        $('#position_fields').append(
            '<div class="input-group mb-3" > \
            <label class="input-group-text" for="file-type'+countPos+'">File Type</label> \
            <select onchange="o2('+countPos+')" name="file-type'+countPos+'" class="form-select" id="file-type'+countPos+'"> \
   <option value="Offer Letter"> Offer Letter</option> \
<option value="Grade Card">Grade Card</option> \
<option value="Other">Other</option> \
  </select> \
  </div> \
  <div style="display: none;" class="mb-3 " id="remark'+countPos+'"> \
  <label for="remark'+countPos+'" class="form-label">Remarks</label> \
  <textarea name="remark'+countPos+'" class="form-control" id="remark'+countPos+'" rows="1"></textarea> \
</div> \
<div class="choose-file">\
<div class="input-group mb-3"> \
<input type="file" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" name="uploadfile'+countPos+'">\
            </div></div>');
    });
});
</script>