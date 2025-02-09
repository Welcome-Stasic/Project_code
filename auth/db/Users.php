<?php
include("db/db.php");

$name = !empty($_GET['username']) ? $conn->real_escape_string(trim($_GET['username'])) : null;
$email = !empty($_GET['email']) ? $conn->real_escape_string(trim($_GET['email'])) : null;
$password = !empty($_GET['password']) ? $conn->real_escape_string(trim($_GET['password'])) : null;
$role = isset($_GET['role']) && in_array($_GET['role'], ['teacher', 'student']) ? $conn->real_escape_string(trim($_GET['role'])) : 'student';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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

if ($result_check_email->num_rows > 0) {
  echo "<script>
    Swal.fire({
    icon: 'error',
    text: 'Ошибка: Пользователь с таким email уже существует.',
    });
    </script>";
  exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO users (name, email, password, created_at, role) VALUES ('$name', '$email', '$hashed_password', NOW(), '$role')";

if ($conn->query($query)) {
  $user_id = $conn->insert_id;

  setcookie('user_id', $user_id, time() + (86400 * 30), "/"); // 30 дней
  setcookie('user_name', $name, time() + (86400 * 30), "/"); // 30 дней
  setcookie('user_email', $email, time() + (86400 * 30), "/"); // 30 дней
  setcookie('user_role', $role, time() + (86400 * 30), "/"); // 30 дней

  echo "<script>
    let timerInterval;
    Swal.fire({
        icon: 'success',
        title: 'Добро пожаловать!',
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector('b');
            timerInterval = setInterval(() => {}, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
            window.location.href = '../profile/profile.php';
        }
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer');
        }
    });
    </script>";
} else {
  $alert_error_connect = $conn->error;
  echo "<script>
    Swal.fire({
    icon: 'error',
    text: 'Ошибка: " . $alert_error_connect . "',
    });
    </script>";
}

$conn->close();
