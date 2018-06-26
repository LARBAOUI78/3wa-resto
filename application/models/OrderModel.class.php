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

	public static function getOrderById($id, $withDetails = false) {

		$db = new Database();

		$sql = "SELECT * FROM `order` WHERE id = ?";

		$params = [$id];

		$order = $db->queryOne($sql, $params);

		if ($withDetails) {

			$sql = "
				SELECT * 
				FROM orderline 
				JOIN product ON product.id = orderline.product_id
				WHERE order_id = ?
			";

			$params = [$id];

			$orderLines = $db->query($sql, $params);

			$order['orderLines'] = $orderLines;


			$sql = "
				SELECT * 
				FROM user 
				WHERE id = ?
			";

			$params = [];
			$params[] = $order['user_id'];

			$user = $db->queryOne($sql, $params);

			$order['user'] = $user;
		}

		return $order;
	}

	static public function setPaidStatus($orderId) {

		$sql =<<<TXT
	UPDATE `order` SET status = 'PAID' WHERE id = ?
TXT;

		$db = new Database();

		$params = [];
		$params[] = $orderId;

		$db->executeSql($sql, $params);
	}

	
}
