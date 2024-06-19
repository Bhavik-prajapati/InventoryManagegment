<?php
if (isset($_POST['state_id'])) {
    $state_id = $_POST['state_id'];
    
    $conn = new mysqli('localhost', 'root', '', 'myapp');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT id, name FROM cities WHERE state_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $state_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $cities = [];
    while ($row = $result->fetch_assoc()) {
        $cities[] = $row;
    }
    
    $stmt->close();
    $conn->close();
    
    echo json_encode($cities);
}
?>
