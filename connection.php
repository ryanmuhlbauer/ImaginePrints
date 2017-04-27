<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "imagineprints";

  //connection
  $dbc = mysqli_connect($hostname, $username, $password, $dbname)
  OR die("could not connect to database, ERROR: " .mysqli_connect_error());
?>
