<?php
// Include your database connection file (db.php)
require 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    // Collect form data
    $equipmentName = $_POST['equipmentName'];
    $quantity = (int) $_POST['quantity'];
    $price = (float) $_POST['price'];
    $personInCharge = $_POST['personInCharge'];
    $additionalInfo = $_POST['additionalInfo'];

    echo $equipmentName;

    // Insert into database
    $query = "INSERT INTO equipment (equipment_name, quantity, price, person_in_charge, additional_info) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param('sidss', $equipmentName, $quantity, $price, $personInCharge, $additionalInfo);
        
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            header("Location: dashboard.php?status=success");
            exit();
        } else {
            // Debugging: Log SQL error
            error_log("SQL Error: " . $stmt->error);
            $error_message = urlencode($stmt->error);
            header("Location: dashboard.php?status=error&message=$error_message");
            exit();
        }
    } else {
        // Debugging: Log connection error
        error_log("Connection Error: " . $conn->error);
        $error_message = urlencode($conn->error);
        header("Location: dashboard.php?status=error&message=$error_message");
        exit();
    }
 }

// Close database connection
$conn->close();
?>
