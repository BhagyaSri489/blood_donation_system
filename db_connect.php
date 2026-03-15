<?php
$servername = "localhost";
$username = "root";
$password = ""; // leave blank for default XAMPP
$dbname = "blood_donation_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>