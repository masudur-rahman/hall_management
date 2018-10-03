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
                echo "<script type='text/javascript'>$.notify('Successfully Alloted','success')</script>";
                mysqli_query($conn, $dlt);
            }
            else echo "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }

        else if(mysqli_num_rows(mysqli_query($conn, $sql2))){
            $upd="UPDATE room SET R1name='$R1name', R1ID='$R1ID', R2name='$R2name', R2ID='$R2ID' , R3name='$R3name' , R3ID='$R3ID' , R4name='$R4name' , R4ID='$R4ID' , R5name='$R5name' , R5ID='$R5ID' , R6name='$R6name' , R6ID='$R6ID', Occupied=$Occupied  WHERE Room_No='$room2'";
            if(mysqli_query($conn, $upd)){
                echo "<script type='text/javascript'>$.notify('Successfully Alloted','success')</script>";
                mysqli_query($conn, $dlt);
            }
            else echo "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }

        else if(mysqli_num_rows(mysqli_query($conn, $sql3))){
            $upd="UPDATE room SET R1name='$R1name', R1ID='$R1ID', R2name='$R2name', R2ID='$R2ID' , R3name='$R3name' , R3ID='$R3ID' , R4name='$R4name' , R4ID='$R4ID' , R5name='$R5name' , R5ID='$R5ID' , R6name='$R6name' , R6ID='$R6ID', Occupied=$Occupied  WHERE Room_No='$room3'";
            if(mysqli_query($conn, $upd)){
                echo "<script type='text/javascript'>$.notify('Successfully Alloted','success')</script>";
                mysqli_query($conn, $dlt);
            }
            else echo "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }
        else{
            $sql="SELECT Room_No FROM room where Occupied=0";
            $rslt=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($rslt);
            $room=$row['Room_No'];
            $upd="UPDATE room SET R1name='$R1name', R1ID='$R1ID', R2name='$R2name', R2ID='$R2ID' , R3name='$R3name' , R3ID='$R3ID' , R4name='$R4name' , R4ID='$R4ID' , R5name='$R5name' , R5ID='$R5ID' , R6name='$R6name' , R6ID='$R6ID', Occupied=$Occupied  WHERE Room_No='$room'";
            if(mysqli_query($conn, $upd)){
                echo "<script type='text/javascript'>$.notify('Successfully Alloted','success')</script>";
                mysqli_query($conn, $dlt);
            }
            else echo "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
        }
    }
    else if(isset($_POST['deny'])){
        $user=$_POST['deny'];
        $dlt="DELETE FROM room_allotment WHERE room_allotment.Username='$user'";
        if(mysqli_query($conn, $dlt)){
            echo "<script type='text/javascript'>$.notify('Successfully Denied','success')</script>";
        }
        else echo "<script type='text/javascript'>$.notify('Ooopss! an error occured..','warn')</script>";
    }
    ?>

    <?php include('header.php'); ?>
        <div class="w3-row w3-khaki">
        
        
        <div class="w3-col w3-container w3-teall" style="width: 100%; background: rgb(12, 141, 154)">
            <center><h2 style="font-family: Imprint MT shadow; color: cyan">Applicant's List</h2></center> <hr>
            <div id="dd" style="background : khaki">
                <table id="t01">
                    <tr id="t02">
                        <th id="t03">Username</th>
                        <th id="t03">Student ID</th>      
                        <th id="t03">First Name</th>
                        <th id="t03">Last Name</th>
                        <th id="t03">Response</th>
                    </tr>
                    <?php

                        $sql="SELECT Username FROM room_allotment LIMIT 0,25";
                        $rslt=mysqli_query($conn, $sql);

                        if(mysqli_num_rows($rslt)){
                            while($row=mysqli_fetch_assoc($rslt)){ 
                            /*echo "<tr><td>",$row["Username"],"</td><td>",$row["StID"],"</td><td>",$row["Fname"],"</td><td>",$row["Lname"],"</td></tr>";*/
                            $a=$row["Username"];
                            $sql1="SELECT * FROM student_info where Username='$a'";
                            $rslt1=mysqli_query($conn, $sql1);
                            mysqli_query($conn, $sql1);
                            $row1=mysqli_fetch_assoc($rslt1);
                            $b=$row1['StID']; $c=$row1['Fname']; $d=$row1['Lname'];
                            //echo '<tr><td>$a</td></tr>';
                            $mod="document.getElementById('id01').style.display='block'";
                            $v=$_SERVER["PHP_SELF"];
                            echo "<tr><td id='t03'><form action='room_profile.php' target='_blank' method='POST'><button id='b' value='$a' name='app'>$a</button></form></td>
                                <td id='t03'><form action='room_profile.php' target='_blank' method='POST'><button id='b' value='$a' name='app'>$b</button></form></td>
                                <td id='t03'><form action='room_profile.php' target='_blank' method='POST'><button id='b' value='$a' name='app'>$c</button></form></td>
                                <td id='t03'><form action='room_profile.php' target='_blank' method='POST'><button id='b' value='$a' name='app'>$d</button></form></td>
                                <form action='$v' method='POST'><td id='t03'><button id='c' name='approve' value='$a'>&#10004</button><button name='deny' id='d' value='$a'>&#10008</button></td></form>
                                </tr>";
                            }
                            //style='background-color: transparent;'class='w3-btn w3-transparent w3-card-1'
                        }
                    ?>
                </table>
            </div>
            <br><br>
        </div>

    </div>
    
    <?php include('footer.php'); ?>
</body>
</html>