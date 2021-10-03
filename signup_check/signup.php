<head>

      <!--This handle the style red color pretty simple ->>> hmmm cool stuff-->
      <!-- used bootstrap the css gone :) -->
      <!-- for recapcha -->
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<?php
	require "header.php"
?>

<?php

if (isset($_SESSION['name'])) 
{
  // if user as already login and want to access the signup  BOOOOOOMMMMM -> redirect to account page
  // in server
    // header("Location: http://logintest.bcawebsite.com/index.php");
    header("Location: /ecommerce_website/login.php");

    // in local
    // header("Location: /index.php");
    
    // don't exit it will not load divine
    // exit();
}
else
{



		echo '<main>';
			

			
				if(isset($_GET['error']))
				{
					if ($_GET['error'] == "emptyfields") 
					{
						echo '<p>Fill all the forms</p>';
					}
				}

		
				

echo '<form action="includes/signup.inc.php" method="post">
         
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="opacity:0.8;">
        <div class="card card-signin my-5">
          <div class="card-body"><h5 class="card-title text-center">Signup</h5> ';

   // if any error occur like not name in field that is catch by post method in signup.inc.php however i can generate that error in bleow line using this code BOOOOOOOOOOOOOOOOOOOOOOM ---- :)
      
          
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "error=emptyfields&udi")== true)
            {
              
                 echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Empty fields</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            }
            else if(strpos($fullUrl, "error=Invalid_Username")== true)
            {
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Username Invalid</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                                  
            }
            else if(strpos($fullUrl, "error=Invalid_Email_&udi")== true)
            {
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Invalid Email</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                
            }
            else if(strpos($fullUrl, "error=Password&Password_Repeat_doesnot_match")== true)
            {
                
                 echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Password Password Repeat doesnot match</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                
            }
            else if(strpos($fullUrl, "error=username_already_taken")== true)
            {
               
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Username already taken</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                
                
            }
            else if(strpos($fullUrl, "success=work_like_charm")== true)
            {
                echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                      <strong>Succesfully Created Account</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
            
            
                
                
            }
            else if(strpos($fullUrl, "signup_is_required")== true)
            {
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Username Invalid</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                
                
            }
             else if(strpos($fullUrl, "oops=signup_is_required")== true)
            {
               echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Username Invalid</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                
                
            }
            // error=email_already_taken_in_check
           else if(strpos($fullUrl, "error=email_already_taken_in_check")== true)
            {
               echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Email already in Used</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                
                
            }  
            else if(strpos($fullUrl, "error_mail=cannot_send_mail")== true)
            {
               echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>error_mail=cannot_send_mail</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                
                
            }
            $public_key = '6LdjEeQaAAAAACb7HVp1MdIdTR_VbgRqO7hRqUjK';
          	            echo '
          	            		<form action="includes/signup.inc.php" method="post">

                        <div class="form-label-group">
                        <b><label for="inputusername">Username</label></b>
                          <input type="text" name="name" placeholder="Username" id="inputusername" class="form-control" required autofocus>
                          <center><a style="color:red;"><b>Recommended username followed by number and (charactes like *,$,% ... are not valid)</b></a></center>
                
              </div>
              <div class="form-label-group">
              <b><label for="inputusername">Nickname</label></b>
              
                          <input type="text" name="Nickname" placeholder="Nickname" id="inputusername" class="form-control" required autofocus>
                          
                </div>
                  <div class="form-label-group">
                 <b> <label for="inputEmail">Email</label></b>
              
                          <input type="text" name="mail" placeholder="E-mail" type="email" id="inputEmail" class="form-control" required autofocus>
                </div>

     <div class="form-label-group">
      <b><label for="inputpassword">password</label></b>
              
                          <input type="password" name="pwd" placeholder="password" type="email" id="inputpassword" class="form-control" required autofocus>
               </div>

          
     <div class="form-label-group">
     <b><label for="pwd-repeat">Repeat password</label></b>
              
                          <input type="password" name="pwd-repeat" placeholder="password" type="email" id="pwd-repeat" class="form-control" required autofocus>
                </div>                
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
          <center><a  href="/password_reset/" class="btn btn-danger">Forget password <span class="sr-only"></span></a><center>
                        <br>

        <form action="?" method="POST">

        <div class="g-recaptcha" data-sitekey="'.$public_key.'" data-callback="enableBtn"></div>

                  <label><b>Solve the capcha to enable login</b></label>

              <button id="but" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="signup-submit">signup</button>
          </form> 
     
    </form>';



           
    
      echo '
      <!-- buttom will function after capcha -->
<script type="text/javascript"> 
  document.getElementById("but").disabled = true;
 
 function enableBtn(){
    document.getElementById("but").disabled = false;
   }</script>

          </div>
        </div>
      </div>
    </div>
  </div>







		</main>';


        
      
  }
    ?>
    

 <!-- buttom will function after capcha -->
<!-- <script type="text/javascript"> 
  document.getElementById("but").disabled = true;
 
 function enableBtn(){
    document.getElementById("but").disabled = false;
   }</script> -->

<?php
	require "footer.php"
?>