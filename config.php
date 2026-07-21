<?php
// config.php
// This file stores SMTP configuration details so they are not hardcoded in the send script.

// Array containing email settings
$smtp_config = [
    'host' => 'smtp.gmail.com',           // SMTP server (e.g., Gmail)
    'username' => 'aaronp1234567@gmail.com',   // Your email address
    'password' => 'iifzyjhtavagmmgq',      // Your email app password (not your main password)
    'port' => 587,                          // SMTP port (587 for TLS, 465 for SSL)
    'encryption' => 'tls',                  // Encryption type
    'from_email' => 'your_email@gmail.com', // The email address shown in "From"
    'from_name' => 'HR Team'                // The name shown in "From"
];
?>
