<?php

	require "header.php";

if (isset($_SESSION['name'])) 
{


           $username = $_SESSION['name'];
           $profile_name = $username;
           // echo $profile_name;
           // echo $username;
           


    // =====================================
// form here the image upload
        if(isset($_FILES['image']))
        {

            $error = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
             // echo $file_size;
          if($file_size > 1)
          {
            			  $target_dir = "image/";

                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                        // echo $target_dir;
                        // echo "<br>";
                        $file_ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        // echo $file_ext;
                        // echo "<br>";
                        // echo $profile_name;

                          $extension = array("png","jpg","jpeg","gif");
                          $username = $username."profile";


                           $username_1 = $profile_name.".png"; 

                          // echo $username_1.".png";
                          // echo "<br>";
                          // delete image
                        @unlink("./image/" .$username_1);

                           $username_2 = $profile_name.".jpeg";  
                           // echo "<br>";
                          // delete image
                        @unlink("./image/" .$username_2);

                          // echo $username_2.".jpeg";

                          // echo "<br>";

                           $username_3 = $profile_name.".jpg";

                          // echo $username_3.".jpg";

                          // delete image
                        @unlink("./image/" .$username_3);
                        

                            




                          // =====delete if image is already there=========
            

            // Now the delete from database is initilise
            $servername = "localhost";
            $username_1 = "root";
            $password = "";
            $dbname = "players";

            // Create connection
            $conn = new mysqli($servername, $username_1, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            // sql to delete a record
            $sql = "DELETE FROM $username WHERE name='$username'";

            if ($conn->query($sql) === TRUE) {
              // echo "Record deleted successfully";
            } else {
              // echo "Error deleting record: " . $conn->error;
            }

            $conn->close();
             

               

               

                          // =================================================
                                    if(in_array($file_ext,$extension) == false)
                                    {

                                                echo '<script> 
         window.location.replace("index.php?error=please_upload_valid_file");
        </script>';
  exit();
                                                exit();

                                    }
                                if(empty($error) == true)
                                {
                                    if (( $file_type == 'image/jpeg' || $file_type == 'image/png' || $file_type == 'image/gif' || $file_type == 'image/jpg'))
                                     {
                                     	
                                    move_uploaded_file($file_tmp, $target_dir.$profile_name.".".$file_ext);
                                    $path = $_SERVER['HTTP_REFERER'];
                                    // echo $path;
                                    $actual_path = $profile_name.".".$file_ext;
                                    
                                   
                                    
                                  
                               		$con_insert_file = mysqli_connect('localhost','root','','players');
                                    $query = "INSERT INTO $username (name,image) VALUES('$username','$actual_path');";
                                   // echo '<br>';
                                  // print_r($query);
                                  // echo '<br>'.$profile_name.'<br>';
                                  // echo '<br>'.$username.'<br>';

                      						$run = mysqli_query($con_insert_file,$query);


                                                 if($run)
                                                 {
                                                   
                                                    //If the login is not done correct
                                                     // header("Location: ../ecommerce_website/index.php?profile_picture=updated");
                                                    
                                                      // Header cannot be set here so i used javascript to redirect --> Boom :)
                                                      echo '<script> 
                                                              window.location.replace("setting.php?profile_picture=updated_succesfully");
                                                        </script>';
                                                      exit();
                                                  }
                                                  else
                                                  {
                                                           echo "<br>Not uploaded";
                                                          // echo $actual_path;
                                                          // echo "<br>";
                                                     // header("Location: ../ecommerce_website/index.php?profile_picture=not_updated");
                                                          exit();
                                                  }
                                        
                                     }
                                     else
                                     {
                                     		// echo "3rd not in code";
                                     }
                                 }
                                 else
                                 {
                                 	// echo "4th not in code";
                                 }

                // ===========file size comparer ended=================
                }
                else
                {
                    // /If the login is not done correct
                    // header("Location: ../ecommerce_website/index.php?profile_pic=photo_is_not_uploaded");
                    // echo "please login";
                    // exit();

                }

            }
            else
            {
            	// echo "5th not in code";
            }
       
   
   }
 else
  {

	//If the login is not done correct
	 header("Location: ../ecommerce_website/index.php?error=please_signup");
	 echo "please login";
	 exit();
  }

?>


<!-- clear the history for resubmission repeat while refresing the page -->

<script type="text/javascript">
   				if ( window.history.replaceState ) {
        				window.history.replaceState( null, null, window.location.href );
    			}
</script>