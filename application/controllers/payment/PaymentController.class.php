<?php

class PaymentController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	$orderId = $queryFields['id'];

        $order = OrderModel::getOrderById($orderId, true);

        $userSession = new UserSession();
        
        if ($order['user_id'] != $userSession->getUserId()) {
            // access interdir
            throw new Exception("Forbidden to access to this order");
        }


        return ['order' => $order];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

        $orderId = $formFields['order_id'];
        OrderModel::setPaidStatus($orderId);

        $http->redirectTo('success');

    }
}