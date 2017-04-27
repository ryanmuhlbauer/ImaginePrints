<?php
  session_start();
  include("connection.php");

  if($_POST['username'] && $_POST['email'] && $_POST['password']) {

    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['password']));

    $sql = mysqli_query($dbc, "INSERT INTO Accounts (`username`, `email`, `password`) VALUES ('".$username."', '".$email."', '".$password."');");
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    echo "success";
  } else {
    echo "error";
  }
?>
