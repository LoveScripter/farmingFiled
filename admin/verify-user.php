<?php 
//lets check if User is logged in or not. if not redirect user to login page..
if (!isset($_SESSION['admin_id'])) {
    header("location:login.php");
    exit();
  }
  
?>