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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
  <select class="form-select filter-dropdown batch common" aria-label="Default select example" id="batch">
  <option>Batch</option>
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
  <select class="form-select filter-dropdown branch common" aria-label="Default select example" id="branch" disabled>
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
<div>
  <select class="form-select filter-dropdown common" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="all">All</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
</div>


</div>

<div class="container filter_data">
     <div class="row">
      <?php
$ref2="student/";
 //echo $ref2;
    $fetchdata2=$database->getReference($ref2)->getValue();
    foreach($fetchdata2 as $key1=>$row){
      $ref3="branch/".$row['branch']."/";
 //echo $ref2;
    $fetchdata3=$database->getReference($ref3)->getValue();
      ?>
            <div class="col-lg-6  panel-pad-10">
                <div class="panel panel-default">
                  <div class="panel-body">
                  <div class="student-card">
                    <div><ul>
                    <li>Name:  <?php echo $row['name']; ?>
                    </li>
                    <li>
                      Reg-No:  <?php echo $row['reg']; ?>
                    </li>
                    <li>
                      Batch:  <?php echo $row['batch']; ?>
                    </li>
                    <li>
                      Branch:  <?php echo $row['branch']; ?>
                    </li>
                    <li>
                      Section:  <?php echo $row['section']; ?>
                    </li>
                  </ul>
                  <button onclick="location.href='studentinfo.php?id=<?php echo $key1;?>'" type="button" class="btn btn-primary more-info">More Info</button>
                </div>

                  <div class="student-pic">
                    <img class="student-img" src="./img/person.png" alt="some">
                  </div>
                  </div>

                </div>

                </div>
            </div>
            <?php

          }
          ?>

            <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item ">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>




</div>
  </div>
</div>

  </body>

</html>
<script type="text/javascript">
  $(document).ready(function(){

   /*var batch = $('#batch option:selected').val();
   var branch = $('#branch option:selected').val();
   var action = 'fetch_data';
   console.log(batch);*/

$('.common').change(function(){
  var batch = $('#batch option:selected').val();
   var branch = $('#branch option:selected').val();
   var section = $('#section option:selected').val();
   var action = 'fetch_data';
   

   $('.filter_data').html('<div id="loading" style="" ></div>');
            $.ajax({
            url:"search.php",
            method:"POST",
            data:{action:action,batch:batch,branch:branch,section:section},
            success:function(data){
                $('.filter_data').html(data);
                
            }
            });
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