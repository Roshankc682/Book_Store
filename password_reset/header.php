<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Online Book Store | Signup </title>
<link rel="shortcut icon" type="image/jpg" href="https://wallpaperaccess.com/full/124378.jpg"/>
  


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- 
  <script type="text/javascript">
      //jquery load more
      $(document).ready(function()
      {
        var commentCount = 4;
        $(".load_more_after_clicked").click(function(){
            // alert(1);
            commentCount = commentCount + 4;
            $("#book_list").load("load_more/load_book_list_more.php",{
              commentNewCount: commentCount
            });
        });
      });

       //jquery load more after login
      $(document).ready(function()
      {
        var commentCount_after_login = 4;
        $(".load_more_after_clicked_after_login").click(function(){
            // alert(1);
            commentCount_after_login = commentCount_after_login + 4;
            // alert(commentCount)
            $("#book_list_after_login").load("load_more/load_book_list_more_after_login.php",{
              commentNewCount_after_login: commentCount_after_login

            });
        });
      });


      // load_more_after_clicked_after_login_for_precise_search
      $(document).ready(function()
      {
        var load_more_after_clicked_after_login_for_search = 4;
        $(".load_more_after_clicked_after_login_for_precise_search").click(function(){
            // alert(1);
            load_more_after_clicked_after_login_for_search = load_more_after_clicked_after_login_for_search + 4;
            // alert(commentCount)
            $("#book_list_after_login").load("load_more/load_more_after_clicked_after_login_for_precise_search.php",{
              load_more_after_clicked_after_login_for_precise_search: load_more_after_clicked_after_login_for_search
           });
        });
      });


      // for sci-fi load_more_after_clicked_after_login_for_sci_fi
    $(document).ready(function()
      {
        var load_more_after_clicked_after_login_for_si_fi = 4;
        $(".load_more_after_clicked_after_login_for_si").click(function(){
            // alert(1);
            load_more_after_clicked_after_login_for_si_fi = load_more_after_clicked_after_login_for_si_fi + 4;
            // alert(commentCount)
            $("#book_list_after_login").load("load_more/load_more_after_clicked_after_login_for_si_fi.php",{
              load_more_new_clicked_after_login_for_si: load_more_after_clicked_after_login_for_si_fi
           });
        });
      });

    // load_more_new_clicked_after_login_for_suspesne
    $(document).ready(function()
      {
        var load_more_new_clicked_after_login_for_suspesne = 4;
        $(".load_more_after_clicked_after_login_for_sus").click(function(){
            // alert(1);
            load_more_new_clicked_after_login_for_suspesne = load_more_new_clicked_after_login_for_suspesne + 4;
            // alert(commentCount)
            $("#book_list_after_login").load("load_more/load_more_new_clicked_after_login_for_sus.php",{
              load_more_new_clicked_after_login_for_sus: load_more_new_clicked_after_login_for_suspesne
           });
        });
      });
     // load_more_new_clicked_after_login_for_my
    $(document).ready(function()
      {
        var load_more_new_clicked_after_login_for_suspesne = 4;
        $(".load_more_new_clicked_after_login_for_my").click(function(){
            // alert(1);
            load_more_new_clicked_after_login_for_my = load_more_new_clicked_after_login_for_my + 4;
            // alert(commentCount)
            $("#book_list_after_login").load("load_more/load_more_new_clicked_after_login_for_my.php",{
              load_more_new_clicked_after_login_for_m: load_more_new_clicked_after_login_for_my
           });
        });
      });
</script> -->
<!-- ======jquery load_more====== -->

<!-- ==================load more script end============== -->
<!-- =============This is bootstrap for products ================================ -->
   <!-- Bootstrap CSS -->
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- =============Bootstrap end  ================================ -->

<!-- =====nav-menu= -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <!-- f_ro_m f_o_n_t@w_s_u_m -->
          <script src="https://kit.fontawesome.com/6801da4b95.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="Nav_menu.css">
<!-- ====nav-menu finish== -->


<!-- =====search bar====== -->
     <link rel="stylesheet" type="text/css" href="All_style/down_containers.css">
     <link rel="stylesheet" type="text/css" href="All_style/search_bar_only.css">
     <link rel="stylesheet" type="text/css" href="book_list_design/cart.css">
     <link rel="stylesheet" type="text/css" href="All_style/image_slider.css">
<!-- ===search bar end==== -->
    
<!-- ====The remove button function======= -->
<script src="script/image_slider.js" async></script>
<!-- ===The remove button function ended==== -->
<style type="text/css">
body {
            margin: 0;
            padding: 0;
            // background-color: #17a2b8;
            height: 100vh;
            background-image: url("https://wallpaperaccess.com/full/124378.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;

          }
.flex-container {
  display: flex;
  /*background-color: DodgerBlue;*/
    flex-wrap: wrap;

}

.flex-container > div {
  background-color: #ffffff;
  width: 400px;
  margin: 18px;
  padding: 20px;    
  border-radius: 10px;
   box-shadow: 0 2.8px 2.2px rgba(0, 0, 0, 0.034)
}

 .hover_effect:hover {  
   box-shadow: 1px 1px #d7bfef;
    border-radius: 5px;
}
.first_container{
  height: 300px;
  width: 80%;
}

.container_setting{
    /*padding-right: 10px;*/
            /*background-color: aqua;*/
            /*margin-top: 10px;*/
         border: 1px solid;
        /*padding: 10px;*/
        box-shadow: 5px 10px #888888;
        border-radius: 5px;
        height: 260px;
        width: 94%;
        /*margin-left: 230px;*/
        /*margin-right: 50%;*/
        margin-top: 30px;
}

.genere_popular{
  /*background-color: aqua;*/
  font-size: 20px;
}
.genere_popular:hover{
   border-radius: 15px;
   font-size: 25px;
   color:red;
}


</style>
</head>
<header>
  

  <div>

    <?php
        if (isset($_SESSION['name'])) 
        {
          if (isset($_SESSION['name'])) 
        {

            $user_name =  $_SESSION['name'];
            $profile_name = $user_name."profile";

          // if login as user the nav bar will be differnt ---> wow
          echo '    <div class="topnav" id="myTopnav">
                      <a href="/ecommerce_website/index.php" class="active">Home</a>
                      <a href="contact.php">Contact</a>
                      <a href="viewcart.php">Cart<sup>';?> 

                        <?php
                          $con_view_html = mysqli_connect('localhost','root','','players');
                          $q_html = "SELECT * FROM $user_name;";
                          $result_html = mysqli_query($con_view_html,$q_html);
                          mysqli_close($con_view_html);
                          $total_cart = 0;
                          while($row_html=mysqli_fetch_assoc($result_html))
                          {     
                              $total_cart = $total_cart + 1;

                          }
                          echo $total_cart;

                        ?>

                      <?php echo '</sup></a>
                      <a href="about.php">About</a>
                      <a href="#">
                          <form action="includes/logout.inc.php" method="post">
                              <button style="color: white;" class="logout_button" id="button_link_logout" type="submit" name="logout-submit">logout</button>
                          </form>
                      </a>
                          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                              <i class="fa fa-bars"></i>
                          </a>';


                          $con_view_image = mysqli_connect('localhost','root','','players');
                           $q_image = "SELECT * FROM $profile_name;";
                           $result_image = mysqli_query($con_view_image,$q_image);
                           mysqli_close($con_view_image);
                         // ======end of connection====

                              $index_image="image";
                              $url = "/ecommerce_website/image/";

                          echo '<a class="a_hover_userprofile" href="setting.php">'; echo $user_name; ?>
                           <?php
                                  while($row_image=mysqli_fetch_assoc($result_image))
                                    {

                                         echo "<img class='img-responsive ' src='$url$row_image[$index_image]' alt='Avatar' class='avatar'  style='vertical-align: middle;width: 30px;height: 30px;border-radius: 50%;'";
                                              

                                    }
                              ?> <?php echo '</p>'; echo '</a>

                        <!--Image after username -->';
                  echo '</div><br><br>';


        }
        else
        {
                header("Location: /ecommerce_website/index.php?error=Darling_you_need_to_login");
                exit();
            
        }

          
        }
        else
        {

                  // if login as first time  the nav bar will be first entering haha 
                       echo '<div class="topnav" id="myTopnav">
              <a href="/ecommerce_website/index.php" class="active"><i class="fas fa-home"></i> Home</a>
              <a href="/ecommerce_website/login.php"><i class="fas fa-user"></i> login</a>
              <a href="/signup_check/signup.php?create_account"><i class="fas fa-user"></i> signup</a>
              <a href="/ecommerce_website/contact_without_login.php"><i class="fas fa-id-badge"></i> Contact</a>
              <a href="/ecommerce_website/about.php"><i class="fas fa-address-card"></i> About</a>
              <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
              </a>
            </div><br><br><br>';
        }
      ?>


  
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

</script>


</div>



</header>