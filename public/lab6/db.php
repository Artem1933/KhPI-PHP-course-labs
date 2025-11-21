<?php

$host = 'mysql'; 

$db   = getenv('MYSQL_DB') ?: 'users_db';
$user = getenv('MYSQL_USER') ?: 'started-user';
$pass = getenv('MYSQL_PASSWORD') ?: 'started-password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Помилка підключення до бази даних: " . $e->getMessage());
}
?>