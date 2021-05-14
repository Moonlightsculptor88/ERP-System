<?php
session_start();
require_once '../includes/config.php';
require_once 'session.php';

if (isset($_POST['update'])) {
  $reason=$_POST['reason'];
  $id=$_GET['id'];
  $flag=2;
  $data=[
  'flag'=>$flag,
  'reason'=>$reason
];
$ref="request/".$id;
$postdata = $database->getReference($ref)->update($data);
if ($postdata) {
  echo "<script>alert('LOR Rejected')</script>";

}
}
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
    <style type="text/css">
      
      #reason{
        margin-left: 20px;
      }
    </style>
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
  
<div class="row" style="padding-bottom:1%;">
<div class="col-lg-6"><nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="#" class="black">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $fetchdata2['name'];?></li>
  </ol>
</nav> </div>



<div  class="col-lg-6" style="text-align:right;">
    <button onclick="location.href='issue_lor.php?id=<?php echo $_GET['id']?>'" type="button" class="btn btn-primary btn-md">Issue LOR</button>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Reject
</button></div>

</div>


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
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">File Type</th>
      <th scope="col">View File</th>
      <th scope="col">Remarks</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td >Larry the Bird</td>
      <td>@twitter</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
    
    
    <p class="card-text"><span style="font-weight:bold;">Info: </span>This is the info.</p>
<p class="card-text"><span style="font-weight:bold;">Purpose: </span>This is the purpose</p>
<p class="card-text"><span style="font-weight:bold;">Type: </span>This is the purpose</p>
<p class="card-text"><span style="font-weight:bold;">Organization: </span>This is the name</p>


    <button onclick="location.href='issue_lor.php?id=<?php echo $_GET['id']?>'" type="button" class="btn btn-primary btn-md">Issue LOR</button>

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Reject
</button>


  </div>
</div>






</div>









</div>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reject LOR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post">
      <div class="modal-body">
        <label  for="reason">Reason For Rejecting</label>
        
        <input type="text" id="reason" name="reason">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
  </body>
</html>
