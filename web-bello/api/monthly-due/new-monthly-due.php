<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../../connections/connection.php");
require_once('../../vendor/autoload.php');
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
        $name = $item['firstname'];
        $contact = $item['contact'];

// Configure HTTP basic authorization: BasicAuth
$config = ClickSend\Configuration::getDefaultConfiguration()
->setUsername('megumionaka28@gmail.com')
->setPassword('AF129BBA-2824-E020-7471-42EE0608670B');

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
print_r($result);
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