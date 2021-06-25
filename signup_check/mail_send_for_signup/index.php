<!DOCTYPE html>
<html> 
  
  
<body> 
  <?php

  // echo '<pre>';
  // print_r($_SESSION);

  // $ip_server = $_SERVER['SERVER_ADDR']; 
    $hash_token_for_client_for_check_email = $_SESSION['hash_token_for_client_for_check_email'];
     $hash_time = $_SESSION['hash_time'];
     $message_to_be_send_email= $_SESSION['message_to_be_send_email'];
     // echo $hash_token_for_client_for_check_email . $hash_time . $message_to_be_send_email;
     

                echo "<center><h1>Sending message wait few Seconds</h1></center>";
                // exit();
                
                $from = 'E-commerce-website';
                $to_email = $message_to_be_send_email;
                $subject = 'From : E-commerce-website Create account ';
                 $URLNAME = "http://$_SERVER[HTTP_HOST]";
                // echo $URLNAME.'<br>';
                // echo trim($fullUrl, "//");

             

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
                      <body><center><div><h2>To create account for '.$message_to_be_send_email.' : </h2><a href=\''.' '.$URLNAME.'/ecommerce_website/includes/signup.inc.php?hash_token_for_client_for_check_email='.$hash_token_for_client_for_check_email.'&type='.'email'.'&email='.$message_to_be_send_email."' class=\"signup_button\">Click here to create account</a><br><h4 style=\"color: red;\">Don't share this link to any third party and it will expire in 24 hrs or after you click this link</h4><div></center>
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
                  echo "<center><h1>Mail sent successfully :) </h1></center>";
                       echo '<script>window.location.replace("/ecommerce_website/index.php?signup=sucess");</script>';
                    // echo "Sent";
                        // echo "mail sent";
                  
                       exit();
                } else {
                    echo '<script>window.location.replace("/ecommerce_website/index.php?error_mail=cannot_send_mail");</script>';
                  // echo "mail not sent first";
                   // echo "<center><h1>Mail not sent :) </h1></center>";
                    exit();
                    
                }
            


                echo '<script>window.location.replace("/ecommerce_website/index.php?error_mail=cannot_send_mail");</script>';
                // echo "mail not sent second";
                exit();
          
?>
  
  
</body> 
  
</html> 