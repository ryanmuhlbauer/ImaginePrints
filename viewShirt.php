<?php
session_start();
include("connection.php");
?>
<html>
<head>
  <?php include("head.html"); ?>
  <script type="text/javascript" src="js/fabric.min.js"></script>
  <script type="text/javascript" src="//api.filestackapi.com/filestack.js"></script>
  <script type="text/javascript">
  var img;
  var msg;
  var graphic;
  var select;
  var amount;
  var fixedAmount;
  var isDefault = true;
  var numProductsChanged = false;

  function upload(path) {
    select = document.getElementById("numberOfShirts");
    amount = document.getElementById("amount");
    fixedAmount = document.getElementById("fixedAmount").value;
    graphic = path;
    document.getElementById("hasUploaded").classList.remove("hidden");
    document.getElementById("uploadedImg").src = graphic;
    amount.value = (fixedAmount * select.value) + (10 * select.value);
  }
  function changeImage(path) {
    isDefault = false;
    img = document.getElementById("productImg");
    img.src = path.toString();
  }
  function updateTotal() {
    numProductsChanged = true;
    select = document.getElementById("numberOfShirts");
    amount = document.getElementById("amount");
    fixedAmount = document.getElementById("fixedAmount").value;

    if(graphic) {
      amount.value = (fixedAmount * select.value) + (10 * select.value);
    } else {
      amount.value = fixedAmount * select.value;
    }
  }
  $(document).ready(function() {

    $("#cartBtn").click(function(e) {
      fixedAmount = document.getElementById("fixedAmount").value;
      select = document.getElementById("numberOfShirts").value;
      var productName = document.getElementById("productName").value;
      var productDesc = document.getElementById("productDesc").value;
      var productAmount = fixedAmount;

      if(numProductsChanged === false) {
        if(graphic) {
          var productTotal = (fixedAmount * select) + (10 * select);
          var numProducts = select;
        } else {
          var productTotal = fixedAmount * select;
          var numProducts = select;
        }
      } else {
        var productTotal = amount.value;
        var numProducts = select;
      }

      if(isDefault === true) {
        var productImg = document.getElementById("productImg").src;
      } else {
        var productImg = img.src;
      }

      console.log(graphic);
      var errorMsg = document.getElementById("result-msg");
      $.ajax({
        type: 'POST',
        url: 'addToCart.php',
        data: 'productName=' + productName + '&productDesc=' + productDesc + '&productId=' + productId
          + '&productAmount=' + productAmount + '&productTotal=' + productTotal + '&numProducts=' + numProducts + '&productImg=' + productImg
          + '&graphic=' + graphic,
        error: function(xhr, status, error) {
          console.log(error);
          console.log(status);
          console.log(xhr);
        },
        success: function(data) {
          window.alert("Item has been added to your cart!");
          window.location.href = "products.php";
        }
      });

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
    <?php echo "<a class='btn btn-primary' href=\"javascript:history.go(-1)\"><i class='fa fa-arrow-circle-o-left fa-fw'></i> GO BACK</a>"; ?>
    <hr />
    <div class="panel panel-primary bg-faded" id="beforePurchase">
      <div class="panel-heading">
        Product Customization
      </div>
      <div class="panel-body">
        <div id="result-msg">

        </div>
        <div class="row" id="viewShirt">
          <div class="col-md-4">
            <div class="thumbnail" style="border: 0px;">
              <img src="<?php echo $productpath; ?>" class="img-rounded" id="productImg">
            </div>
            <input type="hidden" id="productName" value="<?php echo $productname; ?>" />
            <input type="hidden" id="productDesc" value="<?php echo $productdescription; ?>" />
            <input type="hidden" id="productId" value="<?php echo $productid; ?>" />
            <input type="hidden" id="productName" value="<?php echo $productName; ?>" />
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
        <hr />
        <div class="hidden" id="hasUploaded">
          <div class="row">
            <div class="text-center">
              <h4>Uploaded Image</h4>
              <img src="" id="uploadedImg" class="img-thumbnail img-cart" />
            </div>
          </div>
        </div>
        <hr />


        <div class="well" style="margin-top:25px;">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="numberOfShirts">Number of Shirts</label>
                <input type="number" id="numberOfShirts" name="numberOfShirts" class="form-control" onchange="updateTotal()" value="1" min="1">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="numberOfShirts">Order Amount</label>

                <div class="input-group">
                  <span class="input-group-addon" style="padding: 0px;"><i class="fa fa-usd fa-fw"></i></span>

                  <input type="text" id="amount" name="amount" class="form-control" style="border:0px; font-size: 2.5rem; background-color: #f5f5f5;" value="<?php echo $productprice; ?>" disabled/>

                  <input type="hidden" id="fixedAmount" value="<?php echo $productprice; ?>" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <button class="btn btn-block btn-primary" id="cartBtn"><i class="fa fa-shopping-cart fa-fw"></i> Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
