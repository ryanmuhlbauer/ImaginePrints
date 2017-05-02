<?php
  session_start();
  include("connection.php");

  if($_POST['productName'] && $_POST['productDesc'] && $_POST['productTotal'] && $_POST['productAmount']) {
    $product_name = $_POST['productName'];
    $product_desc = $_POST['productDesc'];
    $product_total = $_POST['productTotal'];
    $product_amount = $_POST['productAmount'];
    $num_products = $_POST['numProducts'];
    $product_img = $_POST['productImg'];
    if(!empty($_POST['graphic'])) {
      $graphic = $_POST['graphic'];
    } else {
      $graphic = "";
    }
    $cart_item = array(
      array($product_name, $product_desc, $num_products, $product_amount, $product_total, $product_img, $graphic)
    );
    if(isset($_SESSION['cartItems'])) {
      $_SESSION['cartItems'][] = $cart_item;
      echo "set";
    } else {
      $_SESSION['cartItems'] = array();
      $_SESSION['cartItems'][] = $cart_item;
      echo "not set";
    }

  }
?>
