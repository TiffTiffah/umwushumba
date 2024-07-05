<?php
require 'db.php'; 

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    // Collect form data
    $feedDetails = $_POST['feedDetails'];
    $feedWeight = (float) $_POST['feedWeight'];
    $feed_cost = (float) $_POST['feed_cost'];
    $feedingDate = $_POST['feedingDate'];
    $feed_details = $_POST['feed_details'];

    // Insert into database
    $query = "INSERT INTO feeds (feed_details, feed_weight, cost, feeding_date, description) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param('sddss', $feedDetails, $feedWeight, $feed_cost, $feedingDate, $feed_details);
        
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            header("Location: dashboard.php?status=success");
            exit();
        } else {
            $error_message = urlencode($stmt->error);
            header("Location: dashboard.php?status=error&message=$error_message");
            exit();
        }
    } else {
        $error_message = urlencode($conn->error);
        header("Location: dashboard.php?status=error&message=$error_message");
        exit();
    }
}

$conn->close();
?>
