<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../css/form_reg.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <div>
            <img src="../assets/form_reg/logo.png" alt="код" width="100px" height="43px">
            <h1>
                Регистрация
            </h1>
            <form action="registration.php" method="POST">
                <div class="form-group">
                    <label for="username">Имя</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label for="surname">Фамилия</label>
                    <input type="text" name="surname" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" href="auth.php">Зарегистрироваться</button>
        </div>
        </form>
        <div class="auth-switch">
            <span id="switch-text">Уже есть аккаунт? <a href="auth.php" id="switch-link">Войти</a></span>
        </div>
    </div>
</body>

</html>


<?php
include("db/Users.php")
?>