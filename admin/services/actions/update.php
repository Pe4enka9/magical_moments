<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("UPDATE services SET name = :name, service_category_id = :service_category_id WHERE id = :id");
$stmt->execute([
    "name" => $_POST['name'],
    "service_category_id" => $_POST['service_category_id'],
    "id" => $_POST['id']
]);

header('Location: /admin/services/');