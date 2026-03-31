<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student = $_POST['studentName'] ?? 'Unknown';
    $assignment = $_POST['assignment'] ?? 'None';
    $comments = $_POST['comments'] ?? '';
    $timestamp = date("Y-m-d H:i:s");

    $fileName = $_FILES['fileUpload']['name'] ?? 'no_file.txt';
    
    // Create the log entry
    $logEntry = "[$timestamp] Student: $student | Assignment: $assignment | File: $fileName | Notes: $comments\n";

    // Attempt to save. Note: This only works on a real PHP server (like XAMPP or Heroku), not GitHub itself.
    if(file_put_contents('submissions_log.txt', $logEntry, FILE_APPEND)) {
        echo "<h1>✅ Submission Successful!</h1>";
        echo "<p>Received: <strong>$fileName</strong></p>";
    } else {
        echo "<h1>❌ Error</h1><p>Check folder permissions.</p>";
    }
    
    echo "<br><a href='index.html'>Go Back</a>";
}
?>
