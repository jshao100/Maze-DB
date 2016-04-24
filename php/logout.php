<?php
//setcookie("handle", $_COOKIE['handle'], time() - 3600);
unset($_COOKIE['handle']);
header('Location: ../index.php');
?>
