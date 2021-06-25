<?php
		// Session started in header.php
	require "header.php";
if (isset($_SESSION['name'])) 
{ 
	// echo '<pre>';
	$username = $_SESSION['name'];    // yes batw chai user ko name leko ho
	// print_r($_POST);

	require 'includes/db.inc.php';


	echo "<center><h1>Sending message wait few Seconds</h1></center>";


					$sql="select * from users where (username='$username');"; 

            		$res=mysqli_query($data_base,$sql);

            			if (mysqli_num_rows($res) > 0) 
            				{
            				// output data of each row
            				$row = mysqli_fetch_assoc($res);

            				// username_already_taken or not check
		
            				if ($username == $row['username'])
            					{
            						$to_email_client =  $row['email'];
            					}
            				
            				}


// $username ma name and $to_email_client mai email ayo user ko

	$to_email = 'codieburh682@gmail.com'; //yo admin ko email
	$subject = 'Subject : '.$_POST['subject'];
	$body = 'From : '.$_SESSION['name'].' '.$_POST['message'];
	$headers = "From: ".$to_email_client;

	if (mail($to_email, $subject, $body, $headers)) {
	    echo '<script>window.location.replace("contact.php?success=message_sent_succefully");</script>';
	                exit();
	} else {
	     echo '<script>window.location.replace("contact.php?unsuccess=message_false");</script>';
	                exit();
	}


}
else
{
	echo '<script> 
												window.location.replace("index.php");
									</script>';
								exit();
}