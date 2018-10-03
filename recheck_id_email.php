<?php
  
  $host="localhost";
  $user="root";
  $pass="";
  $dbname="hall_management";
  
  $dbcon = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
  
  if($_POST) 
  {
    $userid= strip_tags($_POST['userid']);  
    $stmt=$dbcon->prepare("SELECT Username FROM student_info WHERE username=:userid");
    $stmt->execute(array(':userid'=>$userid));
    $count=$stmt->rowCount();

    $email=strip_tags($_POST['email']);
    $stmt=$dbcon->prepare("SELECT Username FROM student_info WHERE Email=:email");
    $stmt->execute(array(':email'=>$email));
    $count1=$stmt->rowCount();

   if($count>0 or $count1>0 or $_POST['pwd']!=$_POST['rpwd'] or strlen($_POST['pwd'])<5)
   {
    echo "page1<br>";
      echo "<script type='text/javascript'>alert('Recheck your Information')</script>";
      echo "<script> window.location.assign('signup.php'); </script>";
   }
   else{
    echo "page2";
    if(isset($_POST["submit"])){
    $servername="localhost";
    $username="root";
    $pass="";
    $dbname="hall_management";
    $conn=mysqli_connect($servername, $username, $pass, $dbname);
    if(!$conn->connect_error){
      $sql = "INSERT INTO student_info(Username,Password, Fname, Lname, StID, Email, Mobile) 
      VALUES ('".$_POST["userid"]."','".$_POST["pwd"]."','".$_POST["fname"]."','".$_POST["lname"]."',".$_POST["stid"].",'".$_POST["email"]."','".$_POST["phn"]."')";
    }
    if($conn->query($sql)){
      echo "Registration Successful...";
      header('Refresh: 1; URL = login_tmp.php');
      //echo "<script> window.location.assign('login.php'); </script>";
    }
  }
      
   }
  }
?>