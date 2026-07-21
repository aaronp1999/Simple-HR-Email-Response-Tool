<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Status</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Email Status</h2>
    
    <?php
    // Get status and error messages from the URL if they exist
    $status = $_GET['status'] ?? '';
    $error = $_GET['error'] ?? '';

    // Show appropriate message based on the status
    if ($status === 'success') {
        echo '<div class="alert alert-success">';
        echo '✅ Email sent successfully!';
        echo '</div>';
    } elseif ($status === 'failed') {
        echo '<div class="alert alert-danger">';
        echo '❌ Failed to send email.<br>';
        echo 'Error: ' . htmlspecialchars($error);
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger">';
        echo 'Invalid request.';
        echo '</div>';
    }
    ?>

    <!-- Button to go back to the form -->
    <div class="button-group" style="justify-content: center;">
        <button onclick="window.location.href='index.php'" class="btn-primary">Send Another</button>
    </div>
</div>

</body>
</html>
