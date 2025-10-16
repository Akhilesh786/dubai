<?php
// Set the content type to be plain text for emails
header("Content-Type: text/html; charset=UTF-8");

// Define error messages
$errors = [];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form inputs and sanitize them
    $form_name = isset($_POST['form_name']) ? trim($_POST['form_name']) : '';
    $form_email = isset($_POST['form_email']) ? trim($_POST['form_email']) : '';
    $form_message = isset($_POST['form_message']) ? trim($_POST['form_message']) : '';

    // Validate name (check if empty)
    if (empty($form_name)) {
        $errors[] = "Your Name is required.";
    }

    // Validate email (check if empty and valid format)
    if (empty($form_email)) {
        $errors[] = "Email Address is required.";
    } elseif (!filter_var($form_email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate message (check if empty)
    if (empty($form_message)) {
        $errors[] = "Message is required.";
    }

    // If no errors, send the email
    if (empty($errors)) {
        // Set the recipient email address (the one where you want to receive the form data)
        $to = ' rishis@awesomepanama.com'; // Change this to your desired email address

        // Email subject
        $subject = 'New Contact Form Submission';

        // Build the email content
        $message = "
        <html>
        <head>
            <title>$subject</title>
        </head>
        <body>
            <h2>Contact Form Submission</h2>
            <p><strong>Name:</strong> $form_name</p>
            <p><strong>Email:</strong> $form_email</p>
            <p><strong>Message:</strong></p>
            <p>$form_message</p>
        </body>
        </html>";

        // Set the headers for the email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: $form_email" . "\r\n";
        $headers .= "Reply-To: $form_email" . "\r\n";

        // Send the email using PHP mail() function
        if (mail($to, $subject, $message, $headers)) {
            echo "Thank you for your message. We will get back to you soon!";
        } else {
            echo "There was an error sending your message. Please try again later.";
        }
    } else {
        // Display errors
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
    }
} else {
    echo "Invalid request method.";
}
?>
