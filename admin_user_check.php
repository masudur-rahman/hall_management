<?php
  	
  	$conn=mysqli_connect("localhost", "root", "", "hall_management");
	if($_POST){
	  	$userid= strip_tags($_POST['userid']);
		
	  	$sql="SELECT * FROM admin_info WHERE Username='$userid' ";
	  	$rslt=mysqli_query($conn, $sql);
		$cnt=mysqli_num_rows($rslt);

		if($cnt>0) echo "<span style='color:red;'>Sorry, Username already taken !!!<br></span>";
		else echo "<span style='color:green;'>Available<br></span>";
	}
?>