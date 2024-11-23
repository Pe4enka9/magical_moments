<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$services = $pdo->query("SELECT services.*,
       services_categories.name AS category
FROM services JOIN services_categories
    ON services.service_category_id = services_categories.id;")->fetchAll();

$title = 'Услуги';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
?>

<div class="container mt-3">
    <h1 class="text-primary">Услуги</h1>
    <h4><a href="/admin/services_categories/" class="text-secondary">Категории услуг</a></h4>
    <a href="/admin/services/create.php" class="btn btn-primary mt-2">Добавить</a>

    <div class="row">
        <div class="col-8">
            <table class="table table-striped mt-3">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Категория</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($services as $service): ?>
                    <tr>
                        <th scope="row"><?= $service['id'] ?></th>
                        <td><?= $service['name'] ?></td>
                        <td><?= $service['category'] ?></td>
                        <td><a href="/admin/services/edit.php?id=<?= $service['id'] ?>" style="text-decoration:none;">Изменить</a>
                        </td>
                        <td><a href="/admin/services/actions/delete.php?id=<?= $service['id'] ?>" class="text-danger"
                               style="text-decoration:none;">Удалить</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>
