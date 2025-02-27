<?php
require_once '../application/db/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    if (isset($_COOKIE['user_id'])) {
        $senderId = $_COOKIE['user_id'];
    } else {
        echo json_encode(["status" => "error", "message" => "Error: User not authenticated"]);
        exit;
    }
    $receiverId = $_POST['receiver_id'];
    $messageText = $_POST['message'];
    $sql = "INSERT INTO messages (sender_id, receiver_id, message_text) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iis', $senderId, $receiverId, $messageText);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Message sent successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
    }
    $stmt->close();
}
