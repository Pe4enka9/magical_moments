<?php
require $_SERVER['DOCUMENT_ROOT'] . '/check_admin.php';
global $pdo;

$applications = $pdo->query("SELECT applications.*, 
       users.name AS user,
       services.name AS service,
       statuses.name AS status
FROM applications
JOIN users ON applications.user_id = users.id
JOIN services ON applications.service_id = services.id
JOIN statuses ON applications.status_id = statuses.id")->fetchAll();

$title = 'Админ панель';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
?>

    <div class="container mt-3">
        <h1 class="text-primary">Админ панель</h1>
        <h4><a href="/admin/services/" class="text-secondary">Услуги</a></h4>

        <table class="table table-striped mt-5">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Пользователь</th>
                <th scope="col">Услуга</th>
                <th scope="col">Время создания</th>
                <th scope="col">Статус</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($applications as $application): ?>
                <tr>
                    <th scope="row"><?= $application['id'] ?></th>
                    <td><?= $application['user'] ?></td>
                    <td><?= $application['service'] ?></td>
                    <td><?= date('d.m.Y H:i:s', strtotime($application['created_at'])) ?></td>
                    <td><?= $application['status'] ?></td>
                    <td><a href="/admin/change_status.php?id=<?= $application['id'] ?>" style="text-decoration:none;">Изменить
                            статус</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>