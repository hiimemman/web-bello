<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../../connections/connection.php");
$con = connection();


$Title = $_POST['title'];
$Place = $_POST['place'];
$Name = $_POST['reserved_by'];
$Start = $_POST['start_date'];
$End = $_POST['end_date'];
$ImageUrl = $_POST['image_url'];

try{
    


    $sql = "INSERT INTO `tbl_reservation` (`title`,`place`,`reserved_by`,`start_date`,`end_date`,`image_url`) VALUES ('$Title','$Place','$Name','$Start', '$End', '$ImageUrl');";
    mysqli_query($con, $sql);

    //get all if success
    $sqlGet = mysqli_query($con, "SELECT * FROM `tbl_reservation` ORDER BY `date_created` DESC");

    //store in result

    $result = mysqli_fetch_all($sqlGet, MYSQLI_ASSOC);

    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>$result, "responseMessage" =>'Reservation slot has been added succesfully!')));

  
}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Adding new reservation failed error:!')));
}


?>