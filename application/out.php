<?php
session_start();
session_unset();
session_destroy();
if (!isset($_COOKIE['username'])) {
    header("Location: auth.php");
    exit;
} else {
    setcookie("username", "", time() - 10000, '/');
    header('Location: auth.php');
}
