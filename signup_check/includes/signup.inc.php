<?php

if(isset($_POST['signup-submit']))
{

require 'db.inc.php';



if(empty($_POST["g-recaptcha-response"]))
{
	echo '<script>window.location.replace("http://localhost/ecommerce_website/login.php?recapcha=invalid");</script>';
	exit();
}
if(empty($_POST["mail"]))
{
	echo '<script>window.location.replace("http://localhost/signup_check/signup.php?error=Invalid_Email_");</script>';
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

$email = stripslashes($_POST['mail']);
$email = mysqli_real_escape_string($data_base,$email);

$conn = new mysqli("localhost", "root", "", "first_database_for_check");

$sql = "SELECT id FROM check_after_signup WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"];
    	$id =  $row["id"];
    	$sql_ = "DELETE FROM check_after_signup WHERE id='$id'";

		if ($conn->query($sql_) === TRUE) {} else {}

  }
} else {}

$conn->close();

		// i don't know but seems likes more secure

		$username = stripslashes($_POST['name']);
 		$username = mysqli_real_escape_string($data_base,$username); 

 		

		 $password = stripslashes($_POST['pwd']);
 		 $password = mysqli_real_escape_string($data_base,$password);

 		 $passwordRepeat = stripslashes($_POST['pwd-repeat']);
 		 $passwordRepeat = mysqli_real_escape_string($data_base,$passwordRepeat);

 		 $Nickname = stripslashes($_POST['Nickname']);
 		$Nickname = mysqli_real_escape_string($data_base,$Nickname); 
 

	if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($Nickname))
	{	
		 header("Location: /signup_check/signup.php?error=emptyfields&udi=".$username."&email".$email);
		 exit();
		
	}

	else if(!preg_match("/^[a-zA-Z0-9]{5,}$/",$username))
	{
		header("Location: /signup_check/signup.php?error=Invalid_Username");
		exit();
	}

	else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		header("Location: /signup_check/signup.php?error=Invalid_Email_&udi=".$username);
		exit();
	}
	else if($password !== $passwordRepeat)
	{
		header("Location: /signup_check/signup.php?error=Password&Password_Repeat_doesnot_match");
		exit();
	}
	else
	{

			// idUsers	uidUsers	emailUsers	pwdUsers

			$sql = "SELECT username FROM users WHERE username=?";
			$stmt = mysqli_stmt_init($data_base);
				if(!mysqli_stmt_prepare($stmt,$sql))
				{
					header("Location: /signup_check/signup.php?error=sqlerror");
					exit();
				}
				else
				{
					$sql="select * from users where (username='$username');";

            		$res=mysqli_query($data_base,$sql);

            			if (mysqli_num_rows($res) > 0) 
            				{
            				// output data of each row
            				$row = mysqli_fetch_assoc($res);

            			
                					header("Location: /signup_check/signup.php?error=username_already_taken1");
									exit();
         
           					}
							else
							{
								
								$sql_="select * from users where (email='$email');";

			            		$res_=mysqli_query($data_base,$sql_);

			            			if (mysqli_num_rows($res_) > 0) 
			            				{
			            				// output data of each row
			            				
			                					header("Location: /signup_check/signup.php?error=email_already_taken_in_check");
												exit();

			           				}
           							else
           							{

           								// just for token
										$random_num =  rand(0, 1000000000);
										$user_claim_time_to_reset_password =  time() + 5*60;
										$hash_token_for_client_for_check_email = $random_num + $user_claim_time_to_reset_password;
										$hash_token_for_client_for_check_email =  sha1($hash_token_for_client_for_check_email);
										$hash_token_for_client_for_check_email = sha1($hash_token_for_client_for_check_email);
										$_SESSION['hash_token_for_client_for_check_email'] = $hash_token_for_client_for_check_email;


										$time_hash = password_hash($user_claim_time_to_reset_password, PASSWORD_DEFAULT);
										$_SESSION['hash_time'] =  $time_hash;

										 $sql_check_email="select * from check_after_signup where (email='$email');";

						            		$res_check_email=mysqli_query($data_base_for_details_for_email_check,$sql_check_email);

						            			if (mysqli_num_rows($res_check_email) > 0) 
						            				{
						            				// output data of each row
						            				$row_check_email = mysqli_fetch_assoc($res_check_email);

						            				// username_already_taken or not check
								
						            				if ($email == $row_check_email['email'])
						            					{
						                					header("Location: /signup_check/signup.php?error=email_already_taken_in_check");
						                					exit();
						            					}

						           					}
						                            else
						                            {
						                             
														// echo $email.'<br>';

														$_SESSION['message_to_be_send_email'] =$email;		
											
						                            }

											
											 $sql_check_name="select * from check_after_signup where (username='$username');";

						            		$res_check_name=mysqli_query($data_base_for_details_for_email_check,$sql_check_name);

						            			if (mysqli_num_rows($res_check_name) > 0) 
						            				{
						            				// output data of each row
						            				$row_check_name = mysqli_fetch_assoc($res_check_name);

						            				// username_already_taken or not check
								
						            				if ($username == $row_check_name['username'])
						            					{
						                					header("Location: /signup_check/signup.php?error=username_already_taken_in_check");
						                					exit();
						                					
						            					}

						           					}
						                            else
						                            {
						                             
						                             $password = md5($password);
						                             
						                             
														//  // id	username	email	password	hash	time	time_hash	
	$data_insert_in_databse_for_email = "INSERT INTO `check_after_signup` (username, email, password , hash , type , Nickname) VALUES ('$username', '$email', '$password','$hash_token_for_client_for_check_email','email','$Nickname')";

														

														$inserted = mysqli_query($data_base_for_details_for_email_check,$data_insert_in_databse_for_email);

														$_SESSION['message_to_be_send_email'] =$email;	

									
														
														require "C:/xampp/htdocs/signup_check/mail_send_for_signup/index.php";
														exit();

															
											
						                            }


							}
				}
				  // ======================================
			}
	 $data_base->close();
}
}
else
{
	header("Location: index.php");
	exit();

}
