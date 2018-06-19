<?php

class LoginController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

        if ( empty($formFields['email'])) {
            throw new Exception("email empty");
        }

        if ( empty($formFields['password'])) {
            throw new Exception("password empty");
        }


        $email = $formFields['email'];
        $password = $formFields['password'];

        $user = UserModel::getUserByEmail($email);

        if (empty($user)) {
            return ['errorMessage' => "Email inconnu"];
        }

        $passwordEncrypted = crypt($password, 'rl');

        if ($passwordEncrypted != $user['password']) {
            return ['errorMessage' => "Mot passe incorrect"]; 
        } 


        $userSession = new UserSession();
        $userSession->connect($user);
        
        $http->redirectTo('');
    }
}