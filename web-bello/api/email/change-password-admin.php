<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-type: application/json');
 
 include_once("../../connections/connection.php");
 $con = connection();

$Email = $_POST['emailChange'];
$NewPassword = $_POST['new_password'];

try{
    


    $sql = "UPDATE `tbl_hoa` SET `password` ='$NewPassword' WHERE `tbl_hoa`.`email` = '$Email';";
    mysqli_query($con, $sql);

   
    
    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Password has been updated!')));

}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Email does not exist:!')));
}

?>