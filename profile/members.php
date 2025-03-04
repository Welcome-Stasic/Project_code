<?php
if (!isset($_COOKIE['personal_id'])) {
    header("Location: ../application/auth.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Друзья</title>
    <link rel="icon" href="../assets/learning_8130157.png">
    <link rel="stylesheet" href="../css/header.css">
</head>

<body>
    <?php
    include("../patch/header.php");
    ?>
    <main>
        <?php
        include("data.php");
        ?>
    </main>
</body>

</html>