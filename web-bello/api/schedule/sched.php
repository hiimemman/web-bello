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
    $response = array("status" => "success", "message" => "Event scheduled successfully.");
  } else {
    $response = array("status" => "error", "message" => "Error: " . mysqli_error($con));
  }

  // Return the response as JSON
  echo json_encode($response);
}
?>
