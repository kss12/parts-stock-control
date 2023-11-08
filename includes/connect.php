<?php
$servername = "localhost"; // Change this to your MySQL server hostname
$username = "maintenance";      // Change this to your MySQL username
$password = "Pa33w0rd1234!";      // Change this to your MySQL password
$database = "maintenancepartsdb";      // Change this to the name of your database

// Create a connection to the MySQL database
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
