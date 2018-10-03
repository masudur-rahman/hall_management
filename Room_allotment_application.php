<html lang="en">
<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['link'])){
        $_SESSION['link']='home.php';
    }
    $link=$_SESSION['link'];
    $_SESSION['link']='Room_allotment_application.php';
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
        $sql="SELECT Username FROM room_allotment where Username='$user'";

        $rslt = $conn->query($sql);
        if ($rslt->num_rows) {
            echo "<script type='text/javascript'>$.notify('You Already Applied..','info')</script>";
        }
        else{

            $r1name=$_POST['r1name']; $r2name=$_POST['r2name']; $r3name=$_POST['r3name'];
            $r4name=$_POST['r4name']; $r5name=$_POST['r5name']; $r6name=$_POST['r6name'];
            $r1id=$_POST['r1id']; $r2id=$_POST['r2id']; $r3id=$_POST['r3id']; 
            $r4id=$_POST['r4id']; $r5id=$_POST['r5id']; $r6id=$_POST['r6id']; 
            $r1phn=$_POST['r1phn']; $r2phn=$_POST['r2phn']; $r3phn=$_POST['r3phn']; 
            $r4phn=$_POST['r4phn']; $r5phn=$_POST['r5phn']; $r6phn=$_POST['r6phn']; 
            $rchoice1=$_POST['rchoice1']; $rchoice2=$_POST['rchoice2']; $rchoice3=$_POST['rchoice3']; 
            $proom=$_POST['proom'];

            $ln=strlen($rchoice1);
            $rr="";
            for($i=0; $i<$ln; $i++){
                if($rchoice1[$i]!=' ' and $rchoice1[$i]!='-') $rr.=$rchoice1[$i];
            }
            $rchoice1=$rr;

            $rr2=""; $ln=strlen($rchoice2);
            for($i=0; $i<$ln; $i++){
                if($rchoice2[$i]!=' ' and $rchoice2[$i]!='-') $rr2.=$rchoice2[$i];
            }
            $rchoice2=$rr2;
            
            $rr3=""; $ln=strlen($rchoice3);
            for($i=0; $i<$ln; $i++){
                if($rchoice3[$i]!=' ' and $rchoice3[$i]!='-') $rr3.=$rchoice3[$i];
            }
            $rchoice3=$rr3;
            
            $sql="INSERT INTO room_allotment(Username, Present_Room, R1name, R1ID, R1Contact, R2name, R2ID, R2Contact, R3name, R3ID, R3Contact, R4name, R4ID, R4Contact, R5name, R5ID, R5Contact, R6name, R6ID, R6Contact, R1Choice, R2Choice, R3Choice) VALUES('$user','$proom', '$r1name', '$r1id', '$r1phn', '$r2name', '$r2id', '$r2phn', '$r3name', '$r3id', '$r3phn', '$r4name', '$r4id', '$r4phn', '$r5name', '$r5id', '$r5phn', '$r6name', '$r6id', '$r6phn', '$rchoice1', '$rchoice2', '$rchoice3')";

            if(mysqli_query($conn, $sql)){
                echo "<script type='text/javascript'>$.notify('Application Successful..','success')</script>";
            }
            else{
                echo "<script type='text/javascript'>$.notify('Oooops.. An Error Occured.','warn')</script>";
                echo mysqli_error($conn);
            }
        }
    }
?>
    <?php include('header.php'); ?>
    <div class="w3-row w3-teal">
        <div class="w3-col w3-container w3-teal" style="width:10%;"></div>
                <div class="w3-col w3-container w3-khaki" style="width:80%;">
                <h2 style="text-align: center;">Room Allotment Application Form</h2><hr>
                    <left>
                        <div class="container w3-khaki" style="">
                            <form id="html5Form"  class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                                <div style="margin-left: "> 

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-2" for="fname">First Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="fname" name="fname" value="" placeholder="Enter First Name" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-2" for="lname">Last Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="lname" name="lname" value="" placeholder="Enter Last Name" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-2">Student ID:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="20" pattern="[0-9]+" class="form-control" id="stid" name="stid" placeholder="Enter Student ID" required>
                                    </div>
                                </div><br>

                                 <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-2" for="proom">Present Room:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="20" pattern="[abcdABCD0-9 -]+" class="form-control" id="proom" name="proom" placeholder="Enter Room No" required>
                                    </div>
                                </div><br><br><br>
                               
                               
                                <div class="form-group" style="text-align: right">
                                    <label class="control-label col-sm-2" for="r1name">Roommate 1:</label>
                                    <div class="col-sm-3">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="r1name" name="r1name" value="" placeholder="Enter Roommate Name" required>
                                    </div>
                                </div>
                                <div class="form-group" style="text-align: right">
                                    <label class="control-label col-sm-1" for="r1id">ID:</label>
                                    <div class="col-sm-2">
                                        <input type="text" maxlength="30" pattern="[0-9]+" class="form-control" id="r1id" name="r1id" value="" placeholder="Enter ID" required>
                                    </div>
                                </div>
                              

                                <div class="form-group" style="text-shadow: right">
                                    <label class="control-label col-sm-1" for="r1phn">Contact:</label>
                                    <div class="col-sm-3" style="">
                                        <input type="text" maxlength="20" pattern="[0-9+]+" class="form-control" id="r1phn" name="r1phn" value="" placeholder="Enter Contact No" required>
                                    </div>
                                </div><br>

                                 <div class="form-group" style="text-align: right">
                                    <label class="control-label col-sm-2" for="r1name">Roommate 2:</label>
                                    <div class="col-sm-3">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="r2name" name="r2name" value="" placeholder="Enter Roommate Name" required>
                                    </div>
                                </div>
                                <div class="form-group" style="text-align: right">
                                    <label class="control-label col-sm-1" for="r2id">ID:</label>
                                    <div class="col-sm-2">
                                        <input type="text" maxlength="30" pattern="[0-9]+" class="form-control" id="r2id" name="r2id" value="" placeholder="Enter ID" required>
                                    </div>
                                </div>
                              

                                <div class="form-group" style="text-shadow: right">
                                    <label class="control-label col-sm-1" for="r2phn">Contact:</label>
                                    <div class="col-sm-3" style="">
                                        <input type="text" maxlength="20" pattern="[0-9+]+" class="form-control" id="r2phn" name="r2phn" value="" placeholder="Enter Contact No" required>
                                    </div>
                                </div><br>

                                 <div class="form-group" style="text-align: right">
                                    <label class="control-label col-sm-2" for="r3name">Roommate 3:</label>
                                    <div class="col-sm-3">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="r3name" name="r3name" value="" placeholder="Enter Roommate Name" required>
                                    </div>
                                </div>
                                <div class="form-group" style="text-align: right">
                                    <label class="control-label col-sm-1" for="r3id">ID:</label>
                                    <div class="col-sm-2">
                                        <input type="text" maxlength="30" pattern="[0-9]+" class="form-control" id="r3id" name="r3id" value="" placeholder="Enter ID" required>
                                    </div>
                                </div>
                              

                                <div class="form-group" style="text-shadow: right">
                                    <label class="control-label col-sm-1" for="r3phn">Contact:</label>
                                    <div class="col-sm-3" style="">
                                        <input type="text" maxlength="20" pattern="[0-9+]+" class="form-control" id="r3phn" name="r3phn" value="" placeholder="Enter Contact No" required>
                                    </div>
                                </div><br>
                                 <div class="form-group" style="text-align: right">
                                    <label class="control-label col-sm-2" for="r4name">Roommate 4:</label>
                                    <div class="col-sm-3">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="r4name" name="r4name" value="" placeholder="Enter Roommate Name" required>
                                    </div>
                                </div>
                                <div class="form-group" style="text-align: right">
                                    <label class="control-label col-sm-1" for="r4id">ID:</label>
                                    <div class="col-sm-2">
                                        <input type="text" maxlength="30" pattern="[0-9]+" class="form-control" id="r4id" name="r4id" value="" placeholder="Enter ID" required>
                                    </div>
                                </div>
                              

                                <div class="form-group" style="text-shadow: right">
                                    <label class="control-label col-sm-1" for="r4phn">Contact:</label>
                                    <div class="col-sm-3" style="">
                                        <input type="text" maxlength="20" pattern="[0-9+]+" class="form-control" id="r4phn" name="r4phn" value="" placeholder="Enter Contact No" required>
                                    </div>
                                </div><br>

                                 <div class="form-group" style="text-align: right">
                                    <label class="control-label col-sm-2" for="r1name">Roommate 5:</label>
                                    <div class="col-sm-3">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="r5name" name="r5name" value="" placeholder="Enter Roommate Name">
                                    </div>
                                </div>
                                <div class="form-group" style="text-align: right">
                                    <label class="control-label col-sm-1" for="r5id">ID:</label>
                                    <div class="col-sm-2">
                                        <input type="text" maxlength="30" pattern="[0-9]+" class="form-control" id="r5id" name="r5id" value="" placeholder="Enter ID" >
                                    </div>
                                </div>
                              

                                <div class="form-group" style="text-shadow: right">
                                    <label class="control-label col-sm-1" for="r5phn">Contact:</label>
                                    <div class="col-sm-3" style="">
                                        <input type="text" maxlength="20" pattern="[0-9+]+" class="form-control" id="r5phn" name="r5phn" value="" placeholder="Enter Contact No">
                                    </div>
                                </div><br>

                                 <div class="form-group" style="text-align: right">
                                    <label class="control-label col-sm-2" for="r1name">Roommate 6:</label>
                                    <div class="col-sm-3">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="r6name" name="r6name" value="" placeholder="Enter Roommate Name">
                                    </div>
                                </div>
                                <div class="form-group" style="text-align: right">
                                    <label class="control-label col-sm-1" for="r5id">ID:</label>
                                    <div class="col-sm-2">
                                        <input type="text" maxlength="30" pattern="[0-9]+" class="form-control" id="r6id" name="r6id" value="" placeholder="Enter ID" >
                                    </div>
                                </div>
                              

                                <div class="form-group" style="text-shadow: right">
                                    <label class="control-label col-sm-1" for="r6phn">Contact:</label>
                                    <div class="col-sm-3" style="">
                                        <input type="text" maxlength="20" pattern="[0-9+]+" class="form-control" id="r6phn" name="r6phn" value="" placeholder="Enter Contact No">
                                    </div>
                                </div><br><br><br>

                                <div class="form-group" style="text-align: right">
                                    <label class="control-label col-sm-2" for="rchoice1">Room Choice 1:</label>
                                    <div class="col-sm-2">
                                        <input type="text" maxlength="30" pattern="[abcdABCD0-9 -]+" class="form-control" id="rchoice1" name="rchoice1" value="" placeholder="Room 1" required>
                                    </div>
                                </div>
                                
                                <div class="form-group" style="text-align: right">
                                    <label class="control-label col-sm-2" for="rchoice2">Room Choice 2:</label>
                                    <div class="col-sm-2">
                                        <input type="text" maxlength="30" pattern="[abcdABCD0-9 -]+" class="form-control" id="rchoice2" name="rchoice2" value="" placeholder="Room 2">
                                    </div>
                                </div>

                                <div class="form-group" style="text-align: right">
                                    <label class="control-label col-sm-2" for="rchoice3">Room Choice 3:</label>
                                    <div class="col-sm-2">
                                        <input type="text" maxlength="30" pattern="[abcdABCD0-9 -]+" class="form-control" id="rchoice3" name="rchoice3" value="" placeholder="Room 3">
                                    </div>
                            </div> <br><br>
                                <div class="form-group" style="text-align: center;">
                                    <label style="color: red; font-size: 110%"><b>**Please Recheck Your Information Before Submit**</b></label>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-7">
                                        <button class="button" type="submit" name="apply" id="apply"><b><span>Apply</span></b></button>
                                    </div><br><br>
                                </div>
                            </form>
                        </div>
                        <br>
                        </left>
                </div>
            <div class="w3-col w3-container w3-teal" style="width:10%;"> </div>

        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>