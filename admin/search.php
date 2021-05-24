<?php
session_start();
require_once '../includes/config.php';


if(isset($_POST["action"]))
{
//echo $_POST['batch'];
?>
<div class="row">
<?php
$ref2="student/";
 //echo $ref2;
    $fetchdata2=$database->getReference($ref2)->getValue();
    $obj = json_decode(json_encode($fetchdata2),true);
    foreach($obj as $key1=>$row){
      
if(isset($_POST["section"]) && $_POST["section"]!="all" && $_POST["section"]!="Section")
	{

if($_POST['batch']==$row['batch'] && $_POST['branch']==$row['branch'] && $_POST['section']==$row['section']){
	//echo $_POST['branch'];
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



		}
else if(isset($_POST["branch"]) && $_POST["branch"]!="all" && $_POST["branch"]!="Branch")
	{

if($_POST['batch']==$row['batch'] && $_POST['branch']==$row['branch']){
	//echo $_POST['branch'];
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



		}
else if(isset($_POST["batch"]) && $_POST["batch"]!="all" && $_POST['batch']!="Batch")
	{
	
if($_POST['batch']==$row['batch']){
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



	}

?>

	
<?php

}
?>
</div>
<?php      
}
?>