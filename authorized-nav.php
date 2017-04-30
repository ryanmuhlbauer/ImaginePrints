<?php
if(!isset($_SESSION))
  {
      session_start();
  }
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
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
        <li><a href="contact.html">Contact Us</a></li>
        <li><a href="reviews.html">Reviews</a></li>
        <li><a href="orders.php">Orders</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="cart.php">
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
