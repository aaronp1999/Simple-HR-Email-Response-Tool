<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Candidate Email Tool</title>
    <!-- Link to our stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>HR Email Response</h2>
    <!-- The form submits data using POST method -->
    <form id="hrForm" action="preview.php" method="POST">
        
        <!-- Candidate Name input -->
        <div class="form-group">
            <label for="name">Candidate Name</label>
            <input type="text" id="name" name="name" placeholder="Enter name">
            <div id="nameError" class="error">Candidate name is required.</div>
        </div>

        <!-- Candidate Email input -->
        <div class="form-group">
            <label for="email">Candidate Email</label>
            <input type="email" id="email" name="email" placeholder="Enter email address">
            <div id="emailError" class="error">Valid email is required.</div>
        </div>

        <!-- Position Applied input -->
        <div class="form-group">
            <label for="position">Position Applied</label>
            <input type="text" id="position" name="position" placeholder="Enter job position">
            <div id="positionError" class="error">Position is required.</div>
        </div>

        <!-- Application Status radio buttons -->
        <div class="form-group">
            <label>Status</label>
            <div class="radio-group">
                <input type="radio" id="selected" name="status" value="selected">
                <label for="selected">Selected</label>
                
                <input type="radio" id="rejected" name="status" value="rejected">
                <label for="rejected">Rejected</label>
            </div>
            <div id="statusError" class="error">Status selection is required.</div>
        </div>

        <!-- Buttons to Reset or Preview -->
        <div class="button-group">
            <button type="reset" class="btn-secondary">Reset</button>
            <button type="submit" class="btn-primary" formaction="preview.php">Preview</button>
        </div>
    </form>
</div>

<!-- Link to our JavaScript file -->
<script src="script.js"></script>

</body>
</html>
