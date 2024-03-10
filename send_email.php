<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Validate form data
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Set recipient email address
    $to = "tejgroup.8055@gmail.com"; // Change this to your email address

    // Set email subject
    $email_subject = "$subject";

    // Compose email message
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n\n";
    $email_body .= "Message:\n$message";

    // Set email headers
    $headers = "From: $name <$email>\r\nReply-To: $email";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Your message has been sent successfully.";
    } else {
        echo "Failed to send your message. Please try again later.";
    }
} else {
    // If not a POST request, redirect to the form page
    header("Location: your-form-page.html"); // Change this to your form page URL
    exit;
}
?>
