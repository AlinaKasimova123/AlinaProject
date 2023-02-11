<?php
require_once('config.php');
class DBConnClass {

    private static PDO|null $pdo = null;

    public static function run(): PDO
    {
        if (self::$pdo == null) {
            self::$pdo = new PDO("mysql:host=".SERVERNAME.";dbname=".DATABASE, USERNAME, PASSWORD);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }
}