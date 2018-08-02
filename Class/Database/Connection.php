<?php
namespace Database;

class Connection
{
    private static $connection = null;
    // name: $oonnection??

    private static $dbHost;
    private static $dbUser;
    private static $dbPass;
    private static $dbName;

    public function __construct() {
        die('Init function is not allowed');
    }

    public function __set($value, $attr) {
        self::$attr = $value;
    }

    public static function connect() {
        if ( null == self::$connection ) {
            try {
                require_once 'config.php';
                self::$connection = new \PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUser, self::$dbPass);
                self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }
            catch(\PDOException $e) {
                die("Failed to connect to DB: ". $e->getMessage());
            }
        }
        return self::$connection;
    }

    public static function disconnect() {
        self::$connection = null;
    }
}