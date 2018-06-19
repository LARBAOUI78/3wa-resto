 <?php

 class UserModel {

	public function createUser(array $user) {

		var_dump($user);

		if (empty($user['email'])) {
			throw new Exception("Email empty");
		}

		if (empty($user['password'])) {
			throw new Exception("password empty");
		}


		$user['password'] = crypt($user['password'], 'rl');


		$db = new Database();

		$sql = "
			INSERT INTO user (email, password, firstname, lastname, created_at, updated_at) 
			VALUES (:email, :password, :firstname, :lastname, NOW(), NOW())
		";

		$db->executeSql($sql, $user);
	}



	public static function getUserByEmail($email) {

		$db = new Database();

		$sql = "SELECT * FROM user WHERE email = ?";

		$params = [$email];

		return $db->queryOne($sql, $params);
	}

	public static function getUserById($id) {

		$db = new Database();

		$sql = "SELECT * FROM user WHERE id = ?";

		$params = [$id];

		return $db->queryOne($sql, $params);
	}
}
