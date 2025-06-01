<?php
// filepath: /home/dev/projects/php/bikcraft/app/core/database.php

require_once __DIR__ . '/dotenv.php';

class Database
{
    private $pdo;
    private static $instance;

    public function __construct()
    {
        $host = $_ENV['DB_HOST'] ?? 'localhost';
        $dbname = $_ENV['DB_DATABASE'] ?? '';
        $user = $_ENV['DB_USERNAME'] ?? '';
        $pass = $_ENV['DB_PASSWORD'] ?? '';
        $charset = $_ENV['DB_CHARSET'] ?? 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new \PDO($dsn, $user, $pass, $options);
    }

    // Singleton instance
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Normal method for queries (prepared statements)
    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        if (stripos(trim($sql), 'select') === 0) {
            return $stmt->fetchAll() ?: [];
        }
        return [];
    }

    // Static quick query (select only)
    public static function quickSelect($sql, $params = [])
    {
        $db = self::getInstance();
        $stmt = $db->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll() ?: [];
    }

    // Static quick exec (insert/update/delete)
    public static function quickExec($sql, $params = [])
    {
        $db = self::getInstance();
        $stmt = $db->pdo->prepare($sql);
        $stmt->execute($params);
        // For insert/update/delete, return affected rows
        return ['rowCount' => $stmt->rowCount()];
    }
}