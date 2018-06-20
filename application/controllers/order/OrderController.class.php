<?php

class OrderController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	$productList = ProductModel::getAllProducts();

    	return ['productList' => $productList];
    }

}