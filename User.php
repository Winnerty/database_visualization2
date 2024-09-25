<?php
require_once 'DataManager.php';

class User {

    public static function login(string $login, string $password) {
        $query= "SELECT * FROM users WHERE login='$login' AND password='$password'";
        $DM = new DataManager();

        $user = $DM->getData($query, True);
        if(!empty($user))
            return $user['login'];
    }   
}
?>
