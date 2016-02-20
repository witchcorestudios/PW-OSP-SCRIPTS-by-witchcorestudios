<?php
$servername = "localhost";
$username = "root";
$password = "pass";
$dbname = "scripts";
$unique_id = $_GET["uniqueid"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT IGNORE INTO player_names (unique_id)
VALUES ('$unique_id')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>