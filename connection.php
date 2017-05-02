<?php
  $hostname = "localhost";
  $username = "ConnectAll";
  $password = "JimmyIsH3r3!W00t";
  $dbname = "ImaginePrints";

  //connection
  $dbc = mysqli_connect($hostname, $username, $password, $dbname)
  OR die("could not connect to database, ERROR: " .mysqli_connect_error());
?>
