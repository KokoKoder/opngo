<?php

/**
*@package: OpnGo assignment
*@Author: Nicolas HOQUET
**/

use Vendor\Connect\Connect;
use Models\ParkingSpot\ParkingSpot;
use Models\Checkout\Checkout as Checkout;

class CheckoutController 
{		
	private static function getPricingRules()
	{
		$sql = "SELECT * FROM parkingspot";
		$results = Connect::conn()->query($sql);
		$pricingRules = Array();
		if ($results->num_rows > 0)
		{	
			while ( $row = $results->fetch_assoc())
			{
				$pricingRules[$row['SpotName']] = [$row['RegularPrice'], $row['SpecialPrice']]; 
			}
		}
		return $pricingRules;
	}
	
	public function addSpot()
	{
		if ($_SERVER["REQUEST_METHOD"] == 'POST')
		{
			$spotLists = Array();
			if (isset($_SESSION['spotLists'])){
				$spotLists = (Array) $_SESSION['spotLists'];
			}
			array_push($spotLists, $_POST["spot"]);
			$_SESSION['spotLists'] = $spotLists;
			$pricingRules = checkoutController::getPricingRules();
			$co = new Checkout($pricingRules);
			$co->add($spotLists);
			$co->getTotal();
			
		}
	}
	public function endSession()
	{
		if ($_SERVER["REQUEST_METHOD"] == 'POST')
		{
			$_SESSION = [];
			header("Location: /app/sendquery");
			exit;
		}
	}
}