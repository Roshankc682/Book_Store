<?php
  require "header.php";

if (isset($_SESSION['name'])) 
{
$id_token = $_POST["id_token"];
$name = $_SESSION['name'];
$conn = new mysqli("localhost", "root", "","bs");
$sql = "UPDATE user_deliver SET process='Cancle' WHERE hash_token_for_client_for_ship='$id_token'";

if($conn->query($sql) === TRUE) 
{
  echo '<script>  window.location.replace("http://localhost/ecommerce_website/track_order.php?error=True");
       </script>';
        exit();
} else {
  print("no");
  echo '<script>  window.location.replace("http://localhost/ecommerce_website/track_order.php?error=False");
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