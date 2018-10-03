<html lang="en">
<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['link'])){
        $_SESSION['link']='home.php';
    }
    $link=$_SESSION['link'];
    $_SESSION['link']='dining_management.php';
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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/notify.js"></script>
	<script type="text/javascript" src="notify.min.js"></script>
	<style type="text/css">
		table{
            width: 50%;
        }
        table, th, td {
            border: 5px solid red;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        table#t01, tr#t02, td{
            border: 1px solid black;
        }
        #t03{
            border: 1px solid black;
            text-align: center;
            color: black;
        }

        #t02{
            background-color: #aaa;
            color: white;
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
        #manage {
          border-radius: 4px;
          background-color: #f4511e;
          border: none;
          color: #FFFFFF;
          text-align: center;
          font-size: 17px;
          padding: 10px;
          width: 240px;
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
	$mgrdone=true; $tokendone=true;
		$sql="SELECT * FROM manager WHERE Check_Mgr=1";
		$rslt=mysqli_query($conn, $sql);
		$row=mysqli_fetch_assoc($rslt);

		$mgrname=""; $stid=""; $mgrid=""; $mgrroom="";
		$room=""; $contact="";
		if(isset($_POST['apply'])){
			$mgrdone=false;
			$mgrname=$_POST['mgrname']; $mgrid=$_POST['stid'];
			$mgrroom=$_POST['room']; $contact=$_POST['contact'];

			$filename = $_FILES["what"]["name"];
	        $file_basename = substr($filename, 0, strripos($filename, '.'));
	        $file_ext = substr($filename, strripos($filename, '.'));
	        $filesize = $_FILES["what"]["size"];
	        $allowed_file_types = array('.jpg','.jpeg','.png','.gif','.JPG','.JPEG','.PNG','.GIF','.pdf','.doc','.docx','.ppt');

	        if (in_array($file_ext,$allowed_file_types) && ($filesize < 20000000000)){
	            $newfilename = md5('12ab34cd56ef'). $file_ext;

              $sql="INSERT INTO manager(MgrName, StID, Contact_No, Room_No) VALUES('$mgrname', '$mgrid', '$contact', '$mgrroom')";
              if(mysqli_query($conn, $sql)){
                $last_id = mysqli_insert_id($conn);
                $dining="dining";
  	            move_uploaded_file($_FILES["what"]["tmp_name"], "uploads/" . $newfilename);
  	            rename('uploads/'.$newfilename, 'uploads/'.$_SESSION['username'].$dining.$last_id.$file_ext);
  	            $newfilename='uploads/'.$_SESSION['username'].$dining.$last_id.$file_ext;
                $sql="UPDATE manager SET Upload='$newfilename' WHERE ID=$last_id";
                mysqli_query($conn, $sql);
  	            echo "<script type='text/javascript'>$.notify('Application Successful..','success')</script>";
  	            $mgrdone=true;
              }
              else echo "<script type='text/javascript'>$.notify('Oopss.An Error Occured..','warn')</script>";
	        }
	        elseif ($filesize > 20000000000){
	            echo "<script type='text/javascript'>$.notify('The file you are trying to upload is too large..','warn')</script>";
	        }
	        else if(!empty($file_basename)){
	            echo "<script type='text/javascript'>$.notify('Only jpg, jpeg, png, gif, pdf, doc and ppt files are allowed..','warn')</script>";
	            unlink($_FILES["what"]["tmp_name"]);
	        }
		}
		if(isset($_POST['entry'])){
			$tokendone=false;
			$name=$_POST['name']; $stid=$_POST['stid'];
			$room=$_POST['room'];

			$filename = $_FILES["what"]["name"];
	        $file_basename = substr($filename, 0, strripos($filename, '.'));
	        $file_ext = substr($filename, strripos($filename, '.'));
	        $filesize = $_FILES["what"]["size"];
	        $allowed_file_types = array('.jpg','.jpeg','.png','.gif','.JPG','.JPEG','.PNG','.GIF','.pdf','.doc','.docx','.ppt');

	        if (in_array($file_ext,$allowed_file_types) && ($filesize < 20000000000)){
	            $newfilename = md5('12ab34cd56ef'). $file_ext;

              $sql="INSERT INTO token(Name, StID, Room_No) VALUES('$name', '$stid', '$room')";
              if(mysqli_query($conn, $sql)){
                $last_id = mysqli_insert_id($conn);
                $token="token";
  	            move_uploaded_file($_FILES["what"]["tmp_name"], "uploads/" . $newfilename);
  	            rename('uploads/'.$newfilename, 'uploads/'.$_SESSION['username'].$token.$last_id.$file_ext);
  	            $newfilename='uploads/'.$_SESSION['username'].$token.$last_id.$file_ext;
                $sql="UPDATE token SET Token='$newfilename' WHERE ID=$last_id";
                mysqli_query($conn, $sql);
  	            echo "<script type='text/javascript'>$.notify('Token Entry Successful..','success')</script>";
  	            $tokendone=true;
              }
              else echo "<script type='text/javascript'>$.notify('Oopss.An Error Occured..','warn')</script>";
	        }
	        elseif ($filesize > 20000000000){
	            echo "<script type='text/javascript'>$.notify('The file you are trying to upload is too large..','warn')</script>";
	        }
	        else if(!empty($file_basename)){
	            echo "<script type='text/javascript'>$.notify('Only jpg, jpeg, png, gif, pdf, doc and ppt files are allowed..','warn')</script>";
	            unlink($_FILES["what"]["tmp_name"]);
	        }
		}

	?>
	<?php include('header.php'); ?>
    <div class="w3-row w3-teal">
		<div class="w3-col w3-container w3-teal" style="width:15%;"></div>
        <div class="w3-col w3-container w3-khaki" style="width: 70%;background-image: url(images/back2.jpg)">
			<h2 style="text-align: center; font-family: Imprint MT Shadow;">Dining Management</h2><hr>
			<div style="margin-left: ">
				<div style="margin-left: 50px">
					<div class="form-group" style="text-align: left;">
			            <label class="control-label col-sm-3" for="mgrname" style="font-size: 115%;">Manager Name</label>
			            <div class="col-sm-4" style="font-size: 115%;">: 
			                <?php echo $row['MgrName']; ?>
			            </div>
			        </div><br>

					<div class="form-group" style="text-align: left;">
			            <label class="control-label col-sm-3" for="room" style="font-size: 115%;">Room No</label>
			            <div class="col-sm-4" style="font-size: 115%;">: 
			                <?php echo $row['Room_No']; ?>
			            </div>
			        </div><br>

					<div class="form-group" style="text-align: left;">
			            <label class="control-label col-sm-3" for="contact" style="font-size: 115%;">Contact No</label>
			            <div class="col-sm-4" style="font-size: 115%;">: 
			                <?php echo $row['Contact_No']; ?>
			            </div>
			        </div><br>

					<div class="form-group" style="text-align: left;">
			            <label class="control-label col-sm-3" for="stid" style="font-size: 115%;">Dining Duration</label>
			            
			            <div class="col-sm-6" style="font-size: 107%;">: 
			                <?php echo "&nbsp;&nbsp;",$row['Start_Date'],"&nbsp;&nbsp;&nbsp; To &nbsp;&nbsp;" ,$row['End_Date']; ?>
			            </div>
			        </div><br>
					<br><br>

				
				</div>
					
						<hr>

					<div class="w3-row w3-container">
						<div class="w3-col w3-container" style="width: 28%;">
						<form style='text-align: right;' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST'><button id="b" name='token' style='font-size:120%'><u>Token Entry</u></button></form>
						</div>
						<div class="w3-col w3-container" style="width: 36%;">
						
						<button id="b"  style='font-size:120%; margin-left:50px;'  onclick="document.getElementById('approved_list').style.display='block'"><u>Approved Students List</u></button>
						</div>
						<div class="w3-col w3-container" style="width: 33%;">
						<form style='text-align: left;' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST'><button id="b" name='manage' style='font-size:120%; margin-left:50px;'><u>Apply For Manager</u></button><br></form>
						</div>
					</div>
					<div id="approved_list" class="w3-modal" onclick="this.style.displayy='none'">
					<!--
						  <div class="w3-modal-content">
						    <div class="w3-container">
						      <span onclick="document.getElementById('approved_list').style.display='none'"
						      class="w3-closebtn">&times;</span>
						      <p>Some text in the Modal..</p>
						      <p>Some text in the Modal..</p>
						    </div>
						  
						</div>-->
						<div class="w3-modal-content w3-animate-zoom" style="background-image: url(images/back2.jpg)">
							<div class="w3-container">
							<span onclick="document.getElementById('approved_list').style.display='none'"
						      class="w3-closebtn w3-hover-text-red">&times;</span><br>
							<center><h2 style="font-family: Imprint MT shadow; color: brown">Approved Students List</h2></center> <hr>
							<table id="t01">
		                    <tr id="t02">
		                        <th id="t03">Name</th>      
		                        <th id="t03">Student ID</th>
		                        <th id="t03">Room No</th>
		                    </tr>
		                    <?php
		                        $sql="SELECT * FROM token WHERE Approved='Yes'";
		                        $rslt=mysqli_query($conn, $sql);

		                        if(mysqli_num_rows($rslt)){
		                            while($row=mysqli_fetch_assoc($rslt)){
		                                $name=$row['Name']; $stid=$row['StID']; $room=$row['Room_No'];?>
		                                <tr><td id='t03'><?php echo $name; ?></td><td id='t03'><?php echo $stid; ?></td>
		                                <td id='t03'><?php echo $room; ?></td>

		                        <?php }}?>
		                        
		                	</table><br><br>
		                	

		                	</div>
		                </div>
					</div>
						<hr>
				<div style="margin-left: 50px"><br>
					<?php
					if(isset($_POST['manage']) or !$mgrdone){
					?>
						<form id="html5Form"  class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
							<h2 style='text-align: center; margin-left:-50px; font-family: Imprint MT Shadow;'>Apply For Manager</h2><hr>
							<div class='form-group' style='text-align: left;'>
					            <label class='control-label col-sm-3' for='mgrname' style='font-size: 115%;'>Name</label>
					            <div class='col-sm-4'>
					                <input type='text' maxlength='30' pattern='[a-zA-Z ]+' class='form-control' id='mgrname' name='mgrname' value='<?php echo $mgrname; ?>' placeholder='Enter Name' required>
					            </div>
					        </div><br>

					        <div class='form-group' style='text-align: left;'>
					            <label class='control-label col-sm-3' for='stid' style='font-size: 115%;'>Student ID</label>
					            <div class='col-sm-4'>
					                <input type='text' maxlength='20' pattern='[0-9]+' class='form-control' id='stid' name='stid' value='<?php echo $mgrid;?>' placeholder='Enter Student ID' required>
					            </div>
					        </div><br>

					        <div class='form-group' style='text-align: left;'>
					            <label class='control-label col-sm-3' for='room' style='font-size: 115%;'>Room No</label>
					            <div class='col-sm-4'>
					                <input type='text' maxlength='20' pattern='[aAbB0-9 -]+' class='form-control' id='room' name='room' value='<?php echo $mgrroom; ?>' placeholder='Enter Room No' required>
					            </div>
					        </div><br>

					        <div class='form-group' style='text-align: left;'>
					            <label class='control-label col-sm-3' for='contact' style='font-size: 115%;'>Contact No</label>
					            <div class='col-sm-4'>
					                <input type='text' maxlength='20' pattern='[0-9]+' class='form-control' id='contact' name='contact' value='<?php echo $contact; ?>' placeholder='Enter Contact No' required>
					            </div>
					        </div><br>

					        <div class='form-group' style='text-align: left;'>
					            <label class='control-label col-sm-3' for='what' style='font-size: 115%;'>Money Reciept:</label>
					            <div>
					                <input type="file" style='margin-left: 15px;' id='what' name='what' placeholder='' required>
					            </div>
					        </div>
					        <div class='form-group' style='text-align: center; font-family: Times New Roman;'>
					        	<button class='button' type='submit' id='apply' name='apply'><b><span>Apply</span></b></button><br>
					        </div><br><br>
				        </form>
				        <?php } ?>
				        <?php
				        if(isset($_POST['token']) or !$tokendone){
				        ?>
						<form id="html5Form"  class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
							<h2 style='text-align: center; margin-left:-50px; font-family: Imprint MT Shadow;'>Token Entry</h2><hr>
							<div class='form-group' style='text-align: left;'>
					            <label class='control-label col-sm-3' for='mgrname' style='font-size: 115%;'>Name</label>
					            <div class='col-sm-4'>
					                <input type='text' maxlength='30' pattern='[a-zA-Z ]+' class='form-control' id='name' name='name' value='' placeholder='Enter Name' required>
					            </div>
					        </div><br>

					        <div class='form-group' style='text-align: left;'>
					            <label class='control-label col-sm-3' for='stid' style='font-size: 115%;'>Student ID</label>
					            <div class='col-sm-4'>
					                <input type='text' maxlength='20' pattern='[0-9]+' class='form-control' id='stid' name='stid' value='' placeholder='Enter Student ID' required>
					            </div>
					        </div><br>

					        <div class='form-group' style='text-align: left;'>
					            <label class='control-label col-sm-3' for='room' style='font-size: 115%;'>Room No</label>
					            <div class='col-sm-4'>
					                <input type='text' maxlength='20' pattern='[aAbB0-9 -]+' class='form-control' id='room' name='room' value='' placeholder='Enter Room No' required>
					            </div>
					        </div><br>

					        <div class='form-group' style='text-align: left;'>
					            <label class='control-label col-sm-3' for='what' style='font-size: 115%;'>Money Reciept:</label>
					            <div>
					                <input type='file' style='margin-left: 15px;' id='what' name='what' placeholder='' required>
					            </div>
					        </div>
					        <div class='form-group' style='text-align: center; font-family: Times New Roman;'>
					        	<button class='button' type='submit' id='entry' name='entry'><b><span>Submit</span></b></button><br>
					        </div><br><br>
				        </form>
				    <?php } ?>
				</div><br><br>
			</div>
		</div>

		<div class="w3-col" style="width:15%">&nbsp;</div>
	</div>
	<?php include('footer.php'); ?>
</body>
</html>