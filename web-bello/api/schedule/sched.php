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

  // Iterate over each item in $result and insert a query
  foreach ($resultsqlResidents as $item) {
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
$msg->setBody("📱 SMS Message Template 📱

🏢 Palazo Bello Community Notification 🏢

📅 Attention, Palazo Bello residents! 📅

🎉 Exciting Event Announcement! 🎉

📣 We are thrilled to share the following event happening in Palazo Bello subdivision: $title

📅 Event Date: [$start_date]
⏰ Event Time: [$end_date]
📍 Event Location: [Palazzo Bello]

Join us for this exciting event and get the opportunity to connect with your fellow residents. Don't miss out on the fun and the chance to build a stronger community together!

🌟 Your participation and engagement are vital to making Palazo Bello a vibrant and welcoming place to live. Let's come together and make this event a memorable one! 🌟

If you have any questions or need further information, feel free to contact our community office at (555) 123-4567.

We look forward to seeing you there!

Best regards,

Palazo Bello Management"); 
$msg->setTo($contact);
$msg->setSource("sdk");

// \ClickSend\Model\SmsMessageCollection | SmsMessageCollection model
$sms_messages = new \ClickSend\Model\SmsMessageCollection(); 
$sms_messages->setMessages([$msg]);

try {
  $resultsqlResidents = $apiInstance->smsSendPost($sms_messages);
print_r($result);
} catch (Exception $e) {
echo 'Exception when calling SMSApi->smsSendPost: ', $e->getMessage(), PHP_EOL;
}
}

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