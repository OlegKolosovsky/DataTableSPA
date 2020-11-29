<?php

const DB_HOST = 'localhost';
const DB_NAME = 'test';
const DB_USER = 'root';
const DB_PASSWORD = 'root';

try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
    $database = new PDO($dsn, DB_USER, DB_PASSWORD);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
