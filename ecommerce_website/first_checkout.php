<?php
    require "header.php";
     require 'config.php';
?>
<?php
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if (strpos($fullUrl, "field=empty")== true) 
                    {
                         echo ' <br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                                    <strong><center>Empty field restricted</center></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div><br>';
                    }else if(strpos($fullUrl, "error=mail_error")== true) 
                    {
                         echo ' <br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                                    <strong><center>Email for payment doesn\'t match with user email</center></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div><br>';
                    }
                    else
                    {
                        // echo "good";
                    }
?>
<?php

    if (isset($_SESSION['name'])) 
    {


$total_cost = $_SESSION['total_cost'];
// echo $total_cost;
        ?>
<br>
<center><h1>We will deliver book to this address make sure it is correct</h1>
        <strong><p style="color: blueviolet;font-size: 20px;">Important fill up the form !!! </p></strong>
</center><br>
<form action="checkout.php" method="POST">
<div class="container">
    <div class="form-group"> <!-- Full Name -->
        <label for="full_name_id" class="control-label">Full Name</label>
        <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="<?php echo $_SESSION['name']; ?>" >
    </div>  

    <div class="form-group"> <!-- Street 1 -->
        <label for="street1_id" class="control-label">Street Address 1</label>
        <input type="text" class="form-control" id="street1_id" name="street1" placeholder="Street address, P.O. box, company name, c/o" >
    </div>                  
                            
    <div class="form-group"> <!-- Street 2 -->
        <label for="street2_id" class="control-label">Street Address 2</label>
        <input type="text" class="form-control" id="street2_id" name="street2" placeholder="Apartment, suite, unit, building, floor, etc.">
    </div>  

    <div class="form-group"> <!-- City-->
        <label for="city_id" class="control-label">City</label>
        <input type="text" class="form-control" id="city_id" name="city" placeholder="Name...">
    </div>                                  
                            
    <div class="form-group"> <!-- State Button -->
        <label for="state_id" class="control-label">State</label>
        <select class="form-control" id="state_id" name="name_cour">
            <option value="Kathmandu">Kathmandu</option>
            <option value="Chitwan">Chitwan</option>
            <option value="Lalitpur">Lalitpur</option>
            <option value="Nepalgunj">Nepalgunj</option>
            <option value="Bhaktapur">Bhaktapur</option>
            <option value="Birjung">Birjung</option>
            <option value="Nawalparasi">Nawalparasi</option>
            
        </select>                   
    </div>
    
    <div class="form-group"> <!-- Zip Code-->
        <label for="zip_id" class="control-label">Zip Code</label>
        <input type="text" class="form-control" id="zip_id" name="zip" placeholder="4406">
    </div>      
    
    <div class="form-group"> <!-- Submit Button -->
         <form action="checkout.php?username='?><?php echo $user_name.'&message=happy_reading'; ?><?php echo '" method="post">
                                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="'?><?php echo $publishablekey ?><?php echo '"
                                      data-amount="'; ?><?php echo $total_cost; ?><?php echo '"
                                      data-name="One Book One Week"
                                      ';?>
<?php
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
                            // else
                            // {
                            //     echo 'data-description="kdkdk"';
                            // }
                            $sql = "SELECT email FROM users WHERE username='$user_name'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                $email_of_client =  $row["email"];
                                 echo 'data-description='.$email_of_client;
                              }
                            } else {
                              echo "0 results";
                            }

?>






                                      <?php echo '"
                                      data-image=""
                                      data-currency="USD"></script> 
                                  '; ?>


                                  <?php 
                                   echo '<input type="hidden" id="toal_cost_final" name="toal_cost_pass" value="';?><?php echo $total_cost; ?><?php echo '">


                                  </form>
    </div>     
    </div>
</form>         
<br>';?>
<?php
}
else
{
                                // header("Location:viewcart.php?0_is_not_a_value");
                                // exit();
                                echo '<script> 
                                                window.location.replace("http://localhost/ecommerce_website/index.php?error=You_need_to_login_darling");
                                    </script>';
                                exit();

}
    require "footer.php";
?>

