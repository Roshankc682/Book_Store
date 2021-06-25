<?php
  require "header.php";
  require 'includes/db.inc.php';


if (isset($_SESSION['name'])) 
{
     
      
     if(isset($_GET['comments']) && !empty($_GET['comments'])) 
    {

      if(isset($_GET["rating"]))
      {
        $rate = $_GET['rating'];
      }else
      {
        $rate = null;
      }

      $rate  = htmlspecialchars($rate, ENT_QUOTES);

      $comments_passwd = $_GET['comments'];
      $comments_passwd  = htmlspecialchars($comments_passwd, ENT_QUOTES);
      // echo $comments_passwd.'<br>';
      $id_passed_thorugh_url = $_GET['the_id_passed'];
       $id_passed_thorugh_url  = htmlspecialchars($id_passed_thorugh_url, ENT_QUOTES);
      // echo $id_passed_thorugh_url.'<br>';
      $name_passed_through_url = $_GET['the_name_passed'];
       $name_passed_through_url  = htmlspecialchars($name_passed_through_url, ENT_QUOTES);
      

      // exit();

       $the_comment_verified_passed = $_GET['the_comment_verified_passed'];
       $the_comment_verified_passed  = htmlspecialchars($the_comment_verified_passed, ENT_QUOTES);

      $sql = "SELECT user_name FROM `$id_passed_thorugh_url` WHERE user_name=?";
      // echo $sql.'<br>';
    $stmt = mysqli_stmt_init($data_base_for_details);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
    // echo "sql error";
    }
   else
    {
      $sql="select * from `$id_passed_thorugh_url` where (user_name='$name_passed_through_url');";
      // echo '<br>'.$sql;
      $res=mysqli_query($data_base_for_details,$sql);

      if (mysqli_num_rows($res) > 0) 
           {
              // echo 'output data of each row';
              $row = mysqli_fetch_assoc($res);


                  // id user_name comemnts  reg_date  
                  $data_insert_in_databse = "INSERT INTO `$id_passed_thorugh_url` (user_name, comemnts,sub_comemnts_to_verify , rating) VALUES ('$name_passed_through_url' , '$comments_passwd','$the_comment_verified_passed','$rate')";
                  $inserted = mysqli_query($data_base_for_details,$data_insert_in_databse);
                     
                  echo '<script>window.location.replace("http://localhost/ecommerce_website/details_of_product.php?passed_id='.$id_passed_thorugh_url.'");</script>';
                  exit();
                
                // }

            }
            else
            {
              
                  // id user_name comemnts  reg_date  
                  $data_insert_in_databse = "INSERT INTO `$id_passed_thorugh_url` (user_name, comemnts,sub_comemnts_to_verify , rating) VALUES ('$name_passed_through_url' , '$comments_passwd','$the_comment_verified_passed','$rate')";
                  $inserted = mysqli_query($data_base_for_details,$data_insert_in_databse);
                     
                   echo '<script>window.location.replace("http://localhost/ecommerce_website/details_of_product.php?passed_id='.$id_passed_thorugh_url.'");</script>';
                  exit();
            }
      }




    }
    else
    {
          echo '<script>window.location.replace("index.php?comment=null&not_valid=comments");
        </script>';
        exit();
    }


}
else
{
  echo '<script>window.location.replace("index.php?error=You_need_to_login_darling");
    </script>';
    exit();
}
?>