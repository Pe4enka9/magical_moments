<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: /');
    exit();
}

$title = 'Авторизация';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
?>

    <div class="container mt-3">
        <h1 class="text-primary">Авторизация</h1>

        <div class="row mt-5">
            <div class="col-4">
                <form action="/auth/login.php" method="post">
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Номер телефона</label>
                        <input type="tel" name="phone_number" value="<?php
                        echo $_COOKIE['phone_number'] ?? '';
                        setcookie('phone_number', '', time() - 3600, '/login.php');
                        ?>"
                               class="form-control" id="phone_number">
                    </div>

                    <?php
                    if (isset($_SESSION['error'])) {
                        echo "<p class='text-danger'>{$_SESSION['error']}</p>";
                        unset($_SESSION['error']);
                    }
                    ?>

                    <div class="col-auto mt-3">
                        <button type="submit" class="btn btn-success mb-3">Войти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>