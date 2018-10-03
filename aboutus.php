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
    $conn=mysqli_connect('localhost', 'root', '', 'hall_management');
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
		button#b {
            background-color: Transparent;
            background-repeat:no-repeat;
            border: none;
            cursor:pointer;
            overflow: hidden;
            outline:none;
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
		
		<div class="w3-col w3-container w3-light-green" style="width:85%; background-image: url(images/sha11.jpg);">
			<BR>
			<h1 style="text-align: center; font-family: Imprint MT Shadow; color: green">DEVELOPED BY</h1><hr>
			<div class="w3-row" style="margin: 5px 50px 10px 50px">
				<div class="w3-col" style="width: 50%;">
					<img src='uploads/MASUDUR_RAHMAN.jpg' alt="Masudur Rahman"  style="height: 40%; width: 70%; margin-top: 20px; margin-bottom: 10px;"><br><br>
					<p style="font-family: Imprint MT Shadow; text-align: left; color: black; font-size: 140%;">
						MASUDUR RAHMAN<br>ID: 1304042<br>Department of CSE<br>
						<a href="http://facebook.com/mohammadmasudur.rahman" target="_blank"><img src='images/fb.jpg' alt="facebook"  style="height: 3%; width: 4%; margin-top: -10px">/mohammadmasudur.rahman</a><br>
						<img src='images/email.png' alt="email"  style="height: 3%; width: 4%; margin-top: -10px"> masudjuly02@gmail.com
					</p>
					
				</div>

				<div class="w3-col" style="width: 50%;">
					<img src='uploads/omar_sharif.jpg' alt="Omar Sharif"  style="height: 40%; width: 70%; margin-top: 20px; margin-bottom: 10px; margin-left: 29%"><br><br>
					<p style="font-family: Imprint MT Shadow; text-align: right; color: black; font-size: 140%; float: right;">
						OMAR SHARIF<br>ID: 1304003<br>Department of CSE<br>
						<a href="https://www.facebook.com/profile.php?id=100008260624244" target="_blank"><img src='images/fb.jpg' alt="facebook"  style="height: 3%; width: 4%; margin-top: -10px">/omar_sharif</a><br>
						<img src='images/email.png' alt="email"  style="height: 3%; width: 4%; margin-top: -10px"> omar.sharif1303@gamil.com
					</p>
					
					
				</div>
				<p style="font-family: Imprint MT Shadow; text-align: center; color: black; font-size: 190%;">
				Chittagong University of Engineering and Technology</p>
			</div><br><br>
		</div>
	</div>	
	<?php include('footer.php'); ?>
</body>
</html>