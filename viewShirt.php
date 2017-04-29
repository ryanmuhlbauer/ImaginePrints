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
    <?php echo "<a class='btn btn-primary' href=\"javascript:history.go(-1)\"><i class='fa fa-arrow-circle-o-left fa-fw'></i> GO BACK</a>"; ?>
    <hr />
    <div class="panel panel-primary bg-faded" id="beforePurchase">
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
                <input type="number" id="numberOfShirts" name="numberOfShirts" class="form-control" value="1" min="1">
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
      </div>
      <div class="panel-footer">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <button class="btn btn-block btn-primary">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
