<?php
include('Users.php');
session_start();

if (!isset($_COOKIE['username'])) {
    header("Location: ../application/auth.php");
    exit;
}

echo "<h1>Добро пожаловать на ваш профиль, " . htmlspecialchars($_COOKIE['username']) . " " . htmlspecialchars($_COOKIE['user_surname']) . "!</h1>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="edit.php">Редактировать профиль</a>
    <a href="../application/out.php">Выйти с аккаунта</a>
</body>

</html>