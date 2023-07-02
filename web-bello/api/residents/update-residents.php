<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-type: application/json');
 
 include_once("../../connections/connection.php");
 $con = connection();


$ID = $_POST['idUpdate'];
$Firstname = $_POST['firstnameUpdate'];
$Lastname = $_POST['lastnameUpdate'];
$Sex = $_POST['sexUpdate'];
$Age = $_POST['ageUpdate'];
$Address = $_POST['addressUpdate'];
$Contact = $_POST['contactUpdate'];
$Email = $_POST['emailUpdate'];
$Status = $_POST['statusUpdate'];
$PaymentStatus = $_POST['paymentUpdate'];

try{
    
    $sql = "UPDATE `tbl_residents` SET `firstname` ='$Firstname',`lastname` ='$Lastname',`sex` ='$Sex',`age` ='$Age',`address` ='$Address',`contact` ='$Contact',`email` ='$Email',`status` = '$Status',`payment_status` = '$PaymentStatus' WHERE `tbl_residents`.`id` = '$ID';";
    mysqli_query($con, $sql);

   
    
    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Updated succesfully!')));

}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Update failed error:!')));
}

?>