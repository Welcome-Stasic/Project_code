<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Чат</title>
    <link rel="stylesheet" href="../css/chat-styles.css">
</head>

<body>
    <form action="../profile/profile.php">
        <button href="../profile/profile.php">В профиль</button>
    </form>
    <div id="chat-container">
        <div id="user-list">
            <h3>Пользователи</h3>
            <ul id="all-users">
            </ul>
        </div>
        <div id="chat-messages">
            <h3>Выберите пользователя, для начала общения </h3>
            <?php
            if (isset($_SESSION['user_id'])) {
                echo '<script>selectedUserId = ' . $_SESSION['user_id'] .
                    ';</script>';
                include 'getMessages.php';
            }
            ?>
        </div>
    </div>
    <div id="message-input">
        <input type="text" id="message" contenteditable="true" placeholder="Введите
ваше сообщение...">
        <button id="send-button" onclick="sendMessage()">Отправить</button>
    </div>
    <script>
        document.getElementById("message").addEventListener("keydown", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                sendMessage();
            }
        });
    </script>
    <script src="../js/chat.js"></script>
</body>

</html>