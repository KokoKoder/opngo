<?php

/**
*@package: OpnGo assignment
*@Author: Nicolas HOQUET
**/

use Vendor\Connect\Connect;
use Models\ParkingSpot\ParkingSpot as ParkingSpot;

class ParkingSpotController
{
	public function createParkingSpot()
	{
		if ($_SERVER["REQUEST_METHOD"] == 'POST') 
		{
			//passing the error message to the destination page
			$err = "";
			
			if (empty($_POST["name"])) 
			{
				$err = "Missing required data";
			} 
			else 
			{
				$name = Connect::conn()->real_escape_string($_POST["name"]);
			}
			if (empty($_POST["regular_price"])) 
			{
				$err = "Missing required data";
			}
			else
			{
				$regular_price =(float) Connect::conn()->real_escape_string($_POST["regular_price"]);
			}
			$special_price = '';
			if (!empty($_POST["time"]) AND !empty($_POST["price"])) 
			{
				$time = (int) Connect::conn()->real_escape_string($_POST["time"]);
				$price = (float) Connect::conn()->real_escape_string($_POST["price"]);
				if ($time != 0 and $price != 0) 
				{
					$special_price = '{"time":'.$time.',"price":'.$price.'}';
				}
				else 
				{
					$err = "Make sure to enter time as an integer and price as a number ( it can have a dot as a decimal separator)";
				}
			}
			if (!$err) 
			{
				$parking_model = new ParkingSpot;
				$parking_model->setParkingSpot($name, $regular_price, $special_price);
			} 
			else 
			{
				ParkingSpot::returnError($err);
			}	
		}
		
	}
	
	public function deleteParkingSpot()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			foreach ($_POST as $key => $id) 
			{
				$conn = Connect::conn();
				$id = $conn->real_escape_string($key);
				$sql = "DELETE FROM parkingspot WHERE id ='$id'";
				$conn->query($sql);
			}		
		}
		header("Location: /");
		exit();
	}
	
}
//EOF
