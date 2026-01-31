<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "tender_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database connection failed");
}
?>
