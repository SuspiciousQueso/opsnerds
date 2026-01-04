<?php

namespace App\Config;

use PDO;
use PDOException;
use RuntimeException;

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $host = Environment::get('DB_HOST', 'opsnerds-db');
        $name = Environment::get('MARIADB_DB', 'opsnerds');
        $user = Environment::get('MARIADB_DBU', 'opsnerds');
        $pass = Environment::get('MARIADB_DBU_PW');

        if (!$pass) {
            throw new RuntimeException("Database password not set (MARIADB_DBU_PW).");
        }

        try {
            $dsn = "mysql:host=$host;dbname=$name;charset=utf8mb4";
            $this->connection = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            throw new RuntimeException("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance(): PDO {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->connection;
    }
}
