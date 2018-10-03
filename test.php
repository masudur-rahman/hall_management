<html lang="en">
<?php
?>
<head>
    <title>Hall Management System</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="css/lib/w3.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
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
    <script type="text/javascript" src="notify.min.js"></script>

        <style type="text/css">
        #bb{
            text-align: center;
            color: red;
        }
        #cc{
            text-align: center;
            color: green;
        }
    </style>
  
<script type="text/javascript">
    function getData(){       //this will read file and send information to other function
       var xmlhttp;

       if (window.XMLHttpRequest) {
           xmlhttp = new XMLHttpRequest();               
       }           
       else {               
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");               
       }

       xmlhttp.onreadystatechange = function () {               
           if (xmlhttp.readyState == 4) {                   
             var lines = xmlhttp.responseText;    //*here we get all lines from text file*

             intoArray(lines);     *//here we call function with parameter "lines*"                   
           }               
       }

       xmlhttp.open("GET", "https://gist.githubusercontent.com/deekayen/4148741/raw/01c6252ccc5b5fb307c1bb899c95989a8a284616/1-1000.txt", true);
       xmlhttp.send();    
    }

    function intoArray (lines) {
       // splitting all text data into array "\n" is splitting data from each new line
       //and saving each new line as each element*

       var lineArr = lines.split('\n'); 

       //just to check if it works output lineArr[index] as below
       document.write(lineArr[2]);         
       document.write(lineArr[3]);
    }
</script>
<script type="text/javascript">
function checkPasswordMatch() {
    var password = $("#pwd").val();
    var confirmPassword = $("#rpwd").val();
    
    var base=0;
    var flag=0,flag1=0,flag2=0,flag4=0;
    document.getElementById("result_p").innerHTML=lineArr[0];
    for(var i=0;i<password.length;i++){
        if(password[i]>='a' && password[i]<='z'){
            if(flag==0){
                base=base+26;
                flag=1;
            }
        }
        else if(password[i]>='A' && password[i]<='Z'){
            if(flag1==0){
                base=base+26;
                flag1=1;
            }
        }
        else if(password[i]>='0' && password[i]<='9'){
            if(flag2==0){
                base=base+10;
                flag2=1;
            }
        }
        else if(flag4==0){
            base+=20;
            flag4=1;
        }
    }
    document.getElementById("result_p").innerHTML=base;

}

$(document).ready(function () {
    $("#pwd", "#rpwd").keyup(getData);
    $("#pwd, #rpwd").keyup(checkPasswordMatch);
});

</script>
    </head>
<body>
    <center>
        <div class="w3-container w3-row w3-teal">

            <div class="w3-col" style="width: 10%;">
                <br>
            </div>

            <div class="w3-col w3-whitee" style="width: 80%;background: #3ee3a6; color: black; background-image: url(images/back4.jpg)">
                <h2 style="font-family:Imprint MT Shadow; color: brown;margin-top: 40px"><b>Sign Up Form</b></h2>
                <div class="w3-row" style="margin-top: 40px">
                    <div class="w3-col" style="width: 73%">
                        <div class="form-group" style="margin-top: 50px">
                          <label class="control-label col-sm-5" for="pwd">Password:</label>
                          <div class="col-sm-5">
                            <input title="Minimum length is 5" type="password" pattern="[a-zA-Z0-9_\.]+" maxlength="30" class="form-control" id="pwd" name="pwd" placeholder="Enter Password" required>
                          </div> 
                        </div><br>

                        <div class="form-group" style="margin-top: 50px">
                          <label class="control-label col-sm-5" for="rpwd">Retype Password:</label>
                          <div class="col-sm-5">          
                            <input type="password" class="form-control" class="form-control" id="rpwd" name="rpwd" placeholder="Confirm Password"  required>
                          </div>
                        </div><br>

                    </div>

                    <div class="w3-col" style="width: 27%">
                        <br><br>
                        <span id="result_p" style="float: left;"></span><br><br><br>
                        <span id="result_rp" style="float: left;"></span>
                    </div>

                 </div>
                 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
            
            <div class="w3-col" style="width: 10%">
                <br>
            </div>
        </div>
    </center>

    <?php include('footer.php'); ?>
</body>
</html>