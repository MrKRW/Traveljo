<?php
namespace App\Core;

use PDO;
use PDOException;

/**
 * Database — PDO Singleton
 * Usage: $db = Database::getInstance();
 */
class Database
{
    private static ?PDO $instance = null;

    private function __construct() {}
    private function __clone() {}

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            $dsn = sprintf(
                'mysql:host=%s;dbname=%s;charset=utf8mb4',
                DB_HOST,
                DB_NAME
            );

            try {
                self::$instance = new PDO($dsn, DB_USER, DB_PASS, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci",
                ]);
            } catch (PDOException $e) {
                if (APP_ENV === 'development') {
                    die('<div style="font-family:monospace;background:#fee;padding:1rem;border-left:4px solid red"><b>DB Connection Error:</b> ' . htmlspecialchars($e->getMessage()) . '</div>');
                } else {
                    die('Service temporarily unavailable. Please try again later.');
                }
            }
        }

        return self::$instance;
    }

    /**
     * Shortcut — get PDO instance
     */
    public static function get(): PDO
    {
        return self::getInstance();
    }
}
