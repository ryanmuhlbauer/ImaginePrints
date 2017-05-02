<?php
if(!isset($_SESSION))
  {
      session_start();
  }
?>
<style>
li {font-size: 1.3em; }

</style>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
        <a class="navbar-brand" href="index.php" style="padding-left:7%;"><img src="/img/Logo.png" alt="Imagine Prints"></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" id="NavBarList2">
        <li><a href="About.php">About Us</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="reviews.html">Reviews</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="cart.php">Shopping Cart
            <i class="fa fa-shopping-cart fa-2x secondary"></i>
            <span class="label label-primary secondary">
              <?php
                if(isset($_SESSION['cartItems'])) {
                  echo sizeof($_SESSION['cartItems']);
                } else {
                  echo "0";
                }
              ?>
            </span>
          </a>
        </li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
      </ul>
    </div>
  </div>
</nav>
