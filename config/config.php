<?php
// config/config.php

define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // default user
define('DB_PASS', ''); // default password
define('DB_NAME', 'acme_gallery');

// Connect to database
function connect() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>
