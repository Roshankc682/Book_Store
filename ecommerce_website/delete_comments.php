<?php
  require "header.php";

if (isset($_SESSION['name'])) 
{ 
	
	
	$_SESSION['fullUrl_passed_to_show_not_permission_from_details'];
	$user_name_that_is_logged = $_SESSION['name'];
	 $This_is_hidden_name = $_POST['This_is_hidden_name'];
	 $delete_using_id = $_POST['comment_id___'];
     $This_is_hidden_id = $_POST['This_is_hidden_id'];
     			

				// Create connection
     			// check for permission the comment of user and the logged user is same or not
     			if($user_name_that_is_logged == $This_is_hidden_name)
				{
						$con_for_delete = mysqli_connect('localhost','root','','bs');
						if ($con_for_delete->connect_error) {
						    die("Connection failed: " . $con_for_delete->connect_error);
						}else
						{
							// echo "connected".'<br>';
						}

						$sql = "DELETE FROM `$This_is_hidden_id` WHERE id='$delete_using_id'";
						// echo $sql;

						if ($con_for_delete->query($sql) === TRUE) 
						{
						    // echo '<br>'."yep";
						    // exit();
						     echo '<script>window.location.replace("';echo $_SESSION['fullUrl_passed_to_show_not_permission_from_details']; ; echo '&user_permission=accept");</script>';

						}
						else
						{
						   echo "Error deleting record: " . $con_for_delete->error;
						}
				}
				else
				{
						
						echo '<script>window.location.replace("';echo $_SESSION['fullUrl_passed_to_show_not_permission_from_details']; ; echo '&user_permission=denied");</script>';


				}

}
else
{
	 echo "<script>window.history.back();</script>";

}


?>