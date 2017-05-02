<?php
session_start();
include("connection.php");
?>
<html>
<head>
  <?php include("head.html"); ?>
  <link href="/css/mystyles.css" rel="stylesheet" />
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
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">About
                        <strong>Imagine Prints</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive img-border-left" src="/img/ClothesBanner.jpg" alt="Clothes Banner">
                </div>
                <div class="col-md-6">
                  	<p>Our mission is to serve our customers by creating your custom clothing fast and affordable while maintaining the highest possible quality. We strive for customer satisfaction, and our main goal is to ensure you're happy.</p>
                  	<p>Your happiness is our happiness. We want to help you express your visions through our clothing and have a great time doing it.</p>  
         
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-16">
                    <hr>
                    <h2 class="intro-text text-center">Our Leadership
                        <strong>Team</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="/img/rm.jpg" alt="Ryan Muhlbauer">
                    <h3>Ryan Muhlbauer
                        <small>CEO</small>
                    </h3>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="/img/CC.jpg" alt="Chritopher Cates" >
                    <h3>Cody Cates
                        <small>CIO</small>
                    </h3>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="/img/tk.jpg" alt="Tabitha King">
                    <h3>Tabitha King
                        <small>CFO</small>
                    </h3>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="/img/ds.jpg" alt="Dylan Smith">
                    <h3>Dylan Smith
                        <small>CMO</small>
                    </h3>
                </div>
                 <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="/img/dog.jpg" alt="Dylan Smith">
                    <h3>Doge
                        <small>CKO</small>
                    </h3>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
           <footer>
          <p class="pull-right"><a href="#">Back to top</a></p>
          <p>&copy; 2016 Imagine Prints LLC. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>

    </div>
    
    
    <!-- /.container -->

 


  <?php include("scripts.html"); ?>
</body>
</html>
