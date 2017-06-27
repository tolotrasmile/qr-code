<?php
/**
 * Created by IntelliJ IDEA.
 * User: Euranto
 * Date: 27/06/2017
 * Time: 14:06
 */

namespace App;


class Query
{
    public static function fetchAll($query, $mode = \PDO::FETCH_OBJ)
    {
        return Database::getInstance()->getPdo()->query($query)->fetchAll($mode);
    }

    public static function fetchOne($query, $mode = \PDO::FETCH_OBJ)
    {
        return Database::getInstance()->getPdo()->query($query)->fetch($mode);
    }

    public static function select($query, $mode = \PDO::FETCH_OBJ)
    {
        return Database::getInstance()->getPdo()->query($query)->fetchAll($mode);
    }

}