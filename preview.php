<?php
// preview.php
// This page receives the form data and shows a preview of the email to be sent.

// Check if data was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $position = $_POST['position'] ?? '';
    $status = $_POST['status'] ?? '';

    // Validate simple required fields server-side
    if (empty($name) || empty($email) || empty($position) || empty($status)) {
        die("Error: All fields are required. Please go back and try again.");
    }

    // Load the correct template based on status
    if ($status === 'selected') {
        $template = include 'templates/selected.php';
    } else {
        $template = include 'templates/rejected.php';
    }

    // Replace the placeholders with actual data
    $subject = $template['subject'];
    $body = str_replace(
        ['{CandidateName}', '{Position}'], 
        [$name, $position], 
        $template['body']
    );
} else {
    // If someone visits preview.php directly without form data, redirect them
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Preview</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Email Preview</h2>
    
    <!-- Display the preview content -->
    <div class="form-group">
        <label>To: <?php echo htmlspecialchars($email); ?> (<?php echo htmlspecialchars($name); ?>)</label>
    </div>
    
    <div class="form-group">
        <label>Subject: <?php echo htmlspecialchars($subject); ?></label>
    </div>
    
    <div class="preview-box">
<?php echo htmlspecialchars($body); ?>
    </div>

    <!-- Hidden form to pass data to send.php -->
    <form action="send.php" method="POST" id="sendForm">
        <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <input type="hidden" name="position" value="<?php echo htmlspecialchars($position); ?>">
        <input type="hidden" name="status" value="<?php echo htmlspecialchars($status); ?>">
        
        <div class="button-group">
            <!-- Back button goes to previous page -->
            <button type="button" class="btn-secondary" onclick="window.history.back();">Back</button>
            <!-- Submit button to actually send the email -->
            <button type="submit" id="submitBtn" class="btn-primary">Send Email</button>
        </div>
    </form>
</div>

<script src="script.js"></script>
</body>
</html>
