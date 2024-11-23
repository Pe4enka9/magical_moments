<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("UPDATE services_categories SET name = :name WHERE id = :id");
$stmt->execute([
    "name" => $_POST['name'],
    "id" => $_POST['id']
]);

header('Location: /admin/services_categories/');