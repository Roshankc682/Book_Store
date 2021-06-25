<?php
session_start();
?>
<?php
// Initialize the session

  if (isset($_SESSION['name'])) 
            { 

             
              //  $category = $_POST['category'];
              // $author = $_POST['author'];
              // $price = $_POST['price'];
              // $descriptions = $_POST['descriptions'];
              // $ISSN = $_POST['ISSN'];
              
              $tmp = mysqli_connect("localhost","root","","bs");

              $title = stripslashes($_POST['title']);
              $title = mysqli_real_escape_string($tmp,$title);
              
              $author = stripslashes($_POST['author']);
              $author = mysqli_real_escape_string($tmp,$author);

             $category = stripslashes($_POST['category']);
              $category = mysqli_real_escape_string($tmp,$category);

             $price = stripslashes($_POST['price']);
              $price = mysqli_real_escape_string($tmp,$price);

             $descriptions = stripslashes($_POST['descriptions']);
              $descriptions = mysqli_real_escape_string($tmp,$descriptions);
              
             $ISSN = stripslashes($_POST['ISSN']);
             $ISSN = mysqli_real_escape_string($tmp,$ISSN);

             $CoAuthor = stripslashes($_POST['Co-Author']);
             $CoAuthor = mysqli_real_escape_string($tmp,$CoAuthor);

             $Publisher = stripslashes($_POST['Publisher']);
             $Publisher = mysqli_real_escape_string($tmp,$Publisher);
             $stock = stripslashes($_POST['stock']);
             $stock = mysqli_real_escape_string($tmp,$stock);



             // =================check ISSN there or not===============================
                $data_conn = new mysqli("localhost", "root", "","bs" );
                $sql_check_issn = "SELECT book_id FROM book";
                $result__ = $data_conn->query($sql_check_issn);
                if ($result__->num_rows > 0) {
                  // output data of each row
                  while($row_ = $result__->fetch_assoc()) {
                   
                   if(strcmp($ISSN, $row_["book_id"]) == 0)
                   {
                    echo '<script> window.location.replace("http://localhost/admin_test/insertForm.php?ISSN=already_exits");</script>';
                            exit();
                   }

                  }
                } else {}
                $data_conn->close();
             // =================check ISSN there or not===============================

            	// $name = $_FILES['image']['name'];
            	// $tmpname = $_FILES['image']['tmp_name'];
            // ====================random name ganerator in image file=========
            if(empty($_POST['title']) || empty($_POST['category']) || empty($_POST['author']) || empty($_POST['price']) || empty($_POST['ISSN']))
            {
               echo '<script>  window.location.replace("http://localhost/admin_test/insertForm.php?error=not_acceptable"); </script>';
                  exit();
            }


            $tmp_i = mysqli_connect("localhost","root","","bs");

            $ISSN_ = stripslashes($_POST['ISSN']);
            $ISSN_ = filter_var($ISSN_, FILTER_SANITIZE_STRING);
            $ISSN_ = mysqli_real_escape_string($tmp_i,$ISSN_); 

            // the get variable id passwed will be filter will coz no can change from URL like offset array
               
                $id__ = $ISSN_;

             $spilt_character = str_split($id__);
             $spilt_character_length = count($spilt_character);

        // ======================

        $theregex = '/^([0-9_^-]*)$/i';
        if (preg_match($theregex, $ISSN_)) 
        {
              // echo 'number';
              // exit();
        } 
        else 
        { 
         echo '<script>window.location.replace("http://localhost/admin_test/insertForm.php?error=IISN");
         </script>';
         exit();
        }

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
                // =====================================
            // form here the image upload
                    if(isset($_FILES['image']))
                    {

                        $error = arraY();
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_tmp = $_FILES['image']['tmp_name'];
                        $file_type = $_FILES['image']['type'];

                        $target_dir = "image/";

                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                        $file_ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                        $extension = array("png","jpg","jpeg");
                                    if(in_array($file_ext,$extension) == false)
                                    {

                                                $error[]= "Please choose the image";
                                                // echo "<br>";
                                                // echo "Please upload the valid file jpg";
                                                // exit();
                                                echo '<script> 
                                                        window.location.replace("http://localhost/admin_test/insertForm.php?error=not_valid_filename");
                                                  </script>';
                                                exit();

                                    }
                                if(empty($error) == true)
                                {
                                    if (( $file_type == 'image/jpeg' || $file_type == 'image/png' || $file_type == 'image/jpg'))
                                     {
                                   
                                    
                                    // i parse the book_id from here

                                   $path = $_SERVER['HTTP_REFERER'];
                                    // echo $path;
                                    $actual_path = $random_name_at_last.".".$file_ext;
                                    // echo $bookid_name_of_book.".".$file_ext;
                               		$con_insert_file = mysqli_connect('localhost','root','','bs');
                                    // title,author,image,price
            						 $query = "INSERT INTO BOOK(book_id,title,author,image,price,category,description) VALUES('$ISSN','$title','$author','$actual_path','$price','$category','$descriptions');";

                      				$run = mysqli_query($con_insert_file,$query);
                                    // echo $query;
                                    // exit();

                                                 if($run)
                                                 {

                                                    // To create a comment section by bood_id
                                                    // =======================================
                                                   
                                                    move_uploaded_file($file_tmp, $target_dir.$random_name_at_last.".".$file_ext);



                                                      $conn__ = new mysqli('localhost', "root", "", "bs");
                                                      // Check connection
                                                      if ($conn__->connect_error) {
                                                        die("Connection failed: " . $conn__->connect_error);
                                                      }
                                                     $sql__ = "CREATE TABLE `$ISSN` (
                                                    id INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                                    user_name VARCHAR(30) NOT NULL,
                                                    comemnts VARCHAR(400) NOT NULL,                    
                                                    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                                    sub_comemnts_to_verify VARCHAR(400) NOT NULL,
                                                    rating VARCHAR(200)
                                                    )";
                                                      
                                                      if ($conn__->query($sql__) === TRUE) {} else {}
                                                      $conn__->close();
                                                   
                                                    // book_id  author  first_co_author publisher
                                                    $for_author_conn = new mysqli("localhost", "root", "","bs");
                                                    $for_author_conn_sql = "INSERT INTO book_details_more (book_id, author, first_co_author, publisher, stock)
                                                    VALUES ('$ISSN', '$author', '$CoAuthor','$Publisher', '$stock')";

                                                    if ($for_author_conn->query($for_author_conn_sql) === TRUE) {} else {}
                                                    $for_author_conn->close();

                                                   


                                            
                                                     echo '<script> 
                                                        window.location.replace("http://localhost/admin_test/dashboard.php?success=book_uploaded_sussfully");
                                                  </script>';
                                                     exit();
                                                    
                                                     // exit();
                                                  }
                                                  else
                                                  {
                                                           // echo "1 Not uploaded";
                                                            echo '<script> 
                                                        window.location.replace("http://localhost/admin_test/insertForm.php?error=not_valid_filename");
                                                  </script>';
                                                          echo "<br>";
                                                          exit();
                                                  }
                                        
                                        
                                       

                                   }
                                   else
                                   {
                                    echo "<br>";
                                     echo "content type didn\'t match";
                                   }
                        }
                    }




            ?>

            <!-- clear the history for resubmission repeat while refresing the page -->

            <script type="text/javascript">
               				if ( window.history.replaceState ) {
                    				window.history.replaceState( null, null, window.location.href );
                			}
            </script>

            <?php
            }



            
        else{

           header("Location: login.php?Login_needed");
           exit();
        }

?>
        




