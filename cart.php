<?php
session_start();
include("connection.php");
?>
<html>
<head>
  <?php
  include("head.html");
  ?>
  <script type="text/javascript" src="lib/bootstrap-validator/dist/validator.min.js"></script>
  <script type="text/javascript">
  var numProductsInCart = 0;
  $(document).ready(function () {
      var zip = document.getElementById("zip");
      zip.oninput = function() {
        if(this.value.length > 5) {
          this.value = this.value.slice(0,5);
        }
      }

      var ccnumber = document.getElementById("ccnumber");
      ccnumber.oninput = function() {
        if(this.value.length > 16) {
          this.value = this.value.slice(0,16);
        }
      }

      var expDate = document.getElementById("expDate");
      expDate.oninput = function() {
        if(this.value.length > 5) {
          this.value = this.value.slice(0,5);
        }
      }

      var ccv = document.getElementById("ccv");
      ccv.oninput = function() {
        if(this.value.length > 3) {
          this.value = this.value.slice(0,3);
        }
      }
      $("#ccnumber").keyup(function() {
        $("#ccnumber").val(this.value.match(/[0-9]*/));
      });

      $("#ccv").keyup(function() {

        $("#ccv").val(this.value.match(/[0-9]*/));
      });

      $("#submit").click(function(e) {
        var email = document.getElementById("email").value;
        var fname = document.getElementById("fname").value;
        var lname = document.getElementById("lname").value;
        var zip = document.getElementById("zip").value;
        var state = document.getElementById("state").value;
        var city = document.getElementById("city").value;
        var ccnumber = document.getElementById("ccnumber").value;
        var expDate = document.getElementById("expDate").value;
        var re = /^(?:0?[1-9]|1[0-2]) *\/ *[1-9][0-9]$/;
        if(!expDate.match(re)){
          window.alert("Expire date format is not correct!");
          return
          e.preventDefault();
        }
        var ccv = document.getElementById("ccv").value;

        var errorMsg = document.getElementById("result-msg");

        if(!email || !fname || !lname || !zip || !state || !city || !ccnumber || !expDate ||
          !ccv) {
            window.alert("You have empty fields that are required!");
            $("#information-form").validator('validate');
            $("#payment-form").validator('validate');
            e.preventDefault();
            return;
          }
          else if(!expDate.match(/(0[1-9]|1[0-2])[/][0-9]{2}/)){
            window.alert("Expire date format is not correct!");
            return
            e.preventDefault();
          }
          else {
            for(var i = 1; i <= numProductsInCart; i++) {
              var getid = "numProducts" + i;
              var temp = document.getElementById(getid.toString());
              var numProducts = temp.value;

              var getid2 = "amount" + i;
              var temp2 = document.getElementById(getid2.toString());
              var amount = temp2.value;

              var getid3 = "productName" + i;
              var temp3 = document.getElementById(getid3.toString());
              var productName = temp3.value;

              var getid4 = "graphic" + i;
              var temp4 = document.getElementById(getid4.toString());
              var graphic = temp4.value;

              console.log(email);

              if(graphic !== 'undefined') {
                $.ajax({
                  type: 'POST',
                  url: 'submitOrder.php',
                  data: 'email=' + email + '&fname=' + fname + '&lname=' + lname + '&zip=' + zip + '&state=' + state +
                    '&city=' + city + '&ccnumber=' + ccnumber + '&expDate=' + expDate + '&ccv=' + ccv +
                    '&numItems=' + numProducts + '&amount=' + amount + '&productName=' + productName + '&graphic=' + graphic,
                  success: function(data) {
                  }
                });
              } else {
                $.ajax({
                  type: 'POST',
                  url: 'submitOrder.php',
                  data: 'email=' + email + '&fname=' + fname + '&lname=' + lname + '&zip=' + zip + '&state=' + state +
                    '&city=' + city + '&ccnumber=' + ccnumber + '&expDate=' + expDate + '&ccv=' + ccv +
                    '&numItems=' + numProducts + '&amount=' + amount + '&productName=' + productName,
                  success: function(data) {
                  }
                });
              }
            }
            window.location.href="clearCart.php";
          }
      });

  });

  </script>
</head>
<body>
  <?php
  if(empty($_SESSION['email'])) {
    include("unauthorized-nav.php");
  } else {
    include("authorized-nav.php");
  }
  ?>

  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">
        Your Shopping Cart <i class="fa fa-shopping-cart fa-fw"></i>
      </div>
      <div class="panel-body">
        <?php
          if(empty($_SESSION['cartItems']) == 0) {
        ?>
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center" style="width: ">Product</th>
              <th class="text-center">Details</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Price</th>
              <th class="text-center">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total_amount = 0;
            $count_items = 0;
            if(isset($_SESSION['cartItems'])) {
              foreach ($_SESSION['cartItems'] as $arr) {
                foreach ($arr as $count=>$value) {
                  echo '<tr>';
                  echo '<script type="text/javascript">numProductsInCart++;</script>';
                  $index = 0;
                  $count_items++;
                  foreach ($value as $k=>$v) {
                    $index++;
                    if($index == 1) { // Gets the product name to save into orders
                      echo '<input type="hidden" id="productName'.$count_items.'" value="'.$v.'" />';
                    }
                    else if($index == 3) { // Gets the number of products to save into orders
                      echo '<td class="text-center" style="vertical-align: middle;">
                      <input type="number" class="form-control text-center" id="numProducts'.$count_items.'" value="'.$v.'" />
                      </td>';
                    }
                    else if($index == 5) {
                      $total_amount = $total_amount + $v;
                      echo '<input type="hidden" id="amount'.$count_items.'" value="'.$v.'" />';
                    }
                    else if($index == 6) {
                      echo '<td class="text-center" style="vertical-align: middle;">
                      <img class="img-thumbnail img-cart" src='.$v.' />
                      </td>';
                    }
                    else if($index == 7 && $v !== 'undefined') {
                      echo '<td class="text-center" style="vertical-align: middle;">
                      <img class="img-thumbnail img-cart" src='.$v.' />
                      </td>';
                      echo '<input type="hidden" id="graphic'.$count_items.'" value="'.$v.'" />';
                    }
                    else if($index == 7 && $v == 'undefined') {
                      echo '<td class="text-center" style="vertical-align: middle;">
                      No Graphic Added
                      </td>';
                      echo '<input type="hidden" id="graphic'.$count_items.'" value="'.$v.'" />';
                    }
                    else {
                      echo '<td class="text-center" style="vertical-align: middle;">
                      '.$v.'
                      </td>';
                    }
                  }
                  echo '</tr>';
                }
              }
            }
            ?>
          </tbody>
        </table>
        <?php
      } else {
        echo '<div class="text-center">
        <h4>No items in your shopping cart yet!</h4>
        </div>';
      }
        ?>
      </div>
      <?php
        if(empty($_SESSION['cartItems']) == 0) {
      ?>
      <div class="panel-footer">
        <div class="text-center">
          <h4>Order Total: $<?php echo $total_amount; ?>.00</h4>
        </div>
      </div>
      <?php
    }
    ?>
    </div>
    <div class="well">
      <?php
        if(!isset($_SESSION['email'])) {
          echo '<div class="text-center">
          <h4>Please <a href="login.php">Login</a> or <a href="register.php">Register</a> to submit this order!</h4>
          </div>';
        }
      ?>
      <form class="form-horizontal" data-toggle="validator" role="form" id="information-form">
        <h4>Shipping Information:</h4>
        <hr />
        <?php
          if(isset($_SESSION['email'])) {
            echo '<div class="form-group has-feedback">
              <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="email" value="'.$_SESSION['email'].'" data-required-error=" " required>
              </div>
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              <div class="help-block with-errors text-center">
              </div>
            </div>';
          } else {
            echo '<div class="form-group has-feedback">
              <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" data-required-error=" " required>
              </div>
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              <div class="help-block with-errors text-center">
              </div>
            </div>';
          }
        ?>
        <div class="form-group has-feedback">
          <label for="fname" class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-10">
            <input type="fname" class="form-control"  id="fname" data-required-error=" " required>
          </div>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors text-center">
          </div>
        </div>
        <div class="form-group has-feedback">
          <label for="lname" class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-10">
            <input type="lname" class="form-control" id="lname" data-required-error=" " required>
          </div>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors text-center">
          </div>
        </div>
        <div class="form-group has-feedback">
          <label for="address" class="col-sm-2 control-label">Address</label>
          <div class="col-sm-10">
            <input type="address" class="form-control" id="address" data-required-error=" " required>
          </div>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors text-center">
          </div>
        </div>
        <div class="form-group has-feedback">
          <label for="zip" class="col-sm-2 control-label">ZIP</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="zip" data-required-error=" "
              required>
          </div>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors text-center">
          </div>
        </div>
        <div class="form-group has-feedback">
          <label for="state" class="col-sm-2 control-label">State</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="state" data-required-error=" " required>
          </div>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors text-center">
          </div>
        </div>
        <div class="form-group has-feedback">
          <label for="city" class="col-sm-2 control-label">City</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="city" data-required-error=" " required>
          </div>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors text-center">
          </div>
        </div>
      </form>
      <form class="form-horizontal" data-toggle="validator" role="form" id="payment-form">
        <h4>Payment Information:</h4>
        <hr />
        <div class="form-group has-feedback">
          <label for="ccnumber" class="col-md-2 control-label">Credit Card Number</label>
          <div class="col-md-4">
            <input type="number" class="form-control" id="ccnumber" name="ccnumber"
              data-required-error=" " required>
          </div>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors">
          </div>
        </div>
        <div class="form-group has-feedback">
          <label for="expDate" class="col-md-2 control-label">Expiration Date</label>
          <div class="col-md-4">
            <input type="text" class="form-control" id="expDate" placeholder="MM/YY"
              data-required-error=" " required>
          </div>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors">
          </div>
        </div>
        <div class="form-group has-feedback">
          <label for="ccv" class="col-md-2 control-label">Security Code</label>
          <div class="col-md-2">
            <input type="text" class="form-control" id="ccv" name="ccv" placeholder="CCV" maxlength="3"
              data-required-error=" " required>
          </div>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors">
          </div>
        </div>
      </form>
      <hr />
      <div class="row">
        <hr />
        <div class="col-xs-8 col-xs-offset-2 text-center">
          <?php
            if(isset($_SESSION['email']) && empty($_SESSION['cartItems']) == 0) {
              echo '<button type="button" id="submit" class="btn btn-primary btn-block">Submit Order</button>';
            } else {
              echo '<button type="button" id="submit" class="btn btn-primary btn-block" disabled>Submit Order</button>';
            }
          ?>
        </div>
      </div>
    </div>
  </div>


  <?php include("scripts.html"); ?>
</body>
