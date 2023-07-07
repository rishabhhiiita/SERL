<?php
$host = "localhost";        // MySQL server hostname (e.g., localhost)
$username = "root"; // MySQL username
$password = ""; // MySQL password
$database = "iiita"; // Name of the MySQL database

// Create a connection to the MySQL database
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>