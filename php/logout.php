<?php
$value = $_COOKIE['handle'];
$value1 = $_COOKIE['uid'];
setcookie('handle', $value, time() - 3600, '/');
setcookie('uid', $value1, time() - 3600, '/');
header('Location: ../index.php');
?>
