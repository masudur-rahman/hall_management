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
        $id=$_POST['app'];
        //echo $user;
        $sql="SELECT * FROM temporary_hall_fees where ID='$id'";
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
        $id=$_POST['approve'];
        $sql="SELECT * FROM temporary_hall_fees WHERE ID=$id";
        $rslt=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($rslt);

        $level=$row['Level'];$term=$row['Term']; $pic=$row['Pic']; $green='<span style="color:green">&#10004</span>';
        $dlt="DELETE FROM temporary_hall_fees WHERE temporary_hall_fees.ID=$id";
        $user=$row['Username'];
        
        if($level=='Level-1' and $term=='Term-1'){
            $sql="UPDATE hall_fees SET L1T1='$green', L1T1_Pic='$pic' WHERE Username='$user'";
            if(mysqli_query($conn,$sql)){
                echo "<script type='text/javascript'>alert('Successfully Received')</script>";
                mysqli_query($conn,$dlt);
                echo "<script>window.close();</script>";
            }
            else "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }

        else if($level=='Level-1' and $term=='Term-2'){
            $sql="UPDATE hall_fees SET L1T2='$green', L1T2_Pic='$pic' WHERE Username='$user'";
            if(mysqli_query($conn,$sql)){
                echo "<script type='text/javascript'>alert('Successfully Received')</script>";
                mysqli_query($conn,$dlt);
                echo "<script>window.close();</script>";
            }
            else "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }
        else if($level=='Level-2' and $term=='Term-1'){
            $sql="UPDATE hall_fees SET L2T1='$green', L2T1_Pic='$pic' WHERE Username='$user'";
            if(mysqli_query($conn,$sql)){
                echo "<script type='text/javascript'>alert('Successfully Received')</script>";
                mysqli_query($conn,$dlt);
                echo "<script>window.close();</script>";
            }
            else "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }
        else if($level=='Level-2' and $term=='Term-2'){
            $sql="UPDATE hall_fees SET L2T2='$green', L2T2_Pic='$pic' WHERE Username='$user'";
            if(mysqli_query($conn,$sql)){
                echo "<script type='text/javascript'>alert('Successfully Received')</script>";
                mysqli_query($conn,$dlt);
                echo "<script>window.close();</script>";
            }
            else "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }
        else if($level=='Level-3' and $term=='Term-1'){
            $sql="UPDATE hall_fees SET L3T1='$green', L3T1_Pic='$pic' WHERE Username='$user'";
            if(mysqli_query($conn,$sql)){
                echo "<script type='text/javascript'>alert('Successfully Received')</script>";
                mysqli_query($conn,$dlt);
                echo "<script>window.close();</script>";
            }
            else "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }
        else if($level=='Level-3' and $term=='Term-2'){
            $sql="UPDATE hall_fees SET L3T2='$green', L3T2_Pic='$pic' WHERE Username='$user'";
            if(mysqli_query($conn,$sql)){
                echo "<script type='text/javascript'>alert('Successfully Received')</script>";
                mysqli_query($conn,$dlt);
                echo "<script>window.close();</script>";
            }
            else "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }
        else if($level=='Level-4' and $term=='Term-1'){
            $sql="UPDATE hall_fees SET L4T1='$green', L4T1_Pic='$pic' WHERE Username='$user'";
            if(mysqli_query($conn,$sql)){
                echo "<script type='text/javascript'>alert('Successfully Received')</script>";
                mysqli_query($conn,$dlt);
                echo "<script>window.close();</script>";
            }
            else "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }
        else if($level=='Level-4' and $term=='Term-2'){
            $sql="UPDATE hall_fees SET L4T2='$green', L4T2_Pic='$pic' WHERE Username='$user'";
            if(mysqli_query($conn,$sql)){
                echo "<script type='text/javascript'>alert('Successfully Received')</script>";
                mysqli_query($conn,$dlt);
                echo "<script>window.close();</script>";
            }
            else "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }
    }
    else if(isset($_POST['deny'])){
        $id=$_POST['deny'];
        $dlt="DELETE FROM temporary_hall_fees WHERE temporary_hall_fees.ID= $id";
        if(mysqli_query($conn,$dlt)){
            echo "<script type='text/javascript'>alert('Successfully Rejected')</script>";
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
            <center><h2 style="font-family: Imprint MT shadow; color: cyan">Hall Fees Response</h2></center> <hr>
            <div class="w3-container w3-white">
                <div style="margin-top: 30px;">
                    <label class="col-sm-6" style="text-align: right;">First Name: </label>
                    <label class="col-sm-6" style="text-align: left;"><?php echo $row['Fname']; ?></label>
                </div><br>

                <div>
                    <label class="col-sm-6" style="text-align: right;">Last Name: </label>
                    <label class="col-sm-6" style="text-align: left;"><?php echo $row['Lname']; ?></label>
                </div><br>

                <div>
                    <label class="col-sm-6" style="text-align: right;">Student ID: </label>
                    <label class="col-sm-6" style="text-align: left;"><?php echo $row['StID']; ?></label>
                </div><br>

                <div>
                    <label class="col-sm-6" style="text-align: right;">Level: </label>
                    <label class="col-sm-6" style="text-align: left;"><?php echo $row['Level']; ?></label>
                </div><br>

                <div>
                    <label class="col-sm-6" style="text-align: right;">Term: </label>
                    <label class="col-sm-6" style="text-align: left;"><?php echo $row['Term']; ?></label>
                </div><br>

                <br><br><br>

                <center><h2 style="font-family: Imprint MT shadow;"><u>Bank Payment Money Receipt</u></h2></center><br><br>
                <center>
                <img src=<?php echo $row['Pic']?> alt="Money Receipt" class="w3-square" style="width: 60%;; margin-bottom: 10px;">
                </center><br>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="form-group">
                        <div style="float: left; margin-left: 100px;">
                            <button class="button" value="<?php echo $row['ID'];?>" name="deny" id="red"><b><span>Reject</span></b></button>
                        </div>
                        <div style="float: right; margin-right: 100px;">
                            <button class="button" value="<?php echo $row['ID'];?>" name="approve" id="green"><b><span>Receive</span></b></button>
                        </div>
                    </div>
                </form><br><br><br><br>
            </div>
        </div>
        <div class="w3-col w3-container" style="width:13%;"></div>
        <br>
    </div>
    <br><br>
</div>

</body>

<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_modal&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Apr 2016 07:28:35 GMT -->
</html>
