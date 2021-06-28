<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "handmade_stuff"

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM goods";
$result = mysqli_query($conn, $sql);