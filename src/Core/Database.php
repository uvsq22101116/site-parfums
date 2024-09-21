<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance === null) {
            try {
                $dsn = 'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME');
                self::$instance = new PDO($dsn, getenv('DB_USER'), getenv('DB_PASS'));
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }
        return self::$instance;
    }
}

