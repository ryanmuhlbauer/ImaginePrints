<?php
if(!isset($_SESSION))
  {
      session_start();
  }
?>
<<<<<<< HEAD
=======
<style>
li {font-size: 1.3em; }

</style>
>>>>>>> 9ec74a311dd9fa4aaa1ba8d76d8ced06fee98842
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<<<<<<< HEAD
        <a class="navbar-brand" href="index.html">Imagine Prints</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>
          <a href="index.php">Home</a>
        </li>
        <li class="dropdown">
        <a href="products.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li>
            <a href="products.php">All</a>
          </li>
          <li><a href="shirts.php">T-Shirts</a></li>
          <li><a href="sweatshirts.php">Sweatshirts</a></li>
        </ul>
        </li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="reviews.php">Reviews</a></li>
        <li><a href="orders.php">Orders</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="cart.php">
=======
        <a class="navbar-brand" href="index.php" style="padding-left:7%;"><img src="/img/Logo.png" alt="Imagine Prints"></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" id="NavBarList2">
        <li><a href="About.php">About Us</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="reviews.html">Reviews</a></li>
        <li><a href="orders.php">Your Orders</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right" id="NavBarList2">
        <li>
          <a href="cart.php">Shopping Cart
>>>>>>> 9ec74a311dd9fa4aaa1ba8d76d8ced06fee98842
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
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
