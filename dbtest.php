<?php
$servername = "10.10.2.83";
$username = "dats02";
$password = "possible river winter";

try {
    $conn = new PDO("mysql:host=$servername;dbname=dats", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
