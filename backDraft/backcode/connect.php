<?php
$servername = "localhost";
$username = "omar";
$password = "sawebsite";
$dbname = "affairs";
//port=3306

$link = mysqli_connect($servername, $username, $password, $dbname);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
