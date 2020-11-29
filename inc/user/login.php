<?php

require_once '../db.php';

$login = trim($_POST['login']);
$password = trim($_POST['password']);

$query = "SELECT * FROM users WHERE login = '$login' LIMIT 1";
$result = $database->prepare($query);
$result->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);

if ($password == $data[0]['password']) {
    session_start();
    $_SESSION['id'] = $data[0]['id'];
    $_SESSION['login'] = $data[0]['login'];
    $id = $_SESSION['id'];
    $database->query("UPDATE users  SET status = 'online' WHERE id = '$id' ");
}

header('Location: http://' . $_SERVER['SERVER_NAME']);
