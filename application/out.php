<?php
setcookie("username", "", time() - 3600, "/", ".stanis2c.beget.tech", false, false);
setcookie("personal_id", "", time() - 3600, "/", ".stanis2c.beget.tech", false, false);
$_SESSION['peronal_id'] = null;
header('Location: auth.php');
exit();
