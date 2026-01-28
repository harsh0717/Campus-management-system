<?php
// config/db.php

$host = "localhost";
$user = "root";
$pass = "1234";
$db   = "campus_management_system";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Temporary test message (remove later)
echo "Database connected successfully";
?>
