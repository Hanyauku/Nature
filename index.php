<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>

<head>
<title>W3.CSS</title>
<link rel="stylesheet" href="/css/mijnstyle.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>

<div class="w3-sidebar w3-bar-block w3-dark-grey w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="#" class="w3-bar-item w3-button">Link 1</a>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
</div>

<div class="container"> 
    <div id="map"></div>
    <button class="btn" onclick="w3_open()">&#9776;</button>
    
</div>

        

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>

<!-- google map  -->
<script>
        var map;
        function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 10.037054, lng: -83.350640},
            zoom: 8,
            mapTypeId: 'satellite'
        });
        }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAICFxqTR1DqfTU7GzNyxRyJTNYrCSaCao&callback=initMap"
async defer></script>
     
</body>
