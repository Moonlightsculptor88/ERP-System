<?php
session_start();
require_once '../includes/config.php';
$ref5="student/".$_SESSION['id']."/internship/";
    $fetchdata5=$database->getReference($ref5)->getvalue();
    foreach ($fetchdata5 as $key => $value) {
    	echo $key;
$ref6="student/".$_SESSION['id']."/internship/".$key."/";
    $fetchdata6=$database->getReference($ref6)->getvalue();
    		
    		echo $fetchdata6['company'];
    		
    	
    }
    
?>