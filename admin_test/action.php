<?php
require 'db_reset_password.php';
$password = $_POST['password'];
$repeat_password = $_POST['repeat_password'];
$token_from_url = $_POST['token'];
$email_from_url = $_POST['email'];
$password_from_url = $_POST['password'];
if(empty($password) || empty($repeat_password))
{	
	echo "<script>alert('Both field needed')</script>";
	echo '<script> window.location.replace("http://localhost/admin_test/login.php?changed_password_succesfully=false");</script>';
	exit();
}
else
{
	
	if($password == $repeat_password)
	{
				$sql = "SELECT email FROM password_reset_temp WHERE email=$email_from_url";
				$stmt = mysqli_stmt_init($data_base_reset);
				if(!mysqli_stmt_prepare($stmt,$sql))
				{
					$sql="select * from password_reset_temp where (email='$email_from_url');";

		            $res=mysqli_query($data_base_reset,$sql);
		    		if (mysqli_num_rows($res) > 0) 
		            {
		            	$row = mysqli_fetch_assoc($res);
		            	if ($email_from_url==$row['email'])
		            					{
		                					// ============================now the token matches or not====================
		            								$actual_token =  $row['expDate'];
		            								$password_from_url =  md5($password_from_url);

		            								if($token_from_url === $actual_token)
		            								{
		            									// echo $actual_token;
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
																$sql_update_title = "UPDATE admin SET password='$password_from_url' WHERE user='admin'";
																// print_r($sql_update_title);
																
																

																if($conn->query($sql_update_title) === TRUE) 
																	{

																		$conn__ = new mysqli("localhost", "root", "","password_reset" );

																		// sql to delete a record
																		$admin_email = "roshankc682@gmail.com";
																		$sql__ = "DELETE FROM password_reset_temp WHERE email='$admin_email'";

																		if ($conn__->query($sql__) === TRUE) {} else {}
																		
																		echo '<script> 
																						window.location.replace("http://localhost/admin_test/login.php?changed_password_succesfully=true");
																				</script>';
				   																exit();
																	} 
																	else 
																	{
																	  echo "Error while updating: " . $conn->error;
																	  echo "<br>";
																	}

																

		            								}
		            								else
		            								{
		            										echo '<script> window.location.replace("http://localhost/admin_test/login.php?changed_password_succesfully=false");</script>';
															exit();
		            								}
		            					}
		            					else
		            					{
		            						echo '<script> window.location.replace("http://localhost/admin_test/login.php?changed_password_succesfully=false");</script>';
											exit();
		            					}

		            }
		            else
		            {
		            	echo '<script> window.location.replace("http://localhost/admin_test/login.php?changed_password_succesfully=false");</script>';
						exit();
		            }
		         }else
		         {
		            	
		            	echo '<script> window.location.replace("http://localhost/admin_test/login.php?changed_password_succesfully=false");</script>';
						exit();
		         }
	}
	else
	{
		echo '<script> window.location.replace("http://localhost/admin_test/login.php?changed_password_succesfully=false");</script>';
			exit();
	}
}


?>