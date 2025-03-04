<?php
include("db/authUsers.php");
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="icon" href="../assets/learning_8130157.png">
    <link rel="stylesheet" href="../css/form_reg.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <div>
            <img src="../assets/form_reg/logo.png" alt="код" width="100px" height="43px">
            <form action="auth.php" method="POST">
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
                <span class="switch-text">Нет аккаунта? <a href="registration.php">Зарегистрироваться</a></span>
            </div>
            <script>
                <?php
                if (isset($alert_success)) {
                    echo "
            Swal.fire({
                icon: 'success',
                title: " . json_encode($alert_success) . ",
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                    window.location.href = '../profile/profile.php'; 
                }
            });
            ";
                } elseif (isset($alert_error)) {
                    echo "
            Swal.fire({
                icon: 'error',
                title: " . json_encode($alert_error) . ",
                showClass: {
                    popup: 'animate__animated animate__fadeInUp animate__faster'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown animate__faster'
                }
            });
            ";
                } elseif (isset($alert_warning)) {
                    echo "
            Swal.fire({
                icon: 'warning',
                title: " . json_encode($alert_warning) . ",
            });
            ";
                }
                ?>
            </script>
        </div>
    </div>

</body>

</html>