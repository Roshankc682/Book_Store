<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<?php

  echo '
  <div class="container"  style="width: 500px;margin:auto;" >
			  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
			  </li>
			</ul>
			
</div>';

            echo '<!DOCTYPE html>
            <html>
            <head>
                <meta charset="utf-8">
                <title>Dashboard - Client area</title>
                <link rel="stylesheet" href="main.css"/>
            </head>
            <body>
                <div class="form">
                    <center><h1>Welcome admin</h1></center>
                        <center>
                                <ul type="none">

                                        <li><a href="insertForm.php">Add New</a></li>
                                        <li><a href="view.php">View All</a></li>
                                        <li><a href="delete.php">Delete</a></li>
                                        <li><a href="updateform.php">Update</a></li>
                                        <li><a href="">View orders</a></li>
                                         <li><form action="logout.php" method="post">
                                             <font color="red"><button id="button_link_logout" type="submit" name="logout-submit">logout</button></font>
                                             </form>
                                        </li>

                                </ul>
                        </center>
                    

                   
                    
                </div>
            </body>
            </html>';
        ?>