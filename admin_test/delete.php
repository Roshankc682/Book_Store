
<?php
 	include "header.php";
?>

<?php

            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "deleted=succesfully")== true)
            {

                echo '<div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Deleted succesfully </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            if(strpos($fullUrl, "deleted=unsuccesfully")== true)
            {

                echo '<div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Something went wrong !!!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
	
	$con_delelte = mysqli_connect('localhost','root','','bs');
   $q = "SELECT * FROM book;";
   $result = mysqli_query($con_delelte,$q);
   mysqli_close($con_delelte);
?>

<?php

 if (isset($_SESSION['name'])) 
   { 

echo '<title>Delete Items</title>
		<meta charset="UTF-8">
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<style type="text/css">

			/*Remove input desing*/
			input[type=button], input[type=submit], input[type=reset] {
					  background-color: #4CAF50;
  					border: none;
  						color: white;
  					padding: 16px 32px;
  					text-decoration: none;
  					margin: 4px 2px;
  					cursor: pointer;
  				}
			table{
				// border: 1px solid black;
				  border-spacing: 5px;
				border-collapse: collapse;
				width: 70%;
				/*text-align: center;*/
				color: #588c7e;
				color: red;
				font-family: monospace;
				font-size: 25px;
				text-align: left;
				table-layout: fixed


			}
			

			body{
				// background: url("https://images.pexels.com/photos/949587/pexels-photo-949587.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500");
				background-color: #e5efe8;

				}
			th{

				background-color: #2ED6F7;
				/*color: white;*/
				color: #060600;
				/*text-align: center;*/
			}
			
				tr:nth-child(even){background-color: #f2f2f2;
				}

		



		</style>
</head>
<body>
	
	<center><h2 style="color: #0f6dfa">Delete Items</h2>
		<bold><p style="color: #0f6dfa;font-size:20px;">Search using ISBN number for precise search</p></bold></center>
		
	<!-- <table border="1" cellspacing="0" width="80%"></table> -->

	<!-- ==============Search================================== -->
	 

<nav class="navbar navbar-light" style="margin:auto;max-width:50%;">
  <form class="form-inline" action="search.php?you_search=" method="GET">
    <input class="form-control mr-sm-2" type="text" placeholder="Search.." name="search_book_from_delete" style="width:500px;"> 
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
  </form>
</nav>
		  <!-- ========================================================= -->
		  
	<form action="delete_from_database.php" method="POST">
	<center>
	<table class="table_name_content" border="1px">
		<!-- <th>BookId</th> -->
		<th>Title</th>
		<th>Author</th>
		<th>Price</th>
		<th>Image</th>
		<th>Select the item to Delete</th>
	</table>


	</center>';
	?>

	
<?php

	

			$i = 1;
			$index1="book_id";
			$index2="title";
			$index3="author";
			$index4="price";
			$index5="image";
 			echo '<br>';
 			$url = "http://localhost/admin_test/image/";
 			while($row=mysqli_fetch_assoc($result))
			{
				// echo '<br>';
				echo '<center>';
				echo '<table border="1px">' ;
					// echo "<td> $row[$index1]<td>";
					echo "<th colspan='1'> $row[$index2]</th>";
					echo "<th colspan='1'> $row[$index3]</th>";
					echo "<th colspan='1'> Rs $row[$index4]</th>";
					echo "<th colspan='1'> <img 
					src=" . $url.$row[$index5]. "
					 width='100px' height='100px'></th>";

					echo "<th><input type='checkbox' name='b$i' id='b$i' value='$row[$index1]' /></th>";
					echo '</table>';
				echo '</center>';
				$i++;
			}
		// $_SESSION['$row[$index1];'] = $regValue;

?>

<?php 
echo '<!-- For delete item view -->';
echo '<center>
<table class="Delete">
	<th colspan="2"></th>
	<th><input type="submit" placeholder="" value="Remove" /></th>
	<th colspan="2"></th>
</table>
</center>
</form>


</body>
</html>';
}
else
{
	
           header("Location: login.php?Login_needed");
           exit();

}


?>
    
