<?php

if(isset($_REQUEST['clicked']))
{
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bs";

	$delete_id =  $_POST['S_N'];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  // die("Connection failed: " . $conn->connect_error);
	}

	// sql to delete a record
	$sql = "DELETE FROM user_deliver WHERE id=$delete_id";

	if ($conn->query($sql) === TRUE) {
	  // echo "Record deleted successfully";
		echo '<script>window.location.replace("http://localhost/admin_test/order.php?delete=true&t=1");</script>';
	} else {
	  // echo "Error deleting record: " . $conn->error;
		echo '<script>window.location.replace("http://localhost/admin_test/order.php?delete=false&f=0");</script>';
	}

	$conn->close();
}
else
{
	echo "clicked was not clicked";
}

?>