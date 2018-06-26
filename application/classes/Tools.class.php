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
		return number_format($price, 2, ',', ' ') . "€";
	}

	public static function log($thing) {
		file_put_contents("/tmp/log", print_r($thing, true) . PHP_EOL, FILE_APPEND);
	}

	public static function  getFormattedDate($dateMysql) {
		// 2018-01-12 17:14:12

		$timestamp = strtotime($dateMysql);

		return date('d/m/Y H:i:s', $timestamp);

		
	}

}