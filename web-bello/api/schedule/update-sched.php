<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-type: application/json');
 
 include_once("../../connections/connection.php");
 $con = connection();

$ID = $_POST['idUpdate'];
$Title = $_POST['titleUpdate'];
$Start = $_POST['startUpdate'];
$End = $_POST['endUpdate'];
$Status = $_POST['statusUpdate'];

try{
    


    $sql = "UPDATE `tbl_sched` SET `title` ='$Title', `start_date` = '$Start', `end_date` = '$End', `status` = '$Status' WHERE `tbl_sched`.`id` = '$ID';";
    mysqli_query($con, $sql);

   
    
    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Schedule updated succesfully!')));

}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Update failed error:!')));
}

?>