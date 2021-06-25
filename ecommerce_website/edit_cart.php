<?php
		// Session started in header.php
	require "header.php";
if (isset($_SESSION['name'])) 
{ 


if(isset($_REQUEST['update']))
{
		$quantity_value = $_REQUEST["quantity_to_edit"];
		// echo $quantity_value;


		$book_id = $_REQUEST["book_id"];
		// echo $book_id;
		$price = $_REQUEST["price"];
		// echo $price;


// ============check where book available or not============================
		   $stock_view = new mysqli('localhost','root','','bs');
			$sql_stock_check = "SELECT book_id,stock FROM book_details_more WHERE book_id='$book_id';";
			$result_check_stock = $stock_view->query($sql_stock_check);
			 
			 while($row_check_stock = $result_check_stock->fetch_assoc()) {
			    	$stock = $row_check_stock['stock'];
			  }
			  if($stock < $quantity_value)
			  {
			  	$_SESSION['quantity'] = $stock;
			  	echo '<script>window.location.replace("http://localhost/ecommerce_website/viewcart.php?error=Quantity_high");</script>';
			  	exit();
			  }
// ============check where book available or not============================

	// Here the update works while using the book_id preety easy


	$con_view_html = mysqli_connect('localhost','root','','players');
	$user_name =  $_SESSION['name'];
	// echo $user_name;
   $q_html = "SELECT * FROM $user_name;";
   $result_html = mysqli_query($con_view_html,$q_html);
   mysqli_close($con_view_html);
 // ======end of connection====
		

				// $total_cost = 0;
			$total_quantity = 0;
			$total_quantity = $quantity_value * $price;
			echo '<br>';
			// echo $total_quantity;
 			while($row_html=mysqli_fetch_assoc($result_html))
			{
					if($quantity_value == 0)
					{
								// header("Location:viewcart.php?0_is_not_a_value");
								// exit();
								echo '<script> 
												window.location.replace("http://localhost/ecommerce_website/viewcart.php?error=undefine_value");
									</script>';
								exit();
					}else
					{

							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "players";

							// Create connection
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							// Check connection
							if (!$conn) {

							  die("Connection failed: " . mysqli_connect_error());
							}

							$sql = "UPDATE $user_name SET quantity='$quantity_value' , total='$total_quantity' WHERE book_id='$book_id'";

							if (mysqli_query($conn, $sql)) {

								// header("Location: viewcart.php?updated_succesfully");

								// Header cannot be set here so i used javascript to redirect --> Boom :)
								echo '<script> 
												window.location.replace("viewcart.php?updated_succesfully");
									</script>';
								exit();

							} else {
							  echo "Error updating record: " . mysqli_error($conn);
							  exit();
							}

					}
				

				
			}
		}
		else
		{
			echo '<script> 
												window.location.replace("ecommerce_website/viewcart.php?update_doesn\'t_work");
									</script>';
								exit();
		}

}
else
{

	echo '<script> 
												window.location.replace("ecommerce_website/login.php?error=please_signup");
									</script>';
								exit();
}


?>