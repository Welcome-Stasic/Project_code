<?php
$conn = new mysqli("localhost", "root", "", "auth");

if ($conn->connect_error) {

    die("Ошибка: " . $conn->connect_error);
}
