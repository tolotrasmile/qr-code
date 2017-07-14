<?php
/**
 * Created by IntelliJ IDEA.
 * User: Euranto
 * Date: 13/07/2017
 * Time: 21:28
 */

namespace App\Controller;


use App\Query;

class LoginController
{
    static function __doLogin($login, $password)
    {
        $user = Query::fetchOne("SELECT * FROM users WHERE username='$login' AND password='$password'");

        if ($user && isset($user) && session_status() == PHP_SESSION_ACTIVE) {

            $token = uniqid(rand(), true);

            header("Authorization: " . $token);
            $_SESSION['token'] = $token;
            $_SESSION['login'] = $user;
        }
    }
}