<?php

use LDAP\Result;

require_once '../application/db/db.php';
$sql = "SELECT id, name AS name FROM users";
$result = $conn->query($sql);
$users = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $users[] = [
            'id' => $row['id'],
            'name' => $row['name']
        ];
    }
    $result->free();
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
echo json_encode($users);
