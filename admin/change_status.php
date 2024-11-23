<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("SELECT applications.*, 
       users.name AS user,
       services.name AS service,
       statuses.name AS status
FROM applications
JOIN users ON applications.user_id = users.id
JOIN services ON applications.service_id = services.id
JOIN statuses ON applications.status_id = statuses.id
WHERE applications.id = ?");
$stmt->execute([$_GET['id'] ?? '']);
$application = $stmt->fetch();

$statuses = $pdo->query("SELECT * FROM statuses")->fetchAll();

$title = 'Изменить статус';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
?>

<div class="container mt-3">
    <h1 class="text-primary">Изменить статус</h1>

    <div class="row mt-5">
        <div class="col-auto">
            <form action="/admin/actions/update_status.php" method="post">
                <input type="hidden" name="id" value="<?= $application['id'] ?>">

                <label for="status" class="form-label">Статус</label>
                <select class="form-select" name="status" id="status">
                    <?php foreach ($statuses as $status): ?>
                        <?php if ($application['status_id'] == $status['id']): ?>
                            <option value="<?= $status['id'] ?>" selected><?= $status['name'] ?></option>
                        <?php else: ?>
                            <option value="<?= $status['id'] ?>"><?= $status['name'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>

                <div class="col-auto mt-3">
                    <button type="submit" class="btn btn-success mb-3">Изменить статус</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>
