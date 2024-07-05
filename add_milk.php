<?php
//db connection
require 'db.php';
//check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $productionDate = $_POST['productionDate'];
    $morningMilk = (float) $_POST['morningMilk'];
    $eveningMilk = (float) $_POST['eveningMilk'];

    $query = "INSERT INTO milk_production (production_date, morning_milk, evening_milk) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param('sdd', $productionDate, $morningMilk, $eveningMilk);
        if ($stmt->execute()) {
            $stmt->close();
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
