<?php
if (isset($_COOKIE['username'])) {
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
</head>

<body>
    <?php
    include("patch/header_index.php")
    ?>
    <main>
        <h1>Проект КОД</h1>
    </main>
</body>

</html>