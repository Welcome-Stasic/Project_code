<?php
setcookie("username", "", time() - 3600, "/");
header('Location: auth.php');
exit();
