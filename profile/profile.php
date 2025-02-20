<?php
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
    <form action="edit.php">
        <label>
            <button href="edit.php">Редактировать профиль</button>
        </label>
    </form>
    <form action="../application/out.php">
        <label>
            <button href="../application/out.php">Выход</button>
        </label>
    </form>
    <form action="members.php">
        <label>
            <button href="members.php">Найти друзей</button>
        </label>
    </form>

</body>

</html>