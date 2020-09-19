<?php
$post_data = file_get_contents('php://input'); 
$name = "data/".$post_data;
$data = var_dump($_FILES);

file_put_contents($name, $data);
?>