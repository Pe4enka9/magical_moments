<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$servicesCategories = $pdo->query("SELECT * FROM services_categories")->fetchAll();

$title = 'Добавить услугу';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
?>

<div class="container mt-3">
    <h1 class="text-primary">Добавить услугу</h1>

    <div class="row mt-5">
        <div class="col-4">
            <form action="/admin/services/actions/store.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>

                <label for="service_category_id" class="form-label">Категория</label>
                <select class="form-select" name="service_category_id" id="service_category_id">
                    <?php foreach ($servicesCategories as $serviceCategory): ?>
                        <option value="<?= $serviceCategory['id'] ?>"><?= $serviceCategory['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="col-auto mt-3">
                    <button type="submit" class="btn btn-success mb-3">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>
