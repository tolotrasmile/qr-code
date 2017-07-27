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

        if ($user && isset($user)) {

            if (session_status() == PHP_SESSION_ACTIVE) {
                $token = uniqid(rand(), true);
                header("Authorization: " . $token);
                $_SESSION['token'] = $token;
                $_SESSION['login'] = $user;
            }

            return $user;
        }

        return null;
    }

    static function getConnectedUser()
    {

        if (isset($_SESSION['login']) && isset($_SESSION['login']->id)) {
            $id = md5($_SESSION['login']->id);
            return Query::fetchOne("SELECT * FROM users WHERE MD5(id)='$id'");
        }
        return false;
    }


}