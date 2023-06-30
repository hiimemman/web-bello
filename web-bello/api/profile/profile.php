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
            $sql = "UPDATE `tbl_residents` SET `firstname` = '$Firstname', `lastname` = '$Lastname', `sex` = '$Sex', `age` = '$Age', `address` = '$Address', `contact` = '$Contact', `email` = '$Email', `password` = '$Password', `image_url` = '$Image' WHERE id = '$ID';";
            $result = mysqli_query($con, $sql);

            exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Updated succesfully!')));
            }else{
                echo "Password doesn't match.";
            }
        }

        // Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file is uploaded
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image_url'];
        $imagePath = 'https://web-bello.online/web-bello/savedimages/'; // Set the desired path to save the image
        
        // Move the uploaded image to the desired path
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            // Update the database with the new image URL
            $sql = "UPDATE tbl_residents SET image_url = '$imagePath' WHERE id = '$ID'";
            $result = mysqli_query($con, $sql);

            if ($result) {
                // Image uploaded and database updated successfully
                echo "Profile picture updated successfully.";
            } else {
                echo "Error updating profile picture: " . mysqli_error($con);
            }
        } else {
            echo "Error moving uploaded image.";
        }
    }
}

    }catch(Exception $e){
        exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Update failed error:!')));
    }
} else {
    echo "User ID not found in session.";
}

?>
