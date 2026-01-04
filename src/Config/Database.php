<?php

namespace App\Config;

use PDO;
use PDOException;
use RuntimeException;

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $host = getenv('DB_HOST') ?: 'opsnerds-db';
        $name = getenv('MARIADB_DB') ?: 'opsnerds';
        $user = getenv('MARIADB_DBU') ?: 'opsnerds';
        $pass = getenv('MARIADB_DBU_PW') ?: 'Vowel1-Breath-!Plural-Suggest-Original-Wheat_26';

        try {
            $dsn = "mysql:host=$host;dbname=$name;charset=utf8mb4";
            $this->connection = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            // In a real app, we'd log this via Monolog
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
