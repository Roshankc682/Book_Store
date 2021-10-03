<?php 

   $con_view = mysqli_connect('localhost','root','','password_reset');
   $q = "SELECT * FROM password_reset_temp;";
   $result = mysqli_query($con_view,$q);
   mysqli_close($con_view);

	$url = "http://localhost/password_reset/";



 			while($row=mysqli_fetch_assoc($result))
			{

					$email_data_to_be_delete = $row['id'];

					$subtract_database_time = time();
					$if_zero_then_delete = $row['expDate'] - $subtract_database_time;
				
					echo $if_zero_then_delete;
					

					if($if_zero_then_delete == 0 || $if_zero_then_delete <= 0)
					{
						
								$servername = "localhost";
								$username = "root";
								$password = "";
								$dbname = "password_reset";

								// Create connection
								$conn = new mysqli($servername, $username, $password, $dbname);
								// Check connection
								if ($conn->connect_error) {
								  die("Connection failed: " . $conn->connect_error);
								}

								// sql to delete a record
								$sql = "DELETE FROM password_reset_temp WHERE id=$email_data_to_be_delete";
								if($conn->query($sql) === TRUE) 
									{
											
											echo "  ".$row["email"]." token expired Deleted";
											$output = shell_exec('echo ""');
											echo $output;
											
											} else {
									  echo "Error deleting record: " . $conn->error;
									}



					}


			}


		



?>
