<?php
session_start();
include("connection.php");
?>
<html>
<head>
  <?php include("head.html"); ?>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      var email = document.getElementById("email");
      var password = document.getElementById("password");
      var result = document.getElementById("return-msg");
      var msg = "";
      $("#submit").click(function(e) {
        if(!email.value) {
          msg = "<p class='text-danger'>Please enter a email!</p>";
          result.innerHTML = msg;
          $('html, body').animate({
            scrollTop: $("#return-msg").offset().top
          }, 2000);
          return;
          e.preventDefault();
        }
        if(!password.value) {
          msg = "<p class='text-danger'>Please enter a password!</p>";
          result.innerHTML = msg;
          $('html, body').animate({
            scrollTop: $("#return-msg").offset().top
          }, 2000);
          return;
          e.preventDefault();
        }
        $.ajax({
          type: 'POST',
          url: 'loginAccount.php',
          data: 'username=' + username.value + '&password=' + password.value,
          success: function(data) {

            if(data == "error") {
              msg = "<p class='text-danger'>Invalid username or password!</p>";
              result.innerHTML = msg;
              $('html, body').animate({
                scrollTop: $("#return-msg").offset().top
              }, 2000);
              return;
              e.preventDefault();
            } else {
              window.location.href = "index.php";
            }
          }
        })
      });
    });
  </script>
</head>
<body>
  <?php include("unauthorized-nav.html"); ?>

  <div class="container">
    <div class="panel panel-default authorize-panel" >
      <div class="panel-heading">
        Login Form
      </div>
      <div class="panel-body">
        <div id="return-msg" class="text-center" style="margin-bottom: 10px;">

        </div>
        <form>
          <div class="form-group">
            <label for="email"><i class="fa fa-at fa-fw"></i> Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="">
          </div>
          <div class="form-group">
            <label for="password"><i class="fa fa-lock fa-fw"></i> Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="">
          </div>
          <div class="text-center">
            <button type="button" id="submit" class="btn btn-primary">Submit</button>
            <hr />
            <a href="register.php">Don't have an account?</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include("scripts.html"); ?>
</body>
</html>
