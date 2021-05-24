<?php
session_start();
require_once '../includes/config.php';


if(isset($_POST["action"]))
{
//echo $_POST['batch'];
?>
<div class="row">
  <table id="example" >
        <thead>
        <tr>
          <th>Name</th>
          <th>Registration Number</th>
          <th>Branch</th>
          <th>Section</th>
          <th>View More</th>
        </tr>
        </thead>
     <tbody>
<?php
$ref2="student/";
 //echo $ref2;
    $fetchdata2=$database->getReference($ref2)->getValue();
    $obj = json_decode(json_encode($fetchdata2),true);
    foreach($obj as $key1=>$row){
      /*$ref4="student/".$key1."/";
$fetchdata4=$database->getReference($ref4)->getSnapshot();
*/
if(isset($row[$_POST['category']])){

    
if(isset($_POST["section"]) && $_POST["section"]!="all" && $_POST["section"]!="Section")
	{

if($_POST['batch']==$row['batch'] && $_POST['branch']==$row['branch'] && $_POST['section']==$row['section']){
	//echo $_POST['branch'];
	?>
<tr>
  <td><?php echo $row['name']; ?></td>
  <td><?php echo $row['reg']; ?></td>
  <td><?php echo $row['branch']; ?></td>
  <td><?php echo $row['section']; ?></td>
  <td><a target="_blank" href="studentinfo.php?id=<?php echo $key1;?>">View</a></td>
</tr>

	<?php

}



		}
else if(isset($_POST["branch"]) && $_POST["branch"]!="all" && $_POST["branch"]!="Branch")
	{

if($_POST['batch']==$row['batch'] && $_POST['branch']==$row['branch']){
	//echo $_POST['branch'];
	?>
<tr>
  <td><?php echo $row['name']; ?></td>
  <td><?php echo $row['reg']; ?></td>
  <td><?php echo $row['branch']; ?></td>
  <td><?php echo $row['section']; ?></td>
  <td><a target="_blank" href="studentinfo.php?id=<?php echo $key1;?>">View</a></td>
</tr>

	<?php

}



		}
else if(isset($_POST["batch"]) && $_POST["batch"]!="all" && $_POST['batch']!="Batch")
	{
	
if($_POST['batch']==$row['batch']){
	?>

<tr>
  <td><?php echo $row['name']; ?></td>
  <td><?php echo $row['reg']; ?></td>
  <td><?php echo $row['branch']; ?></td>
  <td><?php echo $row['section']; ?></td>
  <td><a target="_blank" href="studentinfo.php?id=<?php echo $key1;?>">View</a></td>
</tr>
            <?php
}



	}else{
?>
<tr>
  <td><?php echo $row['name']; ?></td>
  <td><?php echo $row['reg']; ?></td>
  <td><?php echo $row['branch']; ?></td>
  <td><?php echo $row['section']; ?></td>
  <td><a target="_blank" href="studentinfo.php?id=<?php echo $key1;?>">View</a></td>
</tr>

<?php

  }

}

}
?>
</div>
</tbody>
</table>
<?php      
}
?>