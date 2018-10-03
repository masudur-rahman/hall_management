<html lang="en">
<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['link'])){
        $_SESSION['link']='home.php';
    }
    $link=$_SESSION['link'];
    $_SESSION['link']='Hall_fees_application.php';
    $conn=mysqli_connect("localhost", "root", "", "hall_management");
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
            margin-left: 100px;
            margin-right: 100px;
        }

        #t02{
            background-color: #aaa;
            color: white;
        }
        #dd{
            margin: 10px 50px 20px 50px;
        }
        #mm{
            margin: 10px 45px 20px 40px;
        }
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
    if (isset($_POST['submit'])){
        $level=$_POST['level']; $term=$_POST['term'];
        $fname=$_POST['fname']; $lname=$_POST['lname']; $stid=$_POST['stid'];
        $filename = $_FILES["bank_reciept"]["name"];
        $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
        $file_ext = substr($filename, strripos($filename, '.')); // get file name
        $filesize = $_FILES["bank_reciept"]["size"];
        $allowed_file_types = array('.jpg','.jpeg','.png','.gif','.JPG','.JPEG','.PNG','.GIF');  

        if (in_array($file_ext,$allowed_file_types) && ($filesize < 20000000000)){
            $newfilename = md5('12ab34cd56ef'). $file_ext;
            move_uploaded_file($_FILES["bank_reciept"]["tmp_name"], "uploads/" . $newfilename);
            rename('uploads/'.$newfilename, 'uploads/'.$_SESSION['username'].$level.$term.$file_ext);
            $newfilename='uploads/'.$_SESSION['username'].$level.$term.$file_ext;
            echo "<script type='text/javascript'>$.notify('Upload Successful..','success')</script>";
            $sql="INSERT INTO temporary_hall_fees(Username, StID, Fname, Lname, Level, Term, Pic) VALUES('$user', '$stid', '$fname', '$lname', '$level', '$term', '$newfilename')";
            if(mysqli_query($conn,$sql)){
                echo "<script type='text/javascript'>$.notify('Your Payment has been acknowledged..','success')</script>";
            }
            else echo "<script type='text/javascript'>$.notify('Ooopss.Error Occured..','warn')</script>";
            
        }
        elseif ($filesize > 20000000000){
            echo "<script type='text/javascript'>$.notify('The file you are trying to upload is too large..','warn')</script>";
        }
        else if(!empty($file_basename)){
            echo "<script type='text/javascript'>$.notify('Only jpg, jpeg, png and gif files are allowed..','warn')</script>";
            unlink($_FILES["bank_reciept"]["tmp_name"]);
        }

    }
?>
    <?php include('header.php'); ?>
    <div class="w3-row w3-teal">
        <div class="w3-col w3-container w3-teal" style="width:15%;"></div>
        <div class="w3-col w3-container w3-khaki" style="width: 70%;">
            <h2 style="text-align: center; font-family: Imprint MT Shadow;">Hall Fees Payment</h2><hr>
            <div id="dd">
                <table id="t01">
                <tr id="t02">
                    <th id="t03">LEVEL</th>
                    <th id="t03">TERM</th>      
                    <th id="t03">Payment Status</th>
                    <th id="t03">Comment</th>
                </tr>
                
                <?php
                    $sql="SELECT * FROM hall_fees WHERE Username='$user'";
                    $rslt=mysqli_query($conn, $sql);
                    $row=mysqli_fetch_assoc($rslt);
                    
                ?>
                <tr>
                    <th id="t03">Level-1</th>
                    <th id="t03">Term-1</th>      
                    <th id="t03"><?php echo $row['L1T1']; ?></th>
                    <th id="t03"></th>
                </tr>
                <tr>
                    <th id="t03">Level-1</th>
                    <th id="t03">Term-2</th>      
                    <th id="t03"><?php echo $row['L1T2']; ?></th>
                    <th id="t03"></th>
                </tr>
                <tr>
                    <th id="t03">Level-2</th>
                    <th id="t03">Term-1</th>      
                    <th id="t03"><?php echo $row['L2T1']; ?></th>
                    <th id="t03"></th>
                </tr>
                <tr>
                    <th id="t03">Level-2</th>
                    <th id="t03">Term-2</th>      
                    <th id="t03"><?php echo $row['L2T2']; ?></th>
                    <th id="t03"></th>
                </tr>
                <tr>
                    <th id="t03">Level-3</th>
                    <th id="t03">Term-1</th>      
                    <th id="t03"><?php echo $row['L3T1']; ?></th>
                    <th id="t03"></th>
                </tr>
                <tr>
                    <th id="t03">Level-3</th>
                    <th id="t03">Term-2</th>      
                    <th id="t03"><?php echo $row['L3T2']; ?></th>
                    <th id="t03"></th>
                </tr>
                <tr>
                    <th id="t03">Level-4</th>
                    <th id="t03">Term-1</th>      
                    <th id="t03"><?php echo $row['L4T1']; ?></th>
                    <th id="t03"></th>
                </tr>
                <tr>
                    <th id="t03">Level-4</th>
                    <th id="t03">Term-2</th>      
                    <th id="t03"><?php echo $row['L4T2']; ?></th>
                    <th id="t03"></th>
                </tr>
                </table>
            </div><br>

            <h2 style="text-align: center; font-family: Imprint MT Shadow;">Make New Payment</h2><hr>
            <div id="mm">
                <form id="html5Form"  class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data"> 
                        <div class="form-group" style="text-align: left;">
                            <label class="control-label col-sm-4" for="fname" style="font-size: 115%;">First Name:</label>
                            <div class="col-sm-5">
                                <input type="text" maxlength="30" pattern="[a-zA-Z .]+" class="form-control" id="fname" name="fname" value="" placeholder="Enter First Name" required>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: left;">
                            <label class="control-label col-sm-4" for="fname" style="font-size: 115%;">Last Name:</label>
                            <div class="col-sm-5">
                                <input type="text" maxlength="30" pattern="[a-zA-Z .]+" class="form-control" id="lname" name="lname" value="" placeholder="Enter Last Name" required>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: left;">
                            <label class="control-label col-sm-4" for="stid" style="font-size: 115%;">Student ID:</label>
                            <div class="col-sm-5">
                                <input type="text" maxlength="30" pattern="[0-9]+" class="form-control" id="stid" name="stid" value="" placeholder="Enter Student ID" required>
                            </div>
                        </div><br><br>

                        <div class="form-group" style="text-align: left;">
                            <label class="control-label col-sm-4" for="level" style="font-size: 115%; text-align: left; ">Level:</label>
                            <div class="col-sm-7" style="margin-left: 0px">
                                <select name="level" style="font-size: 115%;">
                                    <option style="font-size: 115%;" value="Level-1">Level-1&nbsp;&nbsp;&nbsp;</option>
                                    <option style="font-size: 115%;" value="Level-2">Level-2</option>
                                    <option style="font-size: 115%;" value="Level-3">Level-3</option>
                                    <option style="font-size: 115%;" value="Level-4">Level-4</option>
                                </select>
                            </div>
                        </div><br>

                        <div class="form-group" style="text-align: left;">
                            <label class="control-label col-sm-4" for="term" style="font-size: 115%; text-align: left;">Term:</label>
                            <div class="col-sm-3" style="margin-left: 0px">
                                <select name="term" style="font-size: 115%;">
                                    <option style="font-size: 115%;" value="Term-1">Term-1&nbsp;&nbsp;&nbsp;</option>
                                    <option style="font-size: 115%;" value="Term-2">Term-2</option>
                                </select>
                            </div>
                        </div><br><br>

                        <div class="form-group" style="text-align: left;">
                            <label class="control-label col-sm-4" for="stid" style="font-size: 115%;">Upload Bank Reciept:</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" id="bank_reciept" name="bank_reciept" placeholder="UploaD Image of Bank Reciept:" required>
                            </div>
                        </div><br><br>
                        <div class="form-group" style="text-align: center;">
                            <button class="button" type="submit" id="submit" name="submit"><b><span>Submit</span></b></button><br>
                        </div>
                </form><br>
            </div>
    <div class="w3-col w3-container w3-teal" style="width:15%;"> </div>

</div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>