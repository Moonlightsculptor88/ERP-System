<?php
session_start();
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
          header('Location:../login.php');

}
// echo $_SESSION['id'];


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Orelega+One&family=Oswald&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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

              <div class="row" >
                <div class="col-lg-6 text-deets">
                  <div class="module">Name:     Anapalli Mahi Pritam Reddy <br>
                                      Reg-No:   189301104 <br>
                                      DOB:      01/01/2000 <br>
                                      Batch:    2018 <br>
                                      Branch:   CSE <br>

                
                </div>
                  
                </div>

                <div class="col-lg-6 img-deets">
                   <img class="profile-img" src="./img/person.png" alt="">
                 
                </div>

              </div>
                  
</section>


<section id="internship-details">
<div class="container-fluid internship-deets">
 

<h1>Internship Details <!-- Button trigger modal -->
<button type="button" class="btn add-internship-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
 +
</button></h1>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<div class="full-internship-deets">
  <div class="row basic-internship-deets">
    <div class="col-lg-6 company-name">
      GirlScript Foundations

    </div>
    <div class="col-lg-6 working-date">
      Jun-2020 to Sep-2020

    </div>
    <div class="col-lg-6 working-role">
      Software Developer

    </div>
</div>
<div class="internship-info">
 <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

</div></div>


</div>



<div>
  
</div>










</section>








</div>











     
  
  </body>
</html>

