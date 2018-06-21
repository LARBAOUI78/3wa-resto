<?php

class Cart {

	static function init() {
		if (empty($_SESSION['cart'])) {
			$_SESSION['cart'] = [];	
		}
	}

	static function add($productId, $quantity) {

		$cart = $_SESSION['cart'];

		if (isset($cart[$productId])) {

			$cart[$productId]['quantity'] += $quantity;

		} else {
			$cart[$productId] = ['id' => $productId, 'quantity' => $quantity];
		}

		$_SESSION['cart'] = $cart;
	}

	static function getProductsWithQuantity() {

        $cart = $_SESSION['cart'];

        $products = [];

        foreach ($cart as $row) {
            $productId = $row['id'];
            $quantity = $row['quantity'];

            $product = ProductModel::getProductById($productId);
            $product['quantity'] = $quantity;

            $products[] = $product;
        }

        return $products;
    }

    static function getProductNumber() {

    	return count($_SESSION['cart']);
    }

}