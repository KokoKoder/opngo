<?php

/**
*@package: OpnGo assignment
*@Author: Nicolas HOQUET
**/

namespace Vendor;

class Autoloader
{
	public static function autoload()
	{
		$required_classes = array(
		'Connect\Connect',
		'Router\Router'
		);
		foreach ($required_classes as $class_name) {
			spl_autoload($class_name);
		}
	}
}

spl_autoload_register('Vendor\Autoloader::autoload');

// EOF
