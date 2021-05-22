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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <link href="./styles/styles.css" rel="stylesheet">
    <title>ERP System</title>
  </head>
  <style type="text/css">
#loading
{
 text-align:center; 
 background: url('loader.gif') no-repeat center; 
 height: 150px;
}

table{
  border: 2px solid black;
}
</style>
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
<div>
  <select name="category" class="form-select filter-dropdown category common" aria-label="Default select example" id="category">
  <option value="Category">Category</option>
  <option value="internship">Internship</option>
  <option value="certificates">Certificate</option>
  <option value="projects">Project</option>
</select>
</div>
<div>
  <select name="batch" class="form-select filter-dropdown batch common" aria-label="Default select example" id="batch" disabled>
  <option value="Batch">Batch</option>
  <option value="all">All</option>
  <?php 
    $y=date("Y");
    //echo $y;
    $y=$y+4;
while($y>2000){
  ?>
                    <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                    <?php
  $y--;
}
    ?>
</select>
</div>
<div>
  <select name="branch" class="form-select filter-dropdown branch common" aria-label="Default select example" id="branch" disabled>
  <option value="Branch">Branch</option>
  <option value="all">All</option>
  <?php
    $ref1="branch/";
    $fetchdata=$database->getReference($ref1)->getValue();
    foreach ($fetchdata as $key => $row) {
    ?>
    <option value="<?php echo $row['name'];?>"><?php echo $row['name']; ?></option>
    <?php

  }
  ?>
</select>
</div>
<div>
  <select class="form-select filter-dropdown section common" aria-label="Default select example" id="section" disabled>
  <option value="Section">Section</option>
  <option value="all">All</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select>
</div>

</div>

<div class="container filter_data">
     <div class="row">
 
</div>
  </div>

  </body>

</html>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.6.2/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.6.2/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyDKeSYOCP5dQi9XloD1eQCrt2M9_jgb9Z0",
    authDomain: "erp-system-8bd84.firebaseapp.com",
    databaseURL: "https://erp-system-8bd84-default-rtdb.firebaseio.com",
    projectId: "erp-system-8bd84",
    storageBucket: "erp-system-8bd84.appspot.com",
    messagingSenderId: "944239993666",
    appId: "1:944239993666:web:7fe5a4eb5ea29665055edb",
    measurementId: "G-W9X41C3P7J"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>


<script type="text/javascript">
  $(document).ready(function(){
$('#example').DataTable({
  "pageLength": 20,
  "searching": false
});
   /*var batch = $('#batch option:selected').val();
   var branch = $('#branch option:selected').val();
   var action = 'fetch_data';
   console.log(batch);*/

$('.common').change(function(){
	var category =$('#category option:selected').val();
  var batch = $('#batch option:selected').val();
   var branch = $('#branch option:selected').val();
   var section = $('#section option:selected').val();
   var action = 'fetch_data';
   

   $('.filter_data').html('<div id="loading" style="" ></div>');
            $.ajax({
            url:"dash-search.php",
            method:"POST",
            data:{action:action,batch:batch,branch:branch,section:section,category:category},
            success:function(data){
                $('.filter_data').html(data);
                $('#example').DataTable({
  "pageLength": 20,
  "searching": false,
  dom: 'Bfrtip',

        buttons: [
            
            {
              filename: 'report',
         extend: 'excel',
         title : '',
         text: 'Export Search Results',
         className: 'btn btn-default',
         exportOptions: {
            columns: 'th:not(:last-child)'
         }
      }
            
        ]
});
                
            }
            });
});

$('.category').change(function(){
if($('#category option:selected').val() !="Category"){
  $('#batch').removeAttr("disabled");
}
  });

$('.batch').change(function(){
if($('#batch option:selected').val() !="Batch"){
  $('#branch').removeAttr("disabled");
}
  });

$('.branch').change(function(){
if($('#branch option:selected').val() !="Branch"){
  $('#section').removeAttr("disabled");
}
  });

    });

</script>
