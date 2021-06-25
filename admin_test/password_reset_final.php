<?php

		require 'db_reset_password.php';



		$conn = new mysqli("localhost", "root", "","password_reset" );

		$sql = "SELECT * FROM password_reset_temp";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		   $admin_email = "roshankc682@gmail.com";
		   if(strcmp($admin_email, $row["email"]) == 0)
		   {
		   	echo '<script> window.location.replace("http://localhost/admin_test/login.php?email=false");</script>';
					exit();
		   }

		  }
		} else {}
		$conn->close();



	// i don't know but seems likes more secure
		$user_claim_time_to_reset_password =  time() + 5*60; // 5 minute = 5 * 60 sec
		// echo $user_claim_time_to_reset_password;
		$to_email = 'roshankc682@gmail.com';
		$message = 'http://localhost/admin_test/password_reset_final_with_token.php?email='.$to_email.'&token='.$user_claim_time_to_reset_password;
		$subject = 'From : admin';
		$from = "E-commerce site : ";
		 // To send HTML mail, the Content-type header must be set
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                 
                // Create email headers
                $headers .= 'From: '.$from."\r\n".
                    'Reply-To: '.$from."\r\n" .
                    'X-Mailer: PHP/' . phpversion();

		$data_insert_in_databse_for_reset = "INSERT INTO `password_reset_temp` (email, expDate) VALUES ('$to_email', '$user_claim_time_to_reset_password')";
		

		$body = '<html>
                      <head>
                      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                      <style>
                     .btn {
												  background: #f1f1f3;
												  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
												  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
												  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
												  background-image: -o-linear-gradient(top, #3498db, #2980b9);
												  background-image: linear-gradient(to bottom, #3498db, #2980b9);
												  -webkit-border-radius: 16;
												  -moz-border-radius: 16;
												  border-radius: 16px;
												  font-family: Courier New;
												  color: #ffffff;
												  font-size: 16px;
												  padding: 10px 20px 10px 20px;
												  text-decoration: none;
												}

												.btn:hover {
												  background: #3cb0fd;
												  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
												  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
												  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
												  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
												  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
												  text-decoration: none;
												}
                      </style>
                      </head>
                      <body><center><div>
                      <h4>To reset your password click below button if not then leave it<h4>
                      <br><a class="btn" href="'.$message.'">Click to reset the password</a><div><br>
                      <h4 style="color:red;">Don\'t share this link to other third party !!!</h4></center>
                        </body>
                        </html>';


			$inserted = mysqli_query($data_base_reset,$data_insert_in_databse_for_reset);
			echo "<h1>Sending message wait few Seconds</h1>";
			if (mail($to_email, $subject, $body, $headers)) {
			    echo '<script>window.location.replace("http://localhost/admin_test/login.php?success=message_sent_succefully");</script>';
			                exit();
			} else {
			     echo '<script>window.location.replace("http://localhost/admin_test/login.php?unsuccess=message_false");</script>';
			                exit();
			}
?>