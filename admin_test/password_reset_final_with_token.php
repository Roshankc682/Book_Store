<?php


echo '
<!DOCTYPE html>
<html>
<head>
	<title>Password | Reset</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body><form action="action.php" method="POST"><center><h1>Admin reset password</h1></center>
<br><br><div class="container">
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Repeat Password</label>
    <input  name="repeat_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <input type="hidden" name="token" value="';echo $_GET['token']; echo '">';
	echo '<input type="hidden" name="email" value="';echo $_GET['email']; echo '">';


  
  echo '
  <button type="submit" class="btn btn-success btn-lg btn-block">Save</button>
</form>

<a class="btn btn-primary btn-lg btn-block" href="http://localhost/admin_test" role="button">Home</a>
</div>
</body></html>';

?>