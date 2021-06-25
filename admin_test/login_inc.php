<?php
session_start();
?>

<?php

if (isset($_POST['login-submit'])) 
{

		require 'db.php';
		// username and password passwes

		$username = stripslashes($_POST['name']);
 		$username = mysqli_real_escape_string($data_base,$username); 


		$password = stripslashes($_POST['pwd']);
 		$password = mysqli_real_escape_string($data_base,$password);


		if(empty($username) || empty($password))
		{
				header("Location: login.php?error=the_credentials_was_empty");
				 exit();
		}
		else
		{
        			
					$hashedpwd =  md5($password);
       				$query = "SELECT * FROM `admin` WHERE user='$username' and password='$hashedpwd'";

       				$stmt = mysqli_stmt_init($data_base);

       				if(!mysqli_stmt_prepare($stmt,$query))
       				{
							header("Location: /admin_test/login.php?error=sqlerror");
				 			exit();

       				}
       				else 
       				{


								$result = mysqli_query($data_base,$query) or die(mysql_error());
 								$rows = mysqli_num_rows($result);

        						if($rows==1)
 									{
		 								session_start();

		 								// $_SESSION['userId'] = $username;
										$_SESSION['name'] = $username;
										// echo $username;
										


										header("Location: /admin_test/dashboard.php?welcome=".$username);
    	    	    					exit();

 									}
        							else
        							{
	    	        					header("Location: /admin_test/login.php?not_found=invlaid_credentials");
    	    	    					exit();
        						}	



       				}
 								

        }

}
else
{
	header("Location: index.php?Erro_you_must_login");
	exit();
}

?>