<?php
include("db/db.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;


    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $email);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                setcookie("username", $user['name'], time() + (86400 * 30), "/"); // 30 дней
                setcookie("surname", $user['surname'], time() + (86400 * 30), "/");
                setcookie("user_email", $user['email'], time() + (86400 * 30), "/"); // 30 дней
                $alert_success = "Добро пожаловать, " . htmlspecialchars($user['name']) . "!";
                echo "<script>
                let timerInterval;
                Swal.fire({
                    icon: 'success',
                    title: '$alert_success',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector('b');
                        timerInterval = setInterval(() => {
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                        window.location.href = '../profile/profile.php';
                    }
                });
                </script>";
            } else {
                echo "<script>
                Swal.fire({
                    title: 'Ой, Неверный пароль(',
                    icon: 'error',
                    showClass: {
                        popup: `
                            animate__animated
                            animate__fadeInUp
                            animate__faster
                        `
                    },
                    hideClass: {
                        popup: `
                            animate__animated
                            animate__fadeOutDown
                            animate__faster
                        `
                    }
                });
                </script>";
            }
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Ооой...',
                text: 'Пользователь не найден!',
                footer: '<a href=\"../registration.php\">Похоже пора зарегистрироваться</a>',
            });
            </script>";
        }

        $stmt->close();
    } else {
        echo "Ошибка при подготовке запроса: " . $conn->error;
    }
}

$conn->close();
