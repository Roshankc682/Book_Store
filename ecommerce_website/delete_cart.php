<?php

			// Session started in header.php
	require "header.php";
if (isset($_SESSION['name'])) 
{ 
		// This is remove code
	if(isset($_REQUEST['remove']))
	{

		// Get the book_id to delete from table
		$user_name =  $_SESSION['name'];

		$book_id = $_REQUEST["book_id"];
		// echo $book_id;
		// echo $user_name;

		
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

		// sql to delete a record
		$sql = "DELETE FROM $user_name WHERE book_id='$book_id'";

		if ($conn->query($sql) === TRUE) 
		{
								echo '<script> 
												window.location.replace("viewcart.php?Removed_succesfully");
									</script>';
								exit();
		} else {
		  echo "Error deleting record: " . $conn->error;
		}

	}
	else
	{

		echo '<script> 
						window.location.replace("viewcart.php?Removed_unsuccesfully");
			</script>';
		   exit();
	}
}
else
{
	header("Location: login.php?error=please_signup");
	exit();
}


	?>