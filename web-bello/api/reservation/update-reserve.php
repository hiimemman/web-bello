<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-type: application/json');
 
 include_once("../../connections/connection.php");
 $con = connection();

$ID = $_POST['idUpdate'];
$Title = $_POST['titleUpdate'];
$Name = $_POST['nameUpdate'];
$Start = $_POST['startUpdate'];
$End = $_POST['endUpdate'];
$ImageUrl = $_POST['receipt_url'];
$Status = $_POST['statusUpdate'];

try{
    


    $sql = "UPDATE `tbl_reservation` SET `title` ='$Title', `reserved_by` ='$Name',`start_date` = '$Start', `end_date` = '$End', `image_url` = '$ImageUrl', `status` = '$Status' WHERE `tbl_reservation`.`id` = '$ID';";
    mysqli_query($con, $sql);

   
    
    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Reservation updated succesfully!')));

}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Update failed error:!')));
}

?>