<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
include_once("../../connections/connection.php");
$con = connection();

//UPLOAD > PHP
$img_name = $_FILES['profileEdit']['name'];
$img_size = $_FILES['profileEdit']['size'];
$imgSize = $_FILES['profileEdit']['size'];
$tmp_name = $_FILES['profileEdit']['tmp_name'];


if (isset($img_name)) {

  
    if ( $imgSize > 2000000) {
      exit(json_encode(array("statusCode"=>201)));
    }
  
    if (empty($errors)) {
  
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
  
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = '../../savedimages/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
      
                   
                    exit(json_encode(array("image"=>$new_img_name,"statusCode"=>200)));
    } else {
      exit(json_encode(array("statusCode"=>201)));
    }
    exit(json_encode(array("statusCode"=>201)));
  } 
  exit(json_encode(array("statusCode"=>201)));


?>