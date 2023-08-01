<?php 
    // Establish database credentials
    $hostname = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $database = 'medicare';
    
    // Connect to the database
    $mysqli = new mysqli($hostname, $db_username, $db_password, $database);
?>