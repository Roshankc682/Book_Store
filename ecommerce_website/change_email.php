<?php
	// Session started in header.php
	require "header.php";
	require 'includes/db.inc.php';

if (isset($_SESSION['name'])) 
{ 
	$token_from_url = stripslashes($_GET['token']);
    $token_from_url = mysqli_real_escape_string($data_base,$token_from_url);
    if(empty($token_from_url))
	{
		echo '<script>window.location.replace("index.php?field=empty");</script>';
		exit();
	}

// =====================check token in datbase or not===========================
$conn_check_previous = new mysqli("localhost", "root", "", "players");

// Full texts	id user_id new_email token
$sql_check_previous = "SELECT user_id, new_email,token FROM mail_change WHERE token='$token_from_url'";
$result_previous = $conn_check_previous->query($sql_check_previous);
if ($result_previous->num_rows > 0) {
  while($row = $result_previous->fetch_assoc()) {
   if($row["token"] == $token_from_url)
   {
   	$user_email_id = $row["new_email"];
   	$user_real_id = $row["user_id"];
   	// echo $user_real_id.'<br>';
    // echo $user_email_id;
   }
  }
} else {}
$conn_check_previous->close();
$use_id = $_SESSION['name'];
if($user_real_id == $use_id)
{}else
{
	echo '<script>window.location.replace("setting.php?error=something_went_wrong");</script>';
		exit();
}

// exit();
// =====================check token in datbase or not===========================

// ========================update the email===========================================
$conn = new mysqli("localhost", "root", "", "players");
$sql = "UPDATE users SET email='$user_email_id' WHERE username='$user_real_id'";
if ($conn->query($sql) === TRUE) {} else {}
$conn->close();
// exit();
// ========================update the email===========================================
// =============================delete from database==============================
// Create connection
$delete = new mysqli("localhost", "root", "", "players");
$delete_sql = "DELETE FROM mail_change WHERE user_id='$user_real_id'";
if ($delete->query($delete_sql) === TRUE) {} else {}
$delete->close();
echo '<script>window.location.replace("setting.php?change=true");</script>';
exit();
// =============================delete from database==============================

}
// if not login then 
else
{


    $token_from_url = stripslashes($_GET['token']);
    $token_from_url = mysqli_real_escape_string($data_base,$token_from_url);
    if(empty($token_from_url))
		{
			echo '<script>window.location.replace("index.php?field=empty");</script>';
			exit();
		}


	// =====================check token in datbase or not===========================
$conn_check_previous = new mysqli("localhost", "root", "", "players");

// Full texts	id user_id new_email token
$sql_check_previous = "SELECT user_id, new_email,token FROM mail_change WHERE token='$token_from_url'";
$result_previous = $conn_check_previous->query($sql_check_previous);
if ($result_previous->num_rows > 0) {
  while($row = $result_previous->fetch_assoc()) {
   if($row["token"] == $token_from_url)
   {
   	$user_email_id = $row["new_email"];
   	$user_real_id = $row["user_id"];
   	// echo $user_real_id.'<br>';
    // echo $user_email_id;
   }
  }
} else {}
$conn_check_previous->close();
if(empty($user_email_id))
{
	// 
	echo '<script>window.location.replace("index.php?unsuccess=message_false");</script>';
  exit();
}
// ========================update the email===========================================
$conn = new mysqli("localhost", "root", "", "players");
$sql = "UPDATE users SET email='$user_email_id' WHERE username='$user_real_id'";
if ($conn->query($sql) === TRUE) {} else {}
$conn->close();
// exit();
// ========================update the email===========================================
// =============================delete from database==============================
// Create connection
$delete = new mysqli("localhost", "root", "", "players");
$delete_sql = "DELETE FROM mail_change WHERE user_id='$user_real_id'";
if ($delete->query($delete_sql) === TRUE) {} else {}
$delete->close();
echo '<script>window.location.replace("index.php?success=message");</script>';
exit();
// =============================delete from database==============================

// exit();
// =====================check token in datbase or not===========================

	exit();
}


?>