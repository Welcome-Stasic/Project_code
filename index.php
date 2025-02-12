<?php
if (isset($_COOKIE['username'])) {
    header("Location: profile/profile.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
</head>

<body>
    <form action="application/registration.php">
        <label for="registation">
            <button href="application/registration.php">Регистрация</button>
        </label>
    </form>
    <form action="application/auth.php">
        <label for="auth">
            <button href="application/auth.php">Авторизация</button>
        </label>
    </form>
</body>

</html>