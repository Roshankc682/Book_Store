
<head>
    <!-- for recapcha -->
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>

      <!--This handle the style red color pretty simple ->>> hmmm cool stuff-->

  <style type="text/css">

    .appear_after_invalid_credential{
                        background-color: #f44336;
                        color: white;
                        padding: 15px 25px;
                        text-align: center;    
                        align-self: center;
                        /*text-decoration: none;*/
                        /*display: inline-block;*/
}
    .error_in_signup{
      text-align: center;
        color: red;
  opacity: 1;
  animation-name: fadeInOpacity;
  animation-iteration-count: 1;
  animation-timing-function: ease-in;
  animation-duration: 7s;
}

@keyframes fadeInOpacity {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}

</style>
</head>
<body>
    

  </style>
</head>

<?php
	require "header.php"
?>

<?php

if (isset($_SESSION['name'])) 
{
  // if user as already login and want to access the signup  BOOOOOOMMMMM -> redirect to account page
   echo '<script>window.location.replace("index.php");</script>';
    exit();

    // for server online 
      // if user as already login and want to access the signup  BOOOOOOMMMMM -> redirect to account page
    
    //   don't exit it will not load divine
    // exit();
}
else
{



		echo '<main>';
			

			

		
				

echo ' <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
        <div class="card-body">
            <h5 class="card-title text-center">Login</h5>';

          $fullUrl_for_created_account = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl_for_created_account, "success=work_like_charm")== true)
            {
              echo ' <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Account created succesfully</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            }
              echo '<form action="includes/login.inc.php" class="form-login" method="post">
              
              <div class="form-label-group">
                <input type="email" name="name" placeholder="E-mail" type="email" id="inputusername" class="form-control" required autofocus>
                <label for="inputusername">E-mail</label>
              </div>
              <div class="form-label-group">
                <input type="password" name="pwd" id="inputpassword" class="form-control" placeholder="password" required>
                <label for="inputpassword">Password</label>
              </div>


              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <center><a  href="/password_reset/" class="btn btn-danger">Forget password <span class="sr-only"></span></a><center>
                <br>
      <form action="?" method="POST">

        <div class="g-recaptcha" data-sitekey="6LdjEeQaAAAAACb7HVp1MdIdTR_VbgRqO7hRqUjK" data-callback="enableBtn"></div>

          <label>Solve the capcha to enable login</label>
              <button id="but" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="login-submit">Login</button>
         </form> 
             
            </form>';


            // if any error occur like not name in field that is catch by post method in login.inc.php however i can generate that error in bleow line using this code BOOOOOOOOOOOOOOOOOOOOOOM ---- :)
      
          
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "error=all_field_are_required")== true)
            {
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>All field are required</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            }
            else if(strpos($fullUrl, "error=sqlerror")== true)
            {
               
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error in data base</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            }
            
            else if(strpos($fullUrl, "recapcha=invalid")== true)
            {
                   echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Are you a robot !!! </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
      
                
            }
            else if(strpos($fullUrl, "not_found=invlaid_credentials")== true)
            {
                   echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Account not Found</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                  echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>SignUp now :) </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                // sign up in center
                echo '<br><br><div style="text-align:center" >';
                echo '<a class="appear_after_invalid_credential" href="/signup_check/signup.php">signup</a>';
                echo '</div>';
      
                
            }
           
             else if(strpos($fullUrl, "oops=signup_is_required")== true)
            {
                 echo ' <br><div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>SignUp us required</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            }
             else if(strpos($fullUrl, "changed_password_succesfully=true")== true)
            {
                 echo ' <br><div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>changed password succesfully</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            }
            else if(strpos($fullUrl,"/?")== true)
            {
                  header("Location: login.php");
                  // exit();
            }
            else if(strpos($fullUrl,"?/")== true)
            {
                  header("Location: login.php");
                  // exit();
            }
?>

<?php

     echo'</div>
        </div>
      </div>
    </div>
  </div>';
  }
    ?>
<!-- buttom will function after capcha -->
<script type="text/javascript"> 
  document.getElementById("but").disabled = true;
 
 function enableBtn(){
    document.getElementById("but").disabled = false;
   }</script>


<?php
	require "footer.php"
?>