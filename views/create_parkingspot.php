<?php

/**
*@package: Scandiweb assignment
*@Author: Nicolas HOQUET
**/

use Models\ParkingSpot\ParkingSpot;

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
			<div class="col-md-12 top">
				<form  name="createParkingSpot"  onsubmit="return validateForm()" action="/parkingspot/create/" method="post">
					<div class='row'>
						<div class='col-md-6'>
							<h1>Add Parking Spot</h1>
						</div>
						<div class='col-md-6 text-end'>
							<input type="submit" value="Save" class="btn btn-success"> <a href="/parkingspot/list/" class="btn btn-warning">Cancel</a>
						</div>
					</div>
					<hr>
					<span id="errorbox"><?php ParkingSpot::displayError(); ?></span><br>
					<label  for="name">Parking Spot Name:</label><br>
					<input type="text" id="name" name="name"><br>
					<label  for="price" >Regular Price (€):</label><br>
					<input pattern="[0-9]*[.]?[0-9]*" type="text" id="regular_price" name="regular_price" title="Enter a numerical value with decimal separated by a dot"><br>
					<span id="infobox"></span><br>
					<pan>Special Price</span> 
					<!--We might need to add more special price --->
					<fieldset id="special_price" style="border:0">
						<label id="timeLabel" for="time" >Time (H):</label><br>
						<input  type="number" id="time" name="time" ><br>
						<label id="priceLabel" for="price" >price (€):</label><br>
						<input  type="price" id="price" name="price" ><br>
					</fieldset>
				</form>
			</div>
		</div>
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
<script>

function validateForm(){
	//check that all required fields are not empty
	var form = document.forms["createProduct"];
	var errfield=document.getElementById("errorbox");
	if (form["name"].value == "") {
		errfield.innerHTML="Please, submit required data";
		return false;
	}

	if (form["regular_price"].value == "") {
		errfield.innerHTML = "Please, submit required data";
		return false;
	} 
}

</script>
</body>
</html>
