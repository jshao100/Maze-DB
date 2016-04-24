<?php
$value = $_COOKIE['handle'];
setcookie('handle', $value, time() - 3600, '/');
header('Location: ../index.php');
?>
