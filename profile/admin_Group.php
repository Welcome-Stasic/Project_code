<?php
include("../application/db/db.php");
if (!isset($_COOKIE['username'])) {
    header('Location: ../application/auth.php');
    exit;
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
$personal_id = $_POST['personal_id'];
if ($_POST['select'] = 'кф4') {
    $group_id = '1';
} else if ($_POST['select'] = 'кб2') {
    $group_id = '2';
} else {
    echo "Выберите группу";
}

$sql = "UPDATE users SET group_id = ? WHERE personal_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $group_id, $personal_id);

if ($stmt->execute()) {
    echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Пользователь успешно добавлен в группу',
            });
        </script>";
} else {
    echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Ошибка: $stmt->error',
            });
        </script>";;
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/admin_panel.css">
    <link rel="stylesheet" href="../css/header.css">
</head>

<body>
    <?php
    include("../patch/header.php");
    ?>
    <div class="container_admin">
        <form action="admin_Group.php" method="POST" class="admin_Group">
            <label>Введите ID учника</label>
            <input type="text" name="personal_id" class="text_admin">
            <label>Введитке в какую группу его записать</label>
            <select name="gruppa" id="gruppa" name="select">
                <option value="кф4">Кф4</option>
                <option value="кб2">Кб2</option>
            </select>
            <input type="submit">
        </form>
    </div>

</body>

</html>