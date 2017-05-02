<?php
  session_start();
  $_SESSION['cartItems'] = array();
  header('location: orders.php');
?>
