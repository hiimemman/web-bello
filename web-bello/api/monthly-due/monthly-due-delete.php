

<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-type: application/json');
 
 include_once("../../connections/connection.php");
 $con = connection();

$ID = $_POST['IdDelete'];


try{
    


    $sql = "DELETE FROM `tbl_payment` WHERE `tbl_payment`.`payment_id` = '$ID';";
    mysqli_query($con, $sql);


    
    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Home owner has been deleted!')));

}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Update failed error:!')));
}

?>

