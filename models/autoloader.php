<?php

/**
*@package: OpnGo assignment
*@Author: Nicolas HOQUET
**/

namespace Models;

class Autoloader
{
	public static function autoload()
	{
		$required_classes = array(
		'ParkingSpot\ParkingSpot',
		'Checkout\Checkout',
		);
		foreach($required_classes as $class_name) {
			spl_autoload($class_name);
		}
	}
}

spl_autoload_register('Models\Autoloader::autoload');

// EOF
