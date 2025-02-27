<?php
include("../application/db/db.php");
if (!isset($_COOKIE['username'])) {
    header("Location: ../application/auth.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $_COOKIE['username'] ?></title>
    <link rel="stylesheet" href="../css/header.css">
</head>

<body>
    <?php
    include("../patch/header.php");
    ?>
    <main>

    </main>
</body>

</html>