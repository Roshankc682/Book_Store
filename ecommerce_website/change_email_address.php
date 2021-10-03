<?php
	// Session started in header.php
	require "header.php";
if (isset($_SESSION['name'])) 
{ 

require 'includes/db.inc.php';
// =========================recpcha=================================
$recaptcha = stripslashes($_POST["g-recaptcha-response"]);
$recaptcha = mysqli_real_escape_string($data_base,$recaptcha); 
$post = [
    'secret' => '6LdjEeQaAAAAAAFIGHyO4CzqEcsBrVKI0DeWFtwg',
    'response' => $recaptcha,
];
$ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$response = curl_exec($ch);
curl_close($ch);

$data_resposne= json_decode($response, true);
if($data_resposne["success"])
{
	// just login 
}else
{
	echo '<script>window.location.replace("http://localhost/ecommerce_website/setting.php?recapcha=invalid");</script>';
	exit();
}

// =========================recpcha=================================


	  


 	  $new_email = stripslashes($_POST['email']);
    $new_email = mysqli_real_escape_string($data_base,$new_email);
    if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
		  echo '<script>window.location.replace("setting.php?error=true");</script>';
			exit();
		}
    $password_ = stripslashes($_POST['password_']);
    $password_ = mysqli_real_escape_string($data_base,$password_);
    $password_ =  md5($password_);

	if(empty($_POST['email']) || empty($_POST['password_']))
	{
		echo '<script>window.location.replace("setting.php?field=empty");</script>';
		exit();
	}
	$sql_check_name_bio="select * from users where (password='$password_');";
	$res_check_bio=mysqli_query($data_base,$sql_check_name_bio);
  $use_id = $_SESSION['name'];
// =========================check email exits or not==============================
$conn_check_previous = new mysqli("localhost", "root", "", "players");
$sql_check_previous = "SELECT username, email FROM users WHERE username='$use_id'";
$result_previous = $conn_check_previous->query($sql_check_previous);
if ($result_previous->num_rows > 0) {
  while($row = $result_previous->fetch_assoc()) {
   if($row["email"]==$new_email)
   {
   	echo '<script>window.location.replace("setting.php?error=true");</script>';
		exit();
   }
  }
} else {}
$conn_check_previous->close();
// exit();
// =========================check email exits or not==============================

//=============================Check if email already exist or not================

$conn_check_email = new mysqli("localhost", "root", "", "players");
$sql_check_email = "SELECT email FROM users";
$result_check_email = $conn_check_email->query($sql_check_email);
if ($result_check_email->num_rows > 0) {

  while($row = $result_check_email->fetch_assoc()) {

   if($row["email"]==$new_email)
   {
    echo '<script>window.location.replace("setting.php?error=email");</script>';
    exit();
   }

  }
} else {}
$conn_check_email->close();
// ================check email from signup=========================

$conn_check_signup = new mysqli("localhost", "root", "", "first_database_for_check");
$sql_check_signup = "SELECT email FROM check_after_signup";
$result_check_signup = $conn_check_signup->query($sql_check_signup);
if ($result_check_signup->num_rows > 0) {

  while($row = $result_check_signup->fetch_assoc()) {

   if($row["email"]==$new_email)
   {
    echo '<script>window.location.replace("setting.php?error=email");</script>';
    exit();
   }

  }
} else {

}
$conn_check_signup->close();
// exit();

//================================================================================



// ==============================delete data base====================================

$conn_delete_previous = new mysqli("localhost", "root", "", "players");
$sql_delete_previous = "DELETE FROM mail_change WHERE user_id='$use_id'";
if ($conn_delete_previous->query($sql_delete_previous) === TRUE) {} else {}
$conn_delete_previous->close();
// ==============================delete data base====================================




	if (mysqli_num_rows($res_check_bio) > 0) 
	{
		// output data of each row
		$row_check_bio = mysqli_fetch_assoc($res_check_bio);
		// username_already_taken or not check
		if ($password_ == $row_check_bio['password'])
		 {

		 	// ======================Insert data in email change=============================================
		 	$token = md5((uniqid('', true)));
		 	// echo $token;
		 	$conn_change_email = new mysqli("localhost", "root", "", "players");
			$sql = "INSERT INTO mail_change (user_id, new_email, token)
			VALUES ('$use_id', '$new_email', '$token')";

			if ($conn_change_email->query($sql) === TRUE) {} else {}
			$conn_change_email->close();


			 echo "<center><h1>Sending message wait few Seconds</h1></center>";
                // exit();
                
                $from = 'Reqested to change E-mail';
                $to_email = $new_email;
                $subject = 'From : E-commerce-website Create account ';
                 $URLNAME = "http://$_SERVER[HTTP_HOST]";
                
             

                $body = '<html>
                      <head>
                      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                      <style>
                      .signup_button {
                          box-shadow: -2px 4px 14px -3px #3dc21b;
                          background-color:#44c767;
                          border-radius:36px;
                          border:5px solid #18ab29;
                          display:inline-block;
                          cursor:pointer;
                          color:#ffffff;
                          font-family:Verdana;
                          font-size:19px;
                          font-weight:bold;
                          font-style:italic;
                          padding:11px 33px;
                          text-decoration:none;
                          text-shadow:-1px -4px 3px #2f6627;
                        }
                        .signup_button:hover {
                          background-color:#5cbf2a;
                        }
                        .signup_button:active {
                          position:relative;
                          top:1px;
                        }
                      </style>
                       </head>
                      <body><center><div><h2>Your requested to change email to '.$new_email.' </h2><a href=\''.' '.$URLNAME.'/ecommerce_website/change_email.php?token='.$token.'&type='.'email'.'&email='.'change'."' class=\"signup_button\">Click here to change E-mail</a><br><h4 style=\"color: red;\">Don't share this link to any third party and it will expire in 24 hrs or after you click this link</h4><div></center>
                        </body>
                        </html>";
                
                
                // To send HTML mail, the Content-type header must be set
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                 
                // Create email headers
                $headers .= 'From: '.$from."\r\n".
                    'Reply-To: '.$from."\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                // echo $body.'<br>';
                if (mail($to_email, $subject, $body, $headers)) {
			    echo '<script>window.location.replace("setting.php?success=message_sent_succefully");</script>';
			                exit();
			} else {
			     echo '<script>window.location.replace("setting.php?unsuccess=message_false");</script>';
			                exit();
			}
		 	// ==============================================================================================

			exit();
		 }
	}

echo '<script>window.location.replace("setting.php?pass=password_false");</script>';
exit();


}
else
{
	echo '<script>window.location.replace("index.php");</script>';
	exit();
}