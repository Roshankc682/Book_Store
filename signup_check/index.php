<?php
	require "header.php";
?>

<?php



echo "<script>
         setTimeout(function(){
            window.location.href = '/signup_check/signup.php';
         }, 5000);
      </script>
      <div class='alert alert-danger'>
     <center><h1 style='font-size: 25px;''>You will be  redirects in singup Page few second.</h1></center>
</div><br><br><br><br><br><br><br><br><br>";

?>

<?php
	require "footer.php";
?>


