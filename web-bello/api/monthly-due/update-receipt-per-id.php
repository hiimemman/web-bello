<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-type: application/json');
 
 include_once("../../connections/connection.php");
 $con = connection();

$ID = $_POST['idUpdate'];
$ReceiptURl = $_POST['receipt_url'];


try{
    


    $sql = "UPDATE `tbl_payment` SET `receipt_url` ='$ReceiptURl'WHERE `tbl_payment`.`payment_id` = '$ID';";
    mysqli_query($con, $sql);

   
    
    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Monthly due has been updated!')));

}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Update failed error:!')));
}

?>