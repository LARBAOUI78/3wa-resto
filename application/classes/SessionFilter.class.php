<?php

class SessionFilter implements InterceptingFilter {

	function run(Http $http, array $queryFields, array $formFields) {
		$userSession = new UserSession();
		$userSession->start();
	}
}