<?php
require 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    // Collect form data
    $treatmentType = $_POST['treatmentType'];
    $productDetails = $_POST['productDetails'];
    $batchNumber = $_POST['batchNumber'];
    $dosage = $_POST['dosage'];
    $applicationMethod = $_POST['applicationMethod'];
    $treatmentLocation = $_POST['treatmentLocation'];
    $treatmentDate = $_POST['treatmentDate'];
    $boosterDate = $_POST['boosterDate'];
    $technician = $_POST['technician'];
    $totalCost = $_POST['totalCost'];
    $description = $_POST['description'];
    $animalSelection = $_POST['animalSelection'];


    
    // Insert into database
    $query = "INSERT INTO treatments (treatment_type, product_details, batch_number, dosage, application_method, treatment_location, treatment_date, booster_date, technician, total_cost, description, animal_selection)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($query);
    
    if ($stmt) {
        $stmt->bind_param('ssssssssssss', $treatmentType, $productDetails, $batchNumber, $dosage, $applicationMethod, $treatmentLocation, $treatmentDate, $boosterDate, $technician, $totalCost, $description, $animalSelection);
        
        if ($stmt->execute()) {
            // Redirect with success status
            header("Location: dashboard.php?status=success");
            exit();
        } else {
            // Redirect with error status and message
            header("Location: dashboard.php?status=error&message=" . urlencode($stmt->error));
            exit();
        }
    } else {
        // Redirect with error status and message
        header("Location: dashboard.php?status=error&message=" . urlencode($conn->error));
        exit();
    }
}
?>
