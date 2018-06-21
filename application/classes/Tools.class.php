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

	public static function getPrettyPrice($price) {
		return number_format($price, 2, ',', ' ') . "€ TTC";
	}
}