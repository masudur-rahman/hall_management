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

    if(!isset($_SESSION['link'])){
        $_SESSION['link']='home.php';
    }
    $link=$_SESSION['link'];
    if (!isset($_SESSION['username'])) {
        //$_SESSION['link']='Hall_residence_application.php';
        $_SESSION['info']="<script type='text/javascript'>$.notify('You need to login first..','info')</script>";
        //$_SESSION['info']='You need to login first..';
        //echo $link;
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
    <style>
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
        button#b {
            background-color: Transparent;
            background-repeat:no-repeat;
            border: none;
            cursor:pointer;
            overflow: hidden;
            outline:none;
        }
        button#c {
            color: green;
            background: khaki;
            font-size: 120%;
        }
        button#d {
            color: red;
            background: khaki;
            font-size: 120%;
            margin-left: 22px ;
        }
        #dd{
            margin: 10px 30px 20px 30px;
        }
    </style>
<body>

    <?php 
        if(isset($_POST['approve'])){
            $sql="UPDATE manager SET Check_Mgr=2 WHERE Check_Mgr=1";
            mysqli_query($conn, $sql);
            $id=$_POST['approve'];
            $sql="UPDATE manager SET Check_Mgr=1, Start_Date=CURDATE(), End_Date=DATE_ADD(CURDATE(), INTERVAL 30 DAY) WHERE ID=$id";
            if(mysqli_query($conn, $sql)){
                echo "<script type='text/javascript'>$.notify('Successfully Approved','success')</script>";
                $sql="DELETE FROM manager WHERE Check_Mgr=0";
                mysqli_query($conn, $sql);
            }
            else echo "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }
        if(isset($_POST['deny'])){
            $id=$_POST['deny'];
            $sql="DELETE FROM manager WHERE ID=$id";
            if(mysqli_query($conn, $sql)){
                echo "<script type='text/javascript'>$.notify('Successfully Rejected','success')</script>";
            }
            else echo "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }
    ?>

    <?php include('header.php'); ?>
        <div class="w3-row w3-khaki">
        
        
        <div class="w3-col w3-container w3-teall" style="width: 100%; background: rgb(12, 141, 154)">
            <center><h2 style="font-family: Imprint MT shadow; color: cyan">Applied Manager List</h2></center> <hr>
            <div id="dd" style="background : khaki">
                <table id="t01">
                    <tr id="t02">
                        <th id="t03">Name</th>      
                        <th id="t03">Student ID</th>
                        <th id="t03">Room No</th>
                        <th id="t03">Contact No</th>
                        <th id="t03">Token</th>
                        <th id="t03">Response</th>
                    </tr>
                    <?php
                        $sql="SELECT * FROM manager WHERE Check_Mgr=0";
                        $rslt=mysqli_query($conn, $sql);

                        if(mysqli_num_rows($rslt)){
                            while($row=mysqli_fetch_assoc($rslt)){
                                $id=$row['ID']; $name=$row['MgrName']; $stid=$row['StID']; $room=$row['Room_No']; $contact=$row['Contact_No']; $token=$row['Upload']; ?>
                                <tr><td id='t03'><?php echo $name; ?></td><td id='t03'><?php echo $stid; ?></td>
                                <td id='t03'><?php echo $room; ?></td><td id='t03'><?php echo $contact; ?></td><td id='t03'><a href='<?php echo $token;?>' target='_blank' style='font-size:115%'>View</a></td><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST'><td id='t03'><button id='c' name='approve' value='<?php echo $id; ?>'>&#10004</button><button name='deny' id='d' value='<?php echo $id; ?>'>&#10008</button></td></form>

                            <?php }}?>
                        
                    
                </table>
            </div>
            <br><br>
        </div>

    
    <?php include('footer.php'); ?>
</body>
</html>