include ("webconf.php");
$data = file_get_contents('php://input');
$file = fopen("test.txt", "a+");
fwrite($file, "---" . $data . "---");
fclose($file);

