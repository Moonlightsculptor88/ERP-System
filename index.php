<?php
session_start();
require_once 'includes/config.php';
echo $_SESSION['type'];
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
          header('Location:login.php');

}
elseif (isset($_SESSION['type'])  && $_SESSION['type']==3) {
header('Location:admin/index.php');
}
elseif (isset($_SESSION['type']) && $_SESSION['type']==1) {
	header('Location:student/index.php');
}
elseif (isset($_SESSION['type']) && $_SESSION['type']==2) {
header('Location:teacher/index.php');
}


?>