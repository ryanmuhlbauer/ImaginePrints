<?php
  include("connection.php");
  if($_POST['fname'] && $_POST['lname'] && $_POST['content'] ) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $content = $_POST['content'];
    $sql = mysqli_query($dbc, "INSERT INTO reviews (`firstName`, `lastName`, `content`, `date`) VALUES ('".$fname."', '".$lname."', '".$content."', now());");
  }
?>
