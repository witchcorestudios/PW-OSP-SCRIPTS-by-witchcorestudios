<?php
$config = parse_ini_file('db.ini');


// Create connection

$unique_id = $_GET["uniqueid"];
$conn = mysqli_connect($config['server'],$config['username'],$config['password'],$config['dbname']);
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
