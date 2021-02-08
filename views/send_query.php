<?php

/**
*@package: OpnGo assignment
*@Author: Nicolas HOQUET
**/

?>
<html>
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel='stylesheet' type='text/css' href='/style.css'>
</head>
<body>
	<div class='container'>
		<div class='row'>
			<br>
			<br>
			<form method='POST' action="/parkingspot/addSpot/">
				<label for="spot">Enter any combination of the the following ParkingSpot: A, B, C, D</label>
			  <input name='spot' value=''>
			  <input type='submit'>
			</form>
			<form method='POST' action="/parkingspot/confirm/">
			<span>End Session: <input type='submit'></span>
			</form>
		</div>
	</div>
	<div class="footer text-center">
		<p><b>OpnGo test assignment</b></p>
		<p>Backend</p>
		<ul>
		<li><a href="/parkingspot/add/">Create Parking Spot</a></li>
		<li><a href="/">View </a></li>
		</ul>
		<p><a href="/app/sendquery">User Application Mock up</a></p>
	</div>
</body>
</html>