<?php
if (isset($_POST['country_id'])) {
    $country_id = $_POST['country_id'];
    
    $conn = new mysqli('localhost', 'root', '', 'myapp');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT id, name FROM states WHERE country_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $country_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $states = [];
    while ($row = $result->fetch_assoc()) {
        $states[] = $row;
    }
    
    $stmt->close();
    $conn->close();
    
    echo json_encode($states);
}
?>
