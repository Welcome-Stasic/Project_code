<?php
session_start();
setcookie("username", "", time() - 10000, '/');
session_unset();
session_destroy();
header('Location: auth.php');
