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
    $give_products_details = mysqli_real_escape_string($data_base_for_details,$give_products_details); 

    // the get variable id passwed will be filter will coz no can change from URL like offset array
       
        $id__ = $give_products_details;

     $spilt_character = str_split($id__);
     $spilt_character_length = count($spilt_character);


                

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
  
        exit();
    
  }

// =========================
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
  <br>
<div class="container model_cusotme_css">
<br>
<center><h2 name="title" ><?php echo $row["title"];?></h2><p style="color: #0f6dfa;font-size:15px;">
  ISBN : <?php echo $row["book_id"] ?>
</p></center><br><br>

<div class="details-container">
  <div><img name="image" alt='Image not Found' src="<?php echo $url.$row["image"]; ?>" style="width: 300px;height: 400px" ></div>

  <div>
    <!--  $first_co_author = $row_auth['first_co_author'];
                 $publisher = $row_auth['publisher']; -->


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


    <p  style="float:left;"><b>Product Gener :</b>  &nbsp;<strong><?php echo $row["category"]; ?></strong></p>
  </div>
 
</div>
  <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Stock : '.$stock.'</strong>' ?>
<center><button class="btn btn-primary" style="margin-bottom: 20px;" onclick="goBack()">Go Back</button></center>
</div>
<div class="container form-group model_cusotme_css">
</div>


</div>

<script>
function goBack() {
  window.history.back();
}
</script>

                      <?php    
                      }
                    }
                    else
                    {
                        echo "<script>window.history.back();</script>";
                    }
        
                    $data_base_for_details->close();
?><?php?>