<!DOCTYPE html>
<html>
<head>
  <title>Password | Reset</title>
  <link rel="shortcut icon" type="image/jpg" href="https://wallpaperaccess.com/full/124378.jpg"/>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<style type="text/css">
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
      </style>
<body>
<br>

<div  class="shadow-lg p-3 mb-5 bg-white rounded" style="width: 50%;margin:auto;">
<form action="forget_password.php"  method="post">
   
                <br>
                <center><h3 style="color:red;"><b>Reset Password</b></h3><p><b>Enter your E-mail</b><p></center>
                
                  <input type="text" name="mail" placeholder="E-mail" type="email" id="inputEmail" class="form-control" required autofocus>
                  <br>
               <center> <button type="submit"  class="btn btn-danger btn-lg btn-block" name="forget_password_submit">Reset password</button>
                  <a  type="submit" class="btn btn-info btn-lg btn-block" href="/ecommerce_website/login.php"><i class="fas fa-home"></i> Home </a></center>

    
</form>
</div>

<?php
      $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "user_need_to_wait_for_one_minute")== true)
            {
                
          echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin:auto;max-width:300px">
                    <strong>Already claim ! wait for one minute</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
          exit();
                
            }
            else if(strpos($fullUrl, "proceed_error")== true)
            {
               echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin:auto;max-width:300px">
                    <strong>Proceed error</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
          exit();

            }
            else if(strpos($fullUrl, "found=true")== true)
            {
               echo ' <div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin:auto;max-width:300px">
                    <strong>Check you E-Mail</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
          exit();
            
            }
            else if(strpos($fullUrl, "user_email=not_in_database")== true)
            {
                echo ' <div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin:auto;max-width:300px">
                    <strong>E-Mail Not found</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                 exit();
            }
            else if(strpos($fullUrl, "email_cannot_be_empty=true")== true)
            {
               echo ' <div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin:auto;max-width:300px">
                    <strong>E-Mail cannot be empty</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                exit();
            
            }
            
            else if(strpos($fullUrl, "Email_is_not_in_reset_database=true")== true)
            {
               echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin:auto;max-width:500px">
                    <strong>It\'s seems like you didn\'t say to reset password</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                exit();
            
            }
            // error=true
            else if(strpos($fullUrl, "error=true")== true)
            {
               echo ' <div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin:auto;max-width:300px">
                    <strong>There was error while sending mail</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                exit();
            
            }else if(strpos($fullUrl,"token_expires=true")== true)
            {
                 echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin:auto;max-width:500px">
                    <strong>Seems like you didn\'t request for password change</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                exit();
            }
            else
            {
               
                // if refresh nothing
            }
 ?>
</body>
</html>


