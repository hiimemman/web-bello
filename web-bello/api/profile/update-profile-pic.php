<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../../connections/connection.php");
$con = connection();


$ID = $_POST['id'];
$ImageUrl = $_POST['image_url'];
try{
    


    $sql = "UPDATE `tbl_residents` SET `image_url` ='$ImageUrl' WHERE `tbl_residents`.`id` = '$ID';";
        mysqli_query($con, $sql);

    //get all if success
    $sqlGet = mysqli_query($con, "SELECT * FROM `tbl_residents` ORDER BY `created_at` DESC");

    //store in result

    $result = mysqli_fetch_all($sqlGet, MYSQLI_ASSOC);

    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>$result, "responseMessage" =>'Forum has been added succesfully!')));

  
}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Adding new home owner failed error:!')));
}


?>