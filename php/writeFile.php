<html>
<?php

$arr = json_decode(str_replace('\\', '', $_POST['saveData']));

$file = fopen("../mazes/test.txt","w");

fwrite($file, "Hello World\n");
foreach ($arr as $value) {
	fwrite($file, $value);
}

fclose($file);

header('Location: ../index.php');
?>
</html>
