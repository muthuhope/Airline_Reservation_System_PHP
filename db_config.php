<?php
$host = 'localhost';
$user = 'root';
$pass = 'Muthu@8220'; // Use your MySQL root password if set
$db = 'airlinedb';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>