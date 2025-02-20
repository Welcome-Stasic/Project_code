<?php
$new_name = isset($_GET['new_name']) ? htmlspecialchars($_GET['new_name']) : null;
$new_surname = isset($_GET['new_surname']) ? htmlspecialchars($_GET['new_surname']) : null;
if (!isset($_COOKIE['username'])) {
    header("Location: ../application/auth.php");
    exit;
} else {
    if (!isset($_GET['new_name'])) {
        echo "Введите новое имя";
    } else {
        setcookie('username', $new_name, time() + (86400 * 30), "/");
        setcookie('user_surname', $new_surname, time() + (86400 * 30), "/");
        echo "Вы изменилли имя на " . $new_name, "<br>";
        echo "Вы изменилли фамилию на " . $new_surname;
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
    <form action="edit.php" method="GET">
        <label method="GET">Редактировать имени и фамилии пользователя<br>
            <input type="text" name="new_name" placeholder="Введите новое имя"><br>
            <input type="text" name="new_surname" placeholder="Введите новую фамилию">
            <input type="submit" value="Сохранить">
        </label>
    </form>
    <form action="profile.php">
        <button href="profile.php">Перейти в профиль</button>

    </form>
</body>

</html>