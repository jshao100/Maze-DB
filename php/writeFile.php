<html>
<?php
header('Location: http://maze.mybluemix.net');

$arr = json_decode(str_replace('\\', '', $_POST['saveData']));

$file = fopen("../mazes/test.txt","w");

fwrite($file, "Hello World\n");
foreach ($arr as $value) {
	fwrite($file, $value);
	fwrite($file, "\n");
}

fclose($file);

exit;
?>
</html>
