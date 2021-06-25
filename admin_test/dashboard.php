<?php
// session_start();
 include "header.php";
?>
<?php 
  $con_view = mysqli_connect('localhost','root','','bs');
   $q = "SELECT * FROM book;";
   $result = mysqli_query($con_view,$q);
   mysqli_close($con_view);

?>
<?php
//include auth_session.php file on all user panel pages
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "success=book_uploaded_sussfully")== true)
            {
                echo '<div class="alert alert-primary alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Book details uploaded succesfully</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            else if(strpos($fullUrl, "updated_succesfully")== true)
            {
                echo ' <div class="alert alert-primary alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>succesfully updated</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }else if(strpos($fullUrl, "activities=illegal")== true)
            {
                echo ' <div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Illegal activity !!! </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }

?>

<?php


            if (isset($_SESSION['name'])) 
            { 

             
                        $name = $_SESSION['name'];  

         echo ' 
<!-- ====================all book listed================ -->
      <div class="center_dashboard shadow-lg p-3 mb-5 bg-dark rounded"> 
        <div class="flex-container">';

                $index1="book_id";
                $index2="title";
                $index3="author";
                $index4="price";
                $index5="image";
                $index6="description";
                $index7="category";
                $url = "http://localhost/admin_test/image/";
              while($row=mysqli_fetch_assoc($result))
                {

                  $id_href = $row[$index1];

                echo '<div class="hover_effect">
                    <div style="display:flex" >
                    <a href="/admin_test/details.php?passed_id=';echo $id_href.'"><img src="';
                        echo $url.$row[$index5];
                        echo '" alt="Nothing here now" style="width:100px;height:100px"></a>&nbsp&nbsp&nbsp';

                    echo 'Title : '.substr($row[$index2],0,15).'..';
                    echo '<br>&nbsp&nbsp&nbspAuthor : '.substr($row[$index2],0,15).'..';
                    echo '<br>&nbsp&nbsp&nbspGenre : '.substr($row[$index7], 0, 15); 

                    echo '<br>&nbsp&nbsp&nbspPrice : '.$row[$index4];

                    
                  echo '</div></div>';

              }
            ?>
          </div>
        </div>

<?php
        }
        else{

           header("Location: login.php?login_needed=login_admin_panel");
           exit();
        }

?>