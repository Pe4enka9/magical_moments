<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: /');
    exit();
}

$title = 'Регистрация';
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
?>

    <div class="container mt-3">
        <h1 class="text-primary">Регистрация</h1>

        <div class="row mt-5">
            <div class="col-4">
                <form action="/auth/register.php" method="post">
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Номер телефона</label>
                        <input type="tel" name="phone_number" value="<?php
                        echo $_COOKIE['phone_number'] ?? '';
                        setcookie('phone_number', '', time() - 3600, '/register.php');
                        ?>"
                               class="form-control" id="phone_number">
                    </div>

                    <?php
                    if (isset($_SESSION['error'])) {
                        echo "<p class='text-danger'>{$_SESSION['error']}</p>";
                        unset($_SESSION['error']);
                    }
                    ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Имя</label>
                        <input type="text" name="name" value="<?php
                        echo $_COOKIE['name'] ?? '';
                        setcookie('name', '', time() - 3600, '/register.php');
                        ?>"
                               class="form-control" id="name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Адрес эл. почты</label>
                        <input type="email" name="email" value="<?php
                        echo $_COOKIE['email'] ?? '';
                        setcookie('email', '', time() - 3600, '/register.php');
                        ?>"
                               class="form-control" id="email">
                    </div>

                    <div class="col-auto mt-3">
                        <button type="submit" class="btn btn-success mb-3">Зарегистрироваться</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>