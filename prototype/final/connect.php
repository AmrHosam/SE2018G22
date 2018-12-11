<?php
$servername = "localhost";
$username = "omar";
$password = "sawebsite";
$dbname = "sawebsite";
//port=3306

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
