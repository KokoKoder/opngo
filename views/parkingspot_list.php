<?php

/**
*@package: OpnGo assignment
*@Author: Nicolas HOQUET
**/

use Models\ParkingSpot\ParkingSpot;

?>
<html lang='en'>
	<head>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel='stylesheet' type='text/css' href='/style.css'>
	</head>
	<body>
		<div class='container'>
			<form action="/parkingspot/delete/" method="post">
			<div class='row'>
				<div class='col-md-6'>
					<h1>ParkingSpot List</h1>
				</div>
				<div class='col-md-6 text-end'>
					<input type="submit" value="Delete selected spots" class='btn btn-danger'>
					<a type='button' href='/parkingspot/add/' class='btn btn-primary'>Add Parking Spot</a>
				</div>
			</div>
			<hr>
			<?php
			ParkingSpot::displayParkingSpot()
			?>
			</form>
			<hr>
			<div class="footer text-center">
				<p><b>OpnGo test assignment</b></p>
				<p>Backend</p>
				<ul>
				<li><a href="/parkingspot/add/">Create Parking Spot</a></li>
				<li><a href="/">View </a></li>
				</ul>
				<p><a href="/app/sendquery">User Application Mock up</a></p>
			</div>
		</div>
	</body>
</html>
