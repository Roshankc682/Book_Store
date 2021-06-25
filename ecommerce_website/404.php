<?php
	require "header.php";
?>
<br><br>
<div class="container">
	<div class="shadow p-3 mb-5 bg-white rounded">
		<center><h1>Page Not Found</h1>
		<img style="width:400px;height: 400px;" src="404.jpg"><br>
		<button type="button" class="btn btn-dark" onclick="goBack()">Go Back</button></center>
	</div>
</div>

<script>
function goBack() {
  window.history.back();
}
</script>

<?php

	    require "footer.php";

?>