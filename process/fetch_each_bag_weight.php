<?php
include("../config/connection.php");

// Fetch data based on selected bags_quantity
if(isset($_POST['bags_quantity'])){
    $bags_quantity = $_POST['bags_quantity'];
    
    // Escape the bags_quantity to prevent SQL injection (optional)
    $bags_quantity = $conn->real_escape_string($bags_quantity);
    
    // Prepare SQL query
    $sql = "SELECT DISTINCT each_bag_weight FROM inward_master WHERE bags = '$bags_quantity'";
    
    // Execute SQL query
    $result = $conn->query($sql);
    
    // Check if query was successful
    if ($result) {
        // Fetch all rows as an associative array
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        // Return JSON-encoded data
        echo json_encode($data);
    } else {
        // Handle query error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close MySQLi connection
$conn->close();
?>