<?php
session_start();
include("connection.php");
?>
<html>
<head>
  <?php include("head.html"); ?>

  <link href="/css/carousel.css" rel="stylesheet" />

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
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <div class="container">
            <div class="carousel-caption">

              <h2>We bring your custom designs to life on clothing.</h2>
              <h3>Check out our variety of clothing mediums</h3>
              <ul class="list-unstyled">
                <li>Short and Long Sleeved T-Shirts</li>
                <li>Hoodies and Jackets</li>
                <li>Socks, Hats and More</li>
              </ul>
              <p>
                <a class="btn btn-lg btn-primary" href="products.php" role="button">All Products</a>
              </p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="container">
            <div class="carousel-caption">
              <h1>Want to try it out our design interface?</h1>
              <p>It is super easy to use, and if you have any questions<br> feel free to reach out to us 24/7 with out Live Chat tool!</p>
              <p><a class="btn btn-lg btn-primary" href="" role="button">Let's go!</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="container">
            <div class="carousel-caption">
              <h1>We Offer Free Two Week Shipping!</h1>
              <h2>If Two Week Shipping Isn't Fast Enough
                <br>We Offer Three More Options:</h2>
                <ul class="list-unstyled">
                  <li><h3>One Week</h3></li>
                  <li><h3>Three Day</h3></li>
                  <li><h3>Two Day</h3></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!-- /.carousel -->
      <div class="container marketing">
        <div class="row">
          <div class="col-lg-4">
            <img class="img-rectangle" src="img/BusinessPartners.jpe" alt="Business Partners Mate?" height="140">
            <h2>Business Partners</h2>
            <p>Are you looking to start your own clothing business? Check out our business to business to program for more information.</p>
            <p><a class="btn btn-default" href="" role="button">Watch a video &raquo;</a></p>
          </div>
          <div class="col-lg-4">

            <img class="img-rectangle" src="/img/categories/shirts.jpg" alt="T-Shirt Template" height="140">
            <h2>Already have a design?</h2>
            <p>Upload your own designs and get started creating your own custom clothing.</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-lg-4">
            <img class="img-rectangle" src="img/question.png" alt="" height="140">
            <h2>Have a question or problem?</h2>
            <p>We are available 24/7 to answer any questions and solve all problems.</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-lg-4">
            <img class="img-rectangle" src="img/quality.jpe" alt="Quality Matters" height="140">
            <h2>We only believe in high quality</h2>
            <p>We want our customers to be able to wear their clothing for years to come. Low quality materials simply don't meet the cut for us.</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div>
        </div>


        <!-- FOOTER -->
        <footer>
          <p class="pull-right"><a href="#">Back to top</a></p>
          <p>&copy; 2016 Imagine Prints LLC. &middot; <a href="privacy.php">Privacy</a> &middot; <a href="terms.php">Terms</a></p>

        </footer>

      </div><!-- /.container -->
    </div>

    <?php include("scripts.html"); ?>
  </body>
  </html>
