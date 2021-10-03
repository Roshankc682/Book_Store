 

 <!-- http://localhost/password_reset/reset_password_final.php?user=$user_email&token=$expDate -->

<?php




// The user is passed from the url paremeter
	require 'db_reset_password.php';

	$email_from_url = $_GET['user'];
	$email_from_url = mysqli_real_escape_string($data_base_reset,$email_from_url); 
	$token_from_url = $_GET['token'];
	$token_from_url = mysqli_real_escape_string($data_base_reset,$token_from_url);
	
	// if user try to change the email and token then or empty then redirect to index page
	if(empty($email_from_url) || empty($token_from_url))
	{	
		

			header("Location: /password_reset/index.php?email_cannot_be_empty=true");
			exit();
		
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Password | Reset</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- for recapcha -->
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
<body>

	<!-- ========nav bar========================= -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  
 <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/ecommerce_website/login.php">Home <span class="sr-only">(current)</span></a>
      </li>
  </div>
</nav>
<!-- ================================================ -->


<form action="password_reset_with_token.php?Password_change=processing"  style="width: 500px;margin:auto;" method="post">
	 <div>
	 				<?php //hidden input for email and token ?>
	 				<br>

	 	 		 <input type="hidden" id="user_email" name="user_email_" value="<?php echo $email_from_url;  ?>">
				 <input type="hidden" id="user_token" name="user_token_" value="<?php echo $token_from_url; ?>">
               
               <div class="form-label-group">
               	 <label for="inputpassword">New password</label>
                <input type="password" name="password" id="pass" class="form-control" placeholder="password" required autofocus>
              </div>
              <div class="form-label-group">
               	 <label for="inputpassword">Repeat New password</label>
                <input type="password" name="password_repeat" id="pass_repeat" class="form-control" placeholder="password" required autofocus>
              </div>
              <br>
       				
       			<center><form action="?" method="POST">
        			<div class="g-recaptcha" data-sitekey="6LdjEeQaAAAAACb7HVp1MdIdTR_VbgRqO7hRqUjK" data-callback="enableBtn"></div>
        		</form>
        		 
        		 <label>Solve the capcha to enable login</label><br>
                <button id="but" type="submit" class="btn btn-primary"  onclick="return compareStr()" name="reset_password_submit">Reset Password</button>
              </center>

    </div>
</form>

<?php
 						$fullUrl_for_created_account = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl_for_created_account, "recapcha=invalid")== true)
            {
                   echo '<br><center><div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:250px;">
                    <strong>Are you a robot !!! </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div></center>';
            }
   ?>
<script type="text/javascript">
	function compareStr() 
	{

		pass_1 = document.getElementById("pass").value;
		pass_2 = document.getElementById("pass_repeat").value;
		if(pass_1 == pass_2)
		{
			return true;
			// console.log(1);
		}else{

		 
			<div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin:auto;max-width:300px">
                    <strong>It's seems like you didn't say to reset password</strong 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

			return false;
			// console.log(2);
		}

	}
</script>
<!-- buttom will function after capcha -->
<script type="text/javascript"> 
  document.getElementById("but").disabled = true;
 
 function enableBtn(){
    document.getElementById("but").disabled = false;
   }</script>
</body>
</html>