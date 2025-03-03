<?php
include("../application/db/db.php");

if (!isset($_COOKIE['personal_id'])) {
    header("Location: ../application/auth.php");
    exit;
} else {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
?>
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Список пользователей</title>
        <link rel="stylesheet" href="../css/members.css">
    </head>

    <body>
        <div class="main_container">
            <div class="container">
                <h1>Список пользователей</h1>
                <div class="users-list">

                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <div class="user-item">
                                <div class="user-item__name">Имя: <?php echo htmlspecialchars($row['name']); ?></div>
                                <div class="user-item__surname">Фамилия: <?php echo htmlspecialchars($row['surname']); ?></div>
                            </div>
                            <hr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="users-list__empty">0 результатов, странно как вы тут вообще оказались</div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>