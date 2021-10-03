

<?php
 	include "header.php";
?>
<?php

			$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "t=1")== true)
            {
                echo ' <div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Deleted succesfully</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            else if(strpos($fullUrl, "f=0")== true)
            {
                echo ' <div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Data isn\'t deleted</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }else if(strpos($fullUrl, "activities=illegal")== true)
            {
                echo ' <div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Illegal activity !!! </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }


   $con_view = mysqli_connect('localhost','root','','bs');
   $q = "SELECT * FROM user_deliver;";
   $result = mysqli_query($con_view,$q);
   mysqli_close($con_view);

echo '<nav class="navbar navbar-light " style="margin:auto;max-width:50%;">
  <form class="form-inline" action="search_client.php?you_search=" method="GET">
    <input class="form-control mr-sm-2" type="text" placeholder="Search.." name="search_order_from_view" style="width:500px;"> 
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
  </form>
</nav><div style="margin: 10px;">
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">City</th>
      <th scope="col">Book Name</th>
      <th scope="col">Total Cost</th>
      <th scope="col">Token of Client</th>
      <th scope="col">Token of Stripe</th>
      <th scope="col">Status</th>
      <th scope="col">Time</th>
      <th scope="col">Delete</th>
      <th scope="col">Revoke Stock</th>
    </tr>
  </thead>';
  

		 while($row=mysqli_fetch_assoc($result))
		{
			// id
// full_name
// book_name
// street1
// street2
// city
// zip
// toal_cost_pass
// stripeToken
// stripe_token
// stripeEmail
// stripeTokenType
// hash_token_for_client_for_ship
// time

		  echo '<form action="delete_order.php" method="post">
		    <tr>
		    
		     
          <td>'. $row['full_name'].'</td>
          <input type="hidden" name="S_N" value="'. $row['id'].'" />

            <td><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="'.$row['stripeEmail'].'">
                  '.substr($row['stripeEmail'],0,5).'...'.'
                </button>'.'</td>


          <td>'. $row['city'].'</td>
		      <td>'. $row['book_name'].'</td>


		      <td><i class="fa fa-inr" aria-hidden="true"></i> '. $row['toal_cost_pass'].'</td>
                  <td><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="'.$row['hash_token_for_client_for_ship'].'">
                  '.substr($row['hash_token_for_client_for_ship'],0,5).'...'.'
                </button>'.'</td>

                  <td>'.$row['stripe_token'].'</td>

                <td>'. $row['process'].'</td>

		      <td>'. $row['time'].'</td>

          <td><button type="submit" class="btn btn-danger" name="clicked" value="clicked">Delete</button></td>

          <td><button type="submit" class="btn btn-info" name="revoke_stock" value="revoke_stock">Revoke</button></td>
		      
		    </tr>
		    </form>';
		 }
echo '</table>
</div>';
?>

