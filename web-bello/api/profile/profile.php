<?php
session_start();

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../../connections/connection.php");
$con = connection();

$ID = $_SESSION['IDUSER'] ?? null;
$Firstname = $_POST['firstname'];
$Lastname = $_POST['lastname'];
$Sex = $_POST['sex'];
$Age = $_POST['age'];
$Address = $_POST['address'];
$Contact = $_POST['contact'];
$Email = $_POST['email'];
$Password = $_POST['password'];
$Password1 = $_POST['password1'];
$Image = $_POST['image_url'];

if ($ID) {
    try{

        // Check if the password field is empty
        if(!empty($Password)){
            // Check if the password field is empty
            if($Password == $Password1){
            // $HashPassword = password_hash($Password, PASSWORD_DEFAULT);
            $sql = "UPDATE `tbl_residents` SET `firstname` = '$Firstname', `lastname` = '$Lastname', `sex` = '$Sex', `age` = '$Age', `address` = '$Address', `contact` = '$Contact', `email` = '$Email', `password` = '$Password', `image_url` = '$Image' WHERE id = '$ID';";
            $result = mysqli_query($con, $sql);

            exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Updated succesfully!')));
            }else{
                echo "Password doesn't match.";
            }
        }
    }catch(Exception $e){
        exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Update failed error:!')));
    }
} else {
    echo "User ID not found in session.";
}

?>
