<?php
 
// ==================================================
 // This code save the email and time in database
// ==================================================

if(isset($_POST['forget_password_submit']))
{

	require 'db_reset_password.php';
	// i don't know but seems likes more secure

		$email_to_reset = stripslashes($_POST['mail']);
 		$email_to_reset = mysqli_real_escape_string($data_base_reset,$email_to_reset); 
 		// echo $email_to_reset;
 		// echo '<br>';


 		
// ===========check mail is there or not =============
	// idUsers	uidUsers	emailUsers	pwdUsers

			$sql = "SELECT username FROM users WHERE email='$email_to_reset'";
			$stmt = mysqli_stmt_init($data_base_players);
			// print_r($stmt);


// ====================================================


// ==================================send mail to email========================

// ====================================================================================

				if(!mysqli_stmt_prepare($stmt,$sql))
				{
					echo '<script> 
						window.location.replace("/password_reset/index.php?proceed_error");
					</script>';
					exit();
				}
				else
				{
						// header("Location: /password_reset/index.php?success");
						// exit();
				// =====================if email already exits in reset database then user wait for one minute to reset again============
								$sql_email_if_exits = "select * from password_reset_temp where (email='$email_to_reset');";
            					$res_email_if_exits=mysqli_query($data_base_reset,$sql_email_if_exits);            		
            					$row_email_check_if_exits = mysqli_fetch_assoc($res_email_if_exits);
            					// print_r($row_email);
								if($email_to_reset==$row_email_check_if_exits['email'])
           								{
           									
           									header("Location: /password_reset/index.php?found=true&user_need_to_wait_for_one_minute");
												exit();

           								}
           								else
           								{
										
			           										// =======================================================================================================


							 				// email check already exits or not
											$sql_email = "select * from users where (email='$email_to_reset');";
			            					$res_email=mysqli_query($data_base_players,$sql_email);            		
			            					$row_email = mysqli_fetch_assoc($res_email);
			            					// print_r($row_email);
											if($email_to_reset==$row_email['email'])
			           								{

			           									// here the email is found so now proceed to change password

			           									$user_claim_time_to_reset_password =  time() + 5*60; // 5 minute = 5 * 60 sec
			           									// echo $user_claim_time_to_reset_password;




			           									// Server: 127.0.0.1 »Database: password_reset »Table: password_reset_temp	
														// email	expDate



			           									$data_insert_in_databse_for_reset = "INSERT INTO `password_reset_temp` (email, expDate) VALUES ('$email_to_reset', '$user_claim_time_to_reset_password')";
														$inserted = mysqli_query($data_base_reset,$data_insert_in_databse_for_reset);



														// =========send the mail by passing the email and token ===========	
															//mail of user
															$_SESSION['user_mail'] = $email_to_reset;

															//token for user

															$_SESSION['token'] = $user_claim_time_to_reset_password;
															

															
															$user_email = $_SESSION['user_mail'];
  															$user_token = $_SESSION['token'];






// $ip_server = $_SERVER['SERVER_ADDR']; 
$subject = 'Change the password. Message from Ecommerce Website';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$from."\r\n".
                    'Reply-To: '.$from."\r\n" .
                    'X-Mailer: PHP/' . phpversion();




$body = '
				<html>
                      <head>
                      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                     <style>
						    .reset_button {
                          box-shadow: -2px 4px 14px -3px #3dc21b;
                          background-color:#44c767;
                          border-radius:36px;
                          border:5px solid #18ab29;
                          display:inline-block;
                          cursor:pointer;
                          color:#ffffff;
                          font-family:Verdana;
                          font-size:19px;
                          font-weight:bold;
                          font-style:italic;
                          padding:11px 33px;
                          text-decoration:none;
                          text-shadow:-1px -4px 3px #2f6627;
                        }
                        .reset_button:hover {
                          background-color:#5cbf2a;
                        }
                        .reset_button:active {
                          position:relative;
                          top:1px;
                        }
                      </style>
					</head>
                      <body>

                      <center><div style="width:40%;"><strong><h4 style="font-size:20px" >Need to reset your password? No problem! Just click the button below and you\'ll be on your way. If you did not make this request.Please ignore the email.<h4></strong>

					<a href="'.'http://localhost/password_reset/reset_password_final.php?user='.$user_email.'&token='.$user_token.'" class="reset_button">Reset Password</a>
					
					<h3 style="color:red;">Don\'t share this link to other third party !!!</h3></div></center>
                        </body>
                        </html>';

if (mail($user_email, $subject, $body, $headers)) {
echo '<script>window.location.replace("/password_reset/index.php?found=true&user_email='.$email_to_reset.'&message=send");</script>';

exit();
} else {
echo '<script>window.location.replace("/password_reset/index.php?error=true");</script>';
exit();
}




// ============================================================================
header("Location: ");
exit();

			           								}
			           								else
			           								{
													
			           										header("Location: /password_reset/index.php?found=false&user_email=not_in_database");
															exit();

													}


										}









					
           		}
		
}
else
{
	echo '<script> 
				window.location.replace("/redirect?clicked_button_to_proceed");
		</script>';
		exit();
}




?>