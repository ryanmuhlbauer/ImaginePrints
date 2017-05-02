<?php
session_start();
include("connection.php");
?>
<html>
<head>
  <?php
  include("head.html");
  ?>
  <link href="css/timeline.css" rel="stylesheet" />
  <script type="text/javascript">
  $(document).ready(function () {
    $("#submit").click(function(e) {
      var fname = document.getElementById("fname").value;
      var lname = document.getElementById("lname").value;
      var content = document.getElementById("content").value;
      var result = document.getElementById("result-msg");
      if(!fname || !lname || !content) {
        var msg = "<p class='text-danger'>Please fill out each field before submitting a review!</p>";
        result.innerHTML = msg;
        e.preventDefault();
        return;
      } else {
        $.ajax({
          type: 'POST',
          url: 'submitReview.php',
          data : 'fname='+ fname + '&lname='+ lname + '&content='+ content,
          success: function(data) {
            window.location.reload();
            window.alert("Review was posted successfully!");
          }
        });
      }
    });
  });
  </script>
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
        ImaginePrints Customer Reviews
      </div>
      <div class="panel-body bg-faded">
        <div class="list-group-item text-primary">
          <h4 class="text-center" style="letter-spacing: 1.5px;">At ImaginePrints, the customer always comes first. We encourage all of our customers to post a review sharing their experience using us as their custom t-shirt provider.</h4>
          <hr />
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-4 control-label">First Name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="fname" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Last Name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="lname" />
              </div>
            </div>
            <div class="form-group" style="padding: 25px;">
              <label for="content">Your Experience</label>
              <textarea class="form-control" rows="3" id="content" placeholder="Post your review here" maxlength="300"></textarea>
            </div>
            <div class="form-group text-center">
              <button type="button" class="btn btn-primary" id="submit">Submit Review</button>
            </div>
          </form>
          <div id="result-msg" class="text-center">

          </div>

        </div>
        <section id="cd-timeline" class="cd-container">
          <?php
          $sql = mysqli_query($dbc, "SELECT * FROM reviews;");
          if(mysqli_num_rows($sql) != 0) {
            while($row = mysqli_fetch_array($sql)) {
              $fname = $row['firstName'];
              $lname = $row['lastName'];
              $content = $row['content'];
              $date = $row['date'];
              echo '<div class="timeline-block">
              <div class="cd-timeline-img cd-picture">
              <img src="img/bullhorn.png" class="img-circle" />
              </div>
              <div class="cd-timeline-content">
                <h3 class="text-primary" style="margin-top:0px;"><i class="fa fa-info-circle fa-fw"></i>'.$fname.' '.$lname.'</h3>
                <blockquote>
                  '.$content.'
                </blockquote>
                <span class="text-secondary cd-date"><i class="fa fa-calendar fa-fw"></i> Date Posted: '.date('Y-m-d', strtotime(str_replace('-','/', $date))).'</span>
              </div>
              </div>';
            }
          } else {
            echo '<div class="list-group-item">
            <h4 class="text-center">No reviews have been posted yet!</h4>
            </div>';
          }
          ?>
        </section>
      </div>
    </div>


  </div>


  <?php include("scripts.html"); ?>
</body>
