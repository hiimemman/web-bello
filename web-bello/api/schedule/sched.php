<?php
include_once("../../connections/connection.php");
require_once('../../vendor/autoload.php');
$con = connection();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $title = $_POST['title'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];



  $sqlResidents = mysqli_query($con, "SELECT * FROM `tbl_residents`");
    
  //store in result
  $resultsqlResidents = mysqli_fetch_all( $sqlResidents, MYSQLI_ASSOC);

  $iSmsSent = false;
  $messageError = "";
  // Iterate over each item in $result and insert a query
  foreach ($resultsqlResidents as $item) {
      $userId = $item['id'];
      $userEmail = $item['email'];
      $balance = 0; // Assuming the balance is initially 0
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
      $msg->setBody("Palazo Bello Community Notification

      Attention, Palazo Bello residents!
      
      Community Announcement: Stay Informed and Engage!
      
      We want to ensure that you stay informed and engaged in all the happenings within our vibrant Palazo Bello community. From exciting events to important updates, we have it all covered!
      
      ANNOUNCEMENT!
      
      What: $title
      When: ".$start_date." - ".$end_date."
      Where: Palazzo Bello community
      
      If you have any questions or require further information about any upcoming events or community updates, please don't hesitate to contact our community office. We are here to assist you!
      
      Let's continue to work together to create a vibrant and inclusive community at Palazo Bello. Stay connected, get involved, and make the most of your living experience here!
      
      Best regards,
      
      Palazo Bello Management"); 
      $msg->setTo($contact);
      $msg->setSource("sdk");

      // \ClickSend\Model\SmsMessageCollection | SmsMessageCollection model
      $sms_messages = new \ClickSend\Model\SmsMessageCollection(); 
      $sms_messages->setMessages([$msg]);

    try {
      $resultsqlResidents = $apiInstance->smsSendPost($sms_messages);
    //print_r($result);
    //exit(json_encode(array("status" =>'success', "responseContent" => $resultsqlResidents, "message" =>'Success:!')));
    $iSmsSent = true;
    } catch (Exception $e) {
      $messageError = $e->getMessage();
    //echo 'Exception when calling SMSApi->smsSendPost: ', $e->getMessage(), PHP_EOL;
    exit(json_encode(array("status" =>'error', "responseContent" => $e->getMessage(), "message" =>'Error:!')));
    }
  }
  if($iSmsSent == true){
 // Insert the event into the database
 $sql = "INSERT INTO tbl_sched (title, start_date, end_date) VALUES ('$title', '$start_date', '$end_date')";
 if (mysqli_query($con, $sql)) {
   $response = array("status" => "success", "message" => "Event scheduled successfully.");
 } else {
   $response = array("status" => "error", "message" => "Error: " . mysqli_error($con));
 }

 // Return the response as JSON
 echo json_encode($response);
 exit(); // Add this line to stop further execution
  }else{
    echo json_decode($messageError);
    exit();
  }
 
}

// Fetch all events from the database
$sql = "SELECT * FROM tbl_sched";
$result = mysqli_query($con, $sql);

// Check if any events were found
if (mysqli_num_rows($result) > 0) {
  $events = array();

  // Iterate through each row and add it to the events array
  while ($row = mysqli_fetch_assoc($result)) {
    $event = array(
      'title' => $row['title'],
      'start' => $row['start_date'],
      'end' => $row['end_date']
    );

    $events[] = $event;
  }

  // Return the events as JSON response
  header('Content-Type: application/json'); // Set the content type header
  echo json_encode($events);
} else {
  // No events found
  header('Content-Type: application/json'); // Set the content type header
  echo json_encode([]); // Return an empty array as JSON response
}