
<?php
session_start();
?>
<?php
 if (isset($_SESSION['name'])) 
            {
// Initialize the session
// session_start();
 
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: login.php");
//     exit;
// }

// else
// {
	$file_size = sizeof($_FILES);
	$post_size = sizeof($_POST);

	// how many records
	// how many post for files and data has been change (echo to see the data being passws)
	// echo $file_size;
	// echo $post_size;

	// update will count how many variable are updated as file_size and post_size
	$update = 0;

	for($i=0;$i<$file_size;$i++)
	{
		// one error in id initial phase starting from 1  so make it from final book_id 
				// edit fron upadate form 
						// make sure the initial dataphase fetch should include book id first
		$book_id = $_POST['b'.$i];;
		$title = $_POST['title'.$i];
		$author = $_POST['author'.$i];
		$price = $_POST['price'.$i];
		$name = $_FILES['image'.$i]['name'];
		$tmpname = $_FILES['image'.$i]['tmp_name'];

		// now the edit part start
		// echo $book_id;

		if(!$name = "")
		{
			// echo $query;
			// image path from the database with book_id name
			$imagepath = "image/".$book_id.".jpg";
			// echo $imagepath."<br>";

			if (file_exists($imagepath)) 
			{
				unlink($imagepath);
				move_uploaded_file($tmpname, $imagepath);
				// echo $imagepath."  --> Yes exits". ' <br>';
				
			}
			else
			{
				echo "Edit was not successful". ' <br>';
				exit();
			}
			
		}


		
		
	}
// ==========if user is not logged==============
   }
            
        else{

           header("Location: login.php?Login_needed");
           exit();
        }

	

// }	
?>