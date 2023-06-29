<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../../connections/connection.php");
$con = connection();

// Assuming you have a session storing the user's name
session_start();
$Name = $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];


$Title = $_POST['title'];
$Start = $_POST['start_date'];
$End = $_POST['end_date'];

try {
    $sql = "INSERT INTO `tbl_reservation` (`title`, `reserved_by`, `start_date`, `end_date`) VALUES ('$Title', '$Name', '$Start', '$End')";
    mysqli_query($con, $sql);

    // Get all reservations if successful
    $sqlGet = mysqli_query($con, "SELECT * FROM `tbl_reservation` ORDER BY `date_created` DESC");
    $result = mysqli_fetch_all($sqlGet, MYSQLI_ASSOC);

    exit(json_encode(array(
        "responseStatus" => 'success',
        "responseContent" => $result,
        "responseMessage" => 'Reservation slot has been added successfully!'
    )));
} catch (Exception $e) {
    exit(json_encode(array(
        "responseStatus" => 'error',
        "responseContent" => $e->getMessage(),
        "responseMessage" => 'Failed to add new reservation!'
    )));
}
?>
