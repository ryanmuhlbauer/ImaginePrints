<?php
session_start();
include("connection.php");
?>
<html>
<head>
  <?php include("head.html"); ?>
  <script type="text/javascript">
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
    ccnumber.oninput = function() {
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
      var fname = document.getElementById("fname").value;
      var lname = document.getElementById("lname").value;
      var zip = document.getElementById("zip").value;
      var state = document.getElementById("state").value;
      var city = document.getElementById("city").value;
      var ccnumber = document.getElementById("ccnumber").value;
      var expDate = document.getElementById("expDate").value;
      var ccv = document.getElementById("ccv").value;
      var numberOfShirts = document.getElementById("numberOfShirts").value;
      var amount = document.getElementById("amount").value;
      var errorMsg = document.getElementById("result-msg");

      if(!fname || !lname || !zip || !state || !city || !ccnumber || !expDate ||
        !ccv) {
          window.alert("You have empty fields that are required!");
          $("#information-form").validator('validate');
          $("#payment-form").validator('validate');
          e.preventDefault();
          return;
        } else {
          $.ajax({
            type: 'POST',
            url: 'submitOrder.php',
            data: 'fname=' + fname + '&lname=' + lname + '&zip=' + zip + '&state=' + state +
              '&city=' + city + '&ccnumber=' + ccnumber + '&expDate=' + expDate + '&ccv=' + ccv +
              '&numItems=' + numberOfShirts + '&amount=' + amount + '&img=' + fileUploadUrl,
            success: function(data) {
              if(data == "success") {
                $("#information-form").validator('destroy');
                $("#payment-form").validator('destroy');
              } else {
                msg = "<p class='text-danger'>Something went wrong!</p>";
                result.innerHTML = msg;
                $('html, body').animate({
                  scrollTop: $("#return-msg").offset().top
                }, 2000);
                return;
                e.preventDefault();
              }
            }
          });
        }
    });
  });

  </script>
</head>
<body>
  <?php
  if(empty($_SESSION['username'])) {
    include("unauthorized-nav.html");
  } else {
    include("authorized-nav.html");
  }
  ?>

  <div class="container">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <img src="" class="img-thumbnail img-cart" />
          </td>
          <td>
            <input type="number" class="form-control" id="quantity" />
          </td>
          <td>

          </td>
          <td>

          </td>
        </tr>
      </tbody>
    </table>
    <div class="well">
      <form class="form-horizontal" data-toggle="validator" role="form" id="information-form">
        <h4>Shipping Information:</h4>
        <hr />
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
          <div class="col-sm-2">
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
            <input type="tel" class="form-control" id="ccnumber" name="ccnumber"
              data-required-error=" " required>
          </div>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors">
          </div>
        </div>
        <div class="form-group has-feedback">
          <label for="expDate" class="col-md-2 control-label">Expiration Date</label>
          <div class="col-md-4">
            <input type="number" class="form-control" id="expDate" placeholder="MM/YY"
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
        <div class="col-xs-8 col-xs-offset-2 text-center">
          <button type="button" id="submit" class="btn btn-primary btn-block">Submit Order</button>
        </div>
      </div>
    </div>
  </div>


  <?php include("scripts.html"); ?>
</body>
