<?php

/**
 * Created by IntelliJ IDEA.
 * User: Euranto
 * Date: 27/06/2017
 * Time: 11:41
 */


namespace App;

class Database
{
    private $pdo;

    private static $instance;

    /**
     * Database constructor.
     */
    private function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost:3306;dbname=qr_prime', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING));
    }

    /**
     * @return Database
     */
    public static function getInstance()
    {
        if (self::$instance) {
            return static::$instance;
        }

        return new self();
    }

    /**
     * @return \PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }
}