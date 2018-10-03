<?php
  	
  	$conn=mysqli_connect("localhost", "root", "", "hall_management");
	if($_POST){
	  	$stid= strip_tags($_POST['stid']);
		
	  	$sql="SELECT * FROM student_info WHERE StID='$stid' ";
	  	$rslt=mysqli_query($conn, $sql);
		$cnt=mysqli_num_rows($rslt);

		if($cnt>0) echo "<span style='color:red;'>Sorry, Student Id already taken !!!<br></span>";
		else echo "<span style='color:green;'>Available<br></span>";
	}
?>