<?php
include("../application/db/db.php");
$q = "SELECT  FROM users WHERE id, name, surname, avatar, create_at";
$rows = "SELECT FROM users WHERE id";
if (!isset($_COOKIE['username'])) {
    header("Location: ../application/auth.php");
    exit;
} else {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row['avatar'], "<br><tr>" . $row['name'] . "<br><tr>" . $row['surname'] . " <br><tr>" . $row['email'] . "<br>";
        }
    } else {
        echo "0 результатов";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="profile.php">
        <button href="profile.php">Перейти профиль</button>

    </form>
</body>

</html>