<?php
include("../config/connection.php");

// Fetch data based on selected bags_quantity
if(isset($_POST['product_name'])){
    $product_id = $_POST['product_name'];
    
    // Escape the bags_quantity to prevent SQL injection (optional)
    $product_id = $conn->real_escape_string($product_id);
    
    // Prepare SQL query
    // $sql = "SELECT DISTINCT each_bag_weight FROM inward_master_v2 WHERE bags = '$bags_quantity'";
      $sql = "SELECT total_kg, product_name FROM process_master WHERE id = '$product_id'";

    
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