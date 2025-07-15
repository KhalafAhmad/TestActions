<?php
// 1. Database connection info
$servername = "mysql";
$username = "root";
$password = ""; // Set your own password
$database = "test_db";

// 2. Create connection
$conn = new mysqli($servername, $username, $password, $database);

// 3. Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT id, name FROM users");

echo "<h3>All Users:</h3>";
while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
}

// 8. Close connection
$conn->close();
?>
