<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../../connections/connection.php");
$con = connection();

$Month = $_POST['month'];
$Amount = $_POST['amount'];

try{
    $sql = mysqli_query($con, "SELECT * FROM `tbl_residents`");
    
    //store in result
    $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);

    // Iterate over each item in $result and insert a query
    foreach ($result as $item) {
        $userId = $item['id'];
        $userEmail = $item['email'];
        $balance = $Amount; // Assuming the balance is initially 0
        $status = 'unpaid'; // Assuming the status is initially 'pending'
        $receiptUrl = ''; // Assuming the receipt URL is initially empty
        
        $sqlGeneratePayment = "INSERT INTO `tbl_payment` (`user_id`, `user_email`, `month`, `amount`, `balance`, `status`, `receipt_url`) VALUES ('$userId', '$userEmail', '$Month', '$Amount', '$balance', '$status', '$receiptUrl')";
        mysqli_query($con, $sqlGeneratePayment);
    }

    //get updated dues

    $sqlDues = mysqli_query($con, "SELECT * FROM `tbl_payment`");
    //store in result
    $resultDues = mysqli_fetch_all($sqlDues, MYSQLI_ASSOC);

    exit(json_encode(array("responseStatus" =>'OK', "responseContent" => $resultDues)));
  
}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" => $e->getMessage(), "responseMessage" =>'Comment new home owner failed error:!')));
}
?>