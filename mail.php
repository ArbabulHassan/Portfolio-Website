<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Set up email parameters
    $recipient = "arbabulhassan13@gmail.com"; // Replace with your Gmail address
    $subject = "New Contact Form Submission: $subject";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Set up email headers
    $email_headers = "From: $name <$email>";

    // Send the email
    if (wp_mail($recipient, $subject, $email_content, $email_headers)) {
        // Email sent successfully
        echo "Thank you! Your message has been sent.";
    } else {
        // Email failed to send
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    // Form not submitted
    echo "Something went wrong.";
}
?>