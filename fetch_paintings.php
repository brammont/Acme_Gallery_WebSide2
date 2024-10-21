<?php
// fetch_paintings.php

// Database connection settings
$host = 'localhost';
$dbname = 'acme_gallery'; // Your database name
$username = 'root'; // Your MySQL username
$password = ''; // Your MySQL password

try {
    // Create a new PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL query to fetch all paintings
    $stmt = $pdo->query("SELECT title, artist, year, image FROM paintings");
    
    // Fetch all paintings as an associative array
    $paintings = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return the paintings as JSON
    header('Content-Type: application/json');
    echo json_encode($paintings);

} catch (PDOException $e) {
    // Handle database connection errors
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
}
?>
