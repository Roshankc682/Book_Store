<?php
			session_start();
			// $count = 0;
			if (isset($_SESSION['name'])) 
			{ 
				$data_base = mysqli_connect("localhost","root","","players");

				
				$user_name = $_SESSION['name'];
			    $author = stripslashes($_GET['author']);
 				$author = mysqli_real_escape_string($data_base,$author); 
			    $book_id = stripslashes($_GET['id']);
 				$book_id = mysqli_real_escape_string($data_base,$book_id);
			    $title = stripslashes($_GET['title']);
 				$title = mysqli_real_escape_string($data_base,$title); 
				$quantity = stripslashes($_REQUEST['quantity']);
 				$quantity = mysqli_real_escape_string($data_base,$quantity); 
				$price = stripslashes($_GET['price']);
 				$price = mysqli_real_escape_string($data_base,$price); 
 				$image = stripslashes($_GET['image']);
 				$image = mysqli_real_escape_string($data_base,$image); 

 				


 			 
			$stock_view = new mysqli('localhost','root','','bs');
			$sql_stock_check = "SELECT book_id,stock FROM book_details_more WHERE book_id='$book_id';";
			$result_check_stock = $stock_view->query($sql_stock_check);
			 
			 while($row_check_stock = $result_check_stock->fetch_assoc()) {
			    	$stock = $row_check_stock['stock'];
			  }
			  if($stock < $quantity)
			  {
			  	$_SESSION['quantity'] = $stock;
			  	echo '<script>window.location.replace("http://localhost/ecommerce_website/index.php?error=Quantity_high");</script>';
			  	exit();
			  }
				// exit();
				if($quantity == !null)
				{
					$sql = "SELECT book_id FROM $user_name WHERE book_id=?";
					$stmt = mysqli_stmt_init($data_base);
					if(!mysqli_stmt_prepare($stmt,$sql))
					{
						echo '<script>window.location.replace("http://localhost/ecommerce_website/index.php?error=sqlerror");</script>';
						exit();
					}else
					{	
						$sql="select * from $user_name where (book_id='$book_id');";
						$res=mysqli_query($data_base,$sql);

            			if (mysqli_num_rows($res) > 0) 
            				{
            				// output data of each row
            				$row = mysqli_fetch_assoc($res);
            				if ($book_id==$row['book_id'])
            					{
            						$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

										// echo $fullUrl;
										// echo "<br>";
            							if(strpos($fullUrl, "form_details_products=true")== true)
            							{

            									// echo "success";

								 				$book_id_to_redirect_page = $book_id;
								 				$user_name_for_redirection_of_page = $_SESSION['name'];
								 		header("Location: details_of_product.php?passed_id=$book_id_to_redirect_page&see_more_details=$user_name_for_redirection_of_page&error=book_already_added");
												
												exit();
							            }
							            else
							            {


			            						// Make an update in quantity if the book is already added
			                					header("Location: index.php?error=book_already_added");
												exit();
										}
            					}

            				}
            				else
            				{
            					// echo " this works";
            					// echo $book_id . " + " .$author ." + ". $title ." + " . $quantity;
									$total = $quantity * $price;

				
									$data_insert_in_databse = "INSERT INTO `$user_name` (book_id, product_name,author, quantity,price,total,image) VALUES ('$book_id', '$title','$author', '$quantity','$price','$total','$image')";
										$inserted = mysqli_query($data_base,$data_insert_in_databse);


										$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

										// echo $fullUrl;
										// echo "<br>";
            							if(strpos($fullUrl, "form_details_products=true")== true)
            							{

            									// echo "success";

								 				$book_id_to_redirect_page = $book_id;
								 				$user_name_for_redirection_of_page = $_SESSION['name'];
								 		header("Location: details_of_product.php?passed_id=$book_id_to_redirect_page&see_more_details=$user_name_for_redirection_of_page");
												
												exit();
							            }
							            else
							            {
							        		header("Location: index.php?succesfully_added_to_cart");
							        		// echo "flase";
											exit();    	
							            }
										// exit();

									
            				}
					}
					


				
				}
				else
				{
					header("Location: index.php?quantity_was_null");
				}
				// // header("Location: index.php?succesfully_added_to_cart&count=".$count);
				
			
				}
				else
				{
					header("Location: ../ecommerce_website/login.php?error=please_signup");
		 		 
		 		 exit();
				}


?>