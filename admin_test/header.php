<?php
session_start();
?>

 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style type="text/css">
        
      form.example button {
              float: left;
              width: 20%;
              padding: 10px;
              background: #2196F3;
              color: white;
              font-size: 17px;
              border: 1px solid grey;
              border-left: none;
              cursor: pointer;
            }

            form.example input[type=text] {
              padding: 10px;
              font-size: 17px;
              border: 1px solid grey;
              float: left;
              width: 60%;
              background: #f1f1f1;
            }


            .center_dashboard {
                    margin: auto;
                    width: 90%;
                    border: 3px solid green;
                    padding: 4px;
                  }
              
  </style>
  <script type="text/javascript">
      $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
  </script>
<?php
//include auth_session.php file on all user panel pages
// include("auth_session.php");
?>
<?php



            if (isset($_SESSION['name'])) 
            { 

                        $name = $_SESSION['name'];  

            echo '<!DOCTYPE html>
                            <html>
                            <head>
                                <title>Admin Panel</title>
                                  <meta name="viewport" content="width=device-width, initial-scale=1">

                            <link rel="stylesheet" type="text/css" href="book.css">
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                            </head>
                            <body>

                             
                            <ul class="nav justify-content-center bg-light">
                            <li class="nav-item"><a class="nav-link btn btn-primary"  href="http://localhost/admin_test" style="margin: 10px;">Home</a></li>
                              <li class="nav-item"><a class="nav-link btn btn-primary" style="margin: 10px;" href="insertForm.php">Add New</a></li>
                               <li class="nav-item"><a class="nav-link btn btn-primary" style="margin: 10px;" href="view.php">View All</a></li>
                               <li class="nav-item"><a class="nav-link btn btn-primary" style="margin: 10px;" href="delete.php">Delete</a></li>
                               <li class="nav-item"><a class="nav-link btn btn-primary" style="margin: 10px;" href="updateform.php">Update</a></li>

                               <li class="nav-item"><a class="nav-link btn btn-primary" style="margin: 10px;" href="order.php">Orders</a></li>

                              <li class="nav-item"><a class="nav-link btn btn-primary" style="margin: 10px;" href="review.php">Review</a></li>

                              <li class="nav-item">
                                    <a class="nav-link"><form action="logout.php" method="post">
                                        <font color="red"><button style="margin-top:4px;" class="btn btn-danger" id="button_link_logout" type="submit" name="logout-submit">logout</button></font>
                                    </form></a>
                               </li>

                            </ul>';

                          
      }
        else{

           header("Location: login.php?Login_needed");
           exit();
        }

?>