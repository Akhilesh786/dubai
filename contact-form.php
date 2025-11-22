<?php
/**
 * Simple contact form handler for the static site.
 * - Expects POST fields: name, email, subject, message
 * - Returns JSON: { status: 'true'|'false', message: '...' }
 * - Update $to with the real recipient address before use.
 */

header('Content-Type: application/json; charset=utf-8');

$to = 'Rishis@awesomepanama.com '; // <-- CHANGE THIS to the actual recipient

$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$subject = isset($_POST['subject']) && $_POST['subject'] !== '' ? trim($_POST['subject']) : 'New message from website';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Basic validation
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["status" => 'false', "message" => 'Please provide a valid email address.']);
    exit;
}

// Construct email body
$body = "You have received a new message from the website contact form:\n\n";
if ($name !== '') {
    $body .= "Name: {$name}\n";
}
$body .= "Email: {$email}\n\n";
$body .= "Message:\n{$message}\n";

// Build headers
$headers = "From: " . ($name !== '' ? $name . " <{$email}>" : $email) . "\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Attempt to send
if (mail($to, $subject, $body, $headers)) {
    echo json_encode(["status" => 'true', "message" => "Thank you for your message. We will get back to you soon!"]);
} else {
    echo json_encode(["status" => 'false', "message" => "There was an error sending your message. Please try again later."]);
}

?>