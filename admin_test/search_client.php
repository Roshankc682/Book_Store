<?php
 	include "header.php";
 	require 'includes/db.inc.php';
?>
<?php


if (isset($_SESSION['name'])) 
{ 
if(isset($_POST['search_book_from_review'])) 
{
	$search = stripslashes($_POST['search_book_from_review']);
 	$search = mysqli_real_escape_string($data_base_for_details,$search); 

	$book_id = stripslashes($_POST['ISSN']);
 	$book_id = mysqli_real_escape_string($data_base_for_details,$book_id); 

	$title = stripslashes($_POST['title']);
 	$title = mysqli_real_escape_string($data_base_for_details,$title); 


	 $con = mysqli_connect('localhost','root','','bs');
	 $query = mysqli_query($con,"SELECT * FROM `$book_id` WHERE user_name LIKE '%$search%' OR comemnts LIKE '%$search%' OR reg_date LIKE '%$search%'") or die ('<script>window.location.replace("http://localhost/admin_test/dashboard.php?activities=illegal");</script>');
	 $count = mysqli_num_rows($query);
	 echo '<br>';
	 echo "<center><h1>Review of ".$title."</h1></center>";
		echo '<nav class="navbar navbar-light " style="margin:auto;max-width:50%;">
		  <form class="form-inline" action="search_client.php" method="POST">
		  <input type="hidden" value="'.$book_id.'" name="ISSN" />
		  <input type="hidden" value="'.$title.'" name="title" />
		    <input class="form-control mr-sm-2" type="text" placeholder="Search.." name="search_book_from_review" style="width:500px;"> 
		    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
		  </form></nav>';
	if($count == 0)
	{
		
		echo "<center><h2>Nothing relevent was found. Please check again !! </h2></center>";
		exit();

	}
	 else
	 {
	 echo	'<div style="margin: 10px;">
		<table class="table table-striped table-dark">
		  <thead>
		    <tr>
		      <th scope="col">S.N</th>
		      <th scope="col">UserName</th>
		      <th scope="col">comemnts</th>
		      <th scope="col">Reg date</th>
		    </tr>
		  </thead>';
		  while ($row = mysqli_fetch_array($query)) 
			      {
			      	echo '<form action="delete_review.php" method="post">
					    <tr>		    
					      <th scope="row" value="'.$row['id'].'"> <input type="hidden" id="custId" name="S.N" value="'.$row['id'].'">'.$row['id'].'</th>
					      <input type="hidden" value="'.$book_id.'"name="book_id">
					      <td>'. $row['user_name'].'</td>
					      <td>'. $row['comemnts'].'</td>
					      <td>'. $row['reg_date'].'</td>
					      <td><button type="submit" class="btn btn-danger" name="clicked" value="clicked">Delete</button></td>  
					    </tr>
					    </form>';

			      }
			      echo '</table>
						</div>';
			exit();
	 }
	exit();
}
		
			if(isset($_GET['search_book_from_view'])) 
			{
				$search = $_GET['search_book_from_view'];
	    		$search = preg_replace("#[^0-9a-z]i#","", $search);


				$search = stripslashes($_GET['search_book_from_view']);
			 	$search = mysqli_real_escape_string($data_base_for_details,$search); 

	    		 $con = mysqli_connect('localhost','root','','bs');
	    		$query = mysqli_query($con,"SELECT * FROM user_deliver WHERE hash_token_for_client_for_ship LIKE '%$search%'") or die ('<script>window.location.replace("http://localhost/admin_test/order.php?activities=illegal");</script>');
	    		$count = mysqli_num_rows($query);

	    		echo '<br>';
			    if($count == 0)
			    {
			    	echo '<nav class="navbar navbar-light " style="margin:auto;max-width:50%;">
					  <form class="form-inline" action="search_client.php?you_search=" method="GET">
					    <input class="form-control mr-sm-2" type="text" placeholder="Search.." name="search_book_from_view" style="width:500px;"> 
					    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
					  </form>
					</nav><div style="margin: 10px;">';
			     	echo "<center><h2 style='color:red;'>Nothing Found . <br>Provide valid Token</h2></center>";
			     	exit();

			    }
			    else
			    {

			    	echo '<nav class="navbar navbar-light " style="margin:auto;max-width:50%;">
					  <form class="form-inline" action="search_client.php?you_search=" method="GET">
					    <input class="form-control mr-sm-2" type="text" placeholder="Search.." name="search_book_from_view" style="width:500px;"> 
						    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
						  </form>
						</nav><div style="margin: 10px;">
						<table class="table table-striped table-dark">
						  <thead>
						    <tr>
						      <th scope="col">S.N</th>
						      <th scope="col">Name</th>
						      <th scope="col">E-mail</th>
						      <th scope="col">Book Name</th>
						      <th scope="col">Total Cost</th>
						      <th scope="col">Token of Client</th>
						      <th scope="col">Time</th>
						      <th scope="col">Delete</th>
						    </tr>
						  </thead>';

			      while ($row = mysqli_fetch_array($query)) 
			      {
			      	echo '<form action="delete_order.php" method="post">
					    <tr>
					    
					      <th scope="row" value="'.$row['id'].'"> <input type="hidden" id="custId" name="S.N" value="'.$row['id'].'">'.$row['id'].'</th>
					      <td>'. $row['full_name'].'</td>
					      <td>'. $row['stripeEmail'].'</td>
					      <td>'. $row['book_name'].'</td>
					      <td><i class="fa fa-inr" aria-hidden="true"></i> '. $row['toal_cost_pass'].'</td>
					      <td>'. $row['hash_token_for_client_for_ship'].'</td>
					      <td>'. $row['time'].'</td>
					      <td><button type="submit" class="btn btn-danger" name="clicked" value="clicked">Delete</button></td>
					      
					    </tr>
					    </form>';

			      }
			      echo '</table>
						</div>';

						exit();
			}
			}
			// else
			// {
			// 	echo '<script>window.location.replace("http://localhost/admin_test/order.php?nope=nothing");</script>';
			// }



		echo '<script>window.location.replace("http://localhost/admin_test/dashboard.php?activities=illegal");</script>';
}
else
{
	       header("Location: login.php?Login_needed");
           exit();


}

?>