<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-type: application/json');
 
 include_once("../../connections/connection.php");
 $con = connection();

$ID = $_POST['idUpdate'];
$Firstname = $_POST['firstnameUpdate'];
$Lastname = $_POST['lastnameUpdate'];
$Email = $_POST['emailUpdate'];
$Address = $_POST['addressUpdate'];
$Role = $_POST['roleUpdate'];
$Status = $_POST['statusUpdate'];

try{
    


    $sql = "UPDATE `tbl_hoa` SET `firstname` ='$Firstname',`lastname` ='$Lastname',`email` ='$Email',`address` ='$Address',`role` ='$Role',`status` = '$Status' WHERE `tbl_hoa`.`id` = '$ID';";
    mysqli_query($con, $sql);

   
    
    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Home owner information has been updated!')));

}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Update failed error:!')));
}

?>