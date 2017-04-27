<?php
  session_start();
  include("connection.php");

  if($_POST['username'] && $_POST['password']) {

    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
    $success = false;

    $sql = mysqli_query($dbc, "SELECT * FROM Accounts;");
    if(mysqli_num_rows($sql) != 0) {
      while($row = mysqli_fetch_array($sql)) {
        if($username == $row['username'] && $password == $row['password']) {
          $email = $row['email'];
          $_SESSION['email'] = $row['email'];
          $success = true;
        }
      }
    }
    if($success == true) {
      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      echo "success";
    } else {
      echo "error";
    }
  }
?>
