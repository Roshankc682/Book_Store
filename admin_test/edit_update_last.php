<?php
session_start();
?>
<?php
		if (isset($_SESSION['name'])) 
            { 
 
			   $con_update = mysqli_connect('localhost','root','','bs');
			   // This id from the updateform.php 
			   
              $real_pass_id = stripslashes($_GET['id_get_passed']);
              $real_pass_id = mysqli_real_escape_string($con_update,$real_pass_id);

               $title_pass_id = stripslashes($_GET['title_get_passed']);
              $title_pass_id = mysqli_real_escape_string($con_update,$title_pass_id);

               $author_pass_id = stripslashes($_GET['author_get_passed']);
              $author_pass_id = mysqli_real_escape_string($con_update,$author_pass_id);

               $price_pass_id = stripslashes($_GET['price_get_passed']);
              $price_pass_id = mysqli_real_escape_string($con_update,$price_pass_id);


			   $select = mysqli_query($con_update,"select * from book where book_id='$real_pass_id'");
			   $row = mysqli_fetch_assoc($select);

			  $CoAuthor = stripslashes($_POST['Co-Author']);
              $CoAuthor = mysqli_real_escape_string($con_update,$CoAuthor);
              $Publisher = stripslashes($_POST['Publisher']);
              $Publisher = mysqli_real_escape_string($con_update,$Publisher);
              $stock = stripslashes($_POST['stock']);
              $stock = mysqli_real_escape_string($con_update,$stock);
			   // ============================co author and publisher=========================================
				 // [CoAuthor] => asdfasfas
		  		 //  [Publisher] => fgsdfsdf
				
				$con_edit_author__ = mysqli_connect('localhost','root','','bs');

				// Full texts	 book_id author first_co_author publisher
				$sql_author_update = "UPDATE book_details_more SET first_co_author='$CoAuthor', publisher='$Publisher',stock='$stock' WHERE book_id='$real_pass_id'";

				if ($con_edit_author__->query($sql_author_update) === TRUE) {} else {}
				$con_edit_author__->close();
		// =====================================================================

				
				$description = $_POST['description'];
			   // data by form (provided by user)
			   $Title_by_user = $_POST['title_edit'];
			    $author_by_user = $_POST['author_edit'];
			    $price_by_user = $_POST['price_edit'];
			    if(!$_POST["description"]==null)
				{
					$sql_update_description = "UPDATE book SET description='$description' WHERE book_id='$real_pass_id'";

								if ($con_update->query($sql_update_description) === TRUE) 
								{
									// echo "succesfull update description";echo '<br>';
									// exit();
								}
				}
// ======================from here the title name change query start==========================
			if(!$_GET["title_get_passed"]==null)
				{
						    if (strcmp($Title_by_user, 'Title')==1) 
						    {
						    	// if the title is changed and boom the data should be fetched form here only tht title
						    	// echo "same string --> one";
						    	// echo '<br>';
						    	// echo $Title_by_user;
						    	$sql_update_title = "UPDATE book SET title='$Title_by_user' WHERE book_id='$real_pass_id'";

								if ($con_update->query($sql_update_title) === TRUE) 
								{
									// echo "succesfull update title";echo '<br>';
								}
								else
								{
									// echo "Not updatded --> sql error";echo '<br>';
								}
						  

						    }
						    elseif(strcmp($Title_by_user, 'Title')==0) 
						    {
						    	// if the edit is not done only but the value is passwd and boom title as title
								
							}
							elseif(!strcmp($Title_by_user, 'Title')==0 || !strcmp($Title_by_user, 'Title')==1) 
							{
								// echo "if 0 and 1 doesn't work --> froom inner if else block";echo '<br>';
								$sql_update_title = "UPDATE book SET title='$Title_by_user' WHERE book_id='$real_pass_id'";

								if ($con_update->query($sql_update_title) === TRUE) 
								{
									// echo "succesfull update title";echo '<br>';
								}
								else
								{
									// echo "Not updatded --> sql error";echo '<br>';
								}
							}
						    else
						    {
						    	// echo "not same";
							    	// echo "Not updatded block doesn't work";echo '<br>';

						    }
					}
				else
				{
					// echo "id is empty";
					

				}
// =========================end of title sql query===========================
// ==========================from here the price query update start==============
if(!$_GET["author_get_passed"]==null)
				{
						    if (strcmp($author_by_user, 'Author')==1) 
						    {
						    		// if the title is changed and boom the data should be fetched form here only tht title
						    	
						    	$sql_update_author = "UPDATE book SET author='$author_by_user' WHERE book_id='$real_pass_id'";

								if ($con_update->query($sql_update_author) === TRUE){}else{}

						    }
						    elseif(strcmp($author_by_user, 'Author')==0){}
							elseif(!strcmp($author_by_user, 'Title')==0 || !strcmp($author_by_user, 'Title')==1) 
							{
								$sql_update_author = "UPDATE book SET author='$author_by_user' WHERE book_id='$real_pass_id'";

								if ($con_update->query($sql_update_author) === TRUE){}else{}
							}
						    else{}
			    }
				else{}
// ========================end of the price query update ===========================

// =====================from here the author name query start===============
if($_GET["price_get_passed"]!==null)
{
			    if (strcmp($price_by_user, 'Price')==1) 
			    {
			    		// if the title is changed and boom the data should be fetched form here only tht title
			    	

			    }
			    elseif(strcmp($price_by_user, 'Price')==0) 
			    {
			    	// if the edit is not done only but the value is passwd and boom title as title
					
				}
				elseif(!strcmp($price_by_user, 'Price')==0 || !strcmp($price_by_user, 'Price')==1) 
				{
					// echo "if 0 and 1 doesn't work --> froom inner if else block";echo '<br>';
					$sql_update_price = "UPDATE book SET price='$price_by_user' WHERE book_id='$real_pass_id'";
					if ($con_update->query($sql_update_price) === TRUE) 
					{
						echo "succesfull update Price";echo '<br>';
					}
					else
					{
						// echo "Not updatded --> sql error";echo '<br>';
					}
				}
			    else
			    {
			    	// echo "not same";
			    	// echo "Not updatded  all the 0 and 1 block doesn't work";echo '<br>';

			    }
}
else
{
// echo "id is empty";
// echo "Not updatded last if from Price";echo '<br>';
}

// ====================end of author name query end======================





// //================================== Now the image update start from here ============================
        if(isset($_FILES['image']))
        {

            $error = arraY();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];

          
              // ======Delete is needed coz if the extension doesn't match then overwrite will not work
					                         	// @unlink will surpress the error of deleting file no error will be popup
					                        		


			     // ===========stop the query delete end===================


												
            // if the image size is not null then do this
            if(!$file_size == 0)
            {

			           	$target_dir = "image/";
			            $target_file = $target_dir . basename($_FILES["image"]["name"]);
			            $file_ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			            $extension = array("png","jpg","jpeg");
			            
			                        if(in_array($file_ext,$extension) == false)
			                        {

			                                        echo '<script> 
                                                        window.location.replace("http://localhost/admin_test/updateform.php?error=not_valid_filename");
                                                  </script>';
                                                          echo "<br>";
                                                          exit();
			                                  

			                        }
			                    if(empty($error) == true)
			                    {
					                        if (( $file_type == 'image/jpeg' || $file_type == 'image/png' || $file_type == 'image/jpg'))
					                         {
					                        
					                       			unlink("./image/" .$row['image']);

					                                  // ====================random name ganerator in image file=========
														
															function makeRandomString($max=6) {
															    $i = 0; //Reset the counter.
															    $possible_keys = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
															    $keys_length = strlen($possible_keys);
															    $str = ""; //Let's declare the string, to add later.
															    while($i<$max) {
															        $rand = mt_rand(1,$keys_length-1);
															        $str.= $possible_keys[$rand];
															        $i++;
															    }
															    return $str;
															}
																$random_name_at_last =  makeRandomString();

															// echo $random_name_at_last;

															// ==========================================
			                       
					                        	
 											move_uploaded_file($file_tmp, "$target_dir" . $random_name_at_last.".".$file_ext );
					                        $path = $_SERVER['HTTP_REFERER'];
					                        // echo $path;
					                        $actual_path = $random_name_at_last.".".$file_ext;
					                        // echo $actual_path;
			                      
			                   		$con_insert_file = mysqli_connect('localhost','root','','bs');
			                        // title,author,image,price
									$sql_update_title = "UPDATE book SET image='$actual_path' WHERE book_id='$real_pass_id'";

										if ($con_update->query($sql_update_title) === TRUE) 
											{
													// echo "succesfull update image";echo '<br>';
											}
											else
											{
												// echo "Not updatded --> sql error";echo '<br>';
											}

			                       }
			                       else
			                       {
			                        echo "<br>";
			                         echo "content type didn\'t match";
			                       }
			            }

            }
            // if the image size is null then nothing in image
            else
            {
            		// echo "The image is NULL";
            }


           
        }
  		echo '<script> 
			window.location.replace("http://localhost/admin_test/dashboard.php?updated_succesfully");
		</script>';
		exit();
//=====================================image update=end here=========




        // ============if user not loged in ==============
      }  else{

           header("Location: login.php?Login_needed");
           exit();
        }

?>


