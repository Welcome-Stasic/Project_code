<?php
$hostname = "MySQL-8.0";
$username = "root";
$password = "";
$database = "auth";
$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {

    die("Ошибка: " . $conn->connect_error);
}