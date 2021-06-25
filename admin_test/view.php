<?php
 	include "header.php";
?>

<?php
    if (isset($_SESSION['name'])) 
            { 


   $con_view = mysqli_connect('localhost','root','','bs');
   $q = "SELECT * FROM book;";
   $result = mysqli_query($con_view,$q);
   mysqli_close($con_view);
?>

<!DOCTYPE html>
<html>
<head>
	<title>List of Books</title>
		<meta charset="UTF-8">
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script>
      function openForm() {
        document.getElementById("popupForm").style.display = "block";
      }
      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }
    </script>
		<style type="text/css">
			table{
				border: 1px solid black;
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
				
		</style>
</head>

<body>
	<center><h2 style="color: #0f6dfa">List of Books</h2>
		<bold><p style="color: #0f6dfa;font-size:20px;">Search using ISBN number for precise search</p></bold></center>

	
	<center>

<nav class="navbar navbar-light" style="margin:auto;max-width:50%;">
  <form class="form-inline" action="search.php?you_search=" method="GET">
    <input class="form-control mr-sm-2" type="text" placeholder="Search.." name="search_book_from_view" style="width:500px;"> 
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
  </form>
</nav>
		<br>  <!-- ========================================================= -->
	<table class="table_name_content" border="1px">
		<!-- <th>BookId</th> -->
		<th>Title</th>
		<th>Author</th>
		<th>Price</th>
		<th>Image</th>
	</table>
	<!-- ==============Search================================== -->
	 

<?php
			$index1="book_id";
			$index2="title";
			$index3="author";
			$index4="price";
			$index5="image";
			$index6="description";
		 	$url = "http://localhost/admin_test/image/";

	
 			while($row=mysqli_fetch_assoc($result))
			{

				
				echo '<center>';
				echo '<table border="1px">' ;
					// echo "<td> $row[$index1]<td>";
					echo "<th colspan='300'> $row[$index2]</th>";
					echo "<th colspan='300'> $row[$index3]</th>";
					echo "<th colspan='300'> Rs $row[$index4]</th>";
					echo '<th colspan=\'300\'>
							<center> 
							<a class="btn btn-primary" href="details.php?passed_id=';?><?php echo$row[$index1];?><?php echo '&user=admin">Details</a>
    				</center></th>';
					echo "<th colspan='300'> <img 

					src=".$url.$row[$index5]."


					width='100px' height='100px'></th>";
					echo '<br>';
				// echo "$row[$index5]";
				echo '<br>';
		
				echo '</table>';

				echo '</center>';
				
			}
?>
	

</body>
</html>

<?php

 }



            
        else{

           header("Location: login.php?Login_needed");
           exit();
        }
