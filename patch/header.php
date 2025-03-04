<?php
session_start();
include("../application/db/db.php");
if (isset($_SESSION['personal_id']) && !empty($_SESSION['personal_id'])) {
    $personal_id = $_SESSION['personal_id'];
    $sql_role = "SELECT role FROM users WHERE personal_id = ?";
    if ($stmt_role = $conn->prepare($sql_role)) {
        $stmt_role->bind_param("i", $personal_id);
        $stmt_role->execute();
        $stmt_role->bind_result($role);
        $stmt_role->fetch();
        $stmt_role->close();
    } else {
        echo "Ошибка подготовки запроса для роли.";
        exit();
    }
    $sql_group = "SELECT g.lesson_link, g.group_name 
                  FROM users u 
                  JOIN `groups` g ON u.group_id = g.id 
                  WHERE u.personal_id = ?";
    if ($stmt_group = $conn->prepare($sql_group)) {
        $stmt_group->bind_param("i", $personal_id);
        $stmt_group->execute();
        $stmt_group->bind_result($lesson_link, $group_name);
        if (!$stmt_group->fetch()) {
            $group_name = "???";
        }
        $stmt_group->close();
    } else {
        echo "Ошибка подготовки запроса для группы: " . $conn->error;
        exit();
    }

    $conn->close();
} else {
    $role = 'student';
    $group_name = "???";
}
?>

<html>

<head></head>

<body>
    <header>
        <div class="container--header">
            <div class="contant-user">
                <div class="avatar" id="avatar">
                    <img src="../assets/icon/avatar-body.png" alt="аватар">
                </div>
                <div class="user">
                    <span><?php echo htmlspecialchars($_COOKIE['username']) . " " . htmlspecialchars($_COOKIE['user_surname']) ?></span>
                    <span>ПАЗЛ/КОД | ID: <?php echo htmlspecialchars($_COOKIE['personal_id']) ?></span>
                </div>
            </div>
            <div class="Group-content_vibor">
                <button class="first-group admin"><?php echo $group_name; ?></button>
            </div>

            <div class="burger-wrapper burger" id="burger">
                <div></div>
                <div></div>
            </div>
            <div class="content-wrapper_menu menu" id="menu">
                <nav>
                    <?php if ($role === 'teacher'): ?>
                        <a class="unassign-students" id="admin">Расформировать студентов</a>
                    <?php endif; ?>
                    <a href="../profile/edit.php">Редактировать профиль</a>
                    <a href="../profile/members.php">Найти друзей</a>
                </nav>
                <button id="themeToggle">Переключить тему</button>
                <form action="../application/out.php">
                    <label>
                        <button href="../application/out.php">Выход</button>
                    </label>
                </form>
            </div>
        </div>
        <script>
            const burger = document.getElementById('burger');
            const menu = document.getElementById('menu');
            const avatar = document.getElementById('avatar');
            const admin = document.getElementById('admin');

            if (avatar) {
                avatar.addEventListener('click', function() {
                    window.location.href = 'profile.php';
                });
            }

            if (admin) {
                admin.addEventListener('click', function() {
                    window.location.href = 'admin_Group.php';
                });
            }

            function toggleMenu() {
                menu.classList.toggle('show');
                burger.classList.toggle('active');
            }

            if (burger) {
                burger.addEventListener('click', function(event) {
                    event.stopPropagation();
                    toggleMenu();
                });
            }

            document.addEventListener('click', function(event) {
                if (menu && menu.classList.contains('show') && !menu.contains(event.target) && !burger.contains(event.target)) {
                    menu.classList.remove('show');
                    burger.classList.remove('active');
                }
            });

            document.getElementById('themeToggle').addEventListener('click', function() {
                const currentTheme = document.body.className;
                if (currentTheme === 'light-theme') {
                    document.body.className = 'dark-theme';
                } else {
                    document.body.className = 'light-theme';
                }
            });
        </script>
    </header>
</body>

</html>