<html lang="en">
<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['link'])){
        $_SESSION['link']='home.php';
    }
    $link=$_SESSION['link'];
    $_SESSION['link']='Hall_residence_application.php';
    if (!isset($_SESSION['username'])) {
        $_SESSION['info']="<script type='text/javascript'>$.notify('You need to login first..','info')</script>";
        header("location: $link");
        exit();
    }
    else $user=$_SESSION['username']; $pplink;
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
    <script type="text/javascript" src="js/notify.min.js"></script>
    <style type="text/css">
        .button {
          border-radius: 4px;
          background-color: limegreen;
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
<?php
    echo $info;
    $gender="";
    if(isset($_POST['apply'])){
        $conn=mysqli_connect("localhost", "root", "", "hall_management");
        $sql="SELECT Username FROM temporary_hall_student where Username='$user'";
        $sql1="SELECT Username FROM hall_student where Username='$user'";
        $rslt = $conn->query($sql); $rslt1=$conn->query($sql1);
        if ($rslt->num_rows  or $rslt1->num_rows) {
            echo "<script type='text/javascript'>$.notify('You Already Applied..','info')</script>";
        }
        else{
            $fname=$_POST["fname"]; $fathername=$_POST['fathername']; $mothername=$_POST['mothername'];
            $lname=$_POST["lname"]; $preaddress=$_POST['preaddress']; $paraddress=$_POST['paraddress'];
            $stid=$_POST["stid"]; $dptname=$_POST['dptname']; $guardianname=$_POST['guardianname'];
            $phn=$_POST["phn"]; $birthday=$_POST['birthday']; $email=$_POST['email']; $gender=$_POST['gender'];
            $blood=$_POST['blood']; $emaddress=$_POST['emaddress']; $religion=$_POST['religion']; $occupation=$_POST['occupation'];
            $sql = "INSERT INTO temporary_hall_student(Username, Fname, Lname, StID, Email, Mobile, DeptName, FatherName, MotherName, GuardianName, GuardianOccupation, Birthday, PreAddress, ParAddress, Gender, Religion, Blood, EmaAddress)
                VALUES('$user', '$fname', '$lname', '$stid', '$email', '$phn', '$dptname', '$fathername', '$mothername', '$guardianname', '$occupation', '$birthday', '$preaddress', '$paraddress', '$gender', '$religion', '$blood', '$emaddress')";
            if(mysqli_query($conn, $sql)){
                echo "<script type='text/javascript'>$.notify('Successfully Applied..','success')</script>";
            }

            else echo "<script type='text/javascript'>$.notify('Oooops.. An Error Occured.','warn')</script>";
             //   echo mysqli_error($conn);
        }
    }
?>
    <?php include('header.php'); ?>
    <div class="w3-row w3-teal">
        <div class="w3-col w3-container w3-teal" style="width:15%;"></div>
                <div class="w3-col w3-container w3-khaki" style="width:70%;">
                <h2 style="text-align: center;">Hall Residence Application Form </h2><hr>
                    <center>
                        <div class="container w3-khakii" style="text-align: center;">
                            <form id="html5Form"  class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                                <div style="margin-left: 95px"> 

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="fname">First Name:</label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z .]+" class="form-control" id="fname" name="fname" value="" placeholder="Enter First Name" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="lname">Last Name:</label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z .]+" class="form-control" id="lname" name="lname" value="" placeholder="Enter Last Name" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4">Student ID:</label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="20" pattern="[0-9 ]+" class="form-control" id="stid" name="stid" placeholder="Enter Student ID" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="dptname">Department Name:</label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="dptname" name="dptname" value="" placeholder="Enter Department Name" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="fathername">Father's Name:</label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z .]+" class="form-control" id="fathername" name="fathername" value="" placeholder="Enter Father's Name" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="mothername">Mother's Name:</label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z .]+" class="form-control" id="mothername" name="mothername" value="" placeholder="Enter Mother's Name" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="guardianname">Guardian's Name:</label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z .]+" class="form-control" id="guardianname" name="guardianname" value="" placeholder="Enter Guardian's Name" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="occupation">Father/Guardian Occupation:</label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z -.]+" class="form-control" id="occupation" name="occupation" value="" placeholder="Enter Guardian's Occupation">
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="birthday">Birthday:</label>
                                    <div class="col-sm-5">
                                        <input type="date" maxlength="30" pattern="[a-zA-Z0-9 -/]+" class="form-control" id="birthday" name="birthday" value="" placeholder="Enter Birthday" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="preaddress">Present Address:</label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="50" pattern="[a-zA-Z ,.-]+" class="form-control" id="preaddress" name="preaddress" value="" placeholder="Enter Present Address" required>
                                    </div>
                                </div><br>
                                 <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="paraddress">Parmanent Address:</label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="50" pattern="[a-zA-Z ,.-]+" class="form-control" id="paraddress" name="paraddress" value="" placeholder="Enter Parmanent Address" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="phn">Contact No:</label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="20" pattern="[0-9+]+" class="form-control" id="phn" name="phn" value="" placeholder="Enter Contact No" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="email">Email:</label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="50" class="form-control" id="email" name="email" value="" placeholder="Enter Email Address" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="gender">Gender:</label>
                                    <div class="col-sm-5" style="text-align: left;">
                                    <!--    <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="gender" name="gender" value="" placeholder="Enter Gender"  > -->
                                        &nbsp;&nbsp;&nbsp;
                                        <label><input type="radio" name="gender" id="gender" <?php if(isset($gender) and $gender=="Male") echo "checked";?> value="Male" required> Male</label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label><input type="radio" name="gender" id="gender" <?php if(isset($gender) and $gender=="Female") echo "checked";?> value="Female" > Female</label>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="religion">Religion</label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="religion" name="religion" value="" placeholder="Enter Religion">
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="blood">Blood Group:</label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z +]+" class="form-control" id="blood" name="blood" value="" placeholder="Enter Blood Group">
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="emaddress">Emergency Contact, Address:</label>
                                    <div class="col-sm-5">
                                        <input type="text" maxlength="50" pattern="[a-zA-Z0-9+ -,. ]+" class="form-control" id="emaddress" name="emaddress" value="" placeholder="Enter Emergency Contact" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: center;">
                                    <label style="color: red; font-size: 110%"><b>**Please Recheck Your Information Before Submit**</b></label>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-16">
                                        <button class="button" type="submit" name="apply" id="apply"><b><span>Apply</span></b></button><br>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br>
                    </center>
                </div>
            <div class="w3-col w3-container w3-teal" style="width:15%;"> </div>

        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>