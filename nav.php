<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/lib/w3.css">
<link rel="stylesheet" href="css/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<body class="w3-container">
<style type="text/css">
  .active{
    position:fixed;
    width:100%;
    z-index:1
    top:0;
  }
  .noromal{
    position:relative;
    width:100%;
    z-index:1
    top:0;
  }
</style>
<script>
// Open and close the sidenav on medium and small screens
function w3_open() {
    document.getElementsByClassName("w3-sidenav")[0].style.display = "block";
    document.getElementsByClassName("w3-overlay")[0].style.display = "block";
}
function w3_close() {
    document.getElementsByClassName("w3-sidenav")[0].style.display = "none";
    document.getElementsByClassName("w3-overlay")[0].style.display = "none";
}

// Change style of top container on scroll
window.onscroll = function() {myFunction()};

function myFunction() {
    if (document.body.scrollTop > 220 || document.documentElement.scrollTop > 220) {
        document.getElementById("myTop").classList.add("w3-card-4");
        document.getElementById("myTop").classList.add("w3-show-inline-block");
    } else {
        document.getElementById("myTop").classList.remove("w3-show-inline-block");
        document.getElementById("myTop").classList.remove("w3-card-4");
      }
}


</script>
 
<div style="width:100%; margin-left: -16px;" id="myTop" class="w3-hide w3-top w3-container w3-padding-hor-10 w3-theme w3-large">
  <i class="w3-opennav w3-hide-large w3-xlarge " onclick="w3_open()"></i>
  <!--<span id="myIntro" class="w3-hide">-->
    <ul class="w3-navbar w3-card-2 w3-indigo w3-text-white">
    <li  class="w3-hover-red"><a class="w3-hover-cyan" href="home.php"><i class="fa fa-home w3-large w3-text-black"></i> Home</a></li>
  <li class="w3-hover-red"><a class="w3-hover-cyan" href="galary.php">Galary</a></li>
  <li class="w3-hover-red"><a class="w3-hover-cyan" href="notice_profile.php">Notice</a></li>
  <li class="w3-dropdown-hover w3-hover-red">
    <a  class="w3-hover-cyan" href="#">Hall Administration <i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-cyan w3-card-4" style="font-size:85%">
      <a href="Hall_residence_application.php">Hall Residence Application</a>
      <a href="Room_allotment_application.php">Room Allotment Application</a>
      <a href="Hall_fees_application.php">Hall Fees</a>
    </div>
  </li><!--
  <li class="w3-rest">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </li>    -->
  <div style="float: right;">
  <li  class="w3-right"><a class="w3-hover-cyan" href="signup.php"><i class="fa fa-user-plus w3-large w3-text-black"></i> Register</a></li>
  <li class="w3-hover-red w3-right"><a class="w3-hover-cyan" href="login.php"><i class="fa fa-sign-in w3-large w3-text-black"></i> Enter</a></li>
  </div>
</ul>
  <!--</span>-->
</div>
<!--
  <div class="w3-row w3-container w3-card-2 w3-aqua">
    <div class="w3-col w3-container" style="width:150px;"><a class="w3-hover-cyan" href="#"><i class="fa fa-home w3-large"></i> Home</a></div>
    <div class="w3-col w3-container" style="width:150px;"><a class="w3-hover-cyan" href="#">Link 1</a></div>
    <div class="w3-col w3-container w3-dropdown-hover" style="width:150px;">
      <a  class="w3-hover-cyan" href="#">Dropdown<i class="fa fa-caret-down"></i></a>
      <div class="w3-dropdown-content w3-white w3-card-4">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
      </div>
    </div>
    <div class="w3-col w3-container" style="width:500px;"></div>
    <div  class="w3-col w3-container w3-right" style="width:150px;"><a class="w3-hover-cyan" href="signup.php"><i class="fa fa-registered w3-large"></i> Register</a></div>
    <div class="w3-col w3-container w3-right" style="width:150px;"><a class="w3-hover-cyan" href="login.php"><i class="fa fa-sign-in w3-large"></i> Enter</a></div>
  </div>   -->

<b>
<ul class="w3-navbar">
<ul  class="w3-navbar w3-card-4 w3-indigo w3-text-white" style="background-color:#449d44;">
    <li  class="w3-hover-red"><a class="w3-hover-cyan" href="home.php"><i class="fa fa-home w3-large w3-text-black"></i> Home</a></li>
  <li class="w3-hover-red"><a class="w3-hover-cyan" href="galary.php">Galary</a></li>
  <li class="w3-hover-red"><a class="w3-hover-cyan" href="notice_profile.php">Notice</a></li>
  <li class="w3-dropdown-hover w3-hover-red">
    <a  class="w3-hover-cyan" href="#">Hall Administration <i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-cyan w3-card-4" style="font-size:85%">
      <a href="Hall_residence_application.php">Hall Residence Application</a>
      <a href="Room_allotment_application.php">Room Allotment Application</a>
      <a href="Hall_fees_application.php">Hall Fees</a>
    </div>
  </li>
  <li  class="w3-right"><a class="w3-hover-cyan" href="signup.php"><i class="fa fa-user-plus w3-large w3-text-black"></i> Register</a></li>
  <li class="w3-hover-red w3-right"><a class="w3-hover-cyan" href="login.php"><i class="fa fa-sign-in w3-large w3-text-black"></i> Enter</a></li>
</ul>
</ul>
</b>   
</body>

</html> 
