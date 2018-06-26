<?php


class ProductController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	$userSession = new UserSession();

    	if ($userSession->getUserRole() != 'admin') {
    		throw new Exception("Forbidden");
    	}

    	
    }


}