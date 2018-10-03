<html>
<?php
	if(isset($_POST['app'])){
		$notice=$_POST['app'];
		header("location: $notice");
	}
?>
</html>