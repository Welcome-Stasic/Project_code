<?php
include("db/db.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = !empty($_POST['username']) ? $conn->real_escape_string(trim($_POST['username'])) : null;
    $surname = !empty($_POST['surname']) ? $conn->real_escape_string(trim($_POST['surname'])) : null;
    $email = !empty($_POST['email']) ? $conn->real_escape_string(trim($_POST['email'])) : null;
    $password = !empty($_POST['password']) ? $conn->real_escape_string(trim($_POST['password'])) : null;
    $role = 'student';
    $ran_id = rand(time(), 100000000);
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
