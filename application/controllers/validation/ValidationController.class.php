<?php

class ValidationController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	die('get');
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $userSession = new UserSession();

        if ( ! $userSession->isConnected()) {

            $http->redirectTo('login');
        }

        
        $products = Cart::getProductsWithQuantity();

        $orderId = OrderModel::createOrderFromCartProducts($products, $userSession->getUserId());

        Cart::reset();

        $http->redirectTo('payment?id=' . $orderId);
    }
}