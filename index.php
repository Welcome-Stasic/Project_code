<?php
if (isset($_COOKIE['personal_id'])) {
    header("Location: profile/profile.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="css/header_indeex.css">
    <script src="https://app.allwidgets.ru/s/cookies/a2be9201-fa65-4a28-a901-271548c4eea6/"></script>
</head>

<body>
    <?php
    include("patch/header_index.php");
    ?>

    <main>
    </main>
</body>

</html>