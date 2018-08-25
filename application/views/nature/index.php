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
</head>
<body>
	<div class="container">
  		<div class="row">
    		<div class="col">
      			1 of 2
    		</div>
    		<div class="col">
    		<div class="content">
      			<h4>Take a look at your piece of rainforest</h4>
      			<p>Are you one of our heroes and adopted a square meter of costa rican rainforest? Fly to it and explore!</p>
      			<form action="data/search" method="post">
					<?php if(!empty($this->session->flashdata('input_error'))) {
                        echo $this->session->flashdata('input_error') . '<br />';
                    }?>
      				<input type="email" name="email" placeholder="Enter your email">
      				<button type="submit" class="btn btn-primary mb-2">FIND</button>
      			</form>
      			<a href="http://www.adopteerregenwoud.nl/nl/adopteer/adopteer-regenwoud"><button type="submit" class="btn btn-primary">ADOPT A SQUARE METER FOR ONLY €2.50</button></a>
      		</div>
    		</div>
  		</div>
	</div>
</body>
</html>
