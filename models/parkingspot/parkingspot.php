<?php

/**
*@package: Scandiweb assignment
*@Author: Nicolas HOQUET
**/

namespace Models\ParkingSpot;

use Vendor\Connect\Connect;

class ParkingSpot
{	
	public $name;
	public $regular_price;
	public $special_price;
	public $err;
	
	public function setParkingSpot($name, $regular_price, $special_price)
	{	
		$this->name = (string) $name;
		$this->regular_price = (float)  $regular_price;
		$this->special_price = $special_price;
		$conn = Connect::conn();
		$sql = "INSERT INTO parkingspot (SpotName, RegularPrice, SpecialPrice) VALUES ('$this->name', '$this->regular_price', '$this->special_price')";
		if ($conn->query($sql) === TRUE) 
		{
			header ("Location: /parkingspot/list/");
			exit;
		} else {
			$err = "Error: (".$conn->errno .") ".$conn->error;
			ParkingSpot::returnError($err);
		}
	}
	
	public static function displayParkingSpot()
	{
		$sql = "SELECT * FROM parkingspot";
		$results = Connect::conn()->query($sql);
		if ($results->num_rows > 0) 
		{
			echo "<div class='row'>";
			while ($row = $results->fetch_assoc()) 
			{
				echo 
				"<div class='col-md-3 '>
					<span class='name'></span>
					<div class='card'>
						<div class='card-body'>
							<input type='radio' name='" . filter_var($row["id"], FILTER_SANITIZE_STRING) . "'><br>
							<div class='card-text text-center'>
								<span class='name'><b>".filter_var($row["SpotName"], FILTER_SANITIZE_STRING)."</b></span><br>
								<span class='regular_price'>Regular price: €".filter_var($row["RegularPrice"], FILTER_SANITIZE_STRING)."</span><br>
								<span class='regular_price'>Special price : ".filter_var($row["SpecialPrice"], FILTER_SANITIZE_STRING)."</span><br>
							</div>
						</div>
					</div>
				</div>"; 
			}
			echo "</div>";
		} else {
			echo "Database empty<br>";
			echo "<a href='/parkingspot/add/'>Create parking spots</a>";
		}
	}
	
	public static function returnError($err)
	{
		$_SESSION['err'] = $err;
		header("Location: /parkingspot/add/");
	}
	
	public static function displayError()
	{

		if (isset($_SESSION['err']))
		{
			if (!is_null($_SESSION['err']))
			{
				echo $_SESSION['err'];	
			}
			$_SESSION['err'] = null;
		}
	}

}
// EOF
