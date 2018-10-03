<!DOCTYPE html>
<html lang="en">
<?php
    ob_start();
    session_start();
    $servername="localhost";
    $username="root";
    $pass="";
    $db="hall_management";
    $conn=mysqli_connect($servername, $username, $pass, $db);
    if(!$conn) die("Connection failed: ". mysqli_connect_error());
    if(isset($_POST['app'])){
        $user=$_POST['app'];
        //echo $user;
        $sql="SELECT * FROM temporary_hall_student where Username='$user'";
        $rslt=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($rslt);
    }
?>

<head>
    <title>Hall Management System</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="css/lib/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/notify.js"></script>
    <script type="text/javascript" src="js/notify.min.js"></script>
    <style>
        #id01{
            margin-top: 20px;
            font-family: cursive;
            text-align: center; 
            }
        #red{
            background-color: red;
        }
        #green{
            background-color: green;
        }
        .button {
          border-radius: 4px;
          border: none;
          color: #FFFFFF;
          text-align: center;
          font-size: 17px;
          padding: 10px;
          width: 120px;
          transition: all 0.5s;
          cursor: pointer;
          margin: 5px;
          font-family: Imprint MT Shadow;
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
    </style>
</head>
<body>
<?php
    if(isset($_POST['approve'])){
        $c=$_POST['approve'];
        //echo $c;
        $sql="INSERT INTO hall_student SELECT * FROM temporary_hall_student where temporary_hall_student.Username='$c'";
        $res=mysqli_query($conn,$sql);
        if($res){
            $sql="DELETE FROM temporary_hall_student WHERE temporary_hall_student.Username = '$c'";
            $res1=mysqli_query($conn,$sql);
            if($res1){
                echo "<script type='text/javascript'>alert('Successfully Approved')</script>";
                echo "<script>window.close();</script>";
            }
        }
        else echo "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
     }    
   else if(isset($_POST['deny'])){
        $c=$_POST['deny'];
        $sql="DELETE FROM temporary_hall_student WHERE temporary_hall_student.Username = '$c'";
        $res1=mysqli_query($conn,$sql);
        if($res1){
            echo "<script type='text/javascript'>alert('Successfully Denied')</script>";
            echo $c;
            echo "<script>window.close();</script>";
        }
        else echo "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
   }
?>
<div class="w3-teal">
    <div class="w3-row w3-teal">
        <div class="w3-col w3-container" style="width:17%;"></div>
        <div class="w3-col w3-container w3-teal" style="width:66%;">
            <u><h2 id="id01">Applicants Profile</h2></u>
                <div class="container w3-white" style="text-align: center;margin-top: 10px;">
                        <br>
                        <div style="text-align: right;">
                            <label class="control-label col-sm-6">First Name:</label>
                            <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['Fname'];?></label>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: center;">
                             <label class="control-label col-sm-6" style="text-align: right;">Last Name:</label>
                            <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['Lname'];?></label>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: right;">
                              <label class="control-label col-sm-6">Student ID:</label>
                             <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['StID'];?></label>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: right;">
                            <label class="control-label col-sm-6">Department Name:</label>
                          <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['DeptName'];?></label>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: right;">
                            <label class="control-label col-sm-6" for="fathername">Father's Name:</label>
                            <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['FatherName'];?></label>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: right;">
                            <label class="control-label col-sm-6" for="mothername">Mother's Name:</label>
                            <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['MotherName'];?></label>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: right;">
                            <label class="control-label col-sm-6" for="guardianname">Guardian's Name:</label>
                            <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['GuardianName'];?></label>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: right;">
                            <label class="control-label col-sm-6" for="occupation">Father/Guardian Occupation:</label>
                            <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['GuardianOccupation'];?></label>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: right;">
                            <label class="control-label col-sm-6" for="birthday">Birthday:</label>
                           <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['Birthday'];?></label>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: right;">
                            <label class="control-label col-sm-6" for="preaddress">Present Address:</label>
                            <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['PreAddress'];?></label>
                            </div>
                        </div><br>

                         <div class="form-group" style="text-align: right;">
                            <label class="control-label col-sm-6" for="paraddress">Parmanent Address:</label>
                            <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['ParAddress'];?></label>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: right;">
                            <label class="control-label col-sm-6" for="phn">Contact No:</label>
                            <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['Mobile'];?></label>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: right;">
                            <label class="control-label col-sm-6" for="email">Email:</label>
                            <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['Email'];?></label>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: right;">
                            <label class="control-label col-sm-6" for="gender">Gender:</label>
                            <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['Gender'];?></label>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: right;">
                            <label class="control-label col-sm-6" for="religion">Religion</label>
                            <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['Religion'];?></label>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: right;">
                            <label class="control-label col-sm-6" for="blood">Blood Group:</label>
                           <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['Blood'];?></label>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: right;">
                            <label class="control-label col-sm-6" for="emaddress">Emergency Contact, Address:</label>
                            <div class="col-sm-6" style="text-align: left;">
                                <label><?php echo $row['EmaAddress'];?></label>
                            </div>
                        </div><br>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="form-group">
                                <div style="float: left; margin-left: 100px;">
                                    <button class="button" value="<?php echo $row['Username'];?>" name="deny" id="red"><b><span>Deny</span></b></button>
                                </div>
                                <div style="float: right; margin-right: 100px;">
                                <button class="button" value="<?php echo $row['Username'];?>" name="approve" id="green"><b><span>Approve</span></b></button>
                                </div>
                            </div>
                        </form><br><br><br><br>
                </div>
        </div>
        <br><br>
        <div class="w3-col w3-container" style="width:17%;"></div>
    </div>
    <br><br>
</div>

</body>

<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Apr 2016 07:28:35 GMT -->
</html>
