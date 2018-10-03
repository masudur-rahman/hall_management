<html lang="en">
<?php
	ob_start();
	session_start();
	if (isset($_SESSION['username'])) {
		//echo $_SESSION['username']," ",$_SESSION['idtype'];
	}
  $info="";
  if(isset($_SESSION['info'])){
      $info=$_SESSION['info'];
       $_SESSION['info']='';
   }
  $user=$_SESSION['username']; $pplink;
  $conn=mysqli_connect("localhost", "root", "", "hall_management");
  $sql="SELECT * FROM admin_info where Username='$user'";
  $rslt=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($rslt); 
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
  <link rel="stylesheet" href="css/datepicker.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/datepicker.js"></script>
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
		.button {
          border-radius: 4px;
          background-color: #f4511e;
          border: none;
          color: #FFFFFF;
          text-align: center;
          font-size: 17px;
          padding: 10px;
          width: 120px;
          transition: all 0.5s;
          cursor: pointer;
          margin: 5px;
        }

        .button span {
          cursor: pointer;
          display: inline-block;
          position: relative;
          transition: 0.5s;
        }

        .button span:after {
          content: '»';
          position: absolute;
          opacity: 0;
          top: 0;
          right: -20px;
          transition: 0.5s;
        }

        .button:hover span {
          padding-right: 25px;
        }

        .button:hover span:after {
          opacity: 1;
          right: 0;
        }
        #up:hover{
            background-color: default;
            color: green;
        }
        
	</style>
</head>
<body>
	<?php echo $info;
		$_SESSION['link']='home.php';
    	$pass=$row['Password'];
		if (isset($_POST['add']) and  $pass==$_POST['password']){
			$name=$_POST['name']; $description=$_POST['description']; $stdate=$_POST['stdate']; $enddate=$_POST['enddate'];
			$sql="INSERT INTO event(Event_Name, Description, Start_Date, End_Date) VALUES('$name', '$description', '$stdate', '$enddate')";
            if(mysqli_query($conn, $sql)){
            	$last_id = mysqli_insert_id($conn);
				echo "<script type='text/javascript'>$.notify('Event Added Successfully..','success')</script>";
		        $filename = $_FILES["event"]["name"];
		        $file_basename = substr($filename, 0, strripos($filename, '.'));
		        $file_ext = substr($filename, strripos($filename, '.'));
		        $filesize = $_FILES["event"]["size"];
		        $allowed_file_types = array('.jpg','.jpeg','.png','.gif','.JPG','.JPEG','.PNG','.GIF','.pdf','.doc','.docx','.ppt');

		        if (in_array($file_ext,$allowed_file_types) && ($filesize < 20000000000)){
		            $newfilename = md5('12ab34cd56ef'). $file_ext;
		            $ee="event";
	  	            move_uploaded_file($_FILES["event"]["tmp_name"], "uploads/" . $newfilename);
	  	            rename('uploads/'.$newfilename, 'uploads/'.$_SESSION['username'].$ee.$last_id.$file_ext);
	  	            $newfilename='uploads/'.$_SESSION['username'].$ee.$last_id.$file_ext;
	                $sql="UPDATE event SET Upload='$newfilename' WHERE Event_No=$last_id";
	                mysqli_query($conn, $sql);
	              
		        }
		        elseif ($filesize > 20000000000){
		            echo "<script type='text/javascript'>$.notify('The file you are trying to upload is too large..','warn')</script>";
		        }
		        else if(!empty($file_basename)){
		            echo "<script type='text/javascript'>$.notify('Only jpg, jpeg, png, gif, pdf, doc and ppt files are allowed..','warn')</script>";
		            unlink($_FILES["event"]["tmp_name"]);
		        }
	    	}
	    	else echo "<script type='text/javascript'>$.notify('Oopss.An Error Occured..','warn')</script>";
	    }
	    if (isset($_POST['add']) and  $pass!=$_POST['password']){
	    	echo "<script type='text/javascript'>$.notify('Sorry..Password is incorrect..','warn')</script>";
	    }
	?>
	<?php include('header.php'); ?>
	<div class="w3-row w3-khaki">
		<?php include('sidebar.php'); ?>
		
		<div class="w3-col w3-container w3-teal" style="width:70%">
			
			<form id="html5Form"  class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
				<br><br>
				<h2 style="text-align: center; font-family: Imprint MT Shadow;">Add New Event</h2><hr>
				<br><br> 
				<div class="form-group" style="text-align: left;">
		            <label class="control-label col-sm-3" for="name" style="font-size: 115%;">Event Name:</label>
		            <div class="col-sm-6">
		                <input type="text" maxlength="300" class="form-control" id="name" name="name" value="" placeholder="Enter Event Name" required>
		            </div>
		        </div><br><br>

		        <div class="form-group" style="text-align: left;">
		            <label class="control-label col-sm-3" for="description" style="font-size: 115%;">Description:</label>
		            <div class="col-sm-6">
		                <input type="text" maxlength="300" class="form-control" id="description" name="description" value="" placeholder="Enter Event Description" required>
		            </div>
		        </div><br><br>

		        <div class="form-group" style="text-align: left;">
		            <label class="control-label col-sm-3" for="stdate" style="font-size: 115%;">Start Date:</label>
		            <div class="col-sm-4">
		                <input type="date" maxlength="300" class="form-control date-picker" id="stdate" name="stdate" value="" placeholder="Enter Start Date" required>
		            </div>
		        </div><br><br>

		        <div class="form-group" style="text-align: left;">
		            <label class="control-label col-sm-3" for="enddate" style="font-size: 115%;">End Date:</label>
		            <div class="col-sm-4">
		                <input type="date" maxlength="300" class="form-control date-picker" id="enddate" name="enddate" value="" placeholder="Enter End Date" required>
		            </div>
		        </div><br><br>

		        <div class="form-group" style="text-align: left;">
		            <label class="control-label col-sm-3" for="event" style="font-size: 115%;"> Attachment:</label>
		            <div>
		                <input type="file" style="margin-left: 15px;" id="event" name="event" placeholder="Upload Event">
		            </div>
		        </div>

		        <div class="form-group" style="text-align: left;">
		            <label class="control-label col-sm-3" for="password">Enter Password:</label>
		            <div class="col-sm-4">
		               <input type="password" maxlength="30" class="form-control" id="password" name="password" placeholder="Enter Password" required>
		            </div>
		        </div><br><br><br>

		        <div class="form-group" style="text-align: center; font-family: Times New Roman;">
		        	<button class="button" type="submit" id="add" name="add"><b><span>Add</span></b></button><br>
		        </div><br><br>
			</form>

		</div>

		<div class="w3-col w3-container w3-khaki" style="width: 15%"></div>

	</div>
	<?php include('footer.php'); ?>
</body>
</html>