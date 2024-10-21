<?php
// config/config.php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');  // Default XAMPP MySQL user
define('DB_PASS', '');      // Default XAMPP MySQL password (empty)
define('DB_NAME', 'acme_gallery');

// Display PHP errors for development (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
