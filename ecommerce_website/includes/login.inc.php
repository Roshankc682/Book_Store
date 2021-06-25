<?php

if (isset($_POST['login-submit'])) 
{

require 'db.inc.php';
if(empty($_POST["g-recaptcha-response"]))
{
	echo '<script>window.location.replace("http://localhost/ecommerce_website/login.php?recapcha=invalid");</script>';
	exit();
}
// =========================recpcha=================================
$recaptcha = stripslashes($_POST["g-recaptcha-response"]);
$recaptcha = mysqli_real_escape_string($data_base,$recaptcha); 
$post = [
    'secret' => '6LdjEeQaAAAAAAFIGHyO4CzqEcsBrVKI0DeWFtwg',
    'response' => $recaptcha,
];
$ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$response = curl_exec($ch);
curl_close($ch);

$data_resposne= json_decode($response, true);
if($data_resposne["success"])
{
	// just login 
}else
{
	echo '<script>window.location.replace("http://localhost/ecommerce_website/login.php?recapcha=invalid");</script>';
	exit();
}

// =========================recpcha=================================


		$username = stripslashes($_POST['name']);
 		$username = mysqli_real_escape_string($data_base,$username); 


		 $password = stripslashes($_POST['pwd']);
 		 $password = mysqli_real_escape_string($data_base,$password); 
     $password =  md5($password);

 		 $query_first = "SELECT * FROM `users` WHERE email='$username'";


       				$stmt_first = mysqli_stmt_init($data_base);

       				if(!mysqli_stmt_prepare($stmt_first,$query_first))
       				{
							header("Location: /ecommerce_website/index.php?error=sqlerror");
				 			exit();

       				}
       				else 
       				{
       					$result_first = mysqli_query($data_base,$query_first) or die(mysql_error());
 						$rows_first = mysqli_num_rows($result_first);
						if($rows_first==1)
 						{
 							// echo "Yes<br>";
 							 $sql_email = "select * from users where (email='$username');";
                             $res_email=mysqli_query($data_base,$sql_email);                   
                             $row_email = mysqli_fetch_assoc($res_email);
                             if($username==$row_email['email'])
                             {
                             	$username = $row_email['username'];
                             }
 						}
 						else
 						{
 							// echo "Nope<br>";
 							header("Location: ../login.php?not_found=invlaid_credentials");
    	    	    		exit();
 						}
 						
 					}

 		 		// exit();
		if(empty($username) || empty($password))
		{
				header("Location: /ecommerce_website/index.php?error=all_field_are_required");
				 exit();
		}
		else
		{

       				$query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
       			

       				$stmt = mysqli_stmt_init($data_base);

       				if(!mysqli_stmt_prepare($stmt,$query))
       				{
							header("Location: /ecommerce_website/index.php?error=sqlerror");
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
										


										header("Location: /ecommerce_website/index.php?welcome=".$username);
    	    	    					exit();

 									}
        							else
        							{
	    	        					header("Location: ../login.php?not_found=invlaid_credentials");
    	    	    					exit();
        						}	



       				}
 								

        }

}
else
{
	header("Location: /ecommerce_website/index.php");
	exit();
}

?>