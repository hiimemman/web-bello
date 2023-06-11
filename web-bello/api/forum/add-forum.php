<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../../connections/connection.php");
$con = connection();


$Title = $_POST['title'];
$Message = $_POST['message_body'];
$Category = $_POST['category'];
$Editor_email = $_POST['editor_email'];
$ImageUrl = $_POST['image_url'];
try{
    


    $sql = "INSERT INTO `tbl_forum` (`title`,`message_body`,`category`,`editor_email`,`image_url`) VALUES ('$Title','$Message','$Category', '$Editor_email','$ImageUrl');";
    mysqli_query($con, $sql);

    //get all if success
    $sqlGet = mysqli_query($con, "SELECT * FROM `tbl_forum` ORDER BY `created_at` DESC");

    //store in result

    $result = mysqli_fetch_all($sqlGet, MYSQLI_ASSOC);

    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>$result, "responseMessage" =>'Forum has been added succesfully!')));

  
}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Adding new home owner failed error:!')));
}


?>