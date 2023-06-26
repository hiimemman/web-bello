<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-type: application/json');
 
 include_once("../../connections/connection.php");
 $con = connection();

$ID = $_POST['idUpdate'];
$Title = $_POST['titleUpdate'];
$Message = $_POST['message_bodyUpdate'];
$Category = $_POST['categoryUpdate'];
$Status = $_POST['statusUpdate'];

try{
    


    $sql = "UPDATE `tbl_forum` SET `title` ='$Title', `message_body` ='$Message',`category` ='$Category',`status` = '$Status' WHERE `tbl_forum`.`id` = '$ID';";
    mysqli_query($con, $sql);

   
    
    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Forum updated succesfully!')));

}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Update failed error:!')));
}

?>