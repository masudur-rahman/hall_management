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

        <style type="text/css">
        #bb{
            text-align: center;
            color: red;
        }
        #cc{
            text-align: center;
            color: green;
        }
    </style>

    <script type="text/javascript">
    $(document).ready(function(){
    //$("#result").html('<br>');
     $("#userid").keyup(function(){
      var userid = $(this).val(); 
      
      if(userid.length > 3){  
       $("#result").html('checking...');
       
       $.ajax({
        
        type : 'POST',
        url  : 'username-check.php',
        data : $(this).serialize(),
        success : function(data)
            {
                  $("#result").html(data);
               }
        });
        return false;
       
      }
      else{
       $("#result").html('<p id="bb">Length is too short...!</p>');
      }
     });
     
    });

</script>
    <script type="text/javascript">
    $(document).ready(function(){
    //$("#result").html('<br>');
     $("#stid").keyup(function(){
      var stid = $(this).val(); 
      
      if(stid.length == 7){
       $("#result_stid").html('checking...');
       
       $.ajax({
        
        type : 'POST',
        url  : 'stid_check.php',
        data : $(this).serialize(),
        success : function(data)
            {
                  $("#result_stid").html(data);
               }
        });
        return false;
       
      }
      else{
       $("#result_stid").html('<p id="bb">Length Should be 7...!</p>');
      }
     });
     
    });
</script>

<script type="text/javascript">
    $(document).ready(function()
    {    
     $("#email").keyup(function()
     {  
      var email = $(this).val();
      var re = /\S+@\S+\.\S+/;
        //re.test(email);
        var em=email.indexOf("@");
        var emm=email.lastIndexOf("@");
        var dt=email.lastIndexOf(".");
        var ln=email.length-1;
      if(em==emm && em<dt && dt<ln)
      {  
       $("#result_email").html('Checking...');
       
       $.ajax({
        
        type : 'POST',
        url  : 'email_check.php',
        data : $(this).serialize(),
        success : function(data)
        {
          $("#result_email").html(data);
        }
        });
        return false;
       
      }
      else
      {
       $("#result_email").html('<p id="bb">Enter a Valid Email..</p>');
      }
     });
    
    });

</script>
<script type="text/javascript">

function checkPasswordMatch() {
    var password = $("#pwd").val();
    var confirmPassword = $("#rpwd").val();
    if(password.length<5){
        $("#result_p").html('<p id="bb">Length is too short!</p>');
        $("#result_rp").html('<p id="bb"></p>');
    }
    else if (password != confirmPassword){
        $("#result_p").html('<p id="bb"></p>');
        $("#result_rp").html('<p id="bb">Passwords do not match!</p>');
        return false;
    }
    else{
        $("#result_p").html('<p id="bb"></p>');
        $("#result_rp").html('<p id="cc">Password matched.</p>');
    }
    return true;
}

$(document).ready(function () {
   $("#pwd, #rpwd").keyup(checkPasswordMatch);
});

</script>
    </head>
<body>
    <?php
        $fname=$lname=$stid=$phn="";

        $conn=mysqli_connect("localhost", "root", "", "hall_management");
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $fname=$_POST["fname"];
            $lname=$_POST["lname"];
            $stid=$_POST["stid"];
            $phn=$_POST["phn"];
            $userid=$_POST['userid'];  
            $sql="SELECT * FROM student_info WHERE Username='$userid' ";
	  		$rslt=mysqli_query($conn, $sql);
			$cnt=mysqli_num_rows($rslt);
		
            $email=$_POST['email'];
            $sql="SELECT * FROM student_info WHERE Email='$email' ";
	  		$rslt=mysqli_query($conn, $sql);
			$cnt1=mysqli_num_rows($rslt);
		
		  	$sql="SELECT * FROM student_info WHERE StID='$stid' ";
		  	$rslt=mysqli_query($conn, $sql);
			$cnt2=mysqli_num_rows($rslt);
           	if($cnt>0 or $cnt1>0 or $cnt2>0 or $_POST['pwd']!=$_POST['rpwd'] or strlen($_POST['pwd'])<5)
           	{
              echo "<script type='text/javascript'>$.notify('Recheck your Info..','warn')</script>";
              
           	}
           	else{
            $conn=mysqli_connect('localhost', 'root', '', "hall_management");
            if(!$conn->connect_error){
              $sql = "INSERT INTO student_info(Username,Password, Fname, Lname, StID, Email, Mobile) 
              VALUES ('".$_POST["userid"]."','".$_POST["pwd"]."','".$_POST["fname"]."','".$_POST["lname"]."',".$_POST["stid"].",'".$_POST["email"]."','".$_POST["phn"]."')";
            }
            if($conn->query($sql)){
              $_SESSION['info']="<script type='text/javascript'>$.notify('Registration Successful..','success')</script>";
              $sql="INSERT INTO hall_fees(Username, StID, Fname, Lname) VALUES ('".$_POST["userid"]."',".$_POST["stid"].", '".$_POST["fname"]."','".$_POST["lname"]."')";
              mysqli_query($conn, $sql);
              header('location: login.php');
              //echo "<script> window.location.assign('login.php'); </script>";
            }
           }
        }
    ?>
    <?php //echo $info; ?>
    <?php include('header.php'); ?>
    <center>
        <div class="w3-container w3-row w3-teal" style="background-image: url(images/sha12.jpg)">

            <div class="w3-col" style="width: 10%">
                <br>
            </div>
            <div class="w3-col w3-whitee" style="width: 80%;background: #3ee3a6; color: black; background-image: url(images/back2.jpg)">
                <h2 style="font-family:Imprint MT Shadow; color: brown;"><b>Sign Up Form</b></h2>
                <div class="w3-row">
                    <div class="w3-col" style="width: 73%">
                        <form id="html5Form"  class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data"
                        data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                        data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                        data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"
                        >
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="fname">First Name:</label>
                            <div class="col-sm-7">
                                <input type="text" maxlength="30" pattern="[a-zA-Z .]+" class="form-control" id="fname" name="fname" value="<?php echo $fname;?>" placeholder="Enter First Name" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="lname">Last Name:</label>
                            <div class="col-sm-7">
                                <input type="text" maxlength="30" pattern="[a-zA-Z .]+" class="form-control" id="lname" name="lname" value="<?php echo $lname;?>" placeholder="Enter Last Name" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="userid">User Name:</label>
                            <div class="col-sm-7">
                                <input type="text" pattern="[a-zA-Z0-9_\.]+" maxlength="30" class="form-control" id="userid" name="userid" placeholder="Enter User Name" required>
                            </div>
                                
                        </div><br>
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="stid">Student ID:</label>
                            <div class="col-sm-7">
                                <input type="text" pattern="[0-9]+" class="form-control" id="stid" name="stid" value="<?php echo $stid;?>" placeholder="Enter Student ID" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="phn">Contact No:</label>
                            <div class="col-sm-7">
                                <input type="text" maxlength="20" pattern="[0-9+]+" class="form-control" id="phn" name="phn" value="<?php echo $phn;?>" placeholder="Enter Contact No" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="email">Email:</label>
                            <div class="col-sm-7">
                                <input type="email" maxlength="50" class="form-control" id="email" name="email" placeholder="Enter email" required>
                            </div>
                            
                        </div><br>
                        <div class="form-group">
                          <label class="control-label col-sm-5" for="pwd">Password:</label>
                          <div class="col-sm-7">
                            <input title="Minimum length is 5" type="password" pattern="[a-zA-Z0-9_\.]+" maxlength="30" class="form-control" id="pwd" name="pwd" placeholder="Enter Password" required>
                          </div>
                           
                        </div><br>
                        <div class="form-group">
                          <label class="control-label col-sm-5" for="rpwd">Retype Password:</label>
                          <div class="col-sm-7">          
                            <input type="password" class="form-control" class="form-control" id="rpwd" name="rpwd" placeholder="Confirm Password"  required>
                          </div>
                          
                        </div><br>
                    </div>
                    <div class="w3-col" style="width: 27%">
                        <br><br><br><br><br>
                        <span id="result" style="float: left;"></span><br><br>
                        <span id="result_stid" style="float: left;"></span>
                        <br><br><br><br>
                        <span id="result_email" style="float: left;"></span>
                        <br><br>
                        <span id="result_p" style="float: left;"></span><br>
                        <span id="result_rp" style="float: left;"></span>
                    </div>

                </div>
                <div class="form-group">
                    <button style="margin-left: -35px" type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
                </form>
                <p>Already have an account? <a href="login.php" style="color: blue;">Sign In</a> here.</p>
            </div>
            
            <div class="w3-col" style="width: 10%">
                <br>
            </div>
        </div>
    </center>

    <?php include('footer.php'); ?>
</body>
</html>