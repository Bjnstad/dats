<?php

$conn=new mysqli("10.10.2.83","dats02", "possible river winter","dats");
//$conn=new mysqli("localhost","root","root","dats4");

$conn->set_charset("utf8");

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
