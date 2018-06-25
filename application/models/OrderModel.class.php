<?php


 class OrderModel {

	public static function createOrderFromCartProducts(array $products, $userId) {

		if (empty($products)) {
			throw new Exception("Products empty");
		}

		// creer le order
		$sql =<<<TXT
	INSERT INTO `order` (created_at, user_id, status)
	VALUES (NOW(), ?, "PENDING")
TXT;

		$db = new Database();

		$orderId = $db->executeSql($sql, [$userId]);

		foreach ($products as $product) {

			$sql = "
				INSERT INTO orderline
				(product_id, order_id, priceHT, quantity)
				VALUES (:product_id, :order_id, :priceHT, :quantity)
			";

			$data = [];
			$data['product_id'] = $product['id'];
			$data['order_id'] = $orderId;
			$data['priceHT'] = $product['priceHT'];
			$data['quantity'] = $product['quantity'];

			$db->executeSql($sql, $data);

		}

		return $orderId;
	}

	
}
