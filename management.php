<html lang="en">
<?php
	ob_start();
	session_start();
	if ( isset($_SESSION['username'])!="" ) {
		//echo $_SESSION['username']," ",$_SESSION['idtype'];
	}
    $info="";
    if(isset($_SESSION['info'])){
        $info=$_SESSION['info'];
        $_SESSION['info']='';
    }
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
		#sha{
			font-size: 120%;
			font-family: cursive;
			margin-left: 150px;
			color: indigo;
		}
	</style>
</head>
<body>
	<?php echo $info;
		$_SESSION['link']='home.php';
	?>
	<?php include('header.php'); ?>
	<div class="w3-row w3-khaki">
	<?php include('sidebar.php'); ?>
		
		<div class="w3-col w3-container w3-white" style="width:85%; background-image: url(images/sha4.jpg);">
			<h2 style="text-align: center; font-family: Imprint MT Shadow;">Management</h2><hr>
			<div id="sha">
			<ul>
		<!--		<p style="color: red; font-size: 1100%"><a href="home.php">&times;</a><p>	-->
				<li><p style="margin-top: 30px"><a href="Hall_residence_approve.php">Hall Residence Applications</a></p></li>
				<li><p><a href="Room_allotment_approve.php">Room Allotment Applications</a></p></li>
				<li><p><a href="Hall_fees_approve.php">Hall Fees</a></p></li>
				<li><p><a href="approve_manager.php">Choose Dining Manager</a></p></li>
				<li><p><a href="token_approve.php">Approve Token</a></p></li>
				<li><p><a href="add_event.php">Manage Events</a></p></li>
				<li><p><a href="upload_notice.php">Upload Notices</a></p></li>
				<li><p><a href="show_suggestion.php">Suggestions</a></p></li>
				<li><p><a href="show_complain.php">Complains</a></p></li>
				<li><p><a href="add_new_admin.php">Add New Admin</a></p></li>
			</ul>	
			</div><br><br>
		</div>
	</div>
	<?php include('footer.php'); ?>
</body>
</html>