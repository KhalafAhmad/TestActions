<?php
$host = 'localhost';
$db   = 'test_db';
$user = 'root';
$pass = 'password'; // adjust if needed
$charset = 'utf8mb4';

// 1. Set up DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// 2. Set up PDO options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

// 3. Connect to the database
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// 4. Create a table
$pdo->exec("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100)
)");

// 5. Insert data
$pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)")
    ->execute(['Alice', 'alice@example.com']);
$pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)")
    ->execute(['Bob', 'bob@example.com']);

// 6. Fetch and print data
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll();

echo "<h2>User List:</h2>";
echo "<ul>";
foreach ($users as $user) {
    echo "<li>{$user['name']} ({$user['email']})</li>";
}
echo "</ul>";
?>
