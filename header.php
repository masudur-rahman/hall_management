<html lang="en">
<head>
	<title>Hall Management System</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" href="css/lib/w3.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<link rel="stylesheet" href="css/bootstrap.css">
 	<link rel="stylesheet" href="css/lib/w3.css">
 	<link rel="stylesheet" href="css/bootstrap-flex.css">
 	<link rel="stylesheet" href="css/bootstrap-flex.min.css">
 	<link rel="stylesheet" href="css/bootstrap-flex.min.css">
 	<link rel="stylesheet" href="css/bootstrap-flex.min.css">
 	<link rel="stylesheet" href="css/bootstrap-flex.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		setInterval(function() {
	    var currentTime = new Date ( );    
	    var currentHours = currentTime.getHours ( );   
	    var currentMinutes = currentTime.getMinutes ( );   
	    var currentSeconds = currentTime.getSeconds ( );
	    var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
	    var mnth=["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
	    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;   
	    currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;    
	    var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";    
	    currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;    
	    currentHours = ( currentHours == 0 ) ? 12 : currentHours;
	    currentHours = ( currentHours <10  ? "0" : "")+ currentHours;
	    var currentTimeString="Date: "+days[currentTime.getDay()]+", "+mnth[currentTime.getMonth()]+" "+currentTime.getDate()+", "+currentTime.getFullYear()+"<br>";
	    currentTimeString +="Time: "+ currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
	    document.getElementById("timer").innerHTML = currentTimeString;}, 1000);
	</script>
	
</head>
<body>
	<div class="w3-row w3-container w3-indigo" style="background-color: #449d44; color:white; text-align:right">
		<div id="timer">&nbsp;<br>&nbsp;</div>
	<!--	<div class="w3-col w3-container" style=" color:white;"><?php $dt=strtotime("+5 hours");  echo "Date: ", date("D, M d,Y", $dt),"<br>";
					echo "Time: ", date("h:i:s a", $dt),"<br>";?></div> -->
	</div> 
	<div class="w3-row w3-container w3-cyan" style="background-color:white;">
		<div class="w3-col w3-container" style="width:20%">
			<img src="images/CUET_logo.png" alt="Logo of CUET" class="img-responsive" width="160" height="150" style="margin:10px 0px 7px 15px">
		</div>


		<div class="w3-col w3-container" style="width:60%">
			<h1 style="color:brown; font-family:Imprint MT Shadow; font-size:4.5vw; text-align:center">BANGABANDHU HALL</h1>
			<h2 class="w3-text-shadow" style="font-size:2.3vw; color:yellow; text-align:center">Chittagong University of Engineering and Technology</h2>
		</div>

		<div class="w3-col w3-container" style="width:20%;">
			<img src="images/CUET_logo.png" alt="Logo of CUET" class="img-responsive" width:"160" width="160" height="150" style="margin:10px 20px 7px 30px">
		</div>

	</div> <!--End of row division -->

	<!-- Navigation Bar -->
</body>
<?php
	if(isset($_SESSION['username'])!="") include('navbar_loged_in.php');
	else include('nav.php');
?>
</html>