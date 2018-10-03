<html lang="en">
<?php
    ob_start();
    session_start();
    if (!isset($_SESSION['username'])!="" ) {
        $_SESSION['info']="<script type='text/javascript'>$.notify('You need to login first..','info')</script>";
        header('location:login.php');
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/notify.js"></script>
    <script type="text/javascript" src="js/notify.min.js"></script>
    <style type="text/css">
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
<?php
    if (isset($_POST['update'])){
        $ffname=$_POST['password'];
        $new_password=$_POST['new_password']; $re_password=$_POST['re_password'];
        $okk=true;
        if($ffname==$row['Password']){
            if(strlen($new_password)>0 and strlen($new_password)<5){
                $okk=false;
                echo "<script type='text/javascript'>$.notify('Password Length should be greater than 4..','warn')</script>";
            }
            else if($new_password!=$re_password){
                $okk=false;
                echo "<script type='text/javascript'>$.notify('Password did not match..','warn')</script>"; 
            }
        }
        else{
            echo "<script type='text/javascript'>$.notify('Password is incorrect..','warn')</script>";
        }
        if($ffname==$row['Password'] and $okk){
            $filename = $_FILES["propic"]["name"];
            $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
            $file_ext = substr($filename, strripos($filename, '.')); // get file name
            $filesize = $_FILES["propic"]["size"];
            $allowed_file_types = array('.jpg','.jpeg','.png','.gif','.JPG','.JPEG','.PNG','.GIF');  
            if (in_array($file_ext,$allowed_file_types) && ($filesize < 20000000000)){   
                $newfilename = md5(123) . $file_ext;
                move_uploaded_file($_FILES["propic"]["tmp_name"], "uploads/" . $newfilename);
                rename('uploads/'.$newfilename, 'uploads/'.$_SESSION['username'].$file_ext);
                $newfilename='uploads/'.$_SESSION['username'].$file_ext;
                echo "<script type='text/javascript'>$.notify('Upload Successful..','success')</script>";
                $sql = "UPDATE admin_info SET Profile_Pic='$newfilename' WHERE Username='$user'";
                mysqli_query($conn,$sql);
                
            }
            elseif ($filesize > 20000000000){
                echo "<script type='text/javascript'>$.notify('The file you are trying to upload is too large..','warn')</script>";
            }
            else if(!empty($file_basename)){
                echo "<script type='text/javascript'>$.notify('Only jpg, jpeg, png and gif files are allowed..','warn')</script>";
                unlink($_FILES["propic"]["tmp_name"]);
            }
            $ffname=$_POST['fname'];
            $sql= "UPDATE admin_info SET Fname='$ffname' WHERE Username='$user'";
            $rslt=mysqli_query($conn,$sql);
            $ffname=$_POST['lname'];
            $sql="UPDATE admin_info SET Lname='$ffname' WHERE Username='$user'";
            $rslt=mysqli_query($conn,$sql); 
            $ffname=$_POST['Admin_identification'];
            $sql="UPDATE admin_info SET Admin_identification='$ffname' WHERE Username='$user'";
            $rslt=mysqli_query($conn,$sql); 
            $ffname=$_POST['fathername'];
            $sql="UPDATE admin_info SET Fat_Name='$ffname' WHERE Username='$user'";
            $rslt=mysqli_query($conn,$sql); 
            $ffname=$_POST['mothername'];
            $sql="UPDATE admin_info SET Mot_name='$ffname' WHERE Username='$user'";
            $rslt=mysqli_query($conn,$sql); 
            $ffname=$_POST['address'];
            $sql="UPDATE admin_info SET Address='$ffname' WHERE Username='$user'";
            $rslt=mysqli_query($conn,$sql); 
            $ffname=$_POST['phn'];
            $sql="UPDATE admin_info SET Mobile='$ffname' WHERE Username='$user'";
            $rslt=mysqli_query($conn,$sql); 
            $ffname=$_POST['gender'];
            $sql="UPDATE admin_info SET Gender='$ffname' WHERE Username='$user'";
            $rslt=mysqli_query($conn,$sql); 
            $ffname=$_POST['religion'];
            $sql="UPDATE admin_info SET Religion='$ffname' WHERE Username='$user'";
            $rslt=mysqli_query($conn,$sql); 
            $ffname=$_POST['blood'];
            $sql="UPDATE admin_info SET Blood_Group='$ffname' WHERE Username='$user'";
            $rslt=mysqli_query($conn,$sql);
            if(strlen($new_password)>4){
                $sql="UPDATE admin_info SET Password='$new_password' WHERE Username='$user'";
                $rslt=mysqli_query($conn,$sql);
            }
            echo "<script type='text/javascript'>$.notify('Your Profile has been Updated..','success')</script>";
        }


    }

    $sql="SELECT * FROM admin_info where Username='$user'";
    $rslt=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($rslt); 

?>
    <?php include('header.php'); ?>
    <div class="w3-row w3-khaki">
        <?php include('sidebar.php'); ?>
        <div class="w3-col w3-container" style="width:85%;text-align: center; background-image: url(images/back6.jpg);">
                <div class="w3-col w3-container" style="width:100%;">
                    <center>
                        <div class="container">
                            <img src=<?php echo $row['Profile_Pic']?> alt="Profile Picture" class="w3-circle" style="width: 15%; margin-top: 20px; margin-bottom: 10px;">
                            <form id="html5Form"  class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                                <div style="margin-left: 95px"> 
                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="fname">First Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="fname" name="fname" value="<?php echo $row['Fname']?>" placeholder="Enter First Name" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="lname">Last Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="lname" name="lname" value="<?php echo $row['Lname']?>" placeholder="Enter Last Name" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="Admin_identification">Admin Identification:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="Admin_identification" name="Admin_identification" value="<?php echo $row['Admin_identification']?>" placeholder="Enter Admin Identification">
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="fathername">Father's Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="fathername" name="fathername" value="<?php echo $row['Fat_Name']?>" placeholder="Enter Father's Name">
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="mothername">Mother's Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="mothername" name="mothername" value="<?php echo $row['Mot_Name']?>"  placeholder="Enter mother's Name">
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="address">Address:</label>
                                    <div class="col-sm-4 ">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ,.-]+" class="form-control" id="address" name="address"
                                        value="<?php echo $row['Address']?>" placeholder="Upazila, Zila, Postal Code" >
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="phn">Contact No:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="20" pattern="[0-9+]+" class="form-control" id="phn" name="phn" value="<?php echo $row['Mobile']?>" placeholder="Enter Contact No" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="email">Email:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="50" class="form-control" id="email" name="email" value="<?php echo $row['Email']?>" disabled>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="gender">Gender:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="gender" name="gender" value="<?php echo $row['Gender']?>"  placeholder="Enter Gender">
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="religion">Religion</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="religion" name="religion" value="<?php echo $row['Religion']?>"  placeholder="Enter religion">
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="blood">Blood Group:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z +]+" class="form-control" id="blood" name="blood" 
                                        value="<?php echo $row['Blood_Group']?>"  paceholder="Enter Blood Group" >
                                    </div>
                                </div><br>
                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for=file>Select Profile Picture:</label>
                                    <div class="col-sm-4">
                                        <input type="file" name="propic" id="propic"><br>
                                    </div>
                                </div><br>
                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="password">Enter Password:</label>
                                    <div class="col-sm-4">
                                        <input type="password" maxlength="30" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="new_password">Enter New Password:</label>
                                    <div class="col-sm-4">
                                        <input type="password" maxlength="30" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password">
                                    </div>
                                    <label class="col-sm-4">Keep Blank If unnecessary</label>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="re_password">Retype New Password:</label>
                                    <div class="col-sm-4">
                                        <input type="password" maxlength="30" class="form-control" id="re_password" name="re_password" placeholder="Retype New Password">
                                    </div>
                                </div><br>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="button" type="submit" name="update" id="update"><b><span>Update</span></b></button><br>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br>
                    </center>
                </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>