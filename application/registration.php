<?php
include("db/db.php");
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = !empty($_POST['username']) ? $conn->real_escape_string(trim($_POST['username'])) : null;
    $surname = !empty($_POST['surname']) ? $conn->real_escape_string(trim($_POST['surname'])) : null;
    $email = !empty($_POST['email']) ? $conn->real_escape_string(trim($_POST['email'])) : null;
    $password = !empty($_POST['password']) ? $conn->real_escape_string(trim($_POST['password'])) : null;
    $role = 'student';
    $ran_id = random_int(1, 100000000);
    $create_at = date('Y-m-d H:i:s');

    if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Ошибка: Некорректный формат email.',
            });
        </script>";
        exit();
    }

    $query_check_email = "SELECT * FROM users WHERE email = '$email'";
    $result_check_email = $conn->query($query_check_email);

    if ($result_check_email && $result_check_email->num_rows > 0) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Ошибка: Пользователь с таким email уже существует.',
            });
        </script>";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = $conn->prepare("INSERT INTO users (personal_id, name, surname, email, password, created_at, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param("issssss", $ran_id, $name, $surname, $email, $hashed_password, $create_at, $role);

    if ($query->execute()) {
        $user_id = $conn->insert_id;
        $_SESSION['user_id'] = $user_id;
        setcookie('user_id', $user_id, time() + (86400 * 30), "/");
        setcookie('username', $name, time() + (86400 * 30), "/");
        setcookie('user_surname', $surname, time() + (86400 * 30), "/");
        setcookie('personal_id', $ran_id, time() + (86400 * 30), "/");
        setcookie('user_email', $email, time() + (86400 * 30), "/");
        setcookie('user_role', $role, time() + (86400 * 30), "/");

        $alert_success = "Добро пожаловать";
    } else {
        $alert_error = $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
            <link rel="icon" href="../assets/learning_8130157.png">
    <link rel="stylesheet" href="../css/form_reg.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://app.allwidgets.ru/s/cookies/a2be9201-fa65-4a28-a901-271548c4eea6/"></script>
</head>

<body>
    <div class="container">
        <div>
            <img src="../assets/form_reg/logo.png" alt="код" width="100px" height="43px">
            <h1>Регистрация</h1>
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
                <button type="submit">Зарегистрироваться</button>
            </form>
        </div>
        <div class="auth-switch">
            <span id="switch-text">Уже есть аккаунт? <a href="auth.php" id="switch-link">Войти</a></span>
        </div>

        <?php
        if (isset($alert_success)) {
            echo "
            <script>
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
            </script>";
        } elseif (isset($alert_error)) {
            echo "
            <script>
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
            </script>";
        }
        ?>

    </div>
</body>

</html>
