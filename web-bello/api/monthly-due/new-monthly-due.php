<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../../connections/connection.php");
require_once('../../vendor/autoload.php');
$con = connection();

$Month = $_POST['month'];
$Amount = $_POST['amount'];
$Address = $_POST['address'];
try{
    // Build the SQL query dynamically
$sql = "SELECT * FROM `tbl_residents` WHERE 1=1"; // Start with a dummy condition that will always be true

// Add the address filter if it is not empty
if (!empty($Address)) {
    $Address = mysqli_real_escape_string($con, $Address); // Escape the address to prevent SQL injection
    $sql .= " AND `address` = '$Address'";
}

// Execute the query
$queryResult = mysqli_query($con, $sql);

if ($queryResult) {
    // Store the results
    $result = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);
}

    // Iterate over each item in $result and insert a query
    foreach ($result as $item) {
        $userId = $item['id'];
        $userEmail = $item['email'];
        $balance = $Amount; // Assuming the balance is initially 0
        $status = 'unpaid'; // Assuming the status is initially 'pending'
        $receiptUrl = ''; // Assuming the receipt URL is initially empty
        $name = $item['firstname'];
        $contact = $item['contact'];

// Configure HTTP basic authorization: BasicAuth
$config = ClickSend\Configuration::getDefaultConfiguration()
->setUsername('megsdiscountedgamecredits@gmail.com')
->setPassword('E15BAEB1-154F-FF1C-4024-945F3A77499E');

$apiInstance = new ClickSend\Api\SMSApi(new GuzzleHttp\Client(),$config);
$msg = new \ClickSend\Model\SmsMessage();
$msg->setBody("Dear Palazzo Bello $name,

This is a friendly reminder that your new monthly due has been calculated for the upcoming month. Please find the details below:

Amount due: $Amount

We kindly request you to settle the payment on time to ensure the smooth operation and maintenance of our community.

If you have any questions or need further assistance, please feel free to contact our management office.

Thank you for your cooperation.

Best regards,
Palazzo Bello Management"); 
$msg->setTo($contact);
$msg->setSource("sdk");

// \ClickSend\Model\SmsMessageCollection | SmsMessageCollection model
$sms_messages = new \ClickSend\Model\SmsMessageCollection(); 
$sms_messages->setMessages([$msg]);

try {
$result = $apiInstance->smsSendPost($sms_messages);
//print_r($result);
} catch (Exception $e) {
echo 'Exception when calling SMSApi->smsSendPost: ', $e->getMessage(), PHP_EOL;
}
        
        $sqlGeneratePayment = "INSERT INTO `tbl_payment` (`user_id`, `user_email`, `month`, `amount`, `balance`, `status`, `receipt_url`) VALUES ('$userId', '$userEmail', '$Month', '$Amount', '$balance', '$status', '$receiptUrl')";
        mysqli_query($con, $sqlGeneratePayment);
    }

    //get updated dues

    $sqlDues = mysqli_query($con, "SELECT * FROM `tbl_payment`");
    //store in result
    $resultDues = mysqli_fetch_all($sqlDues, MYSQLI_ASSOC);

    exit(json_encode(array("responseStatus" =>'success', "responseContent" => $resultDues)));
  
}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" => $e->getMessage(), "responseMessage" =>'Comment new home owner failed error:!')));
}
?>