<?php
$personal_id = $_COOKIE['personal_id'];

include("../application/db/db.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT g.lesson_link, g.group_name, g.chat_link 
        FROM users u 
        JOIN groups g ON u.group_id = g.id 
        WHERE u.personal_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $personal_id);
$stmt->execute();
$stmt->bind_result($lesson_link, $group_name, $chat_link);

if ($stmt->fetch()) {
} else {
}

$stmt->close();
$conn->close();
