<?php

class UserSession {

	function start() {
		session_start();
	}

	function getUser() {
		 return UserModel::getUserById($_SESSION['user_id']);
	}

	function isConnected() {

		if (empty($_SESSION['user_id'])) {
			return false;
		} else {

			return true;
		}
	}

	function connect($user) {
		$_SESSION['user_id'] = $user['id'];
	}

	function logout() {
		session_destroy();
	}

}