<?php
session_start();
include("connection.php");
?>
<html>
<head>
  <?php
  include("head.html");
  ?>
</head>
<body>
  <?php
  if(empty($_SESSION['email'])) {
    include("unauthorized-nav.php");
  } else {
    $email = $_SESSION['email'];
    include("authorized-nav.php");
  }
  ?>

  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">
        Your Completed Transactions <i class="fa fa-shopping-cart fa-fw"></i>
      </div>
      <div class="panel-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center" style="width: ">Product</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Price</th>
              <th class="text-center">Total</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $total_amount = 0;
              $sql = mysqli_query($dbc, "SELECT * FROM orders INNER JOIN products WHERE orders.email = '$email' AND products.name = orders.productName;");
              if(mysqli_num_rows($sql) != 0) {
                while($row = mysqli_fetch_array($sql)) {
                  $product_name = $row['productName'];
                  $num_products = $row['numProducts'];
                  $amount = $row['amount'];
                  $total_amount = $total_amount + $amount;
                  $product_description = $row['description'];
                  $product_img = $row['path'];
                  $product_price = $row['price'];
                  $graphic = $row['graphic'];
                  echo $graphic;
                  if(!isset($graphic)) {
                    echo '<tr>
                    <td class="text-center" style="vertical-align: middle;">
                    '.$product_name.'
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                    '.$num_products.'
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                    '.$product_price.'
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                    '.$amount.'
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                    <img class="img-thumbnail img-cart" src="'.$product_img.'" />
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                    No Graphic Added
                    </td>
                    </tr>';
                  } else {
                    echo '<tr>
                    <td class="text-center" style="vertical-align: middle;">
                    '.$product_name.'
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                    '.$num_products.'
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                    '.$product_price.'
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                    '.$amount.'
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                    <img class="img-thumbnail img-cart" src="'.$product_img.'" />
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                    <img class="img-thumbnail img-cart" src="'.$graphic.'" />
                    </td>
                    </tr>';
                  }
                }
              }
            ?>
          </tbody>
        </table>
      </div>
      <div class="panel-footer">
        <div class="text-center">
          <h4>Paid Amount: $<?php echo $total_amount; ?>.00</h4>
          <br />
          <h4>Order Currently in Transit/Processing <i class="fa fa-truck fa-fw"></i></h4>
        </div>
      </div>
    </div>
  </div>


  <?php include("scripts.html"); ?>
</body>
