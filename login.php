<html lang="en">
<?php
	ob_start();
	session_start();
	if (isset($_SESSION['username'])!="" ) {
		header("Location: home.php");
		exit;
 	}
 	if(!isset($_SESSION['link'])){
 		$_SESSION['link']='home.php';
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
	<link rel="stylesheet" type="text/css" href="css/login.css">
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
	<?php
	echo $info;
	$link=$_SESSION['link'];
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$conn=mysqli_connect('localhost', 'root', '', "hall_management");
		$userid=$_POST["user"]; $pass=$_POST["pass"]; $idd=$_POST["idtype"];
		if($idd==="student"){
			$sql="SELECT username, password FROM student_info where username='$userid' and password='$pass'";
			//$rslt=mysqli_query($conn, $sql);
			$rslt = $conn->query($sql);
			if ($rslt->num_rows > 0) {
				//session_start();
				$_SESSION['username']=$userid; $_SESSION["idtype"]=$idd;
				//echo "<script type='text/javascript'>$.notify('Login Successful..','success')</script>";
				$_SESSION['info']="<script type='text/javascript'>$.notify('Login Successful..','success')</script>";
			//if(mysqli_num_rows($rslt)){
				//echo "<script type='text/javascript'>$.notify("Login Successful...", "success");</script>";
				header("Location: $link");

			}
			else{
				echo "<script type='text/javascript'>$.notify('Incorrect Usename or Password !','warn')</script>";
				/*<script type="text/javascript">
					$.notify("Incorrect Usename or Password !", "warn");
				</script>*/
				//echo "<script type='text/javascript'>alert('Incorrect Usename or Password')</script>";
			}
		}
		else{
			$sql="SELECT username, password FROM admin_info where username='$userid' and password='$pass'";
			$rslt = $conn->query($sql);
			if ($rslt->num_rows > 0) {
				$_SESSION['username']=$userid; $_SESSION["idtype"]=$idd;
				/*<script type="text/javascript">
					$.notify("Login Successful...", "success");
				</script>*/
				$_SESSION['info']="<script type='text/javascript'>$.notify('Login Successful..','success')</script>";
				//header("Refresh:0; URL=$link");
				header("Location: $link");
			}
			else{
				echo "<script type='text/javascript'>$.notify('Incorrect Usename or Password !','warn')</script>";
				/*
				<script type="text/javascript">
					$.notify("Incorrect Usename or Password !", "warn");
				</script>*/
				//echo "<script type='text/javascript'>alert('Incorrect Usename or Password')</script>";
			}
		}
	}
	
	?>
	
	<?php include('header.php'); ?>
	<div class="w3-row w3-khaki">
		<?php include('sidebar.php'); ?>
		<div class="w3-col w3-container w3-teal" style="width:85%; background-image: url(images/back6.jpg)">
		<center>
			<div class="w3-container">
	            <img src="images/avatar4.png" alt="Avatar" class="w3-circle" style="width: 15%; margin-top: 30px; margin-bottom: 10px;">
	            <form id="html5Form"  class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
	                

	                <div class="form-group" style="text-align: right;">
	                    <label class="control-label col-sm-5" for="user">User Name:</label>
	                    <div class="col-sm-3">
	                        <input type="text" class="form-control" id="user" name="user" placeholder="Enter User Name" required>
	                    </div>
	                </div><br>
	                <div class="form-group" style="text-align: right;">
	                	<label class="control-label col-sm-5" for="pass">Password:</label>
	                	<div class="col-sm-3">
	                		<input type="password" class="form-control" name="pass" placeholder="Enter Password" required>
	                	</div>
	                </div><br><br>
	                <center>
		            <div class="form-group">
					    <select name="idtype" style="color: black; padding: 0px 10px; margin-left: 25px; font-size: 115%; border-radius: 5px;">
					    	<option value="student">Student&nbsp;&nbsp;&nbsp;</option>
					    	<option value="admin">Admin</option>
					    </select><br>
				    </div>
				    <label><input type="checkbox" checked="checked"> Remember me<br></label><br>
				    <button class="button" type="submit" id="login"><b><span>Enter</span></b></button><br>
					<p>Don't have an ID ? <a href="signup.php" id="up" style="color: khaki"> Register</a> Here. </p>
				    </center>
		        </form>
			</div><br>
		</center>


		</div>
		<div class="w3-col w3-container w3-khaki" style="width:15%"></div>
	</div>
	<?php include('footer.php'); ?>
</body>
</html>