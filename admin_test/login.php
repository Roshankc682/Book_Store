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
                    <title>Admin | Login</title>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="shortcut icon" type="image/jpg" href="https://www.pngfind.com/pngs/m/528-5286002_forum-admin-icon-png-nitzer-ebb-that-total.png"/>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

           

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
          <head>
          <style>
          .admin_pic {
              vertical-align: middle;
              width: 70px;
              height: 70px;
              border-radius: 50%;
            }
            body {
            margin: 0;
            padding: 0;
            // background-color: #17a2b8;
            height: 100vh;
            background-image: url("https://wallpaperaccess.com/full/124378.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;

          }
          #login .container #login-row #login-column #login-box {
            margin-top: 90px;
            max-width: 600px;
            height: 420px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
            opacity: 0.9;
            border-radius:60px;
          }
          #login .container #login-row #login-column #login-box #login-form {
            padding: 3px;
          }
          #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -50px;
          }
                  </style>
        </head><br>';

    
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
            

        echo '<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="login_inc.php" method="post">
                            <h4 class="text-center text-info"><b>Admin login Panel</b></h4>
                            <center><img src="https://www.pngfind.com/pngs/m/528-5286002_forum-admin-icon-png-nitzer-ebb-that-total.png" alt="Avatar" class="admin_pic"></center>
                            <div class="form-group">
                                <b>Username</b>
                                <input type="text" name="name" id="username" class="form-control" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <b>Password</b>
                                <input type="password" name="pwd" id="password" class="form-control" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login-submit" class="btn btn-primary btn-lg btn-block btn-info btn-md" value="Login">
                                <a href="http://localhost/admin_test/password_reset_final.php?admin=password_reset" type="button" class="btn btn-primary btn-lg btn-block btn-danger"   value="Forgot Password">Forgot Password</a>
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

