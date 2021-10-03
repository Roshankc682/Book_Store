
<?php
 	include "header.php";
?>


<?php
 if (isset($_SESSION['name'])) 
            { 

   

   $con_edit = mysqli_connect('localhost','root','','bs');
   $q = "SELECT * FROM book;";
   $result = mysqli_query($con_edit,$q);
   mysqli_close($con_edit);
?>



<!DOCTYPE html>
<html>
<head>
	<title>Update Items</title>
		<meta charset="UTF-8">
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<style type="text/css">
			table{
				/*border: 1px solid black;*/
				  border-spacing: 5px;
				border-collapse: collapse;
				width: 70%;
				/*text-align: center;*/
				color: #588c7e;
				color: black;
				font-family: monospace;
				font-size: 25px;
				/*text-align: left;*/
				table-layout: fixed


			}
			body{
				/*background: url("https://images.pexels.com/photos/949587/pexels-photo-949587.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500");*/
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

					
			form.example button {
						  float: left;
						  width: 20%;
						  padding: 10px;
						  background: #2196F3;
						  color: white;
						  font-size: 17px;
						  border: 1px solid grey;
						  border-left: none;
						  cursor: pointer;
						}

						form.example input[type=text] {
						  padding: 10px;
						  font-size: 17px;
						  border: 1px solid grey;
						  float: left;
						  width: 60%;
						  background: #f1f1f1;
						}


			


			
		</style>

</head>
<body>
		<center><h2 style="color: #0f6dfa">Edit Items</h2>
		<bold><p style="color: #0f6dfa;font-size:20px;">Search using ISBN number for precise search</p></bold></center>


					<?php
					 $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "error=not_valid_filename")== true)
            {
                echo '<br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Upload a valid File !!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            ?>
	
	<center>

			<!-- ==============Search================================== -->
	 
<nav class="navbar navbar-light " style="margin:auto;max-width:50%;">
  <form class="form-inline" action="search.php?you_search=" method="GET">
    <input class="form-control mr-sm-2" type="text" placeholder="Search.." name="search_book_from_update" style="width:500px;"> 
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
  </form>
</nav>
		  <!-- ========================================================= -->
	<table class="table_name_content" border="1px">
		<!-- <th>BookId</th> -->
		<th colspan='300'>Title</th>
		<th colspan='300'>Author</th>
		<th colspan='300'>Price</th>
		<th colspan='300'>Image</th>
		<th colspan="300">Update Item</th>
		
	</table>
	</center>



	<?php
			

		// the i start from 0 coz the data from database was not started from 1 
		// $i = 0;
			$index1="book_id";
			$index2="title";
			$index3="author";
			$index4="price";
			$index5="image";
 			echo '<br>';

 			// i make a fake book id rather then using database details and use in page
 			// $book_id_fake = 0;

 			// This is for taking book id to take id and do some update
 		// ==============================================================
 			 $con_view = mysqli_connect('localhost','root','','bs');
   			$q = "SELECT * FROM book;";
   			$result = mysqli_query($con_view,$q);
   			mysqli_close($con_view);
   			// =================================================

 			while($row=mysqli_fetch_assoc($result))
			
			{
				// ====This id is taken from primary key to set get post in other page=========	
				$real_pass_id = $row[$index1];
				$title_pass = $row[$index2];
				$author_pass = $row[$index3];
				$price_pass = $row[$index4];
				// echo $real_id;
			$url = "http://localhost/admin_test/image/";


				// ==============================
				echo '<br>';
				echo '<center>';
				echo '<table border="1px">' ;
					// echo "<td > $row[$index1]<td>";
					echo "<th colspan='300'> $row[$index2]</th>";
					echo "<th colspan='300'> $row[$index3]</th>";
					echo "<th colspan='300'> Rs $row[$index4]</th>";
					echo "<th colspan='300'> <img 
													src=".$url.$row[$index5]."
					width='100px' height='100px'></th>";
					// This will pass the primary id of book to edit_update.php -->-->
					echo '<th colspan="300 "">&#160;<a class="btn btn-warning" href="edit_update.php?'
									?>
							<?php 
							echo "id_passfrom_url=".$real_pass_id;echo "&";
							echo "title_passfrom_url=".$title_pass;echo "&";
							echo "author_passfrom_url=".$author_pass;echo "&";
							echo "price_passfrom_url=".$price_pass;

							 ?> 
							<?php echo '">Edit</a></th>';

					echo '<br>';

				echo '</table>';

				echo '</center>';
}
// ============if user is not logged=========

 }



            
        else{

           header("Location: login.php?Login_needed");
           exit();
        }

?>