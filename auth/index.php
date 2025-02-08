<html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <div>
            <img src="assets/logo.png" alt="код" width="100px" height="43px">
            <h1>
                Регистрация
            </h1>
            <form action="index.php" method="GET">
                <div class="form-group">
                    <label for="username">Имя</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="role" class="mouther">Выберите роль</label>
                    <div class="radio-container">
                        <div>
                            <input type="radio" name="role" value="teacher" id="teacher" required>
                            <label for="teacher" class="radio-label">Учитель</label>
                        </div>
                        <div>
                            <input type="radio" name="role" value="student" id="student" required>
                            <label for="student" class="radio-label">Ученик</label>
                        </div>
                    </div>
                </div>
                <button type="submit" href="auth.php">Зарегистрироваться</button>
        </div>
        </form>
        <div class="auth-switch">
            <span id="switch-text">Уже есть аккаунт? <a href="auth.php" id="switch-link">Войти</a></span>
        </div>
    </div>
    </div>
</body>

</html>


<?php
include("db/Users.php")
?>