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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/mijnstyle.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </head>
    <body>
        <!-- ====sidebar====== -->
        <div class="w3-sidebar w3-bar-block w3-green w3-animate-left"  style="width:390px" id="mySidebar">
            <!-- sidebar Banner buttons --><br>
            <div id="sidbarbaner">
                <a class=""><?= anchor("/pageloader/change/english","EN"); ?> | <?= anchor("/pageloader/change/dutch","NL"); ?></a>
                <button class="btn" onclick="w3_close()" ><i class="fa fa-close"></i></button>
            </div>
            <!-- sidcontaint -->
            <div class="sidcontaint">
                <form class="form-inline" action="/data/searchSecond" method="post">
                    <?php if(!empty($this->session->flashdata('input_error'))) { ?>
                        <h5> <?= $this->session->flashdata('input_error') ?> </h5> <?php ;
                    }?>
                    <input type="email" class="form-control" id="email" placeholder="<?= $this->lang->line('email_index'); ?>" name="email">
                    <button type="submit" class="btn btn-default"><?= $this->lang->line('find_index') ?></button>
                </form>
                <h4><?= $this->lang->line('hello_personal') . " " . $this->session->userdata('username') ?></h4>
                <p><?= $this->lang->line('detail_personal') ?></p>
                <table class="table">
                    <tbody>
                        <?php
                            // create table with adopted coordinates
                            foreach ($coordinates as $coordinate) { ?>
                                <tr>
                                    <td id="lat" value="<?= $coordinate['latitude'] ?>"><a href="/location/<?= $coordinate['id'] ?>"><?= $coordinate['latitude'] . "°N " ?></a></td>
                                    <td id="long"><a href="/location/<?= $coordinate['id'] ?>"><?= $coordinate['longitude'] . "°W" ?></a></td>
                                    <td><a href="/location/<?= $coordinate['id'] ?>"><?= $coordinate['sqm'] . "m" ?><sup>2</sup></a></td>
                                    <td><a href="/location/<?= $coordinate['id'] ?>"><i class="fas fa-crosshairs"></i></a></td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="sidbarfooter">
                <a href ="http://www.adopteerregenwoud.nl"><img src="/img/logo.png" alt="Nature Logo"></a>
            </div>
        </div>
        <!-- page containt with map -->
        <div class="mapcontainer">
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
            // load map
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
                // draws dots for each location adopted by user
                <?php foreach ($coordinates as $coordinate) { ?>
                    var lat = <?php echo $coordinate['latitude']; ?>;
                    var long = -<?php echo $coordinate['longitude']; ?>;
                    var circle = new google.maps.Circle({
                        map: map,
                        center: new google.maps.LatLng(lat, long),
                        radius: 100,
                        strokeColor: "white",
                        fillColor:"white",
                        fillOpacity: 100
                    });
                <?php } ?>
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6nhveJrJGLPkqa6gpSgbQVyssBWM63oc&callback=initMap"
        async defer></script>
    </body>
</html>
