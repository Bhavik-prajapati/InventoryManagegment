<?php
include("../config/connection.php");

// Fetch data based on selected product_name
if(isset($_POST['product_name'])){
  $product_name = $_POST['product_name'];
  
  // Escape the product_name to prevent SQL injection (optional)
  $product_name = $conn->real_escape_string($product_name);
  
  // Prepare SQL query
  $sql = "SELECT id, total_kg FROM inward_master_v2 WHERE product_name = '$product_name'";
  
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
