<html lang="en">
<?php
	ob_start();
	session_start();
	if (isset($_SESSION['username'])) {
		//echo $_SESSION['username']," ",$_SESSION['idtype'];
	}
	$info="";
	$_SESSION['link']='notice_profile.php';
	 if(isset($_SESSION['info'])){
	     $info=$_SESSION['info'];
	      $_SESSION['info']='';
	  }
	 $conn=mysqli_connect("localhost", "root", "", "hall_management");
?>
<head>
	<title>Hall Management System</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" href="css/lib/w3.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<link rel="stylesheet" href="css/bootstrap.css">
 	<link rel="stylesheet" href="css/bootstrap-flex.css">
 	<link rel="stylesheet" href="css/bootstrap-flex.min.css">
 	<link rel="stylesheet" href="css/bootstrap-flex.min.css">
 	<link rel="stylesheet" href="css/bootstrap-flex.min.css">
 	<link rel="stylesheet" href="css/bootstrap-flex.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/notify.js"></script>
	<script type="text/javascript" src="notify.min.js"></script>
	<style>
	</style>
</head>
<body>
	<?php 
		echo $info;
	?>
	<?php include('header.php'); ?>

	<div class="w3-row w3-khaki">
		<?php include('sidebar.php'); ?>
		
		<div class="w3-col w3-container w3-whitee" style="width:85%; background: teal; color: black; background-image: url(images/sha13.jpg)">
			<br>
			<h2 style="text-align: center; font-family: Imprint MT Shadow;">Recent Notices</h2><hr>
			<br><br> 
			<div style="margin-left: 50px;">
				<?php
					$sql="SELECT * FROM notice ORDER BY Date DESC LIMIT 0,25";
	                $rslt=mysqli_query($conn, $sql);

	                if(mysqli_num_rows($rslt)){
	                    while($row=mysqli_fetch_assoc($rslt)){ 
		                    $a=$row["Title"];
		                    $b=$row['Upload'];
		                  
		                    //echo "<button href='$b' target='_blank' >$a</button>"; 
		                   	//echo "<font style='font-size: 150%'>&sext;&nbsp;&nbsp</font>";
		                   	echo "<font style='font-size: 150%'>&#9656;&nbsp;&nbsp</font>";
		                   	//echo "<font style='font-size: 150%'>&DoubleRightArrow;&nbsp;&nbsp</font>";
		                   	echo "<a href='$b' target='_blank' style='font-size:115%'>$a</a>";
							echo '<br>';	                    

	                    }  
	                }
	            ?>
            </div><br><br>
		</div>

		<div class="w3-col w3-container w3-khaki" style="width: 15%"></div>

	</div>
	<?php include('footer.php'); ?>
</body>
</html>