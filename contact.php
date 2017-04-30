<?php
session_start();
include("connection.php");
?>
<html>
<head>
  <?php include("head.html"); ?>
  <link href="css/carousel.css" rel="stylesheet" />

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
        Contact Us
      </div>
      <div class="panel-body">
        <div class="col-sm-4">
          <div class="thumbnail text-center">
            <div class="caption text-center">
              <i class="fa fa-phone fa-3x"></i>
              <h3 class="h3">Phone</h3>
              <p>(470) 234-4567</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="thumbnail text-center">
            <div class="caption text-center">
              <i class="fa fa-at fa-3x"></i>
              <h3 class="h3">Email</h3>
              <p>contact@imagineprints.com</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="thumbnail text-center">
            <div class="caption text-center">
              <i class="fa fa-home fa-3x"></i>
              <h3 class="h3">Address</h3>
              <p>123 Old Peachtree Rd. Lawrenceville, GA</p>
            </div>
          </div>
        </div>
      </div>


    </div>

  </div>

    <?php include("scripts.html"); ?>
  </body>
  </html>
