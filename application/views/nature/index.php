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
	<style type="text/css">
		body {
			margin: 0px auto;
			width: 98%;
			height: 98%;
			/*background-color: #00FF00;*/
		}
		.content {
			color: white;
			background-color: #00FF00;
			display: inline-block;
			padding-top: 20%;
			height: 98%;
			padding-bottom: 20%;
			padding-right: 5%;
			padding-left: 5%;
		}
		.btn {
			color: #32CD32;
			background-color: white;
		}
		input {
			color: white;
			background-color: #32CD32;
		}
	</style>
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
      			<form action="/" method="post">
      				<input type="text" name="email" placeholder="Enter your email">
      				 <button type="submit" class="btn btn-primary mb-2">FIND</button>

      			</form>
      			<a href="#"><button type="submit" class="btn btn-primary">ADOPT A SQUARE METER FOR ONLY €2.50</button></a>

      		</div>
    		</div>
  		</div>
	</div>

</body>
</html>
