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
   $name_of_use = $_SESSION['name'];
    $give_products_details = stripslashes($_GET['passed_id']);
    $_SESSION['passed_id_to_redirect_edit'] = $_GET['passed_id'];
    $give_products_details = mysqli_real_escape_string($data_base,$give_products_details); 
     
    // the get variable id passwed will be filter will coz no can change from URL like offset array
       
        $id__ = $give_products_details;
        // echo $id__;

     $spilt_character = str_split($id__);


$spilt_character_length = count($spilt_character);



// now if character in id then block and Redirect

$theregex = '/^([0-9_^-]*)$/i';


  if (preg_match($theregex, $give_products_details)) 
  {
      // echo 'number';
                // ======================
                 // book_id  author  first_co_author publisher
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

                 
                 // exit();
      // exit();
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

    <?php
    echo '<br>';
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "error=book_already_added")== true)
            {
                echo '<center><div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:250px;">
                    <strong>It\'s already in cart !!! </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div></center>';
            }
    // error=book_already_added
    
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


    <?php 
     if( $stock == 0){
    ?>

    <input name="quantity" type="text" placeholder="0 stock ..." disabled=""><br><br>
           
            <button type="submit" name="add" class="btn btn-danger" value="Add to Cart" disabled=""><i class="fa fa-shopping-cart" aria-hidden="true"></i>
Out of Stock</button>
      
<?php
  }else{

 ?>
<input name="quantity" type="text" placeholder="Type Quantity..."><br><br>
           
            <button type="submit" name="add" class="add_cart_style" value="Add to Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
Add to cart</button>
<?php
}
?>

</div>
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

$fullUrl_passed_to_show_not_permission = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['fullUrl_passed_to_show_not_permission_from_details'] = $fullUrl_passed_to_show_not_permission;

// id user_name comemnts reg_date
     $index11="id";
      $index22="user_name";
      $index33="comemnts";
      $index44="reg_date";
      $index55="sub_comemnts_to_verify";
      $index66="rating";
      echo "<center><h3>Reviews of products<h3></center>";


      $array_to_verify_sub_comment = array();
        while($row_html_array_comment_verify=mysqli_fetch_assoc($result_html_comment))
          {
             $array_to_verify_sub_comment[] = $row_html_array_comment_verify[$index55];;
               // echo $row_html_array_comment_verify[$index33]; // etc

          }
          // echo "<pre>";
          // print_r($array_to_verify_sub_comment);
      
      while($row_html=mysqli_fetch_assoc($result_html))
      {
     
        if($user_name_that_is_logged == $row_html[$index22])
        {

          if ($row_html[$index55] == '0') 
          {
            // print the comment as parent
                    // echo '<br>'."permission to delete and edit".'<br>';
            echo '<div class="container" style="background-color: #ffffff;">';
          echo'<p class="float-left"><i class="fa fa-user" aria-hidden="true"></i>  '.$row_html[$index22].'

          &nbsp;&nbsp';

          $fullUrl_passed_to_show_not_permission = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
          $_SESSION['fullUrl_passed_to_show_not_permission_from_details'] = $fullUrl_passed_to_show_not_permission;

          

          echo '<!-- Edit form here -->
          <form action="redirect_edit_final_passed.php?passed_id='; echo $give_products_details.'"" method="POST">
          <input type="hidden" name="comment_id___edit" value="'; echo $give_products_details.'"> 
          <input type="hidden" name="comment_id___edit" value="'; echo $row_html[$index11].'"> 
                      <input type="hidden" name="This_is_hidden_name" value="';
          echo $row_html[$index22].'"><input type="hidden" name="This_is_hidden_id" value="';
          echo $give_products_details.'"><input type="hidden" name="This_is_hidden_url" value="';
          echo $_SESSION['fullUrl_passed_to_show_not_permission_from_details'].'">
                <button type="submit" style="height: 27px;" class="btn btn-outline-danger btn-sm float-left" >
                  <i class="fa fa-pencil-square-o " aria-hidden="true"></i>
                </button>
          </form>';




          echo '<!-- for delete--->
          <form action="delete_comments.php" method="POST">

          <input type="hidden" name="comment_id___" value="'; echo $row_html[$index11].'">

          <input type="hidden" name="This_is_hidden_name" value="';
          
          echo $row_html[$index22].'"><input type="hidden" name="This_is_hidden_id" value="';
          echo $give_products_details.'"><input type="hidden" name="This_is_hidden_url" value="';
          echo $_SESSION['fullUrl_passed_to_show_not_permission_from_details'].'">';

            echo '<button style="margin-left: 4px;height: 27px;" type="submit" class="btn btn-outline-danger btn-sm float-left"><i class="fa fa-trash " aria-hidden="true" ></i></button>
          </form>&nbsp;';

         

         
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
             echo '&nbsp;&nbsp;<i style="margin-left: 30px;" class="fa fa-clock-o " aria-hidden="true"></i>&nbsp;&nbsp;'.$row_html[$index44];
          echo  '<br><br><h6 class="margin-left:10px;"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;'.$row_html[$index33];

        
        // This if condition will print replied comments
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

                 if($user_name_that_is_logged == $row_html_to_print[$index22])
                  { 
                    
                    echo '<br><br><h6 style="margin-right:20px;">Reply From '.$row_html_to_print[$index22].' :&nbsp;'.$row_html_to_print[$index33].'</h6>';
                     
                     //edit the code start replied
                    echo '<form action="redirect_edit_final_passed.php?passed_id='; echo $give_products_details.'"" method="POST">';
                      echo '<input type="hidden" name="comment_id___edit" value="'.$row_html_to_print['id'].'">';
                      echo '<input type="hidden" name="comment_verify" value="comment_verify">';
                      echo  '<input type="hidden" name="This_is_hidden_name" value="'.$row_html_to_print['user_name'];
                      echo '"><input type="hidden" name="This_is_hidden_id" value="';
                    echo $give_products_details.'"><button type="submit" style="height: 27px;" class="btn btn-outline-danger btn-sm float-left" >
                  <i class="fa fa-pencil-square-o " aria-hidden="true"></i>
                </button>';
                 echo '</form>';
                  //edit the code start replied end

                    // for delete the comment

                   echo '<form action="delete_comments.php" method="POST">';

                    echo '<input type="hidden" name="comment_id___" value="'.$row_html_to_print['id'].'">';
                    

                   echo  '<input type="hidden" name="This_is_hidden_name" value="';
                    
                    echo $row_html_to_print[$index22].'">';

                    echo '<input type="hidden" name="This_is_hidden_id" value="';
                    echo $give_products_details.'">';
                    
                    echo '<button style="margin-left: 4px;height: 27px;" type="submit" class="btn btn-outline-danger btn-sm float-left"><i class="fa fa-trash " aria-hidden="true" ></i></button></form>';
                      // delete commment id end 

                  }
                  else
                  {
                    echo '<br><br><h6 style="margin-right:20px;">Reply From '.$row_html_to_print[$index22].' :&nbsp;'.$row_html_to_print[$index33].'</h6>';
                  }
              }
            }

        }// This if condition will print replied comment ends here
        
          echo '</div><br><form action="comment_submit.php" method="GET">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-control" style="width:40%;margin-bottom: 2px;" type="text" name="comments">'; echo '<input type="hidden" name="the_id_passed" value="';?><?php echo $give_products_details; ?>">
          <?php echo '<input type="hidden" name="the_name_passed" value="';?><?php echo $name_of_use; ?>">
          
          <?php echo'
         <input type="hidden" name="the_comment_verified_passed" value="'; echo $row_html[$index11].'">
         <input type="submit" class="btn btn-secondary btn-sm" value="Reply">
        </form>';





      }
      else
      {
        
      }
        }
         
        else
        {

          if ($row_html[$index55] == '0') 
          {
          // echo "no permission to delete and edit";
           echo '<br><div class="container" style="background-color: #ffffff;">';
          echo'<p class="float-left"><i class="fa fa-user" aria-hidden="true"></i>  '.$row_html[$index22].'


          &nbsp;&nbsp';
          


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

                echo '</p><i style="margin-left: 30px;" class="fa fa-clock-o " aria-hidden="true"></i>&nbsp;&nbsp;'.$row_html[$index44];
                  
          echo  '<br><br><p class="float-left"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;'.$row_html[$index33].'</p>';
          

          // This if condition will print replied comment
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

                 
                 if($user_name_that_is_logged == $row_html_to_print[$index22])
                  { 

                      echo '<br><br><h6 style="margin-right:20px;">Reply From '.$row_html_to_print[$index22].' :&nbsp;'.$row_html_to_print[$index33].'</h6>';
                     
                     //edit the code start replied
                    echo '<form action="redirect_edit_final_passed.php?passed_id='; echo $give_products_details.'"" method="POST">';



                      echo '<input type="hidden" name="comment_id___edit" value="'.$row_html_to_print['id'].'">';
                      echo '<input type="hidden" name="comment_verify" value="comment_verify">';
                      echo  '<input type="hidden" name="This_is_hidden_name" value="'.$row_html_to_print['user_name'];
                      echo '"><input type="hidden" name="This_is_hidden_id" value="';
                    echo $give_products_details.'"><button type="submit" style="height: 27px;" class="btn btn-outline-danger btn-sm float-left" >
                  <i class="fa fa-pencil-square-o " aria-hidden="true"></i>
                </button>';
                 echo '</form>';
                  //edit the code start replied end

                    // for delete the comment

                   echo '<form action="delete_comments.php" method="POST">';

                    echo '<input type="hidden" name="comment_id___" value="'.$row_html_to_print['id'].'">';
                    

                   echo  '<input type="hidden" name="This_is_hidden_name" value="';
                    
                    echo $row_html_to_print[$index22].'">';

                    echo '<input type="hidden" name="This_is_hidden_id" value="';
                    echo $give_products_details.'">';

                    echo '<button style="margin-left: 4px;height: 27px;" type="submit" class="btn btn-outline-danger btn-sm float-left"><i class="fa fa-trash " aria-hidden="true" ></i></button></form>';
                      // delete commment id end 

                    

                  }
                  else
                  {
                    echo '<br><br><h6 style="margin-right:20px;">Reply From '.$row_html_to_print[$index22].' :&nbsp;'.$row_html_to_print[$index33].'</h6><br>';
                  }
              }
            }

        }// This if condition will print replied comment ends here


          echo '<br></div><br><form action="comment_submit.php" method="GET">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?>
           <?php echo '<input type="hidden" name="the_name_passed" value="';?><?php echo $name_of_use; ?>"><?php

          echo '<input type="hidden" name="the_id_passed" value="';?><?php echo $give_products_details; ?>"><?php

          echo '<input class="form-control" style="width:40%;margin-bottom: 2px;" type="text" name="comments">
         <input type="hidden" name="the_comment_verified_passed" value="'; echo $row_html[$index11].'">
         <input type="submit" class="btn btn-secondary btn-sm" value="Reply">
        </form>
          ';

        }

      else
      {
        
      }

      }
      }
      
   ?>
<br>
  <form action="comment_submit.php" method="GET">
    <div class="form-group">
            <strong><p class="initialism">Comments for product also rate with  star :</p></strong>
    <!-- ===========================Rating icon============================== -->
      
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
  <!-- ===========================Rating icon============================== -->
           
            <textarea id="comments" class="form-control" type="text" name="comments"></textarea>

            <input type="hidden" name="the_id_passed" value="<?php echo $give_products_details; ?>">
            <input type="hidden" name="the_name_passed" value="<?php echo $name_of_use; ?>"><br>
            <input type="hidden" name="the_comment_verified_passed" value="0"><br>
            <input type="submit"  onclick="return check_null()" class="btn btn-primary">
            &nbsp;&nbsp;<button class="Back btn btn-primary" style="width: 150px;" value="Go back" onclick="goBack()">Go back</button>

          
    </div>
<br>
  </form>

<script type="text/javascript">
function check_null() 
{
  comments = document.getElementById("comments").value;
  if(comments.length == 0)
  {
    alert("comment is Null !! ")
     return false;
  }else{

    // alert("comment is good")
    // alert(comments)
     return true;
  }
  // return false;
}


</script>




</div>
<br>
<br>


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

}
else
{
  echo '<script> 
         window.location.replace("/ecommerce_website/login.php?error=please_signup");
        </script>';
  exit();
}


?>
<script type="text/javascript">
  function goBack() {
  window.history.back();

</script>