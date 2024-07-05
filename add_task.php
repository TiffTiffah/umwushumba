<?php
// Include your database connection file (db.php)
require 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    // Collect form data
    $taskName = $_POST['taskName'];
    $dueDate = $_POST['dueDate'];

    // Insert into database
    $query = "INSERT INTO tasks (task_name, due_date) VALUES (?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param('ss', $taskName, $dueDate);
        
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

// Close database connection
$conn->close();
?>
