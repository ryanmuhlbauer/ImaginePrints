<?php
session_start();
include("connection.php");
  if($_POST['email'] && $_POST['fname'] && $_POST['lname'] && $_POST['zip'] && $_POST['state']
    && $_POST['city'] && $_POST['ccnumber'] && $_POST['expDate'] && $_POST['ccv']
    && $_POST['numItems'] && $_POST['amount'] && $_POST['graphic']) {
    $email = $_POST['email'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $zip = $_POST['zip'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $cc_number = $_POST['ccnumber'];
    $expiration_date = $_POST['expDate'];
    $ccv = $_POST['ccv'];
    $num_items = $_POST['numItems'];
    $amount = $_POST['amount'];
    $product_name = $_POST['productName'];
    $graphic = $_POST['graphic'];

    $sql = $dbc ->prepare("INSERT INTO orders (`email`, `firstName`, `lastName`, `zip`, `state`, `city`, `cardNumber`, `expirationDate`, `ccv`, `productName`, `numProducts`, `amount`, `graphic`) VALUES ('$email', '$first_name', '$last_name', '$zip', '$state', '$city', '$cc_number', '$expiration_date', '$ccv', '$product_name', '$num_items', '$amount', '$graphic');");

    if ($result = $sql->execute()){
      echo "success";
      $stmt->free_result();
    }
    else {
      echo "error";
    }
  }
  else if ($_POST['email'] && $_POST['fname'] && $_POST['lname'] && $_POST['zip'] && $_POST['state']
    && $_POST['city'] && $_POST['ccnumber'] && $_POST['expDate'] && $_POST['ccv']
    && $_POST['numItems'] && $_POST['amount']) {
    $email = $_POST['email'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $zip = $_POST['zip'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $cc_number = $_POST['ccnumber'];
    $expiration_date = $_POST['expDate'];
    $ccv = $_POST['ccv'];
    $num_items = $_POST['numItems'];
    $amount = $_POST['amount'];
    $product_name = $_POST['productName'];

    $sql = $dbc ->prepare("INSERT INTO orders (`email`, `firstName`, `lastName`, `zip`, `state`, `city`, `cardNumber`, `expirationDate`, `ccv`, `productName`, `numProducts`, `amount`) VALUES ('$email', '$first_name', '$last_name', '$zip', '$state', '$city', '$cc_number', '$expiration_date', '$ccv', '$product_name', '$num_items', '$amount');");

    if ($result = $sql->execute()){
      echo "success";
      $stmt->free_result();
    }
    else {
      echo "error";
    }

  }
?>
