<?php

class Tools {
	
	public static function getPriceTTC($priceHT) {
		return $priceHT * 1.2;
	}

	public static function pre($thing) {
		echo "<pre>";
		print_r($thing);
		echo "</pre>";
	}

	public static function getPrettyPrice($priceHT) {
		return number_format(Tools::getPriceTTC($priceHT), 2, ',', ' ') . "€ TTC";
	}
}