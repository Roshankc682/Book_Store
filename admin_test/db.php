<?php
session_start();
?>

<?php

// for local
$data_base = mysqli_connect("localhost","root","","players");



if (mysqli_connect_errno())
  {
  	
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }

  ?>
