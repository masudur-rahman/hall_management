<html lang="en">
<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['link'])){
        $_SESSION['link']='home.php';
    }
    $link=$_SESSION['link'];
    $_SESSION['link']='suggestion.php';
    $conn=mysqli_connect("localhost", "root", "", "hall_management");
    if (!isset($_SESSION['username'])) {
        $_SESSION['info']="<script type='text/javascript'>$.notify('You need to login first..','info')</script>";
        header("location: $link");
        exit();
    }
    else $user=$_SESSION['username'];
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
          width: 140px;
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
		if (isset($_POST['add'])){
			$name=$_POST['name']; $description=$_POST['description']; $StID=$_POST['ID'];

			$sql="INSERT INTO  suggestion(Username, Name, StID, Description) VALUES('$user', '$name', '$StID', '$description')";
            if(mysqli_query($conn, $sql)){
            	$last_id = mysqli_insert_id($conn);
				echo "<script type='text/javascript'>$.notify('Suggested Successfully..','success')</script>";
		        $filename = $_FILES["event"]["name"];
		        $file_basename = substr($filename, 0, strripos($filename, '.'));
		        $file_ext = substr($filename, strripos($filename, '.'));
		        $filesize = $_FILES["event"]["size"];
		        $allowed_file_types = array('.jpg','.jpeg','.png','.gif','.JPG','.JPEG','.PNG','.GIF','.pdf','.doc','.docx','.ppt');

		        if (in_array($file_ext,$allowed_file_types) && ($filesize < 20000000000)){
		            $newfilename = md5('12ab34cd56ef'). $file_ext;
		            $ee="suggestion";
	  	            move_uploaded_file($_FILES["event"]["tmp_name"], "uploads/" . $newfilename);
	  	            rename('uploads/'.$newfilename, 'uploads/'.$_SESSION['username'].$ee.$last_id.$file_ext);
	  	            $newfilename='uploads/'.$_SESSION['username'].$ee.$last_id.$file_ext;
	                $sql="UPDATE suggestion SET Upload='$newfilename' WHERE ID=$last_id";
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
	?>
	<?php include('header.php'); ?>
	<div class="w3-row w3-khaki">
		<?php include('sidebar.php'); ?>
		
		<div class="w3-col w3-container w3-teal" style="width:70%">
			
			<form id="html5Form"  class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
				<br><br>
				<h2 style="text-align: center; font-family: Imprint MT Shadow;">Suggestion</h2><hr>
				<br>
				<div class="form-group" style="text-align: left;">
		            <label class="control-label col-sm-3" for="name" style="font-size: 115%;">Student Name:</label>
		            <div class="col-sm-6">
		                <input type="text" maxlength="300" class="form-control" id="name" pattern="[a-zA-Z ]+" name="name" value="" placeholder="Enter Student Name" required>
		            </div>
		        </div><br><br>

		        <div class="form-group" style="text-align: left;">
		            <label class="control-label col-sm-3" for="ID" style="font-size: 115%;">Student ID:</label>
		            <div class="col-sm-6">
		                <input type="text" maxlength="300" class="form-control" id="ID" pattern="[0-9 ]+" name="ID" value="" placeholder="Enter student ID" required>
		            </div>
		        </div><br><br>

		        <div class="form-group" style="text-align: left;">
		            <label class="control-label col-sm-3" for="description" style="font-size: 115%;">Description:</label>
		            <div class="col-sm-6">
		                <input type="text" maxlength="300" class="form-control" id="description" name="description" value="" placeholder="Enter Suggestion Description" required>
		            </div>
		        </div><br><br>

		        <div class="form-group" style="text-align: left;">
		            <label class="control-label col-sm-3" for="complain" style="font-size: 115%;"> Attachment:</label>
		            <div>
		                <input type="file" style="margin-left: 15px;" id="event" name="event" placeholder="Upload suggestion">
		                  <label> (If Any) </label>
		            </div>
		        </div>

		        <div class="form-group" style="text-align: center; font-family: Times New Roman;">
		        	<button class="button" type="submit" id="add" name="add"><b><span>Thank You</span></b></button><br>
		        </div><br><br>
			</form>

		</div>

		<div class="w3-col w3-container w3-khaki" style="width: 15%"></div>

	</div>
	<?php include('footer.php'); ?>
</body>
</html>