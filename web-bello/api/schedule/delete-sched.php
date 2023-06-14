<?php
include_once("../../connections/connection.php");
$con = connection();

// Delete event if requested
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_event'])) {
    $eventID = $_POST['delete_event'];
    $sql = "DELETE FROM tbl_sched WHERE id = $eventID";
    mysqli_query($con, $sql);
}

// Select all events from the database
$sql = "SELECT * FROM tbl_sched";
$result = mysqli_query($con, $sql);

// Check if any events were found
if (mysqli_num_rows($result) > 0) {
    $events = array();

    // Iterate through each row and add it to the events array
    while ($row = mysqli_fetch_assoc($result)) {
        $event = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'start' => $row['start_date'],
            'end' => $row['end_date']
        );

        $events[] = $event;
    }
}

// Return the events as JSON response
header('Content-Type: application/json'); // Set the content type header
echo json_encode($events);
?>
