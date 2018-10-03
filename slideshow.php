<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/lib/w3.css">
<style>
.mySlides {
  display:none;
  
}
.brdr{
  border: 0px solid black;
  width: 63vw; height: 37vw;
}
.w3-section{
  

}
</style>
<body> <br>
<div class="brdr w3-content">
  <div class="w3-content w3-section " style="width: 70vw; margin-left: -50px">
    <img class="mySlides w3-animate-fading-masud" src="images/b (1).jpg" style="width:100%; height:93%">
    <img class="mySlides w3-animate-fading-masud" src="images/b (2).jpg" style="width:100%; height:93%">
    <img class="mySlides w3-animate-fading-masud" src="images/b (3).jpg" style="width:100%; height:93%">
    <img class="mySlides w3-animate-fading-masud" src="images/b (4).jpg" style="width:100%; height:93%">
    <img class="mySlides w3-animate-fading-masud" src="images/b (5).jpg" style="width:100%; height:93%">
  </div>
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 5000); 
}
</script>

</body>

<!-- Mirrored from www.w3schools.com/w3css/tryit.asp?filename=tryw3css_slideshow_rr by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Apr 2016 07:27:04 GMT -->
</html> 
