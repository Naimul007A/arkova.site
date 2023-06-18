<?php
// Database configuration
$dbHost     = "localhost";
$dbUserName = "root";
$dbPassword = "123456";
$dbname     = "shortener";

// Create database connection
try {
    $db = mysqli_connect( $dbHost, $dbUserName, $dbPassword, $dbname );
} catch ( Exception $e ) {
    echo "Connection failed: " . $e->getMessage();
}