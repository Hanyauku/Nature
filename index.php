<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
	<script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
	
  		<div class="row">
    		<div class="col">
				<div id="map"></div>
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
    		</div>
    		<div class="col">
    		<div class="content">
    			<div class="share">
    				<?= anchor("PageLoader/change/english","EN"); ?> | <?= anchor("PageLoader/change/dutch","NL"); ?>
    				<i class="material-icons">share</i>
    			</div>
      			<h4><?php echo $this->lang->line('topic_index'); ?></h4>
      			<p><?php echo $this->lang->line('content_index'); ?></p>
      			<form action="data/search" method="post">
					<?php if(!empty($this->session->flashdata('input_error'))) {
                        echo $this->session->flashdata('input_error') . '<br />';
                    }?>
      				<input type="email" name="email" placeholder="<?php echo $this->lang->line('email_index'); ?> ">
      				<button type="submit" class="btn btn-primary mb-2"><?php echo $this->lang->line('find_index'); ?></button>
      			</form>
      			<a href="http://www.adopteerregenwoud.nl/nl/adopteer/adopteer-regenwoud"><button type="submit" class="btn btn-primary"><?php echo $this->lang->line('adopt_index'); ?></button></a>
      		</div>
    		</div>
  		</div>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAICFxqTR1DqfTU7GzNyxRyJTNYrCSaCao&callback=initMap"
	async defer></script>
</body>
</html>
