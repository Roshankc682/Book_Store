<?php
  // Session started in header.php
  require "header.php";
  require 'config.php';

if (isset($_SESSION['name'])) 
{ 

  $con_view_html = mysqli_connect('localhost','root','','players');
  $user_name =  $_SESSION['name'];
  // echo $user_name;
   $q_html = "SELECT * FROM $user_name;";
   $result_html = mysqli_query($con_view_html,$q_html);
   mysqli_close($con_view_html);
 // ======end of connection====
      $index1="id";
      $index2="book_id";
      $index3="product_name";
      $index4="author";
      $index5="price";
      $index6="total";
      $index7="reg_date";
      $index8="quantity";
      $index9 = "image";
      $url = "/admin_test/image/";
      echo "<br>";

      echo '<center><h1>Your Cart List</h1><br>';

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


      echo'</center>';
      echo '<table id="cus">
                <tr>
                  <th class="th_class">Cover Page</th>
                  <th class="th_class">Book name</th>
                  <th class="th_class">Author</th>
                  <th class="th_class">Price</th>
                  <th class="th_class">Quantity</th>
                  <th class="th_class">Total</th>
                  <th class="th_class">Remove</th>
                </tr>
              ';
        $total_cost = 0;
        $count = 0;
        $quanity_check_loop = 1;
     while($row_html=mysqli_fetch_assoc($result_html))
      {
        $quanity_check_loop = $quanity_check_loop+1;
        $count = $count + 1;
       
        $data_array[] = $row_html;
       // print_r($row_html);

        $total_cost = $total_cost + $row_html[$index6];


      echo "<form action='edit_cart.php' method='POST'> ";


        echo '
        <tr>

            <td class="td_class"><img  height="100px" width="100px" src="';?><?php echo $url.$row_html[$index9]; ?><?php echo '"/></td>
            <td>';?><?php echo $row_html[$index3]; ?><?php echo '</td>
            <td><i class="fa fa-user" aria-hidden="true"></i> ';?><?php echo $row_html[$index4]; ?><?php echo '</td>
            <td>';?>
            <?php  echo '<input type="hidden" name="price" value="'; ?><?php echo$row_html[$index5]; echo '"><i class="fa fa-inr" aria-hidden="true"></i>';?><?php echo " ".$row_html[$index5];?> <?php echo '</input>'; ?>

            <?php echo '</td>

            <td>';?>

            <?php echo '<div class="input-group mb-3" style="height:20px;">
                         
                          <input type="text" id="quantity_check';echo $quanity_check_loop.'" name="quantity_to_edit" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2" style="width:16px;height:40px;" value="';?><?php echo $row_html[$index8];?><?php echo '">'; ?><?php echo '

                          <div class="input-group-append">

                            <button onclick="return check_null';echo $quanity_check_loop.'()" name="update" value="update" class="btn btn-success" type="submit"><i class="fa fa-refresh" aria-hidden="true"></i></button>&nbsp;&nbsp;

                          </div>
                    </div>';
            ?>
        <?php echo '</td>

            <td><i class="fa fa-inr" aria-hidden="true"></i>';?><?php echo "".$row_html[$index6]; ?><?php echo '</td>

            <input type="hidden"  name="book_id" value="';?><?php echo $row_html[$index2];?><?php echo '"></input>
              <td><button  type="submit" name="remove" value="remove" class="btn btn-danger" formaction="delete_cart.php"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>


              <script>
                function check_null';echo $quanity_check_loop.'() 
                {
                 price = document.getElementById("quantity_check';echo $quanity_check_loop.'").value;
                 
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


              </form>';
      }

      echo "<pre>";
      // print_r($data_array);

      // The name of book to save in database
        
      if(!empty($data_array)) 
        $_SESSION['data_array'] = $data_array;
  
      
      $_SESSION['count'] = $count;
        

      

             $_SESSION['total_cost'] = $total_cost;
             if($count == 0)
              {
                echo '<table id="cus">
                        <tr><th></th><th></th></tr><br><br>
                       <center> <h3>Cart Empty .... </h3></center>';



              }
              else
              {
                      echo '<table id="cus">
                        <tr>
                          <th class="th_class">Total Cost&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                          <th class="th_class"><i class="fa fa-inr" aria-hidden="true"></i>'?><?php echo " ".$total_cost; ?> <?php echo '</th>


                          <th class="th_class">

                              <a type="button" class="btn btn-success" href="first_checkout.php?action=payout&message=proceed_to_final_checkout">Payout</a></th></tr>';

                echo '</table>';

              }


    }
    else
    {
      header("Location: ../ecommerce_website/login.php?error=please_signup");
       exit();
    }


    // ==============footer code ===========

// ===============footer code end==============

?>
<?php

require "footer.php";
?>