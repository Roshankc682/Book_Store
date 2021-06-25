<?php


      require 'db.inc.php';
           
      if(empty($_GET['hash_token_for_client_for_check_email']) || empty($_GET['type']) || empty($_GET['email']))
      {
            echo '<script>window.location.replace("/signup_check/index.php");</script>';
            exit();     
      }
      // echo "<pre>";
      // print_r($_GET);
      echo "<center><h1>Processing<br>Wait for second<h1></center>";


// first_database_for_check check_after_signup user email hash time_hash
      // echo $_GET['hash_token_for_client_for_check_email'].'<br>';
            $hash_check_to_check = stripslashes($_GET['hash_token_for_client_for_check_email']);
            $hash_check_to_check = mysqli_real_escape_string($data_base_for_details_for_email_check,$hash_check_to_check); 

            $type = stripslashes($_GET['type']);
            $type = mysqli_real_escape_string($data_base_for_details_for_email_check,$type); 

            $email_check_to_check = stripslashes($_GET['email']);
            $email_check_to_check = mysqli_real_escape_string($data_base_for_details_for_email_check,$email_check_to_check); 
            
      
                              $sql__hash="select * from check_after_signup where (hash='$hash_check_to_check');";
                              $res__hash=mysqli_query($data_base_for_details_for_email_check,$sql__hash);
                  
                              if (mysqli_num_rows($res__hash) > 0) 
                              {
                                    // echo "There is hash<br>";
                                    $sql__time_hash="select * from check_after_signup where (type='$type');";
                                    $res__time_hash=mysqli_query($data_base_for_details_for_email_check,$sql__time_hash);

                                    if (mysqli_num_rows($res__time_hash) >= 0) 
                                    {
                                          // echo "time hash is there<br>";
                                          $sql__email_check="select * from check_after_signup where (email='$email_check_to_check');";
                                          $res__email_check=mysqli_query($data_base_for_details_for_email_check,$sql__email_check);
                                          // echo "All above<br>";
                                          if (mysqli_num_rows($res__email_check) > 0) 
                                          {
                                                // echo "Email found<br>";
                                                // if all success then database will be added and account created
                                                $servername = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $dbname = "first_database_for_check";

                                                // Create connection
                                                $conn__ = new mysqli($servername, $username, $password, $dbname);
                                                // Check connection
                                                if ($conn__->connect_error) {
                                                  die("Connection failed: " . $conn__->connect_error);
                                                }

                                                $sql__ = "SELECT * FROM check_after_signup";
                                                $result__ = $conn__->query($sql__);

                                                if ($result__->num_rows > 0) {
                                                  // output data of each row
                                                  while($row = $result__->fetch_assoc()) 
                                                  {
                                                      // check email first
                                                      if($row["email"] == $email_check_to_check)
                                                      {
                                                            // echo 'Password : '.$row['password'];
                                                            // echo '<br>Email : '.$row['email'];
                                                            // echo '<br>username : '.$row['username'];

                                                            $username = stripslashes($row['username']);
                                                            // echo '<br>'.$username.'<br>';
                                                            $email = stripslashes($row['email']);
                                                            // echo '<br>'.$email.'<br>';
                                                            $Nickname = stripslashes($row['Nickname']);
                                                            // echo '<br>'.$Nickname.'<br>';
                                                             $password = stripslashes($row['password']);
                                                            // echo '<br>'.$password.'<br>';
                                                             $passwordRepeat = stripslashes($row['password']);
                                                             // echo '<br>'.$passwordRepeat.'<br>';




                                    // ==========================This delete the database of user after clicked signup ================
                                            $id_to_delete = $row["id"];
                                          // Check connection
                                          if ($conn__->connect_error) {
                                            die("Connection failed: " . $conn__->connect_error);
                                          }

                                          // sql to delete a record
                                          $sql = "DELETE FROM check_after_signup WHERE id=$id_to_delete";
                                          // $sql = "DELETE FROM check_after_signup WHERE id='0'";
                                          // echo $sql;

                                          if ($conn__->query($sql) === TRUE) {
                                            // echo "<br>Record deleted successfully<br>";
                                          } else {
                                            // echo "<br>Error deleting record: " . $conn__->error.'<br>';
                                          }


                              if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat))
                              {     
                                     header("Location: /signup_check/signup.php?error=emptyfields&udi=".$username."&email".$email);
                                     exit();
                                    
                              }

                              else if(!preg_match("/^[a-zA-Z0-9]{5,}$/",$username))
                              {
                                    header("Location: /signup_check/signup.php?error=Invalid_Username");
                                    exit();
                              }

                              else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
                              {
                                    header("Location: /signup_check/signup.php?error=Invalid_Email_&udi=".$username);
                                    exit();
                              }
                              else if($password !== $passwordRepeat)
                              {
                                    header("Location: /signup_check/signup.php?error=Password&Password_Repeat_doesnot_match");
                                    exit();
                              }
                              else
                              {

                                          // idUsers  uidUsers    emailUsers  pwdUsers

                                          $sql = "SELECT username FROM users WHERE username=?";
                                          $stmt = mysqli_stmt_init($data_base);
                                                if(!mysqli_stmt_prepare($stmt,$sql))
                                                {
                                                      header("Location: /signup_check/signup.php?error=sqlerror");
                                                      exit();
                                                }
                                                else
                                                {
                                                      $sql="select * from users where (username='$username');";

                                                $res=mysqli_query($data_base,$sql);

                                                      if (mysqli_num_rows($res) > 0) 
                                                            {
                                                            // output data of each row
                                                            $row = mysqli_fetch_assoc($res);

                                                            // username_already_taken or not check
                                    
                                                            if ($username==$row['username'])
                                                                  {
                                                                  header("Location: /signup_check/signup.php?error=username_already_taken");
                                                                              exit();
                                                                  }
                                                            }
                                                                  else
                                                                  {

                                                                        // email check already exit or not
                                                                        $sql_email = "select * from users where (email='$email');";
                                                                  $res_email=mysqli_query($data_base,$sql_email);                   
                                                                  $row_email = mysqli_fetch_assoc($res_email);
                                                                        if($email==$row_email['email'])
                                                                        {
                                                                              header("Location: /signup_check/signup.php?error=email_already_taken");
                                                                                    exit();
                                                                        }
                                                                        else
                                                                        {
                                                                                    // data is inserted
                                                                              // $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                                                                              // $hashedpwd =  md5($password);
                                                                                    $data_insert_in_databse = "INSERT INTO `users` (username, email, password,nickname) VALUES ('$username', '$email', '$password','$Nickname')";
                                                                                    $inserted = mysqli_query($data_base,$data_insert_in_databse);


                                                                                    // ==============Database for add cart with username is added===============
                                                                                    $servername = "localhost";
                                                                                    $username_1 = "root";
                                                                                    $password_1 = "";
                                                                                    $dbname_1 = "players";

                                                                                    // Create connection
                                                                                    $conn = new mysqli($servername, $username_1, $password_1, $dbname_1);
                                                                                    // Check connection
                                                                                    if ($conn->connect_error) {
                                                                                      die("Connection failed: " . $conn->connect_error);
                                                                                    }

                                                                                    // sql to create table for user for cart 
                                                                                    $sql = "CREATE TABLE $username (
                                                                                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                                                                    book_id VARCHAR(30) NOT NULL,
                                                                                    product_name VARCHAR(30) NOT NULL,
                                                                                    author VARCHAR(30) NOT NULL,
                                                                                    quantity VARCHAR(30) NOT NULL,
                                                                                    price VARCHAR(50),
                                                                                    image VARCHAR(50),
                                                                                    total VARCHAR(30) NOT NULL,
                                                                                    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                                                                                    )";

                                                                                    

                                                                                    if ($conn->query($sql) === TRUE) {
                                                                                      // echo "Table MyGuests created successfully";
                                                                                    } else {
                                                                                      // echo "Error creating table for cart: " . $conn->error;
                                                                                    }

                                                                                    // ====================================
                                                                                    
                                                                                    // sql to create profile picture
                                                                                    $username_pro = $username."profile";
                                                                                    $sql = "CREATE TABLE $username_pro (
                                                                                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                                                                    name VARCHAR(30) NOT NULL,
                                                                                    image VARCHAR(30) NOT NULL,
                                                                                    image_text VARCHAR(150) NOT NULL
                                                                                    )";

                                                                                    if ($conn->query($sql) === TRUE) {
                                                                                      
                                                                                    } else {
                                                                                     $conn->error;
                                                                                    }
$con_insert_file = mysqli_connect('localhost','root','','players');
 // title,author,image,price
$user_name = $username.'profile';
$srcfile = 'C:\xampp\htdocs\ecommerce_website\image\first_profile.jpg'; 
$destfile = 'C:\xampp\htdocs\ecommerce_website\image\\'.$username.'.jpg'; 
// echo $destfile;
  
if (!copy($srcfile, $destfile)) { 
    // echo "File cannot be copied! \n"; 
} 
else { 
    // echo "File has been copied!"; 
}
// exit();
$img_name = $username.'.jpg';
 $query__ = "INSERT INTO $user_name (name,image) VALUES('$user_name','$img_name');";
 // print_r($query);
$run = mysqli_query($con_insert_file,$query__);



                                                                                          header("Location: /ecommerce_website/login.php?success=work_like_charm");


                                                      
                                                                                                // exit();

                                                      

                                                                                    exit();
                                                                                    
                                                                  }
                                                }
                                                  // ======================================
                                          }
                               $data_base->close();
                               }
                                                            
                                                      }
                                                  }
                                                }
                                                
                                          }
                                          else
                                          {
                                                // echo "not email found<br>";
                                                echo '<script>window.location.replace("http://localhost/signup_check/index.php");</script>';
                                                exit();    
                                          }
                                          
                                    }
                                    else
                                    {
                                          // echo "No time hash found<br>";
                                          echo '<script>window.location.replace("http://localhost/signup_check/index.php");</script>';
                                          exit();       
                                    }
                              }
                              else
                              {
                                   // echo "Nope hash found<br>";
                                    echo '<script>window.location.replace("http://localhost/signup_check/index.php");</script>';
                                    exit();  
                              }
?>

