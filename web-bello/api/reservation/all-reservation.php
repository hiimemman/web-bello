<?php
include_once("../../connections/connection.php");
$con = connection();

// Select all events from the database
$sql = "SELECT * FROM tbl_reservation WHERE status = 'Active'";
$result = mysqli_query($con, $sql);

// Check if any events were found
if (mysqli_num_rows($result) > 0) {
  $events = array();

  // Iterate through each row and add it to the events array
  while ($row = mysqli_fetch_assoc($result)) {
    $event = array(
      'title' => $row['title'],
      'place' => $row['place'],
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
