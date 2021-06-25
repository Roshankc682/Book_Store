<?php
  require "header.php";
?>

<?php


?>

<style>


.details-container {
  display: grid;
  grid-template-columns: auto auto auto auto;
  grid-gap: 10px;
  padding: 10px;
}

.details-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
}

.model_cusotme_css{
          box-shadow: 0 9px 20px 0 rgba(0, 0, 0, 0.1);
          /*background-color: #63b1e9;*/

  }
  .add_cart_style{
    background-color: #6ec872;
    border: none;
    color: white;
    padding: 5px 52px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 13px;
    /* box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); */
    border-radius: 5px;
}

</style>
</head>
<body>
  <?php

    require 'includes/db.inc.php';
    $give_products_details = stripslashes($_GET['passed_id']);
     $give_products_details = filter_var($give_products_details, FILTER_SANITIZE_STRING);
    $give_products_details = mysqli_real_escape_string($data_base,$give_products_details); 

    // the get variable id passwed will be filter will coz no can change from URL like offset array
       
        $id__ = $give_products_details;
        // echo $id__;

     $spilt_character = str_split($id__);


$spilt_character_length = count($spilt_character);


//filter character ended


// now if character in id then block and Redirect
$custom = '1';
$theregex = '/^([0-9_^-]*)$/i';


  if (preg_match($theregex, $give_products_details)) 
  {
     // ====================Check not get offset array==========================

$conn_check = new mysqli('localhost','root','','bs');
$sql_check = "SELECT book_id FROM book_details_more";
$result_check = $conn_check->query($sql_check);
$id_check = [];
if ($result_check->num_rows > 0) {
 
  while($row = $result_check->fetch_assoc()) {
     array_push($id_check,$row["book_id"]);
  }
}
$conn_check->close();
if (in_array($id__, $id_check))
{
$con_edit_author = mysqli_connect('localhost','root','','bs');
$select_author = mysqli_query($con_edit_author,"select * from book_details_more where book_id='$id__'");
$row_auth = mysqli_fetch_assoc($select_author);
$first_co_author = $row_auth['first_co_author'];
$publisher = $row_auth['publisher'];
}else{}

// ========================================================================
      // ====================Check not get offset array==========================

$conn_check = new mysqli('localhost','root','','bs');
$sql_check = "SELECT book_id FROM book_details_more";
$result_check = $conn_check->query($sql_check);
$id_check = [];
if ($result_check->num_rows > 0) {
 
  while($row = $result_check->fetch_assoc()) {
     array_push($id_check,$row["book_id"]);
  }
}
$conn_check->close();
if (in_array($id__, $id_check))
{
$con_edit_author = mysqli_connect('localhost','root','','bs');
$select_author = mysqli_query($con_edit_author,"select * from book_details_more where book_id='$id__'");
$row_auth = mysqli_fetch_assoc($select_author);
$first_co_author = $row_auth['first_co_author'];
$publisher = $row_auth['publisher'];
$stock = $row_auth['stock'];
}else{}

// ========================================================================
   } 
  else 
  { 
    echo "<script>
         setTimeout(function(){
            window.location.href = '/ecommerce_website';
         }, 5000);
      </script>
      <div class='alert alert-danger'>
  <center><strong style='font-size: 25px;''>You are not allowed to modify content or u will be blocked.<br>Redirect to home after few second.</strong></center>
</div><br><br><br><br><br><br><br><br><br>";
require "footer.php";
    exit();
    
  }


// close of code character if in passwd id is charc


         $sql="select * from book where (book_id='$id__');";
          // echo $sql;

                $res=mysqli_query($data_base_for_details,$sql);

                  if (mysqli_num_rows($res) > 0) 
                    {
                    // output data of each row
                    $row = mysqli_fetch_assoc($res);

                    // username_already_taken or not check
                    if ($id__==$row['book_id'])
                      {
                          // echo 'if id exits then load below code';
                          ?>

                          <?php


// echo '<script>alert('; echo $give_products_details; echo ');</script>';
    // ======connected to book where image name author_name uploaded==========';

      $con_edit = mysqli_connect('localhost','root','','bs');
      // This id from the shopping.php 
      $select = mysqli_query($con_edit,"select * from book where book_id='$give_products_details'");
      $row = mysqli_fetch_assoc($select);
      
     // ======end of connection====
     $url = "/admin_test/image/";

     // echo $row['book_id'];

    ?>
    <center><h3>Login to Buy Books</h3></center>
  <br>
<div class="container model_cusotme_css">
<br>
<center><h2 name="title" ><?php echo $row["title"];?></h2></center><br><br>

<div class="details-container">
  <div><img name="image" alt='Image not Found' src="<?php echo $url.$row["image"]; ?>" style="width: 300px;height: 400px" ></div>

  <div>
    <br>
  <p name="author" style="float:left;font-size: 15px;"><strong>Author </strong>: <?php echo $row["author"].' '; ?><strong><sup style="font-size: 12px;">author</sup></strong>

  <?php
    // echo gettype($first_co_author);
    if ($first_co_author == null)
    {}
    else
    {
    echo ' ('.$first_co_author.') '.'<strong><sup style="font-size: 12px;"> co-author</sup></strong>';
    }
    if ($publisher == null)
    {}
    else
    {
    echo ' ('.$publisher.') '.'<strong><sup style="font-size: 12px;"> publisher</sup></strong>';
    }
  ?>

  </p>



  <br><br>

  <h6 name="price" style="float:left;"><i class="fa fa-money" aria-hidden="true"></i> : Rs.<?php echo $row["price"];?> </h6>
  <br>
  <br>
    <p  style="float:left;"><b>Product Description :</b></p>
    <br>
    <p style="  word-wrap: break-word;"><?php echo $row["description"];?></p>


    <p  style="float:left;"><b>Product Gener :</b>  &nbsp;<strong><?php echo $row["category"]; ?></strong>  <?php echo '<strong style="margin-left:20px;">Stock : '.$stock.'</strong><br>';?></p>
  </div>
</div>
</div>
<br>

<div class="container form-group model_cusotme_css">
  <?php
     $con_view_html = mysqli_connect('localhost','root','','bs');
     
     $q_html = "SELECT * FROM `$give_products_details`;";
     // echo $q_html;
     $result_html = mysqli_query($con_view_html,$q_html);

     // This is for verify id sub comment that is put in array
     $result_html_comment = mysqli_query($con_view_html,$q_html);
      mysqli_close($con_view_html);
// id user_name comemnts reg_date
     $index11="id";
      $index22="user_name";
      $index33="comemnts";
      $index44="reg_date";
       $index55="sub_comemnts_to_verify";
      $index66="rating";


      $array_to_verify_sub_comment = array();
        while($row_html_array_comment_verify=mysqli_fetch_assoc($result_html_comment))
          {
             $array_to_verify_sub_comment[] = $row_html_array_comment_verify[$index55];;
               // echo $row_html_array_comment_verify[$index33]; // etc

          }
      echo "<center><h3>Reviews of products<h3></center>";
      
      while($row_html=mysqli_fetch_assoc($result_html))
      {
         if ($row_html[$index55] == '0') 
          {
             // print the comment as parent
                    // echo '<br>'."permission to delete and edit".'<br>';
            echo '<br><br><div class="container" style="background-color: #ffffff;">';
          echo'<p class="float-left"><i class="fa fa-user" aria-hidden="true"></i>  '.$row_html[$index22].'

          &nbsp;&nbsp';

          $fullUrl_passed_to_show_not_permission = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
          $_SESSION['fullUrl_passed_to_show_not_permission_from_details'] = $fullUrl_passed_to_show_not_permission;

          

          echo '
          <input type="hidden" name="comment_id___edit" value="'; echo $give_products_details.'"> 
          <input type="hidden" name="comment_id___edit" value="'; echo $row_html[$index11].'"> 
                      <input type="hidden" name="This_is_hidden_name" value="';
          echo $row_html[$index22].'"><input type="hidden" name="This_is_hidden_id" value="';
          echo $give_products_details.'"><input type="hidden" name="This_is_hidden_url" value="';
          echo $_SESSION['fullUrl_passed_to_show_not_permission_from_details'].'">
               ';

          echo '<input type="hidden" name="comment_id___" value="'; echo $row_html[$index11].'">
          <input type="hidden" name="This_is_hidden_name" value="';
          echo $row_html[$index22].'"><input type="hidden" name="This_is_hidden_id" value="';
          echo $give_products_details.'"><input type="hidden" name="This_is_hidden_url" value="';
          echo $_SESSION['fullUrl_passed_to_show_not_permission_from_details'].'">';

 $rate = $row_html[$index66];
          // echo $rate;
            // ======rating switch=============================
switch ($rate) {
                    case "half":
                      echo '<i class="fa fa-star-half-full" style="font-size:20px;color:#54dabb"></i>
                             &nbsp;&nbsp;&#128546;';
                      break;
                    case "1":
                      echo '<span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            &nbsp;&nbsp;&#128530;';
                      break;
                    case "1 and a half":
                      echo '<span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <i class="fa fa-star-half-full" style="font-size:20px;color:#54dabb"></i>
                            &nbsp;&nbsp;&#128530;';
                      break;
                    case "2":
                      echo '<span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            &nbsp;&nbsp;&#128532;';
                      break;
                    case '2 and a half':
                      echo '<span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <i class="fa fa-star-half-full" style="font-size:20px;color:#54dabb"></i>
                            &nbsp;&nbsp;&#128528;';
                      break;
                    case '3':
                      echo '<span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            &nbsp;&nbsp;&#128529;';
                      break;
                    case '3 and a half':
                      echo '<span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <i class="fa fa-star-half-full" style="font-size:20px;color:#54dabb"></i>
                            &nbsp;&nbsp;&#128512;';
                      break;
                    case '4':
                      echo '<span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            &nbsp;&nbsp;&#128536;';
                      break; 
                    case '4 and a half':
                      echo '<span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <i class="fa fa-star-half-full" style="font-size:20px;color:#54dabb"></i>
                            &nbsp;&nbsp;&#128537;';
                      break;
                    case '5 ':
                      echo '<span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            <span class="fa fa-star checked" style="font-size:20px;color:#54dabb"></span>
                            &nbsp;&nbsp;&#128151;';
                      break; 
                    default:
                    // test
}
// ======rating switch=============================
      


          echo '</p><i style="margin-left: 30px;" class="fa fa-clock-o " aria-hidden="true"></i>&nbsp;&nbsp;'.$row_html[$index44];
                  
          echo  '<br><br><h6 style="margin-left: 20px;"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;'.$row_html[$index33].'</div>';

          }// This if condition will print replied comments
          if (in_array($row_html[$index11], $array_to_verify_sub_comment))
        {

          // echo "&nbsp;&nbsp;&nbsp;matched".'<br>';

              // echo '<br>&nbsp;&nbsp;&nbsp;'.$row_html[$index33].'<br>';

          $con_view_html_to_print = mysqli_connect('localhost','root','','bs');
     
          $q_html_to_print = "SELECT * FROM `$give_products_details`;";
          // echo $q_html;
          $result_html_to_print = mysqli_query($con_view_html_to_print,$q_html_to_print);

          // This is for verify id sub comment that is put in array
          $result_html_comment_to_print = mysqli_query($con_view_html_to_print,$q_html_to_print);
           while($row_html_to_print=mysqli_fetch_assoc($result_html_to_print))
            { 
              // echo $row_html_to_print[$index55];
              if($row_html_to_print[$index55] == $row_html[$index11] )
              {
                // echo "matched final";
                $user_name_that_is_logged = 'test_test_test_not_gonna_be_equal';
                 if($user_name_that_is_logged == $row_html_to_print[$index22])
                  { 
                    
                      echo "nothing will print";
                    
                  }
                  else
                  {
                    echo '<br><h6 style="margin-right:20px;">Reply From '.$row_html_to_print[$index22].' :&nbsp;'.$row_html_to_print[$index33].'</h6>';
                    
                  }
              }
            }

        }// This if condition will print replied comment ends here
     
      }
     
      
   ?>


<br><br><br><br>

<input  class="form-control" id="disabledInput" type="text" placeholder="Comment is Disable for anonymous....." disabled><br><center><a href="login.php" style="color: black;" type="button" class="btn btn-lg btn-info" disabled>login to review</a></center><br><br></div>
</div>
</div>
</div>
                      <?php    
                      }
                    }
                     else
                    {

                        echo "<script>window.history.back();</script>";
                    }
        
                    $data_base_for_details->close();


    

?>

    <?php
  
  require "footer.php";




?>