<?php

// error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$user = "root";
$pass = "";
$db = "php_chart";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if(!$koneksi){
    echo "Error: unable to connect to mysql." . PHP_EOL;
    echo "Debugging Errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging Error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// echo "berhasil horeee...";