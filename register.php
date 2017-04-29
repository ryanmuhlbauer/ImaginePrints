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
      var confirmPassword = document.getElementById("confirmPassword");
      var result = document.getElementById("return-msg");
      var msg = "";

      $("#submit").click(function(e) {
        if(!email.value) {
          msg = "<p class='text-danger'>Please enter a email for the account!</p>";
          result.innerHTML = msg;
          $('html, body').animate({
            scrollTop: $("#return-msg").offset().top
          }, 2000);
          return;
          e.preventDefault();
        }
        if(!password.value) {
          msg = "<p class='text-danger'>Please enter a password for the account</p>";
          result.innerHTML = msg;
          $('html, body').animate({
            scrollTop: $("#return-msg").offset().top
          }, 2000);
          return;
          e.preventDefault();
        }
        if(password.value != confirmPassword.value) {
          msg = "<p class='text-danger'>Password do not match!</p>";
          result.innerHTML = msg;
          $('html, body').animate({
            scrollTop: $("#return-msg").offset().top
          }, 2000);
          return;
          e.preventDefault();
        }
        $.ajax({
          type: 'POST',
          url: 'registerAccount.php',
          data: 'email=' + email.value + '&password=' + password.value,
          success: function(data) {
            if(data == "success") {
              window.location.href = "index.php";
            } else {
              msg = "<p class='text-danger'>Something went wrong!</p>";
              result.innerHTML = msg;
              $('html, body').animate({
                scrollTop: $("#return-msg").offset().top
              }, 2000);
              return;
              e.preventDefault();
            }
          }
        })
      });
    });
  </script>
</head>
<body>
  <?php include("unauthorized-nav.php"); ?>

  <div class="container">
    <div class="panel panel-default authorize-panel" >
      <div class="panel-heading">
        Register Form
      </div>
      <div class="panel-body">
        <div id="return-msg" class="text-center" style="margin-bottom: 10px;">

        </div>
        <form>
          <div class="form-group">
            <label for="email"><i class="fa fa-at fa-fw"></i> Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="">
          </div>
          <div class="form-group">
            <label for="password"><i class="fa fa-lock fa-fw"></i> Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="">
          </div>
          <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="">
          </div>
          <div class="text-center">
            <button type="button" id="submit" class="btn btn-primary">Submit</button>
            <hr />
            <a href="login.php">Already have an account?</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include("scripts.html"); ?>
</body>
</html>
