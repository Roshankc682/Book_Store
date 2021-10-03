<?php
	require "header.php";
?>



<?php
	
    
if (!empty($_POST['full_name'] && !empty($_POST['street1'] )  && !empty($_POST['street2'] )  && !empty($_POST['city'] )  && !empty($_POST['zip'] ) )) 
{
    


    // just for token

$random_num =  rand(0, 1000000000);
$user_claim_time_to_reset_password =  time() + 5*60;
$hash_token_for_client_for_ship = $random_num + $user_claim_time_to_reset_password;
$hash_token_for_client_for_ship =  sha1($hash_token_for_client_for_ship);
$hash_token_for_client_for_ship = sha1($hash_token_for_client_for_ship);
$_SESSION['hash_token_for_client_for_ship']  = $hash_token_for_client_for_ship;

	 
	 // The name of book to save in database
        for ($x = 0; $x < $_SESSION['count']; $x++) 
        {




        $link_of_image_from_server = 'http://localhost/admin_test/image/'.$_SESSION['data_array'][$x]["image"];
		$img_link = '<a href="http://localhost/ecommerce_website/details_of_product.php?passed_id='.$_SESSION['data_array'][$x]["book_id"].'&see_more_details=Roshan"><img src="'.$link_of_image_from_server.'" style="weight:35px;height:30px;border-radius:50%;" /></a>  ';
          $y = $x;	
          $save_this[] =  '<p>'.$y+1 . ' : '.$img_link.$_SESSION['data_array'][$x]["product_name"].'  ('.$_SESSION['data_array'][$x]["quantity"].' PC )</p><br>';

        }
        // echo '<pre>';
        // print_r($_SESSION['count']);
        // print_r($save_this);
        // echo '</pre>';
        // exit();
        $_SESSION['book_details'] = $save_this ;
        $save_this =  implode(" ",$save_this);
		// print_r($save_this);
		// exit();
		if (isset($_SESSION['name'])) 
		{
			$user = $_SESSION['name'];

// =================reduce the stock for final checkout==========================

$stock_count = mysqli_connect('localhost','root','','players');
$sql_count = "SELECT book_id,quantity FROM $user;";
$result_count = mysqli_query($stock_count,$sql_count);
mysqli_close($stock_count);
$quantity_count_quantity =array();
$bookid_count_quantity =array();
while($row_count=mysqli_fetch_assoc($result_count))
{
	array_push($quantity_count_quantity ,$row_count['quantity']);
	array_push($bookid_count_quantity ,$row_count['book_id']);
}
$count_per_value = count($quantity_count_quantity);

for ($current = 0; $current < $count_per_value; $current++) {

	$real_book_id = $bookid_count_quantity[$current];


	$stock_view = new mysqli('localhost','root','','bs');
	$sql_stock_check = "SELECT stock FROM book_details_more WHERE book_id='$real_book_id';";
	$result_check_stock = $stock_view->query($sql_stock_check);
				 
	while($row_check_stock = $result_check_stock->fetch_assoc()) {
		$real_stock = $row_check_stock['stock'];
	}
  	$updated_stock = $real_stock - $quantity_count_quantity[$current];
  	$conn_for_update = new mysqli('localhost','root','','bs');
	$sql_for_update = "UPDATE book_details_more SET stock='$updated_stock' WHERE book_id='$real_book_id'";
	if ($conn_for_update->query($sql_for_update) === TRUE) {} else {}
}

// exit();
// =================reduce the stock for final checkout==========================			



		// =======close code of download file before check out=============
			
							require('config.php');
							//get the email by name to send mail
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "players";

							// Create connection
							$conn = new mysqli($servername, $username, $password, $dbname);
							// Check connection
							if ($conn->connect_error) {
							  die("Connection failed: " . $conn->connect_error);
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
							
							// echo $email_of_client.'<br>';
							$conn->close();
							// echo $_POST['stripeEmail'];

							// strcasecmp('string1', 'string1') == 0
							// if client mail doesn't match with stripe payment email
					if ($email_of_client == $_POST['stripeEmail']) 
					{ 

    					if(isset($_POST['stripeToken']))
						{
							// disable the ssl connection for localhost
							\Stripe\Stripe::setVerifySslCerts(false);

							$token = $_POST['stripeToken'];
							$final_cost = $_POST['toal_cost_pass'];
							// echo $token;
							$data = \Stripe\Charge::create(array(
								"amount" => $final_cost,
								"currency" => "USD",
								"description" => "Shopping of book form e-commerce-site",
								"source" => $token,
							));
							// echo '<pre>';
							// echo $data->id;
							// echo '</pre>';
							// exit();
							echo '<br><br><br><br><center><h2>Redirect to home Page</h2></center>';


		// ==========================This delete the database of user after payment================
							  $user_name =  $_SESSION['name'];
							  // echo $user_name;

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

							// sql to delete a record
							echo '<br>';
							mysqli_query($conn, "TRUNCATE TABLE `$user_name`");


							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "bs";

							// Create connection
							$conn = new mysqli($servername, $username, $password, $dbname);
							// Check connection
							if ($conn->connect_error) {
							  // die("Connection failed: " . $conn->connect_error);
							}

							$full_name = $_POST['full_name'];
						    $street1 = $_POST['street1'];
						   	$street2 = $_POST['street2'];
						    $city = $_POST['city'];
						    $zip = $_POST['zip'];
						    $toal_cost_pass = $_POST['toal_cost_pass'];
						    $stripeToken = $_POST['stripeToken'];
						    $stripeEmail = $_POST['stripeEmail'];
						    $stripeTokenType = $_POST['stripeTokenType'];
						    
							$hash_token_for_client_for_ship = $_SESSION['hash_token_for_client_for_ship'];


							$servername_ = "localhost";
							$username_ = "root";
							$password_ = "";
							$dbname_ = "bs";

							// Create connection
							$conn_ = new mysqli($servername_, $username_, $password_, $dbname_);
							// Check connection
							if ($conn_->connect_error) {
							  // die("Connection failed: " . $conn_->connect_error_);
							}

							$save_this = stripslashes($save_this);
            				$save_this = mysqli_real_escape_string($conn_,$save_this);
            				
            				// $time_check = time() + 5*60;
            				$time_check = time() + 604800;
            				$revoke_if_failure_happens_or_cancle = $_SESSION['json_data_for_revoke'];


							$sql_ = "INSERT INTO user_deliver (user_id,full_name,book_name,street1,street2,city,zip,toal_cost_pass,stripe_token,stripeToken,Book_stock_to_revoke,stripeEmail,hash_token_for_client_for_ship,time_check) VALUES ('$user','$full_name','$save_this','$street1','$street1','$city','$zip','$toal_cost_pass','$data->id','$stripeToken','$revoke_if_failure_happens_or_cancle','$stripeEmail','$hash_token_for_client_for_ship','$time_check')";

							if ($conn_->query($sql_) === TRUE) {
							} else {
							}

							$conn_->close();
							 $_SESSION['time_stamp_for_client'] = date("d.M.Y/D"); 

							// after the database deleted then mail the cleint
							 // exit();
							require "mail_checkout.php";

					}
					else
					{
			
										echo '<script> 
														window.location.replace("index.php?error=You_need_to_login_darling");
											</script>';
										exit();
					}
}
else
{
	echo '<script> 
														window.location.replace("first_checkout.php?action=payout&message=proceed_to_final_checkout&error=mail_error");
											</script>';
										exit();
					
}

}
else
{
						
								echo '<script> 
												window.location.replace("index.php?error=You_need_to_login_darling");
									</script>';
								exit();

}
}
else
{
                echo '<script> 
                        window.location.replace("first_checkout.php?action=payout&message=proceed_to_final_checkout&field=empty");
                  </script>';
                exit();
}

?>



<?php
	// require "footer.php";
?>



