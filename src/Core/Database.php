<?php

namespace Core;

use PDO;

class Database
{
    private static $connection;
    private static $settings = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    public function connect($host, $user, $password, $database)
    {
        if (!isset(self::$connection)) {
            self::$connection = new PDO(
                "mysql:host=$host;dbname=$database",
                $user,
                $password,
                self::$settings
            );
        }
    }

    public function queryOne($query, $params = [])
    {
        $result = self::$connection->prepare($query);
        $result->execute($params);

        return $result->fetch();
    }

    public function queryAll($query, $params = [])
    {
        $result = self::$connection->prepare($query);
        $result->execute($params);

        return $result->fetchAll();
    }

    public function querySingle($query, $params = [])
    {
        $result = self::queryOne($query, $params);

        if (!$result) return false;

        return $result[0];
    }

    public function query($query, $params = [])
    {
        $result = self::$connection->prepare($query);
        $result->execute($params);

        return $result->rowCount();
    }
}
