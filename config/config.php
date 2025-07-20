<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'gestion_compras_ventas');
define('DB_USER', 'root');
define('DB_PASS', '');

function db_connect() {
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ]);
        return $pdo;
    } catch (PDOException $e) {
        die("DB Error: " . $e->getMessage());
    }
}