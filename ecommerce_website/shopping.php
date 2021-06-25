<!-- <?php 
// session_start();
?> -->
<?php


			if (isset($_SESSION['name'])) 
			{ 

			
			?>

				<?php
						$name = $_SESSION['name'];	
						
					?>

					<?php
					echo '<br>';
					$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					if(isset($_SESSION['quantity']))
					{
						$stock_ramaining = $_SESSION['quantity'];
						   unset($_SESSION['quantity']);

			                echo ' <div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
			                    <center><strong>That much quantity isn\'t available !!! <br> only ramaining '.$stock_ramaining.'</strong></center>
			                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                      <span aria-hidden="true">&times;</span>
			                    </button>
			                  </div><br>';
			          
					}
			        
					
					if (strpos($fullUrl, "message=shop_more_readmore")== true) 
		            {
		            	 echo ' <br><br><div class="alert alert-info alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    				<strong><center>Succesfully Purchased<br>Happy Reading Read More Books</center></strong>
                    				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      				<span aria-hidden="true">&times;</span>
                    			</button>
                  				</div><br>';
		            }
		             else if(strpos($fullUrl, "error=book_already_added")== true)
           			{
                		 echo '<br><br><center><div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:250px;">
		                    <strong>It\'s already in cart !!! </strong>
		                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true">&times;</span>
		                    </button>
		                  </div></center>';		
            		}
		            
		            else if(strpos($fullUrl, "error=multiple_commment")== true)
           			{
                		echo '<br><div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    			<strong>Multiple comment not allowed</strong>
                    			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      		<span aria-hidden="true">&times;</span>
                    		</button>
                  		</div><br>';		
            		}
            		
            		else
            		{
            			//nothing :)
            		}

					echo "<br>";
					
						include "require_image.php";
					echo '
					


						<!-- =====Search bar first container======== -->
							<form class="example" action="search.php" method="GET" style="margin:auto;max-width:300px">
  								<input type="text" placeholder="Search.." name="search_by_user">
  								<button type="submit"><i class="fa fa-search"></i></button>
							</form>';
							echo "<br>";



							echo '<hr>';
							
			  				
						
					            echo '<div class="">
					            		<center><i class="fas fa-fire"></i>&nbsp;Popular Genres &nbsp; &nbsp;


					            		<a class="genere_popular" href="sci-fi.php?sci-fi_is_love" style="text-decoration: none;">Sci-fi</a>
								    &nbsp;&nbsp;&nbsp;
									    <a class="genere_popular" href="mystery.php?mystery_is_mystery" style="text-decoration: none;">Mystery</a>
								     &nbsp;&nbsp;&nbsp;
									    <a class="genere_popular" href="suspense.php?suspense_is_the_most_anticipated" style="text-decoration: none;">Suspense</a></center>
								    </div>';
								   
							echo '<hr>';
?>




<div class="flex_container_cart_after_login shadow-lg p-3 mb-5 bg-white rounded" id="book_list_after_login" style="width:90%">
     <?php
       $con_view = mysqli_connect('localhost','root','','bs');
       $q = "SELECT * FROM book LIMIT 6;";
       $result_cart = mysqli_query($con_view,$q);
       mysqli_close($con_view);

          $index1="book_id";
          $index2="title";
          $index3="author";
          $index4="price";
          $index5="image";
          $index6="description";
          $index7="category";
          $url = "/admin_test/image/";
          $quanity_check_loop = 1;


		       $stock_view = mysqli_connect('localhost','root','','bs');
		       $sql_stock = "SELECT book_id,stock FROM book_details_more;";
		       $result_stock = mysqli_query($stock_view,$sql_stock);
		       mysqli_close($stock_view);
		       $stock_array =array();
		       while($row_stock=mysqli_fetch_assoc($result_stock))
		       {
		       	    array_push($stock_array ,$row_stock['stock']);
		       }
		       // print_r($stock_array);
		       // echo $stock_array[0];
		 		$stock_array_temp = 0;
        while($row=mysqli_fetch_assoc($result_cart))
          {
           	$quanity_check_loop = $quanity_check_loop+1;
          	
			// echo $_SESSION["search_by_user"];
            echo '<div class="details_from_database">'; ?>

            <form method="POST" action="cart.php?action=add&id=<?php echo $row['book_id']; ?>&title=<?php echo $row['title']; ?>&price=<?php echo $row['price'];?>&author=<?php echo $row['author']; ?>&image=<?php echo $row['image']; ?>">	

                <img style="float:left;" src="<?php echo $url.$row[$index5]; ?>" height="120px" width="100px">  
                
                
                <p style="margin: 10px;font-size: 15px;"><strong>&nbsp;Title:
            <?php echo mb_strimwidth($row[$index2], 0, 20, '...'); ?></strong></p>

                <p style="margin: 10px;font-size: 15px;">&nbsp;
            Author : <?php echo mb_strimwidth($row[$index3], 0, 20, '...'); ?></p><p style="margin: 10px">&nbsp;
            Price : Rs.<?php echo $row[$index4]; ?></p>




            	<?php if($stock_array[$stock_array_temp] == 0 ){ ?>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="quantity_check<?php echo $quanity_check_loop; ?>" name="quantity" style="height: 30px;width: 150px;" type="text"  placeholder="Total Quantity" disabled><br>
                <!-- =================pass the id to see details for products in details_of_products======= -->
                <a type="submit" class="btn btn-light" id="<?php echo $index1 ?>" href="details_of_product.php?passed_id=<?php echo$row[$index1];?>&see_more_details=<?php echo $name; ?>">More Details</a>
                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;          
                <button onclick="return check_null<?php echo $quanity_check_loop; ?>()" type="submit" name="add" class="btn btn-danger" style="margin:10px;" value="Out of stock" disabled><i class="fa fa-shopping-cart" aria-hidden="true" ></i> Out of stock</button>
            <?php }else{ ?>

            	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="quantity_check<?php echo $quanity_check_loop; ?>" name="quantity" style="height: 30px;width: 150px;" type="text"  placeholder="Total Quantity"><br>
                <!-- =================pass the id to see details for products in details_of_products======= -->
                <a type="submit" class="btn btn-light" id="<?php echo $index1 ?>" href="details_of_product.php?passed_id=<?php echo$row[$index1];?>&see_more_details=<?php echo $name; ?>">More Details</a>
                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;          
                <button onclick="return check_null<?php echo $quanity_check_loop; ?>()" type="submit" name="add" class="btn btn-info" style="margin:10px;" value="Add to Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart</button>

            <?php } ?>

                 <script>
                function check_null<?php echo $quanity_check_loop; ?>() 
                {
                 price = document.getElementById("quantity_check<?php echo $quanity_check_loop; ?>").value;
                 
                 var reg = /^\d+$/;

                     if(reg.test(price))
                     {
                        if(price == 0)
                        {
                            alert("Quantity is Zero !!!  ")
                            return false
                        }
                        if(price >= 50)
                        {
                            alert("Quantity is Large !!!  ")
                            return false
                        }
                        return true
                     }else{
                      alert("Check your quantity again !!! ");
                      return false
                    }
                
                }
                </script>
              </form>

            </div>
          

        <?php

        $stock_array_temp = $stock_array_temp + 1;

        }
        
            
         
        echo '</div>
        <br>
</div>';
?>
<center><button type="button" class="btn btn-secondary load_more_after_clicked_after_login">Load more</button></center>




	<?php
	echo '<br>';
	
?>




<?php


// =========end of purchase cart==========





// ======footer start==============
// ==========footer end============
			
			?>


			<script type="text/javascript">
				
				if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }






			<?php
}

			else
			{



					//If the login is not done correct
				 header("Location: ../ecommerce_website/index.php?error=please_signup");
		 		 echo "please login";
		 		 exit();
				
			}

?>
			</script>