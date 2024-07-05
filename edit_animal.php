<?php
// Include your database connection file (db.php)
require 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    // Collect form data
    $animalId = (int) $_POST['animalId'];
    $animalName = $_POST['animalName'];
    $species = $_POST['species'];
    $breed = $_POST['breed'];
    $dob = $_POST['dob'];
    $healthStatus = $_POST['healthStatus'];

    // Update the database
    $query = "UPDATE animals SET animal_name=?, species=?, breed=?, dob=?, health_status=? WHERE id=?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param('sssssi', $animalName, $species, $breed, $dob, $healthStatus, $animalId);
        
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
