<?php
// 1. Database connection info
$servername = "localhost";
$username = "root";
$password = "khalaf"; // Set your own password
$database = "test_db";

// 2. Create connection
$conn = new mysqli($servername, $username, $password, $database);

// 3. Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 4. Create table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
)");

// 5. Simulated user input (you could use $_POST['name'] in real use)
$user_input = "Alice";

// 6. Insert input into the table
$stmt = $conn->prepare("INSERT INTO users (name) VALUES (?)");
$stmt->bind_param("s", $user_input);
$stmt->execute();

// 7. Fetch and display all rows
//$result = $conn->query("SELECT id, name FROM users");

//echo "<h3>All Users:</h3>";
//while ($row = $result->fetch_assoc()) {
    //echo "ID: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
//}

// 8. Close connection
$conn->close();
?>
