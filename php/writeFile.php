<html>
<?php

$arr = json_decode(str_replace('\\', '', $_POST['saveData']));

$file = fopen("../mazes/test.txt","w");

fwrite($file, "text");
fwrite($file, $arr);
fclose($file);

header('Location: ../index.php');
?>
</html>
