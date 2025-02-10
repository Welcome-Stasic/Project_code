<?php
include("db/authUsers.php")
?>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="../css/form_reg.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container" id="auth-container">
        <img src="../assets/form_reg/logo.png" alt="код" width="100px" height="43px">
        <h1 id="form-title">Авторизация</h1>

        <form action="auth.php" method="GET">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Авторизоваться</button>
        </form>
        <div class="auth-switch">
            <span class="switch-text">Нет аккаунта? <a href="index.php">Зарегистрироваться</a></span>
        </div>
    </div>
</body>

</html>