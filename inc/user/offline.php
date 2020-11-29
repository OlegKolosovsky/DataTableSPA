<?php

require_once '../db.php';

session_start();
$id = $_SESSION['id'];

$database->query("UPDATE users  SET status = 'offline' WHERE id = '$id' ");

session_destroy();
