<?php
$arr = json_decode(str_replace('\\', '', $_POST['saveData']));
$file = fopen("../mazes/test.txt","w");
foreach ($arr as $value) {
	fwrite($file, $value);
	fwrite($file, "\n");
}
fclose($file);
header('Location: http://maze.mybluemix.net');
exit;
?>
