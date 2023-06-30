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


if ($ID) {
    try{

        // Check if the password field is empty
        if(!empty($Password)){
            // Check if the password field is empty
            if($Password == $Password1){
            // $HashPassword = password_hash($Password, PASSWORD_DEFAULT);
            $sql = "UPDATE `tbl_residents` SET `firstname` = '$Firstname', `lastname` = '$Lastname', `sex` = '$Sex', `age` = '$Age', `address` = '$Address', `contact` = '$Contact', `email` = '$Email', `password` = '$Password' WHERE id = '$ID';";
            $result = mysqli_query($con, $sql);

            exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Updated succesfully!')));
            }else{
                echo "Password doesn't match.";
            }
        }
        
        // Check if a file was uploaded
if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['image_url'];
    
    // Specify the directory where you want to save the uploaded file
    $uploadDir = 'https://web-bello.online/web-bello/savedimages/';
    
    // Generate a unique filename for the uploaded file
    $filename = uniqid() . '_' . $file['name'];
    
    // Move the uploaded file to the specified directory
    if (move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {
        // Update the user's profile picture in the database
        $sql = "UPDATE tbl_residents SET image_url = '$uploadDir$filename' WHERE id = '$ID'";
        $result = mysqli_query($con, $sql);
        
        if ($result) {
            // Success message
            echo "Profile picture updated successfully!";
        } else {
            // Error message
            echo "Error updating profile picture: " . mysqli_error($con);
        }
    } else {
        // Error message
        echo "Error uploading file.";
    }
}


    }catch(Exception $e){
        exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Update failed error:!')));
    }
} else {
    echo "User ID not found in session.";
}



?>
