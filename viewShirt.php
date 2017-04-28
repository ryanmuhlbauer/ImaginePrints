<?php
session_start();
include("connection.php");
?>
<html>
<head>
  <?php include("head.html"); ?>
  <script type="text/javascript" src="js/fabric.min.js"></script>
  <script type="text/javascript" src="//api.filestackapi.com/filestack.js"></script>
  <script type="text/javascript" src="lib/bootstrap-validator/dist/validator.min.js"></script>
  <script type="text/javascript">
  var img;
  var msg;
  var isDefault = true;
  var fileUploadUrl;

  function upload(path) {
    fileUploadUrl = path;
  }
  function changeImage(path) {
    isDefault = false;
    img = document.getElementById("productImg");
    img.src = path.toString();
  }
  function updateTotal() {
    var select = document.getElementById("numberOfShirts");
    var amount = document.getElementById("amount");
    amount.value = amount.value * select.value;
  }
  $(document).ready(function () {
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
      var errorMsg = document.getElementById("result-msg");

      if(!fname) {
        msg = 'Please enter your first name'
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
    <?php if(!empty($_GET['id'])) {
      $productid = $_GET['id'];
      $sql = mysqli_query($dbc, "SELECT * FROM products WHERE id = '$productid';");
      while($row = mysqli_fetch_array($sql)) {
        $productname = $row['name'];
        $productdescription = $row['description'];
        $productprice = $row['price'];
        $productpath = $row['path'];
      }
    }
    ?>
    <input type="hidden" id="productPath" value="<?php echo $productpath; ?>">
    <?php echo "<a class='btn btn-secondary' href=\"javascript:history.go(-1)\"><i class='fa fa-arrow-circle-o-left fa-fw'></i> GO BACK</a>"; ?>
    <hr />
    <div class="panel panel-primary bg-faded">
      <div class="panel-heading">
        Product Customization
      </div>
      <div class="panel-body">
        <div class="row" id="viewShirt">
          <div class="col-md-4">
            <div class="thumbnail" style="border: 0px;">
              <img src="<?php echo $productpath; ?>" class="img-rounded" id="productImg">
            </div>

          </div>
          <div class="col-md-8">
            <div class="well">
              <h4><?php echo $productname; ?></h4>
              <p>
                <?php echo $productdescription; ?>
              </p>
              <ul class="list-inline">
                <?php
                $sql = mysqli_query($dbc, "SELECT * FROM colors WHERE product_id = '$productid';");
                while($row = mysqli_fetch_array($sql)) {
                  $colorPath = $row['path'];
                  $colorValue = $row['colorValue'];
                  $bgColorValue = $row['hexColorValue'];
                  if($bgColorValue == '#FFFFFF') {
                    echo '<li >
                    <span class="label label-default btn-label" onclick="changeImage(\''.$colorPath.'\')" style="font-size: 1.5rem; background-color: '.$bgColorValue.'; color: #000000; border: 1px solid #000000;">'.$colorValue.'</span>
                    </li>';
                  } else {
                    echo '<li >
                    <span class="label label-default btn-label" onclick="changeImage(\''.$colorPath.'\')" style="font-size: 1.5rem; background-color: '.$bgColorValue.'">'.$colorValue.'</span>
                    </li>';
                  }
                }
                ?>
              </ul>
            </div>
            <div class="list-group-item text-center" style="margin-bottom:10px;">
              <h4>Upload a Graphic to Customize Your Shirts:</h4>
              <input type="filepicker" data-fp-apikey="ABm2Ke0TmuiJ9HhVTgWgUz" data-fp-mimetypes="image/*" data-fp-container="modal" data-fp-services="COMPUTER" onchange="upload(event.fpfile.url)">
            </div>
          </div>
        </div>

        <div class="well" style="margin-top:25px;">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="numberOfShirts">Number of Shirts</label>
                <input type="number" id="numberOfShirts" name="" class="form-control" value="1">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="numberOfShirts">Order Amount</label>
                <div class="input-group">
                  <span class="input-group-addon" style="padding: 0px;"><i class="fa fa-usd fa-fw"></i></span>
                  <input type="text" id="amount" name="amount" class="form-control" style="border:0px; font-size: 2.5rem; background-color: #f5f5f5;" value="<?php echo $productprice; ?>" disabled/>
                </div>

              </div>

            </div>
          </div>
        </div>
        <div class="well">
          <form class="form-horizontal" data-toggle="validator" role="form" id="info-form">
            <h4>Shipping Address:</h4>
            <hr />
            <div class="form-group">
              <label for="fname" class="col-sm-2 control-label">First Name</label>
              <div class="col-sm-10">
                <input type="fname" class="form-control"  id="fname" placeholder="First Name" required>
              </div>
              <div class="help-block with-errors text-center">
              </div>
            </div>
            <div class="form-group">
              <label for="lname" class="col-sm-2 control-label">Last Name</label>
              <div class="col-sm-10">
                <input type="lname" class="form-control" id="lname" placeholder="Last Name" required>
              </div>
              <div class="help-block with-errors text-center">
              </div>
            </div>
            <div class="form-group">
              <label for="address" class="col-sm-2 control-label">Address</label>
              <div class="col-sm-10">
                <input type="address" class="form-control" id="address" placeholder="Address" required>
              </div>
              <div class="help-block with-errors text-center">
              </div>
            </div>
            <div class="form-group">
              <label for="zip" class="col-sm-2 control-label">ZIP</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="zip" placeholder="ZIP" data-maxlength="5" required>
              </div>
              <div class="help-block with-errors text-center">
              </div>
            </div>
            <div class="form-group">
              <label for="state" class="col-sm-2 control-label">State</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="state" placeholder="State" required>
              </div>
              <div class="help-block with-errors text-center">
              </div>
            </div>
            <div class="form-group">
              <label for="city" class="col-sm-2 control-label">City</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="city" placeholder="City" required>
              </div>
              <div class="help-block with-errors text-center">
              </div>
            </div>
          </form>
          <form class="form-horizontal" data-toggle="validator" role="form" id="payment-form">
            <h4>Payment Information:</h4>
            <hr />
            <div class="form-group">
              <label for="ccnumber" class="col-md-2 control-label">Credit Card Number</label>
              <div class="col-md-10">
                <input type="text" class="form-control" id="ccnumber" name="ccnumber" placeholder="Credit Card Number" data-maxlength="16">
              </div>

            </div>
            <div class="form-group">
              <label for="expDate" class="col-md-2 control-label">Expiration Date</label>
              <div class="col-md-10">
                <input type="number" class="form-control" id="expDate" data-maxlength="5" placeholder="MM/YY" required>
              </div>
              <div class="help-block with-errors text-center">
              </div>
            </div>
            <div class="form-group">
              <label for="ccv" class="col-md-2 control-label">Security Code</label>
              <div class="col-md-10">
                <input type="text" class="form-control" id="ccv" name="ccv" placeholder="CCV" data-maxlength="3">
              </div>
              <div class="help-block with-errors text-center">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="button" id="submit" class="btn btn-primary">Submit Order</button>
              </div>
            </div>
          </form>
        </div>

      </div>

    </div>
  </div>
</div>
</body>
</html>
