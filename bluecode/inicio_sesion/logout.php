<?php 
include('cn.php');

session_start();

if(isset($_SESSION['id'])){
    session_destroy();
    header('Location:'.$URL.'login.php');
 }else{
    echo "no existe sesion";
  }
?>