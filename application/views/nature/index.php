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
<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
<script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
        <div class="share">
    		<?= anchor("/pageloader/change/english","EN"); ?> | <?= anchor("/pageloader/change/dutch","NL"); ?>
    	</div>
        <h4><b><?= $this->lang->line('topic_index'); ?></b></h4>
        <p><?= $this->lang->line('content_index'); ?></p>

        <form class="form-inline" action="data/searchFirst" method="post">
            <?php if(!empty($this->session->flashdata('input_error'))) { ?>
                <h5> <?= $this->session->flashdata('input_error') ?> </h5> <?php ;
            }?>
            <input type="email" class="form-control" id="email" placeholder="<?= $this->lang->line('email_index'); ?>" name="email">
            <button type="submit" class="btn btn-default"><?= $this->lang->line('find_index'); ?></button>
        </form>
        <a href="http://www.adopteerregenwoud.nl/nl/adopteer/adopteer-regenwoud" class="btn " role="button"><?= $this->lang->line('adopt_index'); ?></a>
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
            mapTypeId: 'satellite',
            mapTypeControl: false
        });
        }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6nhveJrJGLPkqa6gpSgbQVyssBWM63oc&callback=initMap"
async defer></script>

</body>
