<?php
    session_start(); // Start the session

    // Establish a database connection (assuming you have already done this)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inventorydb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    date_default_timezone_set('Asia/Kolkata');

?>