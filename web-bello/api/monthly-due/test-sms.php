<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require_once('../../vendor/autoload.php');


// Configure HTTP basic authorization: BasicAuth
$config = ClickSend\Configuration::getDefaultConfiguration()
->setUsername('Aisat.lao193027@gmail.com')
->setPassword('1A7CA075-00A2-7062-6A6E-D107988759FF');

$apiInstance = new ClickSend\Api\SMSApi(new GuzzleHttp\Client(),$config);
$msg = new \ClickSend\Model\SmsMessage();
$msg->setBody("Dear Test,

This is a friendly reminder that your new monthly due has been calculated for the upcoming month. Please find the details below:

Amount due: 500

We kindly request you to settle the payment on time to ensure the smooth operation and maintenance of our community.

If you have any questions or need further assistance, please feel free to contact our management office.

Thank you for your cooperation.

Best regards,
Palazzo Bello Management"); 
$msg->setTo('09454992459');
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
?>