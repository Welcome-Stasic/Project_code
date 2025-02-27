<?php
include("../application/db/db.php");
$q = "SELECT  FROM users WHERE id, name, surname, create_at";
$rows = "SELECT FROM users WHERE id";
if (!isset($_COOKIE['username'])) {
    header("Location: ../application/auth.php");
    exit;
} else {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row['name'] . "<br>" . $row['surname'] . " <br><hr>";
        }
    } else {
        echo "0 результатов, странно как вы тут вообще оказались";
    }
}
