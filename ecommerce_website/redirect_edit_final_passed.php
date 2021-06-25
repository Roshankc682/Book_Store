<?php
  require "header.php";
?>

<?php




if (isset($_SESSION['name'])) 
{ 
$user_name_that_is_logged = $_SESSION['name'];

?>

<style>


.details-container {
  display: grid;
  grid-template-columns: auto auto auto auto;
  grid-gap: 10px;
  padding: 10px;
}

.details-container > div {
  background-color: rgba(255, 255, 255, 0.4);
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


   if(isset($_POST['comment_verify']))
   {
    $comment_verify = 1;
   }else{
    $comment_verify = null;
   }

        if(isset($_POST['comment_id___edit']))
          {}else{
             echo '<script> 
                   window.location.replace("index.php");
                  </script>';
            exit();
          }
          if(isset($_GET['passed_id']))
            {}else
          {
             echo '<script> 
                   window.location.replace("index.php");
                  </script>';
            exit();
          }
          if(isset($_POST['This_is_hidden_name'])){}else
          {
             echo '<script> 
                   window.location.replace("index.php");
                  </script>';
            exit();
          }
          
    $name_of_use = $_SESSION['name'];
    $give_products_details = stripslashes($_GET['passed_id']);
    $give_products_details = mysqli_real_escape_string($data_base,$give_products_details); 

          $_SESSION['comment_id___edit'] = $_POST['comment_id___edit'];
          $_SESSION['This_is_hidden_name'] = $_POST['This_is_hidden_name'];
          $_SESSION['This_is_hidden_id'] = $_POST['This_is_hidden_id'];
          $_SESSION['This_is_hidden_url'] = $_SESSION['fullUrl_passed_to_show_not_permission_from_details'];


         
         
// exit();
     
    // the get variable id passwed will be filter will coz no can change from URL like offset array
       
        $id__ = $give_products_details;
        // echo $id__;
//filter character ended


// now if character in id then block and Redirect
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
            window.location.href = 'index.php';
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
                          // echo 'if id exits then load below code';?>

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
      <!-- from form the get post catch to cart.php so i can get the user add cart request in session -->
      <form method="post" action="cart.php?
        action=add&id=<?php echo $row['book_id']; ?>&title=<?php echo $row['title']; ?>&price=<?php echo $row['price'];?>&author=<?php echo $row['author']; ?>&image=<?php echo $row['image']; ?><?php echo "&form_details_products=true"?>"
        >
  <br>
<div class="container model_cusotme_css">

<center><h2 name="title" ><?php echo $row["title"];?></h2></center><br><br>

<div class="details-container">
  <div><img name="image" alt='Image not Found' src="<?php echo $url.$row["image"]; ?>" style="width: 300px;height: 400px" ></div>

  <div>

  <p name="author" style="float:left;font-size: 14px;"><strong>Author </strong>: <?php echo $row["author"].' '; ?><strong><sup style="font-size: 12px;">author</sup></strong>

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


    <p  style="float:left;"><b>Product Gener :</b>  &nbsp;<strong><?php echo $row["category"]; ?></strong></p>
   <?php echo '<strong>Stock : '.$stock.'</strong><br>';?>
    </div>

  <div><br><br><b>Quantity:</b><br>
      <input name="quantity" type="text" placeholder="Type Quantity..."><br><br>
            
            <button type="submit" name="add" class="add_cart_style" value="Add to Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
Add to cart</button></div>
</form>
</div>
</div>
   <br><br>

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
      echo "<center><h3>Edit your Comment<h3></center>";


      $array_to_verify_sub_comment = array();
        while($row_html_array_comment_verify=mysqli_fetch_assoc($result_html_comment))
          {
             $array_to_verify_sub_comment[] = $row_html_array_comment_verify[$index55];;
               // echo $row_html_array_comment_verify[$index33]; // etc

          }
          // echo "<pre>";
          // print_r($array_to_verify_sub_comment);


            // Edit the comment from here
          echo '<form action="edit_comment.php" method="POST">';

          if($comment_verify == 0){
          echo '<!-- ===========================Rating icon============================== -->
           <fieldset class="rating">
                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
            </fieldset>
          <!-- ===========================Rating icon============================== -->';
        }else
        {
          //nothing
        }

         echo '<textarea class="form-control" type="text" name="new_comment"></textarea><br><center><input type="submit" class="btn btn-primary" placeholder="Edit">&nbsp;&nbsp;<button class="Back btn btn-primary" style="width: 150px;" value="Go back" onclick="goBack()">Go back</button></center><br></form></div><br><br>';
      
    
      
      
   ?>


                      <?php   
                      }
                    }
                     else
                    {
exit();
                        echo "<exit();script>window.history.back();</script>";
                        // exit();
                    }
        
                    $data_base_for_details->close();

?>



    <?php
  
  require "footer.php";

}
else
{exit();
  echo '<script> 
         window.location.replace("login.php?error=please_signup");
        </script>';
  exit();
}

?>
<script type="text/javascript">
  function goBack() {
  window.history.back();

</script>