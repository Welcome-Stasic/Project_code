<?php
$personal_id = $_SESSION['personal_id'];
include("../application/db/db.php");
$sql = "SELECT g.group_name, g.lesson_link, g.chat_link 
        FROM users u 
        JOIN groups g ON u.group_id = g.id 
        WHERE u.personal_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $personal_id);
$stmt->execute();
$stmt->bind_result($group_name, $lesson_link, $chat_link);
if ($stmt->fetch()) {
} else {
}
$stmt->close();
$conn->close();
