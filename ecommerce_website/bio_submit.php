<?php
  require "header.php";
?>

<?php

if (isset($_SESSION['name'])) 
{

if(isset($_POST['bio_submit']))
{

	require 'includes/db.inc.php';

    $bio_details = stripslashes($_POST['bio_details']);
    $bio_details = mysqli_real_escape_string($data_base,$bio_details);
 	  $bio_details_password = stripslashes($_POST['bio_details_password']);
    $bio_details_password = mysqli_real_escape_string($data_base,$bio_details_password);
    $bio_details_password =  md5($bio_details_password);
     $username__from_frontend = $_SESSION['name'];

	if(empty($_POST['bio_details']) || empty($_POST['bio_details_password']))
	{
		echo '<script>window.location.replace("setting.php?bio=empty");</script>';
		exit();
	}



    define('DB_SERVER', 'localhost');
	   define('DB_USERNAME', 'root');
	   define('DB_PASSWORD', '');
	   define('DB_DATABASE', 'players');
	   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

			$sql = "SELECT username FROM users WHERE username = '$username__from_frontend' and password = '$bio_details_password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) {

      	  $con_change_bio = new mysqli("localhost", "root", "", "players");
					$sql_change_bio = "UPDATE users SET bio='$bio_details' WHERE username='$username__from_frontend'";
					if ($con_change_bio->query($sql_change_bio) === TRUE) {
					  echo '<script>window.location.replace("setting.php?bio=update");</script>';
      			exit();
					} else {
					  echo '<script>window.location.replace("setting.php?pass=password_false");</script>';
						 exit();
					}

					$con_change_bio->close();

      }else {
				echo '<script>window.location.replace("setting.php?pass=password_false");</script>';
				 exit();
      }
echo '<script>window.location.replace("setting.php?pass=password_false");</script>';
exit();

	}
	else
	{
		echo '<script>window.location.replace("setting.php?bio=false");</script>';
		exit();
	}


}
else
			{



					//If the login is not done correct
				 header("Location: ../ecommerce_website/index.php?error=please_signup");
		 		 exit();
				
			}

?>