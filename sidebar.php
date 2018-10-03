<!DOCTYPE html>
<html lang="en">
<?php

    if(!isset($_SESSION['link'])){
        $_SESSION['link']='home.php';
    }
    $link=$_SESSION['link'];
    $hidde=false;
    if(isset($_SESSION['username']) and isset($_SESSION['idtype']) and $_SESSION['idtype']=='admin'){
	    $hidde=true;
	}

?>
<html>

<title>W3.CSS</title>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<Chittagong rel="stylesheet" href="css/lib/w3.css">
	<style type="text/css">
		.w3-btn{
			width: 197px;
			margin-left: -15px;
			text-align: left;
			height: 42px;
			background: grey;
			font-size:100%;
			font-weight: bolder;
		}
		.w3-btn:hover{
			mmargin-left: -15px;
		}
		#id:hover{

		}
	</style>
 
</head>
<body>

	<div class="w3-col w3-container w3-khaki " style="width:15%">
		<a style="text-align:left" href="#" class="w3-btn w3-khaki w3-hover-green w3-hover-text-white">CUET Campus</a>
		<a style="text-align:left" href="event.php" class="w3-btn w3-khaki w3-hover-green  w3-hover-text-white">Events</a>
		<a style="text-align:left" href="dining_management.php" class="w3-btn w3-khaki w3-hover-green  w3-hover-text-white">Dining Management</a>
		<a style="text-align:left" href="suggestion.php" class="w3-btn w3-khaki w3-hover-green  w3-hover-text-white">Suggestion</a>
		<a style="text-align:left" href="complain.php" class="w3-btn w3-khaki w3-hover-green  w3-hover-text-white">Complain</a>
		<a style="text-align:left" class="w3-btn w3-khaki w3-hover-green  w3-hover-text-white">Hall Resources</a>
		<a style="text-align:left" class="w3-btn w3-khaki w3-hover-green  w3-hover-text-white">Emergency Contact</a>
		<?php if($hidde) echo'<a style="text-align:left" href="management.php" class="w3-btn w3-khaki w3-hover-green  w3-hover-text-white" id="hidde">Management</a>'?>
		<a style="text-align:left" href="aboutus.php" class="w3-btn w3-khaki w3-hover-green  w3-hover-text-white">About Us</a>
	</div>
		
</body>
</html> 
