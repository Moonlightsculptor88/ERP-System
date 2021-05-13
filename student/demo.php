<?php
session_start();
require_once '../includes/config.php';
$ref="request/";
//$postdata = $database->getReference($ref)->push($data);

$fe=$database->getReference($ref)
    // order the reference's children by the values in the field 'height'
    ->orderByKey()
    
    ->limitToLast(1)
    ->getValue();
    
foreach($fe as $r=>$p){
echo $r;
    
}
?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title></title>
</head>
<body>
<div class="sf_coursehead">
    Upload FileList <a href="#" class="addnew">+ Add New</a> 
           <input type="file" id="upload_input" name="courseAgenda"  />
  </div>
<table id="list_files">
  <tr>
    <td><td>
  </tr>
</table>
</body>
</html>
<script type="text/javascript">
	

  $(document).ready(function() {

 
  $("#upload_input").change(function() {  

     var file_name=$("#upload_input").val(); 
     $("#list_files").append("`<tr><td>`"+file_name+"`</td></tr>`"); 

 

 }); });
 
 </script>
</script>