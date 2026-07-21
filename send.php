<?php
// send.php
// This script uses PHPMailer to send the actual email based on POST data.

// Include PHPMailer classes manually (assuming Composer is used)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Require the Composer autoloader
require 'vendor/autoload.php';

// Check if data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $position = $_POST['position'] ?? '';
    $status = $_POST['status'] ?? '';

    // Include the config file to get SMTP details
    require 'config.php';

    // Load the correct template
    if ($status === 'selected') {
        $template = include 'templates/selected.php';
    } else {
        $template = include 'templates/rejected.php';
    }

    // Replace placeholders
    $subject = $template['subject'];
    $body = str_replace(
        ['{CandidateName}', '{Position}'], 
        [$name, $position], 
        $template['body']
    );

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP Server configuration
        $mail->isSMTP();                                        
        $mail->Host       = $smtp_config['host'];                 
        $mail->SMTPAuth   = true;                               
        $mail->Username   = $smtp_config['username'];             
        $mail->Password   = $smtp_config['password'];             
        $mail->SMTPSecure = $smtp_config['encryption'];           
        $mail->Port       = $smtp_config['port'];                 

        // Sender and recipient settings
        $mail->setFrom($smtp_config['from_email'], $smtp_config['from_name']);
        $mail->addAddress($email, $name); // Add candidate as recipient

        // Email content settings
        $mail->isHTML(false); // We are sending plain text emails
        $mail->Subject = $subject;
        $mail->Body    = $body;

        // Try to send the email
        $mail->send();
        
        // Redirect to success page with positive status
        header("Location: success.php?status=success");
        exit();

    } catch (Exception $e) {
        // Redirect to success page with failure status and error message
        header("Location: success.php?status=failed&error=" . urlencode($mail->ErrorInfo));
        exit();
    }
} else {
    // If accessed directly, redirect back
    header("Location: index.php");
    exit();
}
?>
