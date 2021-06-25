<?php
session_start();
?>
<?php

if (isset($_SESSION['name'])) 
{
  // if user as already login and want to access the signup  BOOOOOOMMMMM -> redirect to account page
    header("Location: dashboard.php");
      
}
else
{
				echo'
                <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

           

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
          <head>
          <style>
                  body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
          }
          #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 420px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
          }
          #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
          }
          #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
          }
                  </style>
        </head>';

    
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "error=the_credentials_was_empty")== true)
            {
                echo '<center><div class="alert alert-danger alert-dismissible fade show alert-danger" style="width: 309px;" role="alert">
                    <strong>The field cannot be empty </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div></center>';
            }
            else if (strpos($fullUrl, "email=false")== true)
            {
               echo '<center><div class="alert alert-danger alert-dismissible fade show alert-danger" style="width: 309px;" role="alert">
                    <strong>Wait for one minute before another request !!! </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div></center>';
            }
            else if (strpos($fullUrl, "not_found=invlaid_credentials")== true)
            {
               echo '<center><div class="alert alert-danger alert-dismissible fade show alert-danger" style="width: 309px;" role="alert">
                    <strong>The credentials was not valid</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div></center>';
            }
            else if (strpos($fullUrl, "changed_password_succesfully=false")== true)
            {
               echo '<center><div class="alert alert-danger alert-dismissible fade show alert-danger" style="width: 309px;" role="alert">
                    <strong>Sorry something went wrong</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div></center>';
            }
            else if (strpos($fullUrl, "changed_password_succesfully=true")== true)
            {
               echo '<center><div class="alert alert-primary alert-dismissible fade show alert-primary" style="width: 309px;" role="alert">
                    <strong>Password changed</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div></center>';
            }
            else if (strpos($fullUrl, "success=message_sent_succefully")== true)
            {
               echo '<center><div class="alert alert-primary alert-dismissible fade show alert-primary" style="width: 309px;" role="alert">
                    <strong>Email sent to admin</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div></center>';
            }
            else if (strpos($fullUrl, "unsuccess=message_false")== true)
            {
               echo '<center><div class="alert alert-danger alert-dismissible fade show alert-danger" style="width: 309px;" role="alert">
                    <strong>Fail to send Email</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div></center>';
            }
            

        echo '  <div id="login">
        <h3 class="text-center text-white pt-5">Admin Panel</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="login_inc.php" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="name" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="pwd" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <center><a href="http://localhost/admin_test/password_reset_final.php?admin=password_reset" type="button" class="btn btn-primary btn-lg btn-block btn-danger"   value="Forgot Password">Forgot Password</a>
                                    <br>
                                <input type="submit" name="login-submit" class="btn btn-primary btn-lg btn-block btn-info btn-md" value="login"><center>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>';


            
      echo '<script type="text/javascript">
        
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );';
  }


            
?>

