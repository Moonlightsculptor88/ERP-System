<?php

if (!isset($_SESSION['id']) || empty($_SESSION['id']) || $_SESSION['type']!=2) {
          header('Location:../login.php');

}

?>