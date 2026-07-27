<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = "api";

// Create the connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check the connection
if (!$conn) {
   die("Connection Failed: " . mysqli_connect_error());
}


?>