<?php
$id = $_COOKIE['user_id'];
$new_name = isset($_GET['new_name']) ? htmlspecialchars($_GET['new_name']) : null;
$new_surname = isset($_GET['new_surname']) ? htmlspecialchars($_GET['new_surname']) : null;
if (!isset($_COOKIE['personal_id'])) {
    header("Location: ../application/auth.php");
    exit;
} else {
    if (!isset($_GET['new_name'])) {
        $alert_error = "Заполните все поля!";
    } else {
        $alert_success = "Вы успешно сменили данные!";
        $query = "UPDATE users SET name, surname = '$new_name', '$new_surname' WHERE id = '$id'";
        setcookie('username', $new_name, time() + (86400 * 30), "/", ".stanis2c.beget.tech", false, false);
        setcookie('user_surname', $new_surname, time() + (86400 * 30), "/", ".stanis2c.beger.tech", false, false);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование</title>
    <link rel="icon" href="../assets/learning_8130157.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/edit.css">
</head>

<body>
    <?php include("../patch/header.php"); ?>

    <div class="form-container">
        <form action="edit.php" method="GET" class="edit-form">
            <label class="form-label">Редактировать имени и фамилии пользователя<br>
                <input type="text" name="new_name" placeholder="Введите новое имя" class="form-input"><br>
                <input type="text" name="new_surname" placeholder="Введите новую фамилию" class="form-input"><br>
                <input type="submit" value="Сохранить" class="form-submit"><br>
            </label>
        </form>

        <form action="setPassword.php" method="POST" class="password-form">
            <label class="form-label">Смена пароля<br>
                <input type="password" name="oldPassword" placeholder="Введите старый пароль" class="form-input"><br>
                <input type="password" name="newPassword" placeholder="Введите новый пароль" class="form-input"><br>
                <input type="password" name="ValidNewPassword" placeholder="Подтвердите новый пароль" class="form-input"><br>
                <input type="submit" value="Сохранить" class="form-submit">
            </label>
        </form>
    </div>
</body>

</html>
<?php
if (isset($alert_error)) {
    echo "<script> 
 Swal.fire({
 icon: 'error',
 text: 'Заполните оба поля!',
 });
 </script>
 ";
}
if (isset($alert_success)) {
    echo "<script>
     Swal.fire ({
         icon: 'success',
         text: 'Вы изменили имя на $new_name',
         text: 'Вы изменили фамилию на $new_surname';
     });
     </script>";
}
