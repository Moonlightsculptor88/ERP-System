<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <button class="dropdown-btn">Student
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="student.php">Student Details</a>
    <a href="student-add.php">Add Student</a>
    <a class="notification"  href="lor-req.php"> <div class="lor-status-nav"><?php 
                        $ref1="request/";
    $fetchdata=$database->getReference($ref1)->getValue();
    $b=0;
    foreach ($fetchdata as $key => $row) {

      if($row['teacher_id']==$_SESSION['id'] && $row['flag']==0){
        $b++;
      } }
      echo $b;
                        ?></div>Lor Requests</a>
  </div>
  
  
  
</div>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("full-page").style.paddingLeft = "250px";
  document.getElementById("open").style.display = "none";
}
 

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("full-page").style.paddingLeft = "0";
  document.getElementById("open").style.display = "block";
}
</script>