<?php
$title = 'Добавить категорию услуг';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
?>

<div class="container mt-3">
    <h1 class="text-primary">Добавить категорию услуг</h1>

    <div class="row mt-5">
        <div class="col-3">
            <form action="/admin/services_categories/actions/store.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>

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