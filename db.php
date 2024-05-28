<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "slider_db";


$conn = new mysqli($servername, $username, $password, $dbname); //create connection


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); //check connection
}
?>