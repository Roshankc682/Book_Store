<?php

// for local
$data_base = mysqli_connect("localhost","root","","players");



if (mysqli_connect_errno())
  {
  	
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }


// for local
$data_base_for_details = mysqli_connect("localhost","root","","bs");



if (mysqli_connect_errno())
  {
  	
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }
  // for local
$data_base_for_details_for_email_check = mysqli_connect("localhost","root","","first_database_for_check");



if (mysqli_connect_errno())
  {
  	
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }
  ?>
