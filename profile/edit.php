<?php
if (!isset($_COOKIE['username'])) {
    header("Location: ../application/auth.php");
    exit;
} else {
    if (!isset($_GET['new_name'])) {
        echo "Введите новое имя";
    } else {
        setcookie('username', $_GET['new_name'], time() + (86400 * 30), "/");
        echo "Вы изменилли имя на " . htmlspecialchars($_GET['new_name']);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование</title>
</head>

<body>
    <form action="edit.php">
        <label method="GET">Редактировать имя пользователя<br>
            <input type="text" name="new_name" placeholder="Введите новое имя">
            <input type="submit" value="Сохранить">
        </label>
    </form>
</body>

</html>