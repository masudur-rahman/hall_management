<!DOCTYPE html>
<html>
<title>Footer</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/lib/w3.css">
<body>

<!-- location division -->
<div class="w3-row w3-green w3-container" style="background: green; font-family:Imprint MT Shadow;">
 <div class="w3-col w3-container" style="width:34%">

<div >
	<h2 style="text-align: left;font-family:Imprint MT Shadow;">&nbsp;&nbsp;&nbsp;&nbsp;Location</h2>
	
<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var myCenter=new google.maps.LatLng(22.4602102,91.9694002);
var marker;

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:17,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="googleMap" style="width:70%;height:200px; margin:20px 0px 30px 30px"></div>
</div> 
</div>


 <!-- CONTACT US DIVISION -->



  <div class="w3-col w3-container" style="width:33%">
  	<h2 style="text-align: left;font-family:Imprint MT Shadow;">Contact Us</h2>
  	<p>Provost</p>
  	<p>Bangabandhu Hall, CUET</p>
    <p>Chittagong-4349</p>
  	<p>Phone: +88001521483266</p>
  	<p>Email: bangabandhuhallcuet@gmail.com</p>
  </div>


  <!-- COPYRIGHT DIVISION-->
  <div class="w3-col w3-container" style="width:33%">
  <h2 style="text-align: left; font-family:Imprint MT Shadow;">Copyright</h2>
  <p>All Rights Reserved © 2016</p>
  <P>Bangabandhu Hall, CUET</p>
  <p>Developed By</p>
  <p>MASUDUR RAHMAN, OMAR SHARIF</p>
  </div>

</div>

</body>
</html>
        
