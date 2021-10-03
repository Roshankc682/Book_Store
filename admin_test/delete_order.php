<?php


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bs";
	$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_REQUEST['clicked']))
{
	
	$delete_id =  $_POST['S_N'];
	$sql = "DELETE FROM user_deliver WHERE id=$delete_id";

	if ($conn->query($sql) === TRUE) {
	  // echo "Record deleted successfully";
		echo '<script>window.location.replace("http://localhost/admin_test/order.php?delete=true&t=1");</script>';
	} else {
	  // echo "Error deleting record: " . $conn->error;
		echo '<script>window.location.replace("http://localhost/admin_test/order.php?delete=false&f=0");</script>';
	}

	$conn->close();
}

?>


<?php

if(isset($_REQUEST['revoke_stock']))
{
	
	$id =  $_POST['S_N'];
	$sql = "SELECT * FROM user_deliver WHERE id='$id'";
	$result = $conn->query($sql);
	$mail_book=array();
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	    $data =  $row["Book_stock_to_revoke"];
	    $email =  $row["stripeEmail"];
	    $user_name = $row["full_name"];
	    $hash_token_for_client_for_ship = $row["hash_token_for_client_for_ship"];
		array_push($mail_book,$row["book_name"]);
		
	  }
	} else {
	}

	for ($x = 0; $x < count($mail_book); $x++) 
    {
    	$send_mes = $mail_book[$x].'<br>';
    }

// exit();
	$conn->close();
	$conn = new mysqli("localhost", "root", $password, "bs");
	$stock_add = json_decode($data, true);
	foreach($stock_add as $key => $value) {
	  // echo "ID=" . $key . ", Quantity=" . $value;


		$sql_data = "SELECT stock FROM book_details_more WHERE book_id='$key'";
		$res_data = $conn->query($sql_data);
		if ($res_data->num_rows > 0) {
		while($row = $res_data->fetch_assoc()) {
		    $add_stock =  $row["stock"];
		  }
		} else {
		}

		$plus_stock = (int)$add_stock + (int)$value;

		$sql = "UPDATE book_details_more SET stock='$plus_stock' WHERE book_id='$key'";

		if ($conn->query($sql) === TRUE) {
		} else {
		}


	}

	$conn->close();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bs";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
		
		$delete_id =  $_POST['S_N'];
		$sql = "DELETE FROM user_deliver WHERE id=$delete_id";

		if ($conn->query($sql) === TRUE) {
		} else {
		  // echo "Error deleting record: " . $conn->error;
			echo '<script>window.location.replace("http://localhost/admin_test/order.php?delete=false&f=0");</script>';
		}

		$conn->close();
	



	$email_of_client  = $email;
    $sub = "!!!! Your Order was Cancled !!!!";
    $mes = "<h4> Your Order was Cancled </h4>";

    $send_book_name = $send_mes;

    $to_email = $email_of_client;
    $subject = ''.$sub;
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
                                background-color: #eef9f8;
                              }
                      </style>
                      </head><body><div class="center"><p style="color:red;font-size:35px;">'.$mes.' Token  : <strong>'.$hash_token_for_client_for_ship .'</strong>.'.'The list of Books you ordered cancle are : <br>'.'<strong>'.$send_book_name.'</strong><p></div></body>
                        </html>';


    $headers = "From: E-commerce-website";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      
    $from = " Online Book Store";
    $headers .= 'From: '.$from."\r\n".
                    'Reply-To: '.$from."\r\n" .
                    'X-Mailer: PHP/' . phpversion();

    if (mail($email, $subject, $body, $headers)) {echo ""; } else {}
    // exit();
	echo '<script>window.location.replace("http://localhost/admin_test/order.php?delete=true&t=1");</script>';


}

?>




