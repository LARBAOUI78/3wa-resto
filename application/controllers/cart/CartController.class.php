<?php 

class CartController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

        
        $products = Cart::getProductsWithQuantity();

        return ['products' => $products, '_raw_template' => true];    	
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

        $action = $formFields['action'];

        if ($action == "add") {
            $quantity = $formFields['quantity'];
            $productId = $formFields['id'];
            Cart::add($productId, $quantity);

        } else if ($action == "remove") {
            $productId = $formFields['id'];

            Cart::remove($productId);
        } else {
            throw new Exception("Action $action invalid");
        }

        $products = Cart::getProductsWithQuantity();

        return ['products' => $products, '_raw_template' => true];
    }

}