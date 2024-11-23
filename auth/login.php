<?php
session_start();

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("SELECT id FROM `users` WHERE phone_number = ?");
$stmt->execute([$_POST['phone_number']]);

if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch();
    $_SESSION['user'] = $user['id'];
    header('Location: /');
    exit();
}

$_SESSION['error'] = 'Неверный номер телефона!';
setcookie('phone_number', $_POST['phone_number'], time() + 3600, "/login.php");
header('Location: /login.php');