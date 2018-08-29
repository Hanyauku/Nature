<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// search fiel
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Adopt A Tree</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/css/mijnstyle.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </head>
    <body>
        <!-- ====sidebar====== -->
        <div class="w3-sidebar w3-bar-block w3-green w3-animate-left"  style="width:390px" id="mySidebar">
            <!-- clos bottun -->
            <button class="w3-bar-item w3-button w3-large" style="text-align: center;"onclick="w3_close()">Close &times;</button>
            <!-- sidcontaint -->
            <div class="sidcontaint">
                <div class="share">
            		<?= anchor("/pageloader/change/english","EN"); ?> | <?= anchor("/pageloader/change/dutch","NL"); ?>
                    <!-- add share button at header -->
            	</div>
                <div class="media">
                    <!-- show pictures $photos -->
                </div>
                <h2><?= $coordinates['latitude'] . "°N / " . $coordinates['longitude'] . "°W"?></h2>
                <p><?= $this->lang->line('owner_location') ?></p>
                <h4> <?= $this->session->userdata['username'] ?></h4>
                <p><?= $this->lang->line('meter_location') ?></p>
                <h4> <?= $coordinates['sqm'] . "m" ?><sup>2</sup></h4>
                <p><?= $this->lang->line('adopted_location') ?></p>
                <h4> <?= $sum['sum'] . "m" ?><sup>2</sup></h4>
            </div>
            <div class="sidbarfooter">
                <a href ="http://www.adopteerregenwoud.nl"><img src="/img/logo.png" alt="Nature Logo"></a>
            </div>
        </div>
        <!-- page containt with map -->
        <div class="container">
            <div id="map"></div>
            <button class="btn" onclick="w3_open()">&#9776;</button>
        </div>
        <script>
            // closing side bar
            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
            }
            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
            }
        </script>

        <!-- google map  -->
        <script>
            // loads map
            var map;
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 10.037054, lng: -83.350640},
                    zoom: 12.5,
                    mapTypeId: 'satellite',
                    mapTypeControl: false
                });

                // draws square for addopted territory
                var rectangle = new google.maps.Rectangle({
                    map: map,
                    bounds: new google.maps.LatLngBounds(
                    new google.maps.LatLng(10.105276, -83.383103),
                    new google.maps.LatLng(10.007095, -83.250103)
                    ),
                    fillcolor:"darkgreen",
                    strokeColor: "darkgreen"
                });
                // draws square for certain location
                var lat = <?php echo $coordinates['latitude']; ?>;
                var long = -<?php echo $coordinates['longitude']; ?>;
                var rectangle = new google.maps.Rectangle({
                    map: map,
                    bounds: new google.maps.LatLngBounds(
                    new google.maps.LatLng(lat, long),
                    new google.maps.LatLng((lat - 0.005), (long + 0.005))
                    ),
                    fillcolor:"white",
                    strokeColor: "white"
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6nhveJrJGLPkqa6gpSgbQVyssBWM63oc&callback=initMap"
        async defer></script>
    </body>
</html>
