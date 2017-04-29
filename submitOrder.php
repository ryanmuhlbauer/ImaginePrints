<?php
session_start();
include("connection.php");

if($_POST['fname'] && $_POST['lname'] && $_POST['zip'] && $_POST['state']
&& $_POST['city'] && $_POST['ccnumber'] && $_POST['expDate'] && $_POST['ccv']
&& $_POST['numItems'] && $_POST['amount']) {
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
  $image = $_POST['img'];

  $sql = $dbc ->prepare("INSERT INTO orders (`firstName`, `lastName`, `zip`, `state`, `city`, `cardNumber`, `expirationDate`, `numberOfItems`, `amount`, `image`, `ccv`) VALUES ('$first_name', '$last_name', '$zip', '$state', '$city', '$cc_number', '$expiration_date', '$num_items', '$amount', '$image', '$ccv');");

  if ($result = $sql->execute()){
    echo "success";
    $stmt->free_result();
  }
  else {
    echo "error";
  }
}
?>
