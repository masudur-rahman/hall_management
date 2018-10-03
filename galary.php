<html lang="en">
<?php
	ob_start();
	session_start();
	$_SESSION['link']='galary.php';
	if ( isset($_SESSION['username'])) {
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
</head>
<body>
	<?php echo $info; ?>
	<?php include('header.php'); ?>
	<div class="w3-row w3-khaki">
		
		<div class="w3-col w3-container w3-white" style="width:100%">
			<?php include('slideshow2.php'); ?>
			<br>
		</div>
	</div>
	<?php include('footer.php'); ?>
</body>
</html>