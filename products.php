<?php
session_start();
include("connection.php");
?>
<html>
<head>
  <?php include("head.html"); ?>
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
    <hr />
    <div class="row">
      <div class="col-xs-4">
        <div class="panel panel-default">
          <div class="thumbnail bg-faded">
            <img src="img/categories/shirts.jpg" class="img-rounded" alt="...">
            <div class="caption text-center">
              <h3 class="h3">T-Shirts</h3>
              <p>...</p>
              <p><a href="shirts.php" class="btn btn-primary" role="button">Go</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-4">
        <div class="panel panel-default">
          <div class="thumbnail bg-faded">
            <img src="img/categories/sweatshirts.jpg" class="img-rounded" alt="...">
            <div class="caption text-center">
              <h3 class="h3">Sweatshirts</h3>
              <p>...</p>
              <p><a href="sweatshirts.php" class="btn btn-primary" role="button">Go</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-4">
        <div class="panel panel-default">
          <div class="thumbnail bg-faded">
            <img src="img/categories/women-shirts.jpg" class="img-rounded" alt="...">
            <div class="caption text-center">
              <h3 class="h3">Womens Shirts</h3>
              <p>...</p>
              <p><a href="womens.php" class="btn btn-primary" role="button">Go</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
