<?php


 class ProductModel {

	public static function getAllProducts() {

		$db = new Database();

		$sql = "SELECT * FROM product";
		$products = $db->query($sql);

		return $products;
	}
}