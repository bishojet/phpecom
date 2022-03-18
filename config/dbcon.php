<?php

$host = "localhost";
$username = "root";
$password = "";
$dbName = "phpecom";

// Create Database Connection
$conn = mysqli_connect($host, $username, $password, $dbName);

// Check Database Connection
if(!$conn) {
    die("Connection Failed! ". mysqli_connect_error());
}



?>