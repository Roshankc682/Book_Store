<?php
  require "header.php";
  // require 'includes/db.inc.php';
if (isset($_SESSION['name'])) 
{ 


			if(isset($_POST['new_comment']) && !empty($_POST['new_comment'])) 
    		{

				

		      if(isset($_POST["rating"]))
		      {
		        $rate = $_POST['rating'];
		        $rate  = htmlspecialchars($rate, ENT_QUOTES);



		       $comment_id___edit= $_SESSION['comment_id___edit'];
	    		$hidden_id = $_SESSION['This_is_hidden_id'];
	    		$new_comment_submitted_by_permission_user = $_POST['new_comment'];
	    			
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "bs";

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
					  die("Connection failed: " . $conn->connect_error);
					}


					$sql = "UPDATE `$hidden_id` SET comemnts='$new_comment_submitted_by_permission_user',rating='$rate' WHERE id='$comment_id___edit'";
					
					if ($conn->query($sql) === TRUE) {
					  echo '<script>window.location.href = "'.$_SESSION['fullUrl_passed_to_show_not_permission_from_details']; echo '"</script>';
						
					} else {
					  // echo "Error updating record: " . $conn->error;
						echo '<script>window.location.href = "'.$_SESSION['fullUrl_passed_to_show_not_permission_from_details']; echo '"</script>';
						}

					$conn->close();




		     }else
		     {


		     	 $comment_id___edit= $_SESSION['comment_id___edit'];
	    		$hidden_id = $_SESSION['This_is_hidden_id'];
	    		$new_comment_submitted_by_permission_user = $_POST['new_comment'];
	    			
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "bs";

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
					  die("Connection failed: " . $conn->connect_error);
					}


					$sql = "UPDATE `$hidden_id` SET comemnts='$new_comment_submitted_by_permission_user' WHERE id='$comment_id___edit'";
					
					if ($conn->query($sql) === TRUE) {
					  echo '<script>window.location.href = "'.$_SESSION['fullUrl_passed_to_show_not_permission_from_details']; echo '"</script>';
						
					} else {
					  // echo "Error updating record: " . $conn->error;
						echo '<script>window.location.href = "'.$_SESSION['fullUrl_passed_to_show_not_permission_from_details']; echo '"</script>';
						}

					$conn->close();

		     }
		            
		  

				
			}
			else
			{	
				 echo '<script>window.location.href = "'.$_SESSION['fullUrl_passed_to_show_not_permission_from_details']; echo '"</script>';
				
		  }
}
else
{
	echo '<script> 
         window.location.replace("http://localhost/ecommerce_website/login.php?error=please_signup");
        </script>';
  exit();
}


?>