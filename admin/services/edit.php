<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("SELECT * FROM services WHERE id = ?");
$stmt->execute([$_GET['id'] ?? '']);
$service = $stmt->fetch();

$servicesCategories = $pdo->query("SELECT * FROM services_categories")->fetchAll();

$title = 'Изменить услугу';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
?>

    <div class="container mt-3">
        <h1 class="text-primary">Изменить услугу</h1>

        <div class="row mt-5">
            <div class="col-4">
                <form action="/admin/services/actions/update.php" method="post">
                    <input type="hidden" name="id" value="<?= $service['id'] ?>">

                    <div class="mb-3">
                        <label for="name" class="form-label">Название</label>
                        <input type="text" name="name" class="form-control" id="name" value="<?= $service['name'] ?>">
                    </div>

                    <label for="service_category_id" class="form-label">Категория</label>
                    <select class="form-select" name="service_category_id" id="service_category_id">
                        <?php foreach ($servicesCategories as $serviceCategory): ?>
                            <?php if ($service['service_category_id'] == $serviceCategory['id']): ?>
                                <option value="<?= $serviceCategory['id'] ?>"
                                        selected><?= $serviceCategory['name'] ?></option>
                            <?php else: ?>
                                <option value="<?= $serviceCategory['id'] ?>"><?= $serviceCategory['name'] ?></option>
                            <?php endif; ?>
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