<?php
  require "header.php";

if (isset($_SESSION['name'])) 
{

echo '
<style>

h1{
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 500;
  font-size: 13px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #34a073, #86d1d8));
  font-family: \'Roboto\', sans-serif;
}
section{
  margin: 50px;
}


/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
</style>
<section>
  <h1>Books You Order</h1>';

 $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($fullUrl, "error=True")== true)
{
	  echo '<br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Order Cancle</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
}if(strpos($fullUrl, "order=reset")== true)
{
	  echo '<br><br><div class="alert alert-primary alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Order Cancle</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
}

 echo '<div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Token</th>
          <th>Book List</th>
          <th>Price</th>
          <th>Process Status</th>
          <th>Cancle Order</th>
        </tr>
      </thead>
    </table>
  </div>
 <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>';

$username = $_SESSION['name'];
$conn = new mysqli("localhost", "root", "", "bs" );
$sql = "SELECT * FROM user_deliver WHERE user_id='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

echo  '<tr>
          <td style="word-wrap: break-word;">'.$row["hash_token_for_client_for_ship"].'</td>
          <td>'.$row["book_name"].'</td>
          <td>R.s '.$row["toal_cost_pass"].'</td>';

          if (strcmp($row['process'], "Cancle") !== 0) {
          	echo'<td><button class="btn btn-info">'.$row["process"].'</button></td><td>'.'
	          <form method="POST" action="cancle_order.php">
	          <input type="hidden" value="'.$row["hash_token_for_client_for_ship"].'" name="id_token" />
				    <button type="submit" class="btn btn-danger">Cancle Order</button>
				</form>
	          '.'</td>
	        </tr>';
	        
          }
			else {

			    	echo'<td><button class="btn btn-info">'.$row["process"].'</button></td><td>'.'
	            <form method="POST" action="reset_order.php">
	         		<input type="hidden" value="'.$row["hash_token_for_client_for_ship"].'" name="reset_order" />
				    <button type="submit" class="btn btn-warning">Revoke Order</button>
				</form>
	          '.'</td>
	        </tr>';
			}

          
  }
} else {
  echo "<center><h3>To Track Order You have to Order First<h3></center>";
}
 
      echo '</tbody>
    </table>
  </div>
</section>
<script>

$(window).on("load resize ", function() {
  var scrollWidth = $(\'.tbl-content\').width() - $(\'.tbl-content table\').width();
  $(\'.tbl-header\').css({\'padding-right\':scrollWidth});
}).resize();

</script>
';

$conn->close();

}else
{
	//If the login is not done correct
	 echo '<script>window.location.replace("index.php?error=please_signup");</script>';
	exit();
}
?>