<?php
include_once("../../connections/connection.php");
$con = connection();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $title = $_POST['title'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];

  // Insert the event into the database
  $sql = "INSERT INTO tbl_sched (title, start_date, end_date) VALUES ('$title', '$start_date', '$end_date')";
  if (mysqli_query($con, $sql)) {
    $response = array("status" => "success", "message" => "Reserved successfully.");
  } else {
    $response = array("status" => "error", "message" => "Error: " . mysqli_error($con));
  }

  echo json_encode($response);
  exit(); // Add this line to stop further execution
}

// Fetch all events from the database
$sql = "SELECT * FROM tbl_reservation";
$result = mysqli_query($con, $sql);

// Check if any events were found
if (mysqli_num_rows($result) > 0) {
  $events = array();

  // Iterate through each row and add it to the events array
  while ($row = mysqli_fetch_assoc($result)) {
    $event = array(
      'title' => $row['title'],
      'start' => $row['start_date'],
      'end' => $row['end_date']
    );

    $events[] = $event;
  }

  // Return the events as JSON response
  header('Content-Type: application/json'); // Set the content type header
  echo json_encode($events);
} else {
  // No events found
  header('Content-Type: application/json'); // Set the content type header
  echo json_encode([]); // Return an empty array as JSON response
}
?>
