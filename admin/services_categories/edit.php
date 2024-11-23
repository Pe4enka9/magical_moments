<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("SELECT * FROM services_categories WHERE id = ?");
$stmt->execute([$_GET['id'] ?? '']);
$serviceCategory = $stmt->fetch();

$title = 'Изменить категорию услуг';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
?>

    <div class="container mt-3">
        <h1 class="text-primary">Изменить категорию услуг</h1>

        <div class="row mt-5">
            <div class="col-4">
                <form action="/admin/services_categories/actions/update.php" method="post">
                    <input type="hidden" name="id" value="<?= $serviceCategory['id'] ?>">

                    <div class="mb-3">
                        <label for="name" class="form-label">Название</label>
                        <input type="text" name="name" class="form-control" id="name" value="<?= $serviceCategory['name'] ?>">
                    </div>

                    <div class="col-auto mt-3">
                        <button type="submit" class="btn btn-success mb-3">Изменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>