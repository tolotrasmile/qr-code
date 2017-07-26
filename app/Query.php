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
    /**
     * @param string $query
     * @param int $mode
     * @return array
     */
    public static function fetchAll(string $query, $mode = \PDO::FETCH_OBJ)
    {
        return Database::getInstance()->getPdo()->query($query)->fetchAll($mode);
    }

    /**
     * @param string $query
     * @param int $mode
     * @return mixed
     */
    public static function fetchOne(string $query, $mode = \PDO::FETCH_OBJ)
    {
        return Database::getInstance()->getPdo()->query($query)->fetch($mode);
    }

    /**
     * @param string $query
     * @param int $mode
     * @return array
     */
    public static function select(string $query, $mode = \PDO::FETCH_OBJ)
    {
        return Database::getInstance()->getPdo()->query($query)->fetchAll($mode);
    }

    /**
     * @param $tableName
     * @param $id
     * @return array
     * @internal param string $query
     * @internal param int $mode
     */
    public static function delete($tableName, $id)
    {
        $query = "DELETE FROM $tableName WHERE md5(id)='$id'";
        return Database::getInstance()->getPdo()->query($query)->fetchAll();
    }

}