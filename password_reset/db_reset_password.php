<?php

// for local
$data_base_reset = mysqli_connect("localhost","root","","password_reset");



if (mysqli_connect_errno())
  {
  	
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }
  

  ?>
<?php

// for local
$data_base_players = mysqli_connect("localhost","root","","players");



if (mysqli_connect_errno())
  {
  	
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }

  ?>
