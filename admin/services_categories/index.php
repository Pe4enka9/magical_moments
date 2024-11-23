<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$servicesCategories = $pdo->query("SELECT * FROM services_categories")->fetchAll();

$title = 'Категории услуг';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
?>

<div class="container mt-3">
    <h1 class="text-primary">Категории услуг</h1>
    <h4><a href="/admin/services/" class="text-secondary">Услуги</a></h4>
    <a href="/admin/services_categories/create.php" class="btn btn-primary mt-2">Добавить</a>

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
                <?php foreach ($servicesCategories as $servicesCategory): ?>
                    <tr>
                        <th scope="row"><?= $servicesCategory['id'] ?></th>
                        <td><?= $servicesCategory['name'] ?></td>
                        <td><a href="/admin/services_categories/edit.php?id=<?= $servicesCategory['id'] ?>"
                               style="text-decoration:none;">Изменить</a>
                        </td>
                        <td><a href="/admin/services_categories/actions/delete.php?id=<?= $servicesCategory['id'] ?>"
                               class="text-danger"
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
