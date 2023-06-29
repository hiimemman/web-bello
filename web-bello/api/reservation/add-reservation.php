<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../../connections/connection.php");
$con = connection();

// session ID
session_start();
$userId = $_SESSION['IDUSER'];


try {
    // Fetch the user's first name and last name from tbl_residents
    $sqlUser = "SELECT firstname, lastname FROM tbl_residents WHERE id = $userId";
    $resultUser = mysqli_query($con, $sqlUser);
    
    if ($rowUser = mysqli_fetch_assoc($resultUser)) {
        $firstName = $rowUser['firstname'];
        $lastName = $rowUser['lastname'];
        $Name = $firstName . ' ' . $lastName;
    } else {
        // Handle the case when user data is not found
        exit(json_encode(array(
            "responseStatus" => 'error',
            "responseContent" => null,
            "responseMessage" => 'User data not found!'
        )));
    }

    $Title = $_POST['title'];
    $Start = $_POST['start_date'];
    $End = $_POST['end_date'];
    

    $sql = "INSERT INTO `tbl_reservation` (`title`, `reserved_by`, `start_date`, `end_date`) VALUES ('$Title', '$Name', '$Start', '$End')";
    mysqli_query($con, $sql);

    // Get all reservations if successful
    $sqlGet = mysqli_query($con, "SELECT * FROM `tbl_reservation` ORDER BY `date_created` DESC");
    $result = mysqli_fetch_all($sqlGet, MYSQLI_ASSOC);
    echo '<script>alert("Reservation slot has been sent! Standby for confirmation.");</script>';

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
