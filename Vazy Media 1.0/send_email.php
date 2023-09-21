<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $websiteUrl = $_POST["websiteUrl"];
    $message = $_POST["message"];

    // Set recipient email address
    $to = "maksimabraham@web.de";

    // Set subject
    $subject = "Contact Form Submission from $name";

    // Compose the email message
    $emailMessage = "Name: $name\n";
    $emailMessage .= "Email: $email\n";
    $emailMessage .= "Phone Number: $phoneNumber\n";
    $emailMessage .= "Website: $websiteUrl\n\n";
    $emailMessage .= "Message:\n$message";

    // Additional headers
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $emailMessage, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Error: Message could not be sent.";
    }
} else {
    // Handle cases where the script is accessed directly without a POST request.
    echo "Error: This script should be accessed through the form.";
}
?>