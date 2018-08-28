<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>

<head>
<title>Adopt A Tree</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="/css/mijnstyle.css"/>
</head>

<body>
<!-- ====sidebar====== -->
<div class="w3-sidebar w3-bar-block w3-green w3-animate-left"  style="width:390px" id="mySidebar">
    <!-- clos bottun -->
    <button class="w3-bar-item w3-button w3-large" style="text-align: center;"onclick="w3_close()">Close &times;</button>
    <!-- sidcontaint -->
    <div class="sidcontaint">
        <h4><b>Take a look at your piece of rainforest</b></h4>
        <p>Are you one of our heroes and adopted a square meter<br> of costa rican rainforest? Fly to it and explore!</p>

        <form class="form-inline" action="data/searchFirst" method="post">
            <?php if(!empty($this->session->flashdata('input_error'))) { ?>
                <h5> <?= $this->session->flashdata('input_error') ?> </h5> <?php ;
            }?>
            <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
            <button type="submit" class="btn btn-default">Find</button>
        </form>
        <a href="http://www.adopteerregenwoud.nl/nl/adopteer/adopteer-regenwoud" class="btn " role="button">ADOPT A SQUARE METER FOR ONLY €2.50</a>

    </div>
</div>
<!-- page containt with map -->
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
            zoom: 13,
            mapTypeId: 'satellite'
        });

        var rectangle = new google.maps.Rectangle({
        map: map,
        bounds: new google.maps.LatLngBounds(
          new google.maps.LatLng(10.105276, -83.383103),
          new google.maps.LatLng(10.007095, -83.250103)
        ),

        fillcolor:"darkgreen",
        strokeColor: "green",
        editable:true,
        draggable:true
        });

        google.maps.event.addListener (rectangle, "bounds_changed", function (){
        document.getElementByid("info").innerHTML = rectangle.getBounds();

        })
        }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6nhveJrJGLPkqa6gpSgbQVyssBWM63oc&callback=initMap"
async defer></script>

</body>
