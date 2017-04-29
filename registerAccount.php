<?php
  session_start();
  include("connection.php");

  if($_POST['email'] && $_POST['password']) {

    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['password']));

    $sql = mysqli_query($dbc, "INSERT INTO Accounts (`email`, `password`) VALUES ('".$email."', '".$password."');");
    $_SESSION['email'] = $email;
    $_SESSION['cartItems'] = array();
    echo "success";
  } else {
    echo "error";
  }
?>
