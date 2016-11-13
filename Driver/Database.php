<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 13.11.2016 г.
 * Time: 16:50
 */

namespace Driver;


class Database
{
    private static $instance = [];

    private function __construct()
    {

    }

    public static function setInstances($host, $user, $pass, $name)
    {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $name;
        self::$instance[$dsn.$user.$pass] = new \PDO($dsn, $user, $pass);
    }

    public static function getInstance($host, $user, $pass, $name) : \PDO
    {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $name;
        return self::$instance[$dsn.$user.$pass];
    }
}