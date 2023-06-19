<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $to = 'manuelolarve@gmail.com';
    $subject = 'New Contact Form Submission';
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email";
    
    // Send email
  // Send email
  if (mail($to, $subject, $body, $headers)) {
    // Email sent successfully
    echo '<script>window.setTimeout(function(){ location.reload(); }, 1000);</script>';
} else {
    // Error sending email
    echo '<script>alert("Sorry, there was an error sending your message. Please try again later.");</script>';
}
}
?>