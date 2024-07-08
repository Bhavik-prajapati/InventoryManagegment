<?php
if (isset($_GET['fetch_activities'])) {
    include("../config/connection.php");

    $sqlactitivty = "SELECT * FROM activity_master ORDER BY id DESC";
    $recentdata = $conn->query($sqlactitivty);

    $activities = [];

    if ($recentdata->num_rows > 0) {
        while ($rowrecentdata = $recentdata->fetch_assoc()) {
            $rowrecentdata['time_diff'] = time_difference($rowrecentdata['activity_timestamp']);
            $rowrecentdata['formatted_time'] = format_datetime($rowrecentdata['activity_timestamp']);
            $activities[] = $rowrecentdata;
        }
    }
    echo json_encode($activities);
    exit;
}
?>
