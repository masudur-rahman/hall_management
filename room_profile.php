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
        $sql="SELECT * FROM room_allotment where Username='$user'";
        $rslt=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($rslt);

        $sql1="SELECT * FROM student_info where Username='$user'";
        $rslt1=mysqli_query($conn, $sql1);
        $row1=mysqli_fetch_assoc($rslt1);
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
        $user=$_POST['approve'];
        $sql="SELECT * FROM room_allotment where Username='$user'";
        $rslt=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($rslt);

        $sql1="SELECT * FROM student_info where Username='$user'";
        $rslt1=mysqli_query($conn, $sql1);
        $row1=mysqli_fetch_assoc($rslt1);

        $Occupied=4;
        $R1name=$row['R1name']; $R1ID=$row['R1ID']; $R2name=$row['R2name']; $R2ID=$row['R2ID'];
        $R3name=$row['R3name']; $R3ID=$row['R3ID']; $R4name=$row['R4name']; $R4ID=$row['R4ID'];
        $R5name=$row['R5name']; $R5ID=$row['R5ID']; $R6name=$row['R6name']; $R6ID=$row['R6ID'];
        $room=$row['R1Choice']; $room2=$row['R2Choice']; $room3=$row['R3Choice']; 
        $sql="SELECT * FROM room WHERE Room_No='$room' and Occupied=0";
        $sql2="SELECT * FROM room WHERE Room_No='$room2' and Occupied=0";
        $sql3="SELECT * FROM room WHERE Room_No='$room3' and Occupied=0";
        $dlt="DELETE FROM room_allotment WHERE room_allotment.Username='$user'";

        //UPDATE room SET R1name='R1name', R1ID='R1ID', R2name='R2name', R2ID='R2ID' , R3name='R3name' , R3ID='R3ID' , R4name='R4name' , R4ID='R4ID' , R5name='R5name' , R5ID='R5ID' , R6name='R6name' , R6ID='R6ID', Occupied=4 WHERE Room_No='B109' 
        if(mysqli_num_rows(mysqli_query($conn, $sql))){
            $upd="UPDATE room SET R1name='$R1name', R1ID='$R1ID', R2name='$R2name', R2ID='$R2ID' , R3name='$R3name' , R3ID='$R3ID' , R4name='$R4name' , R4ID='$R4ID' , R5name='$R5name' , R5ID='$R5ID' , R6name='$R6name' , R6ID='$R6ID', Occupied=$Occupied  WHERE Room_No='$room'";
            if(mysqli_query($conn, $upd)){
                echo "<script type='text/javascript'>alert('Successfully Alloted')</script>";
                mysqli_query($conn, $dlt);
                echo "<script>window.close();</script>";
            }
            else "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }

        else if(mysqli_num_rows(mysqli_query($conn, $sql2))){
            $upd="UPDATE room SET R1name='$R1name', R1ID='$R1ID', R2name='$R2name', R2ID='$R2ID' , R3name='$R3name' , R3ID='$R3ID' , R4name='$R4name' , R4ID='$R4ID' , R5name='$R5name' , R5ID='$R5ID' , R6name='$R6name' , R6ID='$R6ID', Occupied=$Occupied  WHERE Room_No='$room2'";
            if(mysqli_query($conn, $upd)){
                echo "<script type='text/javascript'>alert('Successfully Alloted')</script>";
                mysqli_query($conn, $dlt);
                echo "<script>window.close();</script>";
            }
            else "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }

        else if(mysqli_num_rows(mysqli_query($conn, $sql3))){
            $upd="UPDATE room SET R1name='$R1name', R1ID='$R1ID', R2name='$R2name', R2ID='$R2ID' , R3name='$R3name' , R3ID='$R3ID' , R4name='$R4name' , R4ID='$R4ID' , R5name='$R5name' , R5ID='$R5ID' , R6name='$R6name' , R6ID='$R6ID', Occupied=$Occupied  WHERE Room_No='$room3'";
            if(mysqli_query($conn, $upd)){
                echo "<script type='text/javascript'>alert('Successfully Alloted')</script>";
                mysqli_query($conn, $dlt);
                echo "<script>window.close();</script>";
            }
            else "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }
        else{
            $sql="SELECT Room_No FROM room where Occupied=0";
            $rslt=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($rslt);
            $room=$row['Room_No'];
            $upd="UPDATE room SET R1name='$R1name', R1ID='$R1ID', R2name='$R2name', R2ID='$R2ID' , R3name='$R3name' , R3ID='$R3ID' , R4name='$R4name' , R4ID='$R4ID' , R5name='$R5name' , R5ID='$R5ID' , R6name='$R6name' , R6ID='$R6ID', Occupied=$Occupied  WHERE Room_No='$room'";
            if(mysqli_query($conn, $upd)){
                echo "<script type='text/javascript'>alert('Successfully Alloted')</script>";
                mysqli_query($conn, $dlt);
                echo "<script>window.close();</script>";
            }
            else "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }
    }
    else if(isset($_POST['deny'])){
        $user=$_POST['deny'];
        $dlt="DELETE FROM room_allotment WHERE room_allotment.Username='$user'";
        if(mysqli_query($conn, $dlt)){
            echo "<script type='text/javascript'>alert('Successfully Denied')</script>";
            echo "<script>window.close();</script>";
        }
        else "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
    }
?>
<div class="w3-teal">
    <div class="w3-row w3-teal">
        <div class="w3-col w3-container" style="width:13%;"></div>
        <div class="w3-col w3-container" style="width:74%;">
        <br>
            <h2 style="text-align: center; font-family: Imprint MT Shadow;">Applicant's For Room Allotment</h2><hr>
            <div class="w3-container w3-white">
                <div style="margin-top: 20px;">
                    <label class="col-sm-3" style="text-align: right;">First Name: </label>
                    <label class="col-sm-9" style="text-align: left;"><?php echo $row1['Fname']; ?></label>
                </div><br>

                <div>
                    <label class="col-sm-3" style="text-align: right;">Last Name: </label>
                    <label class="col-sm-9" style="text-align: left;"><?php echo $row1['Lname']; ?></label>
                </div><br>

                <div>
                    <label class="col-sm-3" style="text-align: right;">Student ID: </label>
                    <label class="col-sm-9" style="text-align: left;"><?php echo $row1['StID']; ?></label>
                </div><br>

                <div>
                    <label class="col-sm-3" style="text-align: right;">Present Room: </label>
                    <label class="col-sm-9" style="text-align: left;"><?php echo $row['Present_Room']; ?></label>
                </div><br><br><br>

                <div>
                    <label class="col-sm-3" style="text-align: right;">Roommate1: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R1name']; ?></label>
                    <label class="col-sm-1" style="text-align: right;">ID: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R1ID']; ?></label>
                    <label class="col-sm-1" style="text-align: right;">Contact: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R1Contact']; ?></label>
                </div><br>

                 <div>
                    <label class="col-sm-3" style="text-align: right;">Roommate2: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R2name']; ?></label>
                    <label class="col-sm-1" style="text-align: right;">ID: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R2ID']; ?></label>
                    <label class="col-sm-1" style="text-align: right;">Contact: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R2Contact']; ?></label>
                </div><br>

                 <div>
                    <label class="col-sm-3" style="text-align: right;">Roommate3: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R3name']; ?></label>
                    <label class="col-sm-1" style="text-align: right;">ID: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R3ID']; ?></label>
                    <label class="col-sm-1" style="text-align: right;">Contact: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R3Contact']; ?></label>
                </div><br>
                 <div>
                    <label class="col-sm-3" style="text-align: right;">Roommate4: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R4name']; ?></label>
                    <label class="col-sm-1" style="text-align: right;">ID: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R4ID']; ?></label>
                    <label class="col-sm-1" style="text-align: right;">Contact: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R4Contact']; ?></label>
                </div><br>

                 <div>
                    <label class="col-sm-3" style="text-align: right;">Roommate5: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R5name']; ?></label>
                    <label class="col-sm-1" style="text-align: right;">ID: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R5ID']; ?></label>
                    <label class="col-sm-1" style="text-align: right;">Contact: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php if($row['R5Contact'])echo $row['R5Contact']; else echo "&nbsp;&nbsp;&nbsp;"; ?></label>
                </div><br>

                 <div>
                    <label class="col-sm-3" style="text-align: right;">Roommate6: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R6name']; ?></label>
                    <label class="col-sm-1" style="text-align: right;">ID: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php echo $row['R6ID']; ?></label>
                    <label class="col-sm-1" style="text-align: right;">Contact: </label>
                    <label class="col-sm-2" style="text-align: left;"><?php if($row['R5Contact'])echo $row['R5Contact']; else echo "&nbsp;&nbsp;&nbsp;"; ?></label>
                </div><br><br><br>
                <div>
                    <br>
                    <label class="col-sm-3" style="text-align: right;">Room Choice1:</label>
                    <label class="col-sm-9" style="text-align: left;"><?php echo $row['R1Choice']; ?></label>
                    <label class="col-sm-3" style="text-align: right;">Room Choice2:</label>
                    <label class="col-sm-9" style="text-align: left;"><?php echo $row['R2Choice']; ?></label>
                    <label class="col-sm-3" style="text-align: right;">Room Choice3:</label>
                    <label class="col-sm-9" style="text-align: left;"><?php echo $row['R3Choice']; ?></label>
                </div><br><br><br><br><br>
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
        </div><br>
        <div class="w3-col w3-container" style="width:13%;"></div>
        <br>
    </div>
    <br><br>
</div>

</body>

<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Apr 2016 07:28:35 GMT -->
</html>
