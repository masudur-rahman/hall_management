<?php
  	
  	$conn=mysqli_connect("localhost", "root", "", "hall_management");
	if($_POST){
	  	$email = strip_tags($_POST['email']);
		
	  	$sql="SELECT * FROM admin_info WHERE Email='$email' ";
	  	$rslt=mysqli_query($conn, $sql);
		$cnt=mysqli_num_rows($rslt);

		if($cnt>0) echo "<span style='color:red;'>Sorry, Email already taken !!!<br></span>";
		else echo "<span style='color:green;'>Available<br></span>";
	}
?>