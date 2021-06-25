

<?php 
$commentNewCount = $_POST['commentNewCount'];

// echo '<script>alert("'; echo $commentNewCount; echo '")</script>';
  $con_view = mysqli_connect('localhost','root','','bs');
   $q = "SELECT * FROM book LIMIT $commentNewCount;";
   $result = mysqli_query($con_view,$q);
   mysqli_close($con_view);


?>


  <?php
       $index1="book_id";
      $index2="title";
      $index3="author";
      $index4="price";
      $index5="image";
      $index6="description";
      $index7="category";
      $url = "/admin_test/image/";
      
    while($row=mysqli_fetch_assoc($result))
      {

                echo '<center><div class="hover_effect shadow p-3 mb-5 bg-white rounded"  style="margin:40px;">
                    <div style="display:flex" class="load_more_from_database" >
                    <img src="';
                        echo $url.$row[$index5];
                        echo '" alt="Nothing here now" style="width:100px;height:100px">&nbsp&nbsp&nbsp';
                    echo 'Title : '.mb_strimwidth($row[$index2], 0, 12, '...');
                    echo '<br>&nbsp&nbsp&nbspAuthor : '.mb_strimwidth($row[$index3], 0, 12, '...');
                    echo '<br>&nbsp&nbsp&nbspGenre : '.mb_strimwidth($row[$index7], 0, 12, '...'); 
                    echo '<br>&nbsp&nbsp&nbspPrice : '.$row[$index4];
                    echo '</div><br>
                      <a  class="btn btn-primary" href="/ecommerce_website/details_without_login.php?passed_id=';?><?php echo$row[$index1];?><?php echo '&see_more_details=anonymous" role="button" style="height:40px;width:90%;">Details</a>
                  </div></center>';
    }
  ?>
</div>


