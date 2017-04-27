<?php
session_start();
include("connection.php");
?>
<html>
<head>
  <?php include("head.html"); ?>
  <script type="text/javascript" src="lib/matchHeight/dist/jquery.matchHeight-min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".thumbnail").matchHeight();
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
    <div class="row">
      <?php
        $sql = mysqli_query($dbc, "SELECT * FROM products WHERE category = 't-shirts';");
        while($row = mysqli_fetch_array($sql)) {
          $productid = $row['id'];
          $productname = $row['name'];
          $productdescription = $row['description'];
          $productpath = $row['path'];
      ?>
      <div class="col-xs-4">
        <div class="panel panel-default">
          <div class="thumbnail bg-faded">
            <img src="<?php echo $productpath; ?>" class="img-thumbnail img-responsive" alt="..." style="max-height: 250px;">
            <div class="caption text-center">
              <h3 class="h3"><?php echo $productname; ?></h3>
              <p><?php echo $productdescription; ?></p>
              <p><a href="viewShirt.php?id=<?php echo $productid; ?>" class="btn btn-primary" role="button">View</a></p>
            </div>
          </div>
        </div>
      </div>
      <?php
        }
      ?>

    </div>
  </div>
</body>
</html>
