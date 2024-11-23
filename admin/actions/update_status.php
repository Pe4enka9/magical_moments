<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("UPDATE applications SET status_id = :status WHERE id = :id");
$stmt->execute([
    "status" => $_POST['status'],
    "id" => $_POST['id']
]);

header('Location: /admin/');