<?php

if(isset($_REQUEST['clicked']))
{
		

	$delete_id =  $_POST['S_N'];
	$database_name =  $_POST['book_id'];

	echo $delete_id;
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = 'bs';

	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	// sql to delete a record
	$sql = "DELETE FROM `$database_name` WHERE id=$delete_id";

	if ($conn->query($sql) === TRUE) {
	  // echo "Record deleted successfully";
		echo '<script>window.location.replace("http://localhost/admin_test/review.php?delete=true&t=1");</script>';
		// echo "yes";
	} else {
	  // echo "Error deleting record: " . $conn->error;
		echo '<script>window.location.replace("http://localhost/admin_test/review.php?delete=false&f=0");</script>';
		// echo "nope";
	}

	$conn->close();
}
else
{
	echo "clicked was not clicked";
}

?>