<?php
	require "header.php";

?>


		<main>

			
			<?php
				if (isset($_SESSION['name'])) 
				{
					// 	echo "<p>You are login</p>";
					include "shopping.php";
					// exit();
				}
				else
				{
					
		echo '<title>Online Book Store | Home</title><center><h3>Login to Buy Books</h3></center>';
	echo '<div class="middle_section" style="padding:10px">';
		// =====Here the cart start using bootstrap======

			$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "succesfully_logout=true")== true)
            {
                echo ' <div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>User Logout</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            // signup=sucess
            else if(strpos($fullUrl, "signup=sucess")== true)
            {
                echo ' <div class="alert alert-primary alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Check you mail</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            else if(strpos($fullUrl, "unsuccess=message_false")== true)
            {
                echo '<br><div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Illegal action</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            } else if(strpos($fullUrl, "success=message")== true)
            {
                
                echo ' <div class="alert alert-primary alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>E-mail change </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            
// ======connected to book where image name author_name uploaded==========';
   $con_view = mysqli_connect('localhost','root','','bs');
   $q = "SELECT * FROM book LIMIT 5;";
   $result = mysqli_query($con_view,$q);
   mysqli_close($con_view);

echo '<div class="container shadow-lg p-3 mb-50 bg-dark rounded">
<div id="book_list" class="flex-container">';
  
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
 
echo '</div>
<center><button class="load_more_after_clicked btn btn-info">Load more</button></center>

</div>';

// =======end of cart =================

		
echo '</div> 
	';
                    echo'

						<script>
	
						    if ( window.history.replaceState ) {
						        window.history.replaceState( null, null, window.location.href );
						    }
						</script>

						';

				}
				
			?>
		</main>

<?php
	require "footer.php";
?>

