<?php
  require "header.php";
?>

<?php

if (isset($_SESSION['name'])) 
{

if(isset($_POST['nickname-submit']))
{

	require 'includes/db.inc.php';
	if(empty($_POST['password_for_nickname_validate']) || empty($_POST['nickname']))
	{
		echo '<script>window.location.replace("setting.php?nickname=empty");</script>';
		exit();
	}


    $nickname = stripslashes($_POST['nickname']);
    $nickname = mysqli_real_escape_string($data_base,$nickname);
    $password_to_check = stripslashes($_POST['password_for_nickname_validate']);
    $password_to_check = mysqli_real_escape_string($data_base,$password_to_check);
    $password_to_check =  md5($password_to_check);
    $username__from_frontend = $_SESSION['name'];



    define('DB_SERVER', 'localhost');
	   define('DB_USERNAME', 'root');
	   define('DB_PASSWORD', '');
	   define('DB_DATABASE', 'players');
	   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

			$sql = "SELECT username FROM users WHERE username = '$username__from_frontend' and password = '$password_to_check'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) {

      	  $con_change_name = new mysqli("localhost", "root", "", "players");
					$sql_change_name = "UPDATE users SET nickname='$nickname' WHERE username='$username__from_frontend'";

					if ($con_change_name->query($sql_change_name) === TRUE) {
					  echo '<script>window.location.replace("setting.php?nickname=update");</script>';
      			exit();
					} else {
					  echo '<script>window.location.replace("setting.php?nickname=password_false");</script>';
						 exit();
					}

					$con_change_name->close();

      }else {
         echo '<script>window.location.replace("setting.php?nickname=password_false");</script>';
				 exit();
      }
echo '<script>window.location.replace("setting.php?nickname=password_false");</script>';
exit();

	}
	else
	{
		echo '<script>window.location.replace("setting.php?nickname=password_false");</script>';
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