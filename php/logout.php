<?php
setcookie("handle", $_COOKIE['handle'], time() - 3600);
header('Location: ../index.php');
?>
