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
              <p style="color:white;">It is super easy to use, and if you have any questions</br> feel free to reach out to us 24/7 by clicking <a href="contact.php">Here</a></p>
              <p><a class="btn btn-lg btn-primary" href="products.php" role="button">Let's go!</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="container">
            <div class="carousel-caption">
              <h1>Free Two Week Shipping on All Orders!!</h1>
              <h2>Free One Week Shipping on Orders of $100 or More!</h2>
                <ul class="list-unstyled">
                  <li><h3>Expedited Shipping Options:</h3></li>
                  <li><h3>Two and Three Day Shipping</h3></li>
                </ul>
                </br>
                </br>
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
            <p><a class="btn btn-default" href="contact.php" role="button">Click Here &raquo;</a></p>
          </div>
          <div class="col-lg-4">
            <img class="img-rectangle" src="/img/categories/shirts.jpg" alt="T-Shirt Template" height="140">
            <h2>Already have a design?</h2>
            <p>Upload your own designs and get started creating your own custom clothing.</p>
            <p><a class="btn btn-default" href="products.php" role="button">View details &raquo;</a></p>
          </div>
           <div class="col-lg-4">
            <img class="img-rectangle" src="img/shipping.jpe" alt="Shipping" height="140">
            <h2>Need Faster Shipping?</h2>
            <p>We offer expedited shipping options of two or three day shipping and guarantee your order will be there on time! Check out our reviews if you don't believe us.</p>
            <p><a class="btn btn-default" href="reviews.php" role="button">See Reviews &raquo;</a></p>
          </div>
          <div class="col-lg-4">
            <img class="img-rectangle" src="img/question.png" alt="Question" height="140">
            <h2>Have a question or problem?</h2>
            <p>We are available 24/7 to answer any questions and solve all problems.</p>
            <p><a class="btn btn-default" href="contact.php" role="button">Go Here &raquo;</a></p>
          </div>
           <div class="col-lg-4">
            <img class="img-rectangle" src="img/AboutUs.jpg" alt="About Us" height="140">
            <h2>Want to learn more about us?</h2>
            <p>We are an open book and are happy to share our story. Check out our about page for more information and if you have any direct questions, feel free to <a href="contact.php">email</a>.</p>
            <p><a class="btn btn-default" href="About.php" role="button">About Us &raquo;</a></p>
          </div>
           <div class="col-lg-4">
            <img class="img-rectangle" src="img/Privacy.jpg" alt="Privacy" height="140">
            <h2>Your privacy is important to us!</h2>
            <p>We will not sell your data to third party vendors! We are all about you and we don't want you to worry about your privacy. Want to learn more? Read our very boring privacy page</p>
            <p><a class="btn btn-default" href="privacy.php" role="button">Go Here &raquo;</a></p>
          </div>
        </div>
	</br>	
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
