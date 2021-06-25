<?php
session_start();
?>

<?php
 if (isset($_SESSION['name'])) 
{ 
			
if(sizeof($_POST) == null)
{
	echo '<script>window.location.replace("http://localhost/admin_test/");</script>';
}
					// size will see how many data is selected
					$size = sizeof($_POST);
							
					// echo $size;
					// exit();
					$i = 1;
					$j = 1;

					while ($i <= $size) 
					{
						
							$index = "b".$j;
							if(isset($_POST[$index]))
							{
								// BOOK ID from database is collected in array
								$bookid[$i] = $_POST[$index];
								// echo $bookid[$i].'<br>';
								// echo "run ....<br>";


						   $con_extract_image_name = mysqli_connect('localhost','root','','bs');
						   $q__result = "SELECT * FROM book WHERE book_id='$bookid[$i]'";
						   $result_final = mysqli_query($con_extract_image_name,$q__result);
						   mysqli_close($con_extract_image_name);
						   while($row=mysqli_fetch_assoc($result_final))
						   {
						   	// echo $row["image"].'<br>';	
						   	// echo $row["title"].'<br>';
						   	unlink("./image/" .$row['image']);
						   	
						   	 $conn = new mysqli('localhost','root','','bs');
					
						   	$sql = "DROP TABLE `$bookid[$i]`";

						 	if ($conn->query($sql) === TRUE) {} else {}


						   }

						   

						   $con_for_delete = mysqli_connect('localhost','root','','bs');
					       $sql_delete_database = "DELETE FROM BOOK WHERE book_id='$bookid[$i]'";
						   if ($con_for_delete->query($sql_delete_database) === TRUE) {} else {}

						   $con_for_delete_author_data = mysqli_connect('localhost','root','','bs');
					       $sql_delete_database_author = "DELETE FROM book_details_more WHERE book_id='$bookid[$i]'";
						   if ($con_for_delete_author_data->query($sql_delete_database_author) === TRUE) {} else {}
						  

								$i++;
							}
							$j++;
				}
				echo '<script>window.location.replace("http://localhost/admin_test/delete.php?deleted=succesfully");</script>';
				exit();
				
					
}
else
{
header("Location: login.php?Login_needed");
exit();
}
?>