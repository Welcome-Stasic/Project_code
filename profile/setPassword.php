<?php
include("../application/db/db.php");
include("edit.php");
$id = $_COOKIE['user_id'];
$query = "SELECT * FROM users WHERE id='$id'";
$res = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($res);
$hash = $user['password'];


$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];


if (password_verify($oldPassword, $hash)) {
    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
    $query = "UPDATE users SET password = '$newPasswordHash' WHERE id = '$id'";
    mysqli_query($conn, $query);
    echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Вы успешно сменили пароль',
            });
        </script>";
} else if ($oldPassword == $newPassword) {
    echo "<script>
    Swal.fire({
        icon: 'error',
        text: 'Нельзя вводить одинаковый пароль',
    });
</script>";
} else {
    echo "<script>
    Swal.fire({
        icon: 'error',
        text: 'Ошибка: старный пароль введён не верно.',
    });
</script>";
}
