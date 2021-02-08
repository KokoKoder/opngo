<?php

/**
*@package: OpnGo assignment
*@Author: Nicolas HOQUET
**/

namespace Models\Checkout;

class Checkout
{
	
	private $pricingRules;
	private $sessionSpotsList = Array();
	
	public function __construct($pricingRules)
	{
		$this->pricingRules = $pricingRules;
	}
	
	public function add($spotsList)
	{
		foreach ($spotsList as $key => $value){
			$spotsList = str_split($value);
			foreach($spotsList as $spot)
			{
				array_push($this->sessionSpotsList, $spot);		
			}
		}
	}
	
	public function getTotal()
	{
		$sessionSpotsList = $this->sessionSpotsList;
		$arr = Array();
		$data = Array();
		$total = 0;
		foreach ($sessionSpotsList as $key => $value)
		{
			if ( array_key_exists($value, $arr ))
			{
				$arr[$value] += 1;
			}
			else
			{
				$arr[$value] = 1;
			}
		}
		$pricingRules = $this->pricingRules;
		foreach ($arr as  $key=>$value) 
		{
			$regularPrice = $pricingRules[$key][0];
			$specialPrice = $pricingRules[$key][1];
			$time = $arr[$key];
			$spotName  = $key;
			if ($specialPrice == '')
			{
				$data[$spotName] = $regularPrice * $time;
				$total += $data[$spotName];
			}
			else
			{
				$special_price = json_decode ($specialPrice);
				if ($time >= $special_price->time)
				{
					$reg_mult  = $time % $special_price->time;
					$spe_mult = ($time-$reg_mult)/$special_price->time;
					$data[$spotName] = ($spe_mult * $special_price->price) + ($reg_mult * $regularPrice);
					$total += $data[$spotName];
				}
				else
				{
					$data[$spotName] = $regularPrice * $time;
					$total += $data[$spotName];
				}
			}
		}
		$data["total"] = $total;
		header('Content-type: application/json');
		echo json_encode($data);
	}
}