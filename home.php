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
		
		<div class="w3-col w3-container w3-white" style="width:85%;">
			<?php include('slideshow.php'); ?>
			
		</div>
	</div>	
	<div class="w3-row w3-khaki"; style="">
		<div class="w3-col" style="width: 15%">
			<br>
		</div>
		
		<div class="w3-col w3-container" style="padding-bottom: 50px; background-image: url(images/sha11.jpg); width: 85%">
			<br>
			<div class="w3-col " style="width: 62% ;border: 1px solid green;">
				<h3 style="margin-left: 50px"><u>Recent Events and Notices</u></h3><br>
				<div style="margin-left: 50px; padding-bottom: 13px; padding-top: 22px">
					<?php
                        $sql="SELECT * FROM event ORDER BY Start_Date DESC LIMIT 0, 4";
                        $rslt=mysqli_query($conn, $sql);

                        if(mysqli_num_rows($rslt)){
                            while($row=mysqli_fetch_assoc($rslt)){
	                    		$a=$row["Event_No"]; $aa=$row['Event_Name']; ?>
                                <form action='show_event.php' target='_blank' method='POST'><button id='b' value='<?php echo $a; ?>' name='app'><font style='font-size: 150%'>&#9656;&nbsp;&nbsp</font><?php echo $aa; ?></button></form>
                        <?php }} ?>
                        <?php
                        $sql="SELECT * FROM notice ORDER BY Date DESC LIMIT 0, 4";
                        $rslt=mysqli_query($conn, $sql);

                        if(mysqli_num_rows($rslt)){
                            while($row=mysqli_fetch_assoc($rslt)){
                              $a=$row["Title"]; $b=$row['Upload'];?>
                              	<form action='<?php echo $b; ?>' target='_blank'><button id='b' value='<?php echo $a; ?>'><font style='font-size: 150%'>&#9656;&nbsp;&nbsp</font><?php echo $a; ?></button></form>
                        <?php }} ?>
                        
				</div><br><br>
			</div>
			<div class="w3-col" style="width: 5%">
				<br>
			</div>
			<div class="w3-col " style="width: 33% ;border: 1px solid green;">
				<h3 style="text-align: center;"><u>Message From Provost</u></h3>
				<center><img src="images/quazi.jpg" alt="Provost Picture" class="w3-circle" style="width: 45%; margin-top: 20px; margin-bottom: 10px;"></center>
				<h4 style="text-align: center;">Dr. Quazi Delwar Hossain</h4>
				<p style="text-align: justify; margin: 0px 10px 0px 10px;">I welcome you all to the Hall Management System of Bangabandhu Hall, Chittagong University of Engineering & Technology (CUET). To achieve the goal of Vision 2021 by Bangladesh Government, we all have to work together for Digital Bangladesh. Keeping this fact in mind, Bangabandhu Hall has introduced Hall Management System for its students and hall authority. Students of Bangabandhu Hall can easily use the developed system to complete their different hall related tasks easily. I request all students of Bangabandhu Hall to use the system. </p>
			</div>
			<br><br>
		</div>
		
	</div>
	<?php include('footer.php'); ?>
</body>
</html>