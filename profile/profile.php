<?php
include("../application/db/db.php");
if (!isset($_['username'])) {
    header("Location: ../application/auth.php");
    exit;
}
include("Getlink.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($_COOKIE['username']); ?></title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://app.allwidgets.ru/s/cookies/a2be9201-fa65-4a28-a901-271548c4eea6/"></script>
</head>

<body>
    <?php
    include("../patch/header.php");
    ?>
    <main>
        <div id="link_lesson"></div>
        <div id="link_chat"></div>
        <script>
            const link_lesson = document.getElementById('link_lesson');
            const link_chat = document.getElementById('link_chat');
            link_lesson.addEventListener('click', function() {
                window.location.href = '<?php echo $lesson_link ?>';
            });
            link_chat.addEventListener('click', function() {
                window.location.href = '<?php echo $chat_link ?>';
            });
        </script>
    </main>
</body>

</html>