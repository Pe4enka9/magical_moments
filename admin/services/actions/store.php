<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("INSERT INTO services(name, service_category_id) VALUES(:name, :service_category_id)");
$stmt->execute([
    "name" => $_POST['name'],
    "service_category_id" => $_POST['service_category_id']
]);

header('Location: /admin/services/');