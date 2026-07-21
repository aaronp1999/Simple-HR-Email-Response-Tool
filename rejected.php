<?php
// templates/rejected.php
// This template is used when the candidate is rejected.

// Return an array containing the subject and the body
return [
    'subject' => 'Application Status',
    'body' => "Hello {CandidateName},\n\nThank you for applying for the position of {Position}.\n\nAfter careful review, we have decided not to move forward with your application.\n\nWe appreciate your interest and wish you success.\n\nRegards,\nHR Team"
];
?>
