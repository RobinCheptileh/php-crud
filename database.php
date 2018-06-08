<?php

$host = "localhost";
$db = "lixnet1";
$port = "3306";
$user = "root";
$pass = "";
$charset = "utf8";

try {
    $dsn = "mysql:host=$host;dbname=$db;port=$port;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_PERSISTENT => true
    ];

    $pdo = new PDO($dsn, $user, $pass, $opt);
} catch (PDOException $e) {
    echo $e->getMessage();
}