<html lang="en">
<?php
	ob_start();
	session_start();
	if (isset($_SESSION['username'])) {
		//echo $_SESSION['username']," ",$_SESSION['idtype'];
	}
	$info="";
	$_SESSION['link']='show_event.php';
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
		$event_no=$_POST['app'];
		$sql="SELECT * FROM event WHERE Event_No=$event_no";
		$rslt=mysqli_query($conn, $sql);
		$row=mysqli_fetch_assoc($rslt);
		$event_name=$row['Event_Name']; $description=$row['Description'];
		$stdate=$row['Start_Date']; $enddate=$row['End_Date']; $upload=$row['Upload'];
	?>
	<div style="margin: 50px 200px 50px 200px; border: 1px solid black">
		<br><br>
		<center><h2 style="font-family: Imprint MT shadow; color: blue"><?php echo $event_name; ?></h2></center> <hr>

		<center>
			Start Date: &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $stdate; ?><br>
			End Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $enddate; ?><br>
			<br><br>
			<p style="text-align: center;">Description:</p><br>
			<div style="text-align: center; margin: 0px 70px 0px 120px">
				<?php echo $description; ?><br>
			</div>
			<img src="<?php echo $upload?>" alt="" class="w3-square" style="width: 60%;; margin-bottom: 10px;">
		</center>

	</div>
</body>
</html>