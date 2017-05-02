<?php
  $hostname = "localhost";
<<<<<<< HEAD
  $username = "root";
  $password = "";
  $dbname = "imagineprints";
=======
  $username = "ConnectAll";
  $password = "JimmyIsH3r3!W00t";
  $dbname = "ImaginePrints";
>>>>>>> 9ec74a311dd9fa4aaa1ba8d76d8ced06fee98842

  //connection
  $dbc = mysqli_connect($hostname, $username, $password, $dbname)
  OR die("could not connect to database, ERROR: " .mysqli_connect_error());
?>
