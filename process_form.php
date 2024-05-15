<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Check for empty fields
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill out all fields.";
        exit;
    }

    // Create the email content
    $to = "info.secrettechie@gmail.com";
    $subject = "New Contact Form Submission";
    $message_body = "Name: $name\n";
    $message_body .= "Email: $email\n\n";
    $message_body .= "Message:\n$message";

    // Send the email
    if (mail($to, $subject, $message_body)) {
        echo "Message sent successfully. We'll get back to you soon!";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    echo "There was a problem with your submission. Please try again.";
}
?>
