<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-type: application/json');

 include_once("../../connections/connection.php");
 $con = connection();

$ID = $_POST['forumID'];
$UserID = $_POST['userID'];
$LikeCount = $_POST['likedCount'];

try{
    


    $sql = "UPDATE `tbl_forum` SET `like_count` ='$LikeCount' WHERE `tbl_forum`.`id` = '$ID';";
    mysqli_query($con, $sql);

   
    $sqlGetUpdate = mysqli_query($con, "SELECT like_count FROM `tbl_forum` WHERE `tbl_forum`.`id` = '$ID'");

//store in result

$result = mysqli_fetch_all($sqlGetUpdate, MYSQLI_ASSOC);
    
    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>$result, "responseMessage" =>'Forum updated succesfully!')));

}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Update failed error:!')));
}

?>