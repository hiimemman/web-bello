<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-type: application/json');
 
 include_once("../../connections/connection.php");
 $con = connection();

$ID = $_POST['idUpdate'];
$Month = $_POST['month'];
$Balance = $_POST['balanceUpdate'];
$Status = $_POST['statusUpdate'];

try{
    


    $sql = "UPDATE `tbl_payment` SET `balance` ='$Balance',`status` ='$Status'WHERE `tbl_payment`.`payment_id` = '$ID';";
    mysqli_query($con, $sql);

   
    
    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Home owner information has been updated!')));

}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Update failed error:!')));
}

?>