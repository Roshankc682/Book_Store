<?php


	require 'db_reset_password.php';
	// The user is passed from the url paremeter
	$email_from_url = $_POST['user_email_'];
	$email_from_url = mysqli_real_escape_string($data_base_reset,$email_from_url); 
	$token_from_url = $_POST['user_token_'];
	$token_from_url = mysqli_real_escape_string($data_base_reset,$token_from_url);

	$password_from_url = $_POST['password'];
	$password_from_url = mysqli_real_escape_string($data_base_reset,$password_from_url);

	$password_from_url_repeat = $_POST['password_repeat'];
	$password_from_url_repeat = mysqli_real_escape_string($data_base_reset,$password_from_url_repeat);

	



// =========================recpcha=================================
$recaptcha = stripslashes($_POST["g-recaptcha-response"]);
$recaptcha = mysqli_real_escape_string($data_base_reset,$recaptcha); 
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
	// http://localhost/password_reset/reset_password_final.php?user=kcroshan682@gmail.com&token=1623688476
	echo '<script>window.location.replace("http://localhost/password_reset/reset_password_final.php?user='.$email_from_url.'&token='.$token_from_url.'&recapcha=invalid");</script>';
	exit();
}

// =========================recpcha=================================



	// echo $email_from_url;
	// echo "<br>";
	// echo $token_from_url;
	// echo "<br>";
	// echo $password_from_url_repeat;
	// echo "<br>";
	// echo $password_from_url;

	if($password_from_url_repeat == $password_from_url)
	{


			if(empty($email_from_url) || empty($token_from_url) || empty($password_from_url) || empty($password_from_url_repeat))
			{	
				

					header("Location: /password_reset/index.php?email_cannot_be_empty=true");
					exit();
				
			}else
			{
				// echo "done";

					// checking from the database to reset password
				$sql = "SELECT email FROM password_reset_temp WHERE email=$email_from_url";
				$stmt = mysqli_stmt_init($data_base_reset);
				if(!mysqli_stmt_prepare($stmt,$sql))
				{
					$sql="select * from password_reset_temp where (email='$email_from_url');";

		            $res=mysqli_query($data_base_reset,$sql);
		    		if (mysqli_num_rows($res) > 0) 
		            {
		            	// if the email is in password_reset_temp then the echo good if not else which is pass from parameter
		            	// echo "1";
		            	// output data of each row
		            				$row = mysqli_fetch_assoc($res);

		            				// username_already_taken or not check
				
		            				if ($email_from_url==$row['email'])
		            					{
		                					// echo "best";
		                					// echo $row['email'];
		                					$id_of_user = $row['id'].'<br>';


		                					// ============================now the token matches or not====================
		            								$actual_token =  $row['expDate'];

		            								if($token_from_url === $actual_token)
		            								{
		            									// =========here the actual update of password happen======
		            									  
																$servername = "localhost";
																$username = "root";
																$password = "";
																$dbname = "players";

																// Create connection
																$conn = new mysqli($servername, $username, $password, $dbname);
																// Check connection
																if ($conn->connect_error) {
																  die("Connection failed: " . $conn->connect_error);
																}

																// sql password update
																$password_from_url = md5($password_from_url);
	
																$sql_update_title = "UPDATE users SET password='$password_from_url' WHERE email='$email_from_url'";

																
																if($conn->query($sql_update_title) === TRUE) 
																	{
																		// echo "password updated";
																		// echo "<br>";

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link_delete = mysqli_connect("localhost", "root", "", "password_reset");
/*password_reset_temp*/

 
// Check connection
if($link_delete === false){
    // die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql__delete_by_id = "DELETE FROM password_reset_temp WHERE id='$id_of_user'";
// echo '<br>'.$sql__delete_by_id.'<br>';													

if(mysqli_query($link_delete, $sql__delete_by_id)){
    // echo "Records were deleted successfully.";
} else{
    // echo "ERROR: Could not able to execute $sql__delete_by_id.<br> " . mysqli_error($link_delete);
}
 
// Close connection
mysqli_close($link_delete);
																		echo '<script> 
																						window.location.replace("/ecommerce_website/login.php?changed_password_succesfully=true");
																				</script>';
				   																exit();
																	} 
																	else 
																	{
																	  echo "Error while updating: " . $conn->error;
																	  echo "<br>";
																	}

		            											
														// ======================================================

		            								}
		            								else
		            								{
		            									header("Location: /password_reset/index.php?token_expires=true");
														exit();
		            								}
		                					// =================================================================================

		            					}
		            					else
										{
											header("Location: /password_reset/index.php?Email_is_not_in_reset_database=true");
											exit();
										}
		           	}
		            else
		            {

		            	header("Location: /password_reset/index.php?Email_is_not_in_reset_database=true");
						exit();
		            }
				}
				else
				{
					header("Location: /password_reset/index.php?First_error=true");
					exit();

				}

			}
		}
		// if password doesn't match with repeat
		else
		{
			echo '<script>alert("The Repeat password doesn\'t match")</script>';
			echo "<script>window.history.back();</script>";
			exit();	
		}


?>