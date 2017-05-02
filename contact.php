<?php
session_start();
include("connection.php");
?>
<html>
<head>
  <?php include("head.html"); ?>
  <link href="css/carousel.css" rel="stylesheet" />
  <style>
  #success_message{ visibility: hidden;}
  </style>
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
    <div id="map" style="width:100%;height:27%"></div>

    <script>
    function myMap() {
      var mapCanvas = document.getElementById("map");
      var myCenter = new google.maps.LatLng(33.981092,-84.004613);
      var mapOptions = {center: myCenter, zoom: 11};
      var map = new google.maps.Map(mapCanvas,mapOptions);
      var marker = new google.maps.Marker({
        position: myCenter,
        animation: google.maps.Animation.DROP
      });
      marker.setMap(map);
    }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABP2eja48IC7vACTFIcYyJO_nTpL_5wzY&callback=myMap"></script>
  </br>
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h2>Contact Information</h2>
    </div>
    <div class="panel-body">
      <div class="col-sm-4">
        <div class="thumbnail text-center">
          <div class="caption text-center">
            <i class="fa fa-phone fa-3x"></i>

            <h3 class="h3">Feel Free to Call Us 24x7</h3>
            <p>678-464-6931</p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail text-center">
          <div class="caption text-center">
            <i class="fa fa-at fa-3x"></i>

            <h3 class="h3">Send Us a Direct Email @</h3>
            <p>Contact@ImaginePrints.com</p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail text-center">
          <div class="caption text-center">
            <i class="fa fa-home fa-3x"></i>

            <h3 class="h3">Send Mail To</h3>
            <p>PO box 196</p>
            <p>789 Clothing Road</p>
            <p>Lawrenceville, Ga, 30043</p>
          </div>
        </div>
      </div>
    </div>
    <form class="well form-horizontal" action=" " method="post"  id="contact_form">
      <fieldset>

        <!-- Form Name -->
        <legend>Contact Us Today!</legend>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">First Name</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input  name="first_name" placeholder="First Name" class="form-control"  type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label" >Last Name</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input name="last_name" placeholder="Last Name" class="form-control"  type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">E-Mail</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
            </div>
          </div>
        </div>


        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Phone #</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
              <input name="phone" placeholder="(845)555-1212" class="form-control" type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Address</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
              <input name="address" placeholder="Address" class="form-control" type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">City</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
              <input name="city" placeholder="city" class="form-control"  type="text">
            </div>
          </div>
        </div>

        <!-- Select Basic -->

        <div class="form-group">
          <label class="col-md-4 control-label">State</label>
          <div class="col-md-4 selectContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
              <select name="state" class="form-control selectpicker" >
                <option value=" " >Please select your state</option>
                <option>Alabama</option>
                <option>Alaska</option>
                <option>Arizona</option>
                <option>Arkansas</option>
                <option>California</option>
                <option>Colorado</option>
                <option>Connecticut</option>
                <option>Delaware</option>
                <option>District of Columbia</option>
                <option> Florida</option>
                <option>Georgia</option>
                <option>Hawaii</option>
                <option>daho</option>
                <option>Illinois</option>
                <option>Indiana</option>
                <option>Iowa</option>
                <option> Kansas</option>
                <option>Kentucky</option>
                <option>Louisiana</option>
                <option>Maine</option>
                <option>Maryland</option>
                <option>Massachusetts</option>
                <option>Michigan</option>
                <option>Minnesota</option>
                <option>Mississippi</option>
                <option>Missouri</option>
                <option>Montana</option>
                <option>Nebraska</option>
                <option>Nevada</option>
                <option>New Hampshire</option>
                <option>New Jersey</option>
                <option>New Mexico</option>
                <option>New York</option>
                <option>North Carolina</option>
                <option>North Dakota</option>
                <option>Ohio</option>
                <option>Oklahoma</option>
                <option>Oregon</option>
                <option>Pennsylvania</option>
                <option>Rhode Island</option>
                <option>South Carolina</option>
                <option>South Dakota</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Utah</option>
                <option>Vermont</option>
                <option>Virginia</option>
                <option>Washington</option>
                <option>West Virginia</option>
                <option>Wisconsin</option>
                <option>Wyoming</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Zip Code</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
              <input name="zip" placeholder="Zip Code" class="form-control"  type="text">
            </div>
          </div>
        </div>


        <!-- Text area -->

        <div class="form-group">
          <label class="col-md-4 control-label">Description</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <textarea class="form-control" name="comment" placeholder="Description"></textarea>
            </div>
          </div>
        </div>

        <!-- Success message -->
        <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <div class="col-md-4">
            <button type="submit" class="btn btn-warning" onclick="clickFunction()">Send <span class="glyphicon glyphicon-send"></span></button>
            <script>
            function clickFunction() {
              document.getElementById("success_message").style.visibility= "visible";
            }
            </script>
          </div>
        </div>

      </fieldset>
    </form>
  </div>
</div><!-- /.container -->

<?php include("scripts.html"); ?>
</body>
</html>
