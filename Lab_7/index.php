<?php
class Database {
    private static $instance;
    private $connection;

    private function __construct($dbType) {
        if ($dbType === 'pgsql') {
            // ...
        } else if ($dbType === 'mongodb') {
            // ...
        }
    }

    public static function getInstance($dbType) {
        if (!self::$instance) {
            self::$instance = new Database($dbType);
        }
        return self::$instance->connection;
    }
}
