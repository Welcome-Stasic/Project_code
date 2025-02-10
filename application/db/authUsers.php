<?php
include("db/db.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $email = !empty($_GET['email']) ? $conn->real_escape_string(trim($_GET['email'])) : null;
    $password = !empty($_GET['password']) ? $conn->real_escape_string(trim($_GET['password'])) : null;

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            setcookie("username", $user['name'], time() + (86400 * 30), "/"); // 30 дней
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
            footer: '<a href='../registration.php'>Похоже пора арегистрироваться</a>',
        });
        </script>";
    }
}

$conn->close();
