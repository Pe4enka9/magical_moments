<?php
session_start();

/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

try {
    $stmt = $pdo->prepare("INSERT INTO users(name, email, phone_number) VALUES (:name, :email, :phone_number)");
    $stmt->execute([
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "phone_number" => $_POST['phone_number']
    ]);

    $_SESSION['user'] = $pdo->lastInsertId();
    header('Location: /');
    exit();
} catch (PDOException $e) {
    $_SESSION['error'] = 'Такой номер уже есть!';
    setcookie('phone_number', $_POST['phone_number'], time() + 3600, "/register.php");
    setcookie('name', $_POST['name'], time() + 3600, "/register.php");
    setcookie('email', $_POST['email'], time() + 3600, "/register.php");
    header("Location: /register.php");
}