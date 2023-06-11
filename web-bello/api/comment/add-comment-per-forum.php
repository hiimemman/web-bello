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
try{
    


    $sql = "INSERT INTO `tbl_comments` (`comment_text`,`forum_id`,`user_full_name`,`user_id`,`user_email`,`image_url`) VALUES ('$CommentText','$ForumId','$UserFullName', '$UserId','$UserEmail','$ImageUrl');";
    mysqli_query($con, $sql);

    //get all if success
    $sqlGet = mysqli_query($con, "SELECT * FROM `tbl_comments` ORDER BY `created_at` DESC");

    //store in result

    $result = mysqli_fetch_all($sqlGet, MYSQLI_ASSOC);

// Redirect to the specified URL
header("Location: https://web-bello.online/web-bello/pages/user-forum.php");
exit();
  
}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Comment new home owner failed error:!')));
}


?>