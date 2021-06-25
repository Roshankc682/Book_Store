
<?php
 	include "header.php";
?>
<?php
if(isset($_POST['book_id'])) 
{
$book_id = $_POST['book_id'];
$name = $_POST['name'];
// echo $book_id;

 $con_view = mysqli_connect('localhost','root','','bs');
   $q = "SELECT * FROM `$book_id`;";
   $result = mysqli_query($con_view,$q);
   mysqli_close($con_view);

echo "<center><h1>Review of ".$name."</h1></center><br>";
echo '<nav class="navbar navbar-light " style="margin:auto;max-width:50%;">
  <form class="form-inline" action="search_client.php" method="POST">
  <input type="hidden" value="'.$book_id.'" name="ISSN" />  
  <input type="hidden" value="'.$name.'" name="title" />
    <input class="form-control mr-sm-2" type="text" placeholder="Search.." name="search_book_from_review" style="width:500px;"> 
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
  </form>
</nav><div style="margin: 10px;">
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">UserName</th>
      <th scope="col">comemnts</th>
      <th scope="col">Reg date</th>
    </tr>
  </thead>';

    while($row=mysqli_fetch_assoc($result))
	{
		


		  echo '<form action="delete_review.php" method="post">
		    <tr>		    
		      <th scope="row" value="'.$row['id'].'"> <input type="hidden" id="custId" name="S.N" value="'.$row['id'].'">'.$row['id'].'</th>
		      <input type="hidden" value="'.$book_id.'"name="book_id">
		      <td>'. $row['user_name'].'</td>
		      <td>'. $row['comemnts'].'</td>
		      <td>'. $row['reg_date'].'</td>
		      <td><button type="submit" class="btn btn-danger" name="clicked" value="clicked">Delete</button></td>  
		    </tr>
		    </form>';
		 }
echo '</table>
</div>';


}
// if back press then there will no book id so 
else
{

  echo "<script>window.history.back();</script>";

}


?>