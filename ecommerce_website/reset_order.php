<?php
  require "header.php";

if (isset($_SESSION['name'])) 
{
$id_token = $_POST["reset_order"];
$name = $_SESSION['name'];
$conn = new mysqli("localhost", "root", "","bs");
$sql = "UPDATE user_deliver SET process='Deliver in process' WHERE hash_token_for_client_for_ship='$id_token'";

if($conn->query($sql) === TRUE) 
{
  echo '<script>  window.location.replace("http://localhost/ecommerce_website/track_order.php?&order=reset&error=null");
       </script>';
        exit();
} else {
  echo '<script>  window.location.replace("http://localhost/ecommerce_website/track_order.php?&order=reset&error=False");
 </script>';
  exit();
  
}

}
else
{
echo '<script>  window.location.replace("http://localhost/ecommerce_website/login.php");
 </script>';
exit();
}

?>