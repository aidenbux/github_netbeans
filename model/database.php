<?php

/*Mod Log
 *Date, User, Desc
 *2/11/22, Aiden, Create file and pasted Database Class from listeployees.php
 */

class Database {
    private static $dsn = 'mysql:host=localhost;dbname=abdesignproject1';
    private static $username = 'root';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                //include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}

?>