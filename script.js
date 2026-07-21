// script.js
// Wait for the DOM to load before running scripts
document.addEventListener("DOMContentLoaded", function() {
    
    // Select the form and the submit button
    const form = document.getElementById("hrForm");
    const submitBtn = document.getElementById("submitBtn");

    // Add submit event listener to the form
    if (form) {
        form.addEventListener("submit", function(event) {
            // Get form field values
            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const position = document.getElementById("position").value.trim();
            
            // Check which status radio button is selected
            const statusRadios = document.getElementsByName("status");
            let statusSelected = false;
            for (let i = 0; i < statusRadios.length; i++) {
                if (statusRadios[i].checked) {
                    statusSelected = true;
                    break;
                }
            }

            // Simple validation flag
            let isValid = true;

            // Name validation
            if (name === "") {
                document.getElementById("nameError").style.display = "block";
                isValid = false;
            } else {
                document.getElementById("nameError").style.display = "none";
            }

            // Email validation (simple regex check)
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === "" || !emailPattern.test(email)) {
                document.getElementById("emailError").style.display = "block";
                isValid = false;
            } else {
                document.getElementById("emailError").style.display = "none";
            }

            // Position validation
            if (position === "") {
                document.getElementById("positionError").style.display = "block";
                isValid = false;
            } else {
                document.getElementById("positionError").style.display = "none";
            }

            // Status validation
            if (!statusSelected) {
                document.getElementById("statusError").style.display = "block";
                isValid = false;
            } else {
                document.getElementById("statusError").style.display = "none";
            }

            // Prevent form submission if validation fails
            if (!isValid) {
                event.preventDefault();
            } else {
                // If the user clicked "Send Email" (we check this because there is a Preview button too)
                // We show the loading spinner logic if submitting to send.php
                if (event.submitter && event.submitter.id === "submitBtn") {
                    submitBtn.disabled = true;
                    submitBtn.innerText = "Sending...";
                }
            }
        });
    }
});
