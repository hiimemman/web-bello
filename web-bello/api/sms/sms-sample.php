<?php
require '../../vendor/autoload.php';
use Twilio\Rest\Client;

try {

// Your Account SID and Auth Token from twilio.com/console
// To set up environmental variables, see http://twil.io/secure
$account_sid = 'AC7eb1839388e8c815659095dca8c7129c';
$auth_token = 'cad0897838bd5073cdb13fa603a8909d';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+15017122661";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+639454992459',
    array(
        'from' => $twilio_number,
        'body' => 'I sent this message in under 10 minutes!'
    )
);
}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'FAILED', "responseContent"=>'Error', "errorMessage" => $e->getMessage())));
}