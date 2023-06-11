<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../../connections/connection.php");

$con = connection();

$ForumId = $_POST['ForumId'];

try{

$sql = mysqli_query($con, "SELECT * FROM `tbl_comments` WHERE forum_id = '$ForumId' ORDER BY `created_at` DESC");

    // Store the result
$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);

exit(json_encode(array("responseStatus" =>'success', "responseContent" => $result)));
}catch (Exception $e){
    exit(json_encode(array("responseStatus" =>'FAILED', "responseContent"=>'Error', "errorMessage" => $e->getMessage())));
}

?>