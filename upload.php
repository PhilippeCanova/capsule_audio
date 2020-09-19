<?php
var_dump($_POST); // Rien
echo ("<br>");

$mp3File = $_FILES['file']['tmp_name'];

$today = date("Ymd_His");
$name = './data/test_'.$today.'.ogg';
$data = file_get_contents($mp3File);

file_put_contents($name, $data);

?>