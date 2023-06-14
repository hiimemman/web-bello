<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../../connections/connection.php");
$con = connection();

$CommentText = $_POST['comment_text'];
$ForumId = $_POST['forum_id'];
$UserFullName = $_POST['user_full_name'];
$UserId = $_POST['user_id'];
$UserEmail = $_POST['user_email'];
$ImageUrl = $_POST['image_url'];

try {
    $sql = "INSERT INTO `tbl_comments` (`comment_text`,`forum_id`,`user_full_name`,`user_id`,`user_email`,`image_url`) VALUES ('$CommentText','$ForumId','$UserFullName', '$UserId','$UserEmail','$ImageUrl')";
    mysqli_query($con, $sql);

    // Retrieve all comments after successful insertion
    $sqlGet = mysqli_query($con, "SELECT * FROM `tbl_comments` ORDER BY `created_at` DESC");
    $result = mysqli_fetch_all($sqlGet, MYSQLI_ASSOC);

    // Return the response as JSON
    // echo json_encode(array("responseStatus" => 'success', "responseContent" => $result, "responseMessage" => 'Comment added successfully!'));

    // Reload the page using JavaScript
    echo '<script>window.location.reload();</script>';
    exit;
} catch (Exception $e) {
    echo json_encode(array("responseStatus" => 'error', "responseContent" => $e->getMessage(), "responseMessage" => 'Failed to add comment!'));
}
?>
