<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'myproject';

$connect = mysqli_connect($server, $username, $password, $database);

if ($connect) {
    echo "Connection Successful";
} else {
    echo "No Connection";
}

?>
