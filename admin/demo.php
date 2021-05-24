<?php
require_once '../includes/config.php';
$ref2="student/";
 //echo $ref2;
    $fetchdata2=$database->getReference($ref2)->getValue();
//echo json_encode($fetchdata2);
$obj = json_decode(json_encode($fetchdata2),true);
var_dump($obj);
foreach($obj as $key => $value) {
  echo $key;
  echo $value['name'];
  echo $value['reg'];
  if(isset($value['projects'])){
  foreach ($value['projects'] as $pro =>$v) {
  	echo $pro;
      echo $v['project'];
   }
}
echo "<br>";
}
?>