<?php
var_dump($_POST); // Rien
echo ("<br>");

$mp3File = $_FILES['file']['tmp_name'];

var_dump($_FILES);
echo ("<br>");

var_dump($mp3File);
echo ("<br>");


$name = './data/test.ogg';
$data = file_get_contents($mp3File);

var_dump($data);
echo ("<br>");

file_put_contents($name, $data);

?>