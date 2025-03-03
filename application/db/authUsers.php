<?php
include("db/db.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

    if ($email && $password) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password'])) {
                    setcookie("username", $user['name'], time() + (86400 * 30), "/", ".stanis2c.beget.tech", false, true);
                    setcookie("user_surname", $user['surname'], time() + (86400 * 30), "/", ".stanis2c.beget.tech", false, true);
                    setcookie('personal_id', $user['personal_id'], time() + (86400 * 30), "/", ".stanis2c.beget.tech", false, true);
                    setcookie("user_email", $user['email'], time() + (86400 * 30), "/", ".stanis2c.beget.tech", false, true);

                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['personal_id'] = $user['personal_id'];
                    $_SESSION['username'] = $user['name'];
                    $_SESSION['user_surname'] = $user['surname'];
                    $_SESSION['user_email'] = $user['email'];

                    $alert_success = "Добро пожаловать, " . htmlspecialchars($user['name']) . "!";
                } else {
                    $alert_error = "Ой, Неверный пароль(";
                }
            } else {
                $alert_error = "Пользователь не найден!";
            }

            $stmt->close();
        } else {
            $alert_error = "Ошибка при подготовке запроса: " . $conn->error;
        }
    } else {
        $alert_warning = "Пожалуйста, заполните все поля.";
    }
}
