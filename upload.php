<?php
$ext = '.webm';
if (isset($_POST['ext'])) {
    $ext = $_POST['ext'];
}
var_dump($_POST);
echo ("<br>");

$mp3File = $_FILES['file']['tmp_name'];
$type = $_FILES['file']['type'];

var_dump($_FILES);
echo ("<br>");

$today = date("Ymd_His");
$name = './data/test_'.$today.$ext;
$data = file_get_contents($mp3File);

file_put_contents($name, $data);

?>