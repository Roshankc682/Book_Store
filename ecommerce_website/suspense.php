<?php

require "header.php";
 if (isset($_SESSION['name'])) 
 {
 	$name = $_SESSION['name'];	

	$profile_name = $name."profile";


				
								include "require_image.php";
					echo '
					


							<!-- =====Search bar first container======== -->
							<form class="form-inline my-2 my-lg-0" action="search.php" method="GET" style="margin:auto;max-width:600px;">
  								<input style="width: 500px;" class="form-control mr-sm-2" type="search" placeholder="Search by name , category , Author ..." aria-label="Search" name="search_by_user">
  								<button style="width: 50px;" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
							</form>';
							echo "<br>";



							echo '<hr>';
							 echo '<center><form action="search.php"  method="GET" style="width: 300px;">
												  <label for="search_by_user"><b>Choose a book genere</b></label>
												  <select class="form-control m-1" name="search_by_user" id="books">
												    <option value="sci-fi">sci-fi</option>
												    <option value="mystery">mystery</option>
												     <option value="suspense">suspense</option>
													 <option value="Fantasy">Fantasy</option>
													 <option value="Adventure">Adventure</option>
													 <option value="Romance">Romance</option>
													 <option value="Contemporary">Contemporary</option>
													 <option value="Dystopian">Dystopian</option>
													 <option value="Mystery">Mystery</option>
													 <option value="Horror">Horror</option>
													 <option value="Thriller">Thriller</option>
													 <option value="Paranormal">Paranormal</option>
													 <option value="Historical">Historical fiction</option>
													 <option value="Science">Science Fiction</option>
													 <option value="Memoir">Memoir</option>
													 <option value="Cooking">Cooking</option>
													 <option value="Art">Art</option>
													 <option value="Self-help / Personal">Self-help / Personal</option>
													 <option value="Development">Development</option>
													 <option value="Motivational">Motivational</option>
													 <option value="Health">Health</option>
													 <option value="History">History</option>
													 <option value="Travel">Travel</option>
													 <option value="Guide">Guide / How-to</option>
													 <option value="Families & Relationships">Families & Relationships</option>
													 <option value="Humor">Humor</option>
													 <option value="Children’s">Children’s</option>
													 <option value="Knowing">Knowing</option>
												    </select>
												  <input class="btn btn-outline-info" type="submit" value="search">
												</form></center>
												';
			  				
						
					            echo '<div class="">
					            		<center><i class="fas fa-fire"></i>&nbsp;Popular Genres &nbsp; &nbsp;


					            		<a class="genere_popular" href="sci-fi.php?sci-fi_is_love" style="text-decoration: none;">Sci-fi</a>
								    &nbsp;&nbsp;&nbsp;
									    <a class="genere_popular" href="mystery.php?mystery_is_mystery" style="text-decoration: none;">Mystery</a>
								     &nbsp;&nbsp;&nbsp;
									    <a class="genere_popular" href="suspense.php?suspense_is_the_most_anticipated" style="text-decoration: none;">Suspense</a></center>
								    </div>';
								   
							echo '<hr>';




												// echo "Category Menu";

			
	 $con = mysqli_connect('localhost','root','','bs');

        // $street = $row ['author'];
 			$search= "suspense";

			$index1="book_id";
			$index2="title";
			$index3="author";
			$index4="price";
			$index5="image";
		 	$url = "/admin_test/image/";
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
    $search = preg_replace("#[^0-9a-z]i#","", $search);

    $query = mysqli_query($con,"SELECT * FROM book WHERE title LIKE '%$search%' OR author LIKE '%$search%' OR category LIKE '%$search%' LIMIT 2;") or die ("Could not search");
    $count = mysqli_num_rows($query);
    		echo '<div class="flex_container_cart_after_login shadow-lg p-3 mb-5 bg-white rounded" id="book_list_after_login" style="width:90%">';

    echo '<br>';
    if($count == 0){
     	echo '<div class="container">
												<title>Online Book Store | 404 Error</title>
												
													<center><h4 style="color:red;">Book Not in Store</h4>
													<img style="width:300px;height: 300px;" src="image/not_found.png"><br><br>
													 <a  type="submit" class="btn btn-info " href="/ecommerce_website/login.php"><i class="fas fa-search"></i> search more </a></center>
													</center>
												
											</div>';
     		  echo '</div>
								        <br>
								</div>';
    }else{

      while ($row = mysqli_fetch_array($query)) 
      {
      
      	// use products in row

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

                <!--  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="quantity_check<?php echo $quanity_check_loop; ?>" name="quantity" style="height: 30px;width: 150px;" type="text"  placeholder="Total Quantity" disabled><br> -->
                <!-- =================pass the id to see details for products in details_of_products======= -->
                &nbsp;&nbsp;<a type="submit" class="btn btn-primary" id="<?php echo $index1 ?>" href="details_of_product.php?passed_id=<?php echo$row[$index1];?>&see_more_details=<?php echo $name; ?>">Add from  Details</a>
                  <!--                   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;          
                <button onclick="return check_null<?php echo $quanity_check_loop; ?>()" type="submit" name="add" class="btn btn-danger" style="margin:10px;" value="Out of stock" disabled><i class="fa fa-shopping-cart" aria-hidden="true" ></i> Out of stock</button> -->
            <?php }else{ ?>

      <!--       	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="quantity_check -->
            	 
            	  <!--  name="quantity" style="height: 30px;width: 150px;" type="text"  placeholder="Total Quantity"><br> -->
                <!-- =================pass the id to see details for products in details_of_products======= -->
               &nbsp;&nbsp; <a type="submit" class="btn btn-primary" id="<?php echo $index1 ?>" href="details_of_product.php?passed_id=<?php echo$row[$index1];?>&see_more_details=<?php echo $name; ?>">More Details</a>
                                  <!--   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;          
                <button onclick="return check_null<?php echo $quanity_check_loop; ?>()" type="submit" name="add" class="btn btn-info" style="margin:10px;" value="Add to Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart</button> -->

            <?php } ?>


                 <script>
                function check_null() 
                {
                 price = document.getElementById("quantity_check").value;
                 
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
								echo '<center><button type="button" class="btn btn-secondary load_more_after_clicked_after_login_for_sus">Load more</button></center>';

					?>

				<?php				
			

// =======end of cart =================

		

	    require "footer.php";
// ============purchase cart==============

    }

?>

<?php
echo '	<script type="text/javascript">
				
				if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }';

}

			else
			{



					//If the login is not done correct
				 header("Location: ../ecommerce_website/index.php?error=please_signup");
		 		 echo "please login";
		 		 exit();
				
			}
?>



