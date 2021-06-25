

<?php
 	include "header.php";
?>
<?php



   $con_view = mysqli_connect('localhost','root','','bs');
   $q = "SELECT * FROM book;";
   $result = mysqli_query($con_view,$q);
   mysqli_close($con_view);


	while($row=mysqli_fetch_assoc($result))
	{
      echo '<div class="container"><form action="detials_review.php" method="POST">
            
      		    <div style="margin:5px;" class="btn btn-info float-left" style="max-width: 18rem;">
              <input type="hidden" name="book_id" value="'.$row['book_id']; echo '">

              <input type="hidden" name="name" value="'.$row['title']; echo '">';
              
              echo "<img style='width:100px;height:100px;' src='http://localhost/admin_test/image/".$row['image']."'/>";

              echo "<center><p title='".$row['title']."'>".substr($row['title'],0,9).'...'."</p></center>";

              echo '<div class="card-body">
                <button type="submit" class="btn btn-warning"">Details review</button>
              </div>
            </div>
            
        </form></div>';
	}
echo '</table>
</div>';
?>