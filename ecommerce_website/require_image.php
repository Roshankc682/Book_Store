<?php
$con_view_html = mysqli_connect('localhost','root','','bs');
   // $q_html = "SELECT * FROM book;";
   $q_html = "SELECT * FROM book LIMIT 10;";
   $result_html = mysqli_query($con_view_html,$q_html);
   mysqli_close($con_view_html);
 // ======end of connection====

      $index1="book_id";
      $index2="title";
      $index3="author";
      $index4="price";
      $index5="image";
      $url = "/admin_test/image/";
?>

<style type="text/css">
	 /*==============================image slider css=======================*/

      #content-slide{
      list-style: none outside none;
        padding-left: 0;
            margin: 0;
    }
        .demo .item{
            margin-bottom: 60px;
            /*background-color: #7dc3ec;*/
        }

    .content-slider .li_demo{
        /*background-color: #d6effe;*/
        text-align: center;
        /*color: #FFF;*/
    }

    .content-slider h3 {
        margin: 0;
        padding: 70px 0;
    }
    .demo{
      width: 500px;
    }
        .lSPrev{
             /*background-color: red;*/
            /*box-shadow: 5px 10px #888888;*/
            /*border-radius: 5px;*/
        }
        .lSNext{
             /*background-color: red;*/
            /*box-shadow: 5px 10px #888888;*/
            /*border-radius: 5px;*/
        }
        .details_hover{
                    font-size: 15px;
                    text-decoration: none;
                    color: green;
        }

        .details_hover:hover{
                    font-size: 19px;
                    text-decoration: none;
                    color: red;
        }
/*======================image slider css ended=============*/
</style>

  <!-- ========================================jquery============================ -->
      <link rel="stylesheet"  href="lightslider-master/src/css/lightslider.css"/>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="lightslider-master/src/js/lightslider.js"></script> 
    <script>
       $(document).ready(function() {
      $("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
    });
    </script>

  <!-- ==================================================jquery ended================ -->

<center>
	
                <h1>Latest Book</h1><div class="demo">
        <div class="item">
            <ul id="content-slider" class="content-slider">
             

        <?php
             while($row_html=mysqli_fetch_assoc($result_html))
              {    


                echo '
                     <li class="li_demo" ><a  id="'; ?><?php echo $row_html['book_id']; ?><?php  echo '" href=" details_of_product.php?passed_id=' ?><?php echo$row_html[$index1];?><?php echo '&see_more_details='; ?><?php echo $name; ?><?php echo '"><img src="'; ?> <?php echo $url.$row_html[$index5]; ?> <?php echo '"style="height: 200px;width: 150px;padding: 5px;" /><br></a>
                    </li>
                    ';
             }
                ?>       
                      
            </ul>
        </div>

    </div>	</center>