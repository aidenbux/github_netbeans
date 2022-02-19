<?php

/*Mod Log
 *Date, User, Desc
 *2/17/22, Aiden, properly linked code to abdesignproject1
 */

$dsn = 'mysql:host=localhost;dbname=abdesignproject1';
$username = 'root';
$password = 'Pa$$w0rd';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error = $e->getMessage();
    include('./error.php');
    exit();
}
?>