<?php
	require "header.php";


			

?>
		<main>

			
			<?php
				if (isset($_SESSION['name'])) 
				{

				?>

				<?php
						$name = $_SESSION['name'];	
					$name = $_SESSION['name'];	

					$profile_name = $name."profile";
			
					//After login here 


					?>

					<?php
					

				


					// Bio details
echo '<br><div class="shadow p-3 mb-5 bg-white rounded" style="width:98%;margin:10px;"><div class="container">
		<center><h3>Details of user</h3></center>';
	
	require 'includes/db.inc.php';
	$name = $_SESSION['name'];
	$sql_check_name_bio="select * from users where (username='$name');";

	$res_check_bio=mysqli_query($data_base,$sql_check_name_bio);

	if (mysqli_num_rows($res_check_bio) > 0) 
	{
		// output data of each row
		$row_check_bio = mysqli_fetch_assoc($res_check_bio);
		// username_already_taken or not check
		if ($name == $row_check_bio['username'])
		 {
		 	// echo $row_check_bio['id'];

		 	echo'<div class="flex-container-print-details">
		 				<div class="div__details">';
		 					$con_view_image = mysqli_connect('localhost','root','','players');
						   $q_image = "SELECT * FROM $profile_name;";
						   $result_image = mysqli_query($con_view_image,$q_image);
						   mysqli_close($con_view_image);
						 // ======end of connection====
						   $index_image="image";
							$url = "image/";

							while($row_image=mysqli_fetch_assoc($result_image))
							{

							
							// echo strcmp($condition_name,$row_image['name']);
							 echo "<img class='img-responsive' src='$url$row_image[$index_image]' alt='Avatar' class='avatar'  style='vertical-align: middle;width: 200px;height: 300px;border-radius: 50%;'>";
										

						}
		 				echo '</div>

  						<div class="div__details">

  							<br><br>
  							<table style="width:100%">
  								<tr>
							    	<th>ID Name :</th>
							    	<th><strong style="font-family:Tangerine;font-size: 35px;">'.$row_check_bio['username'].'</strong></th>
							    	
							 	</tr>
							 	<tr>
							    	<th>NickName :</th>
							    	<th><strong style="font-family:Tangerine;font-size: 35px;">'.$row_check_bio['nickname'].'</strong></th>
							    	
							 	</tr>
							 	<tr>
							    	<th>Bio : </th>
							    	<th><strong style="font-family:Sofia;font-size: 25px;">'.$row_check_bio['bio'].'</strong></th>
							    	
							 	</tr>
  							</table>
  							
  						</div>


  						
				</div>';
		 	
		 	// echo $row_check_bio['nickname'];
		 	// echo $row_check_bio['bio'];

		 }
	}

	echo '</div></div>
<br>

<div class="shadow-sm p-3 mb-5 bg-white rounded" style="width:98%;margin:10px;" >
<center><h4>Change setting</h4></center>';

$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "profile_picture=updated_succesfully")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-primary alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Updated succesfully</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            else if(strpos($fullUrl, "nickname=update")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-primary alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>NickName updated</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            
            
            else if(strpos($fullUrl, "nickname=false")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>NickName not updated</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }else if(strpos($fullUrl, "success=message_sent_succefully")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-primary alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>check your mail </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }else if(strpos($fullUrl, "unsuccess=message_false")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Opps there was an error !!! </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            else if(strpos($fullUrl, "nickname=empty")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Empty Field</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            // password_false
            else if(strpos($fullUrl, "nickname=password_false")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>password doesn\'t match</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            // bio=empty
            else if(strpos($fullUrl, "bio=empty")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Oops Error :) </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }else if(strpos($fullUrl, "field=empty")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Oops Error :) </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
             else if(strpos($fullUrl, "bio=update")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-primary alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>updated succesfully</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
             else if(strpos($fullUrl, "bio=false")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>sorry :(</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
             else if(strpos($fullUrl, "pass=password_false")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>password doesn\'t match</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            else
            {
            	// echo "do nothing";
            }




echo '<div class="flex_container_setting">
	<div class="first shadow-sm p-3 mb-5 bg-white rounded">
	<div class="" style="width:60%;">';

			
			$con_view_image = mysqli_connect('localhost','root','','players');
		   $q_image = "SELECT * FROM $profile_name;";
		   $result_image = mysqli_query($con_view_image,$q_image);
		   mysqli_close($con_view_image);
		 // ======end of connection====

					$index_image="image";
					$url = "image/";

				 	

		 			while($row_image=mysqli_fetch_assoc($result_image))
					{

							 echo "<img class='img-responsive' src='$url$row_image[$index_image]' alt='Avatar' class='avatar'  style='vertical-align: middle;width: 65px;height: 65px;border-radius: 50%;'";
										

					}

		?>

			




		<br><p style="margin-top:30px;">Change your Profile Picutre</p>


		<?php 

			$username_pro = $name."profile";

		// ==========profile picture==========


		echo '<form action="profile_update.php" method="POST" enctype="multipart/form-data" class="form">	
		  	 		<div class="btn-sm btn-dark" style="width:100px;">
		     			<input type="file" name="image">
		    		</div>
		    		<br>
			<button type="submit" class="btn btn-dark">Upload</button>
		</form>
		</div>
		</div>

		<div class="first shadow-sm p-3 mb-5 bg-white rounded">
			<div class="shadow-sm p-3 mb-5 bg-white rounded" >

				<form action="change_nickname.php?success_passed=turned_change_nickname#edit_name" method="post">

				  <i class="fas fa-meh"></i><input name="nickname" type="text" class="form-control" placeholder="Change NickName" aria-label="" aria-describedby="basic-addon2" required autofocus><br><label for="exampleInputPassword1">Password</label>
	    			<input type="password" name="password_for_nickname_validate" class="form-control" id="exampleInputPassword1" placeholder="Password" required autofocus><br>
    			  <button type="submit" name="nickname-submit" class="btn btn-primary" >Change NickName</button>
				  </form><br>';


			if(strpos($fullUrl, "error=true")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 310px;margin:auto;" role="alert">
                    <strong>That\'s your Current E-mail !!! </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }if(strpos($fullUrl, "error=something_went_wrong")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 250px;margin:auto;" role="alert">
                    <strong>Opps something went wrong !!! </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }if(strpos($fullUrl, "change=true")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-primary alert-dismissible fade show" style="width: 350px;margin:auto;" role="alert">
                    <strong>E-mail succesfully change</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }if(strpos($fullUrl, "recapcha=invalid")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 350px;margin:auto;" role="alert">
                    <strong>Recapcha Invalid !!!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }if(strpos($fullUrl, "error=email")== true)
            {
            		// error=please_upload_valid_file
            
                echo '<br><br><div class="alert alert-danger alert-dismissible fade show" style="width: 350px;margin:auto;" role="alert">
                    <strong>You cannot user this email !!!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }



				echo '<form action="change_email_address.php" method="post">
				  <i class="fas fa-envelope-square"></i><input type="email" class="form-control" name="email" placeholder="Change email" aria-label="" aria-describedby="basic-addon2" required autofocus>
				  <br>
				  <label for="exampleInputPassword1">Password</label>
	    			<input type="password" name="password_" class="form-control" id="exampleInputPassword1" placeholder="Password" required autofocus><br>
	    			<div class="g-recaptcha" data-sitekey="6LdjEeQaAAAAACb7HVp1MdIdTR_VbgRqO7hRqUjK" data-callback="enableBtn"></div>
	    			<p>Solve recapcha to change email</p>
    			  <button type="submit" id="change_email" class=" btn btn-primary"title="Change E-mail Password is enable now will be functioning soon" >Change E-mail</button>
				  </form>
				
			</div>
		</div>

		<div class="first shadow-sm p-3 mb-5 bg-white rounded">
			<div class="shadow-sm p-3 mb-5 bg-white rounded">

			<form action="bio_submit.php?#add_bio" method="post">
			<div class="form-group">
			    <center><label for="exampleFormControlTextarea1"><i class="fas fa-user-ninja"></i>&nbsp;Add Bio</label><center>
			    <textarea class="form-control" name="bio_details" placeholder="Here type your bio :) " id="exampleFormControlTextarea1" rows="3" required autofocus></textarea><br>
			    
				    <label for="exampleInputPassword1">Password</label>
	    			<input type="password" name="bio_details_password" class="form-control" id="exampleInputPassword1" placeholder="Password" required autofocus><br>
    			  <button type="submit" name="bio_submit" value="bio_passwd_button" class="btn btn-primary">Submit Bio</button>
				 </div>
			  </form>

		</div>
		</div>

<!--flex containter-->
</div>		
<!--shadow container-->
</div>
<!-- buttom will function after capcha -->
  <!-- for recapcha -->
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script type="text/javascript"> 
  document.getElementById("change_email").disabled = true;
 
 function enableBtn(){
    document.getElementById("change_email").disabled = false;
   }</script>

 		';



	// ===================================
	

				}
				else
				{
					
					echo "To Get Shopping You need to login";
					    // header("Location: signup.php");
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