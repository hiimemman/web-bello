<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../../connections/connection.php");
$con = connection();

$UserId = $_POST['UserId'];

try {
    $stmt = $con->prepare("SELECT * FROM `tbl_payment` WHERE user_id = ? ORDER BY `created_at` DESC");
    $stmt->bind_param("i", $UserId);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    // Build the response array
    $response = array(
        "responseStatus" => "success",
        "responseContent" => $result
    );

    // Return the response as JSON
    echo json_encode($response);
} catch (Exception $e) {
    // Build the error response array
    $errorResponse = array(
        "responseStatus" => "error",
        "responseContent" => "Failed to retrieve monthly due",
        "errorMessage" => $e->getMessage()
    );

    // Return the error response as JSON
    echo json_encode($errorResponse);
}
?>
