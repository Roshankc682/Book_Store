<?php
        // Session started in header.php
    // require "header.php";
if (isset($_SESSION['name'])) 
{ 
    echo '<pre>';
    $user = $_SESSION['name'];
    // print_r($_POST);

//get the email by name to send mail
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "players";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  // die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email FROM users WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $email_of_client =  $row["email"];
    // echo $email_of_client;
  }
} else {
  // echo "0 results";
}
$_SESSION['email_of_client'] = $email_of_client;
$conn->close();
    
    // $_SESSION['book_details'];
    $email_of_client  = $_SESSION['email_of_client'];
    $user_name = $_SESSION['name'];
    $sub = "If u get the message then u will get then order is confirm";
    $mes = "<h4>Shop more Books </h4>";

    $send_book_name =  implode(" ",$_SESSION['book_details']);

    $to_email = $email_of_client;
    $subject = 'The subject : '.$sub;
    $body = '<html>
                      <head>
                      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                      <style>
                      .center {
                                margin: auto;
                                width: 70%;
                                border: 2px solid 76a2a2;
                                border-radius: 15px;
                                padding: 5px;
                                background-color:#9af9ee;
                              }
                      </style>
                      </head><body><div class="center"><p style="color:black;font-size:35px;">'.$mes.' The token is : <strong>'.$hash_token_for_client_for_ship .'</strong>. Just make  sure to submit while shipped '.' Your request time is '.$_SESSION['time_stamp_for_client'].' after 4 business day we will delivere as per mention place <br><br>The list of Books you requested : <br>'.'<strong>'.$send_book_name.'</strong><p></div></body>
                        </html>';


    $headers = "From: E-commerce-website";
     // To send HTML mail, the Content-type header must be set
     $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      
      $from = " Online Book Store";
       // Create email headers
        $headers .= 'From: '.$from."\r\n".
                    'Reply-To: '.$from."\r\n" .
                    'X-Mailer: PHP/' . phpversion();

    if (mail($to_email, $subject, $body, $headers)) {

              unset($_SESSION['book_details']);
              echo '<script>window.location.replace("index.php?message=shop_more_readmore");</script>';

              // echo "<br>mail sent";
                    exit();
    } else {
         echo '<script>window.location.replace("index.php?unsuccess=message_false");</script>';
      // echo "<br>mail not send";
                    exit();
    }

}


