<?php
/**
 * Created by IntelliJ IDEA.
 * User: Euranto
 * Date: 25/07/2017
 * Time: 20:30
 */

namespace App\Controller;


use App\Query;

class ApiController
{

    /**
     * @param $username
     * @param $password
     * @return mixed|null
     */
    static function login($username, $password)
    {
        return LoginController::__doLogin($username, $password);
    }

    /**
     * @param $id
     * @return bool
     */
    static function deleteDocument($id)
    {
        if (LoginController::userCanDelete()) {
            return Query::delete('documents', $id);
        }

        return false;
    }

    static function updateDocuments($name, $id)
    {
        if (LoginController::userCanDelete()) {
            return Query::update('documents', 'name', $name, $id);
        }
        return false;
    }

}