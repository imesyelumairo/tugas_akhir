<?php

$host = 'localhost';
$un = 'root';
$pass = '';
$database = 'tahuna-gis';
$port = '3306';

$conn = mysqli_connect(
    $host,
    $un,
    $pass,
    $database,
    $port
)or die("gagal terhubung ke server");

?>