<?php

/**
*@package: OpnGo assignment
*@Author: Nicolas HOQUET
**/

class Router
{
	private $url;
	private $parameters;
	private $route_collection= Array(
		Array('/parkingspot/add/'=>'views/create_parkingspot.php','method'=>'GET'),
		Array('/'=>'views/send_query.php','method'=>'GET'),
		Array('/parkingspot/create/'=>'controllers/parkingspotcontroller.php','action'=>'ParkingSpotController::createParkingSpot','method'=>'POST'),
		Array('/parkingspot/delete/'=>'controllers/parkingspotcontroller.php','action'=>'ParkingSpotController::deleteParkingSpot','method'=>'POST'),
		Array('/parkingspot/list/'=>'views/parkingspot_list.php','method'=>'GET'),
		Array('/parkingspot/addSpot/'=>'controllers/checkoutcontroller.php','action'=>'CheckoutController::addSpot','method'=>'POST'),
		Array('/app/sendquery'=>'views/send_query.php', 'method'=>'GET'),
		Array('/parkingspot/confirm'=>'controllers/checkoutcontroller.php', 'action' => 'CheckoutController::getTotal' ,'method'=>'POST'),
		Array('/parkingspot/confirm/'=>'controllers/checkoutcontroller.php', 'action' => 'CheckoutController::endSession' ,'method'=>'POST'),
	);
	
	public function __construct($uri)
	{
		$this->url = $uri;
	} 
	
	public function route()
	{
		foreach ($this->route_collection as $route)
		{
			if (array_key_exists($this->url,$route))
			{			
				if ($route['method'] == 'GET')
				{
					include $route[$this->url];
				} else if ($route['method'] == 'POST')
				{
					$action = explode('::',$route['action']);
					require $route[$this->url];
					$controller = new $action[0];
					$controller_method = $action[1];
					$controller->$controller_method();
				}
			}
		}
	}
}
//EOF

