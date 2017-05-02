<?php
  session_start();
  include("connection.php");

  if($_POST['email'] && $_POST['password']) {

    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
    $success = false;

    $sql = mysqli_query($dbc, "SELECT * FROM accounts;");
    if(mysqli_num_rows($sql) != 0) {
      while($row = mysqli_fetch_array($sql)) {
        if($email == $row['email'] && $password == $row['password']) {
          $dbemail = $row['email'];
          $success = true;
        }
      }
    }
    if($success == true) {
      $_SESSION['email'] = $dbemail;
      $_SESSION['cartItems'] = array();
      echo "success";
    } else {
      echo "error";
    }
  }
?>
