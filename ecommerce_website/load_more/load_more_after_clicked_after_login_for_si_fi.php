<?php
session_start();
?>

<?php 

$name = $_SESSION['name'];  
// search result in session varible in search.php $_SESSION["search_by_user"];

$load_more_new_clicked_after_login_for_si = $_POST['load_more_new_clicked_after_login_for_si'];

// echo '<script>alert(';echo $load_more_new_clicked_after_login_for_si; echo ')</script>';


   // ======connected to book where image name author_name uploaded==========';
      $con = mysqli_connect('localhost','root','','bs');  


      $index1="book_id";
      $index2="title";
      $index3="author";
      $index4="price";
      $index5="image";
      $url = "/admin_test/image/";
      $index7="category";


          $quanity_check_loop = 1;


              
              $search =  'sci';
                // echo $search;


            $search = preg_replace("#[^0-9a-z]i#","", $search);

            $query = mysqli_query($con,"SELECT * FROM book WHERE title LIKE '%$search%' OR author LIKE '%$search%' OR category LIKE '%$search%' LIMIT $load_more_new_clicked_after_login_for_si") or die ("Could not search");
            $count = mysqli_num_rows($query);
                          

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
        while($row=mysqli_fetch_assoc($query))
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

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- =================pass the id to see details for products in details_of_products======= -->
                <a type="submit" class="btn btn-primary" id="<?php echo $index1 ?>" href="details_of_product.php?passed_id=<?php echo$row[$index1];?>&see_more_details=<?php echo $name; ?>">More Details</a>
                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;          
            
            <?php }else{ ?>

                
                <!-- =================pass the id to see details for products in details_of_products======= -->
                <a type="submit" class="btn btn-primary" id="<?php echo $index1 ?>" href="details_of_product.php?passed_id=<?php echo$row[$index1];?>&see_more_details=<?php echo $name; ?>">More Details</a>
                                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;          
            

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
                ';


            
            ?>