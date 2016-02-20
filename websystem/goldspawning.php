<?php
$file = '/avalon/Admin/Logs/goldspawning.txt';

$string = $_GET["string"] .PHP_EOL;

file_put_contents($file, $string, FILE_APPEND);
?>