<?php

class ProductController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	$productId = $queryFields['id'];

    	$product = ProductModel::getProductById($productId);

    	return ['_raw_template' => true, 'product' => $product];
    }

}