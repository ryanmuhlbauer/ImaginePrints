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
  }
  $(document).ready(function () {
    var canvas = new fabric.Canvas('paper', { isDrawingMode: true });
    $("#customizeShirt").hide();
    $("#customizeShirtFooter").hide();
    img = document.getElementById("productPath").value;
    $("#customize").click(function(e) {
      console.log(img);
      $("#viewShirt").hide();
      $("#customizeShirt").show();
      $("#customizeShirtFooter").show();
      if(isDefault === true) {
        document.getElementById("customizeImage").src = img;
      } else {
        document.getElementById("customizeImage").src = img.src;
      }
    });

    $("#select").click(function(){
      canvas.isDrawingMode = false;
    });
    $("#draw").click(function(){
      canvas.isDrawingMode = true;
    });

    $("#canvas2png").click(function(){
      canvas.isDrawingMode = false;
    });

    $("#cancelCustomization").click(function() {
      $("#viewShirt").show();
      $("#customizeShirt").hide();
      $("#customizeShirtFooter").hide();
    });

    $("#ccnumber").keyup(function() {
      $("#ccnumber").val(this.value.match(/[0-9]*/));
    });

    $("#ccv").keyup(function() {
      $("#ccv").val(this.value.match(/[0-9]*/));
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
    <?php echo "<a class='text-primary' href=\"javascript:history.go(-1)\"><i class='fa fa-arrow-circle-o-left fa-fw'></i> GO BACK</a>"; ?>
    <div class="panel panel-primary bg-faded">
      <div class="panel-heading">
        Product Customization
      </div>
      <div class="panel-body">
        <div class="row" id="viewShirt">
          <div class="col-md-4">
            <div class="thumbnail" style="border: 0px;">
              <img src="<?php echo $productpath; ?>" class="img-rounded" id="productImg">
              <div class="caption text-center">
                <button class="btn btn-primary" id="customize">Customize</button>
              </div>
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
          </div>

        </div>
        <div id="customizeShirt">
          <div class="row">
            <div class="col-sm-6 text-center">
              <div class="list-group-item text-center" style="margin-bottom:10px;">
                <h4>Design Your Own Logo Below:</h4>
                <small>OR</small>
                <br />
                <input type="filepicker" data-fp-apikey="ABm2Ke0TmuiJ9HhVTgWgUz" data-fp-mimetypes="image/*" data-fp-container="modal" data-fp-services="COMPUTER" onchange="upload(event.fpfile.url)">
              </div>
              <div id="canvas-area">
                <canvas id="paper" width="400" height="400" style="border:1px solid #ccc; margin: auto;"></canvas>
                <div class="btn-bottom">
                  <button class="btn btn-primary btn-sm" id="select">Selection mode</button>
                  <button class="btn btn-primary btn-sm" id="draw">Drawing mode</button>
                  <button class="btn btn-primary btn-sm" id="canvas2png">Canvas 2 PNG</button>
                </div>
              </div>
              <div id="upload-area" class="hidden">
                <img src="" class="img-thumbnail" id="uploadedImg" />
              </div>

            </div>
            <div class="col-sm-6">
              <div class="thumbnail text-center">
                <img src="<?php echo $productpath; ?>" class="img-rounded" id="customizeImage">
                <div class="caption text-center">
                  <h3 class="h3">Selected Item:</h3>
                  <strong><?php echo $productname; ?></strong>
                  <p><?php echo $productdescription; ?></p>
                  <button class="btn btn-primary" id="addCart">Add to Cart</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="well">
          <div class="form-group">
            <label for="numberOfShirts">Number of Shirts:</label>
            <select id="numberOfShirts" class="form-control" onchange="updateTotal()">
              <option selected value="1">
                1
              </option>
              <option value="2">
                2
              </option>
            </select>
          </div>
        </div>
        <div class="well">
          <h4 class="text-center">
            Order Amount: <i class="fa fa-usd fa-fw"></i> <input type="text" id="amount" name="amount" style="border:0px; font-size: 2.5rem; background-color: #f5f5f5" value="<?php echo $productprice; ?>" disabled/>
          </h4>
        </div>
        <div class="well">
          <form class="form-horizontal">
            <h4 >Shipping Address:</h4>
            <hr />
            <div class="form-group">
              <label for="fname" class="col-sm-2 control-label">First Name</label>
              <div class="col-sm-10">
                <input type="fname" class="form-control" id="fname" placeholder="First Name">
              </div>
            </div>
            <div class="form-group">
              <label for="lname" class="col-sm-2 control-label">Last Name</label>
              <div class="col-sm-10">
                <input type="lname" class="form-control" id="lname" placeholder="Last Name">
              </div>
            </div>
            <div class="form-group">
              <label for="address" class="col-sm-2 control-label">Address</label>
              <div class="col-sm-10">
                <input type="address" class="form-control" id="address" placeholder="Address">
              </div>
            </div>
            <div class="form-group">
              <label for="zip" class="col-sm-2 control-label">ZIP</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="zip" placeholder="ZIP" maxlength="5">
              </div>
            </div>
            <div class="form-group">
              <label for="state" class="col-sm-2 control-label">State</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="state" placeholder="State">
              </div>
            </div>
            <div class="form-group">
              <label for="city" class="col-sm-2 control-label">City</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="city" placeholder="City">
              </div>
            </div>
          </form>
          <form class="form-horizontal">
            <h4>Payment Information:</h4>
            <hr />
            <div class="form-group">
              <label for="ccnumber" class="col-sm-2 control-label">Credit Card Number</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="ccnumber" name="ccnumber" placeholder="Credit Card Number" maxlength="16">
              </div>
            </div>
            <div class="form-group">
              <label for="zip" class="col-sm-2 control-label">Expiration Date</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="zip" placeholder="ZIP">
              </div>
            </div>
            <div class="form-group">
              <label for="ccv" class="col-sm-2 control-label">Security Code</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="ccv" name="ccv" placeholder="CCV" maxlength="3">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit Order</button>
              </div>
            </div>
          </form>
        </div>

      </div>
      <div class="panel-footer text-center" id="customizeShirtFooter">
        <button class="btn btn-danger" id="cancelCustomization">Cancel Customization</button>

      </div>

    </div>
  </div>
</div>
</body>
</html>
