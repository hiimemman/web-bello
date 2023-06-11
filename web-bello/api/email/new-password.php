<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-type: application/json');
 
 include_once("../../connections/connection.php");
 $con = connection();

$Email = $_POST['email'];
$NewPassword = $_POST['new_password'];
$UserPosition = $_POST['user_position'];

if($UserPosition == "HOA"){
  try{
    


    $sql = "UPDATE `tbl_hoa` SET `password` ='$NewPassword' WHERE `tbl_hoa`.`email` = '$Email';";
    mysqli_query($con, $sql);

   
    
    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Password has been updated!')));

}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Email does not exist:!')));
}
  
}


if($UserPosition == "RESIDENT"){
  try{
    


    $sql = "UPDATE `tbl_residents` SET `password` ='$NewPassword' WHERE `tbl_residents`.`email` = '$Email';";
    mysqli_query($con, $sql);

   
    
    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Password has been updated!')));

}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Email does not exist:!')));
}
  
}

?>