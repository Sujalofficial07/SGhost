<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate email (you might want to add more validation here)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // If email is invalid, redirect back to the contact page with an error message
        header("Location: contact.php?error=1");
        exit;
    }

    // Set recipient email (change this to your desired email address)
    $to = "sghosthelp@gmail.com";

    // Set subject
    $subject = "Contact Form Submission";

    // Compose message
    $messageBody = "Name: $name\n";
    $messageBody .= "Email: $email\n\n";
    $messageBody .= "Message:\n$message";

    // Set headers
    $headers = "From: $name <$email>";

    // Send email
    if (mail($to, $subject, $messageBody, $headers)) {
        // If email is sent successfully, redirect back to the contact page with a success message
        header("Location: contact.php?success=1");
        exit;
    } else {
        // If email sending fails, redirect back to the contact page with an error message
        header("Location: contact.php?error=2");
        exit;
    }
} else {
    // If the form is not submitted, redirect back to the contact page
    header("Location: contact.php");
    exit;
}
?>
