<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $from = 'Parax Contact Form';
        $to = 'example@gmail.com'; // Replace with your email address

        // Build the email body
        $body = "From: $name\n";
        $body .= "Email: $email\n";
        $body .= "Subject: $subject\n";
        $body .= "Message:\n$message";

        // Send the email
        if (mail($to, $subject, $body, $from)) {
            // Redirect to thank-you page on success
            header("Location: thank-you.html");
            exit();
        } else {
            // Display an error message if mail fails
            die("Error: Unable to send email.");
        }
    } else {
        die("Error: All form fields are required.");
    }
} else {
    die("Error: Invalid request method.");
}
?>
