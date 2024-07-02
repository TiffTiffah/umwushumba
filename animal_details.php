<?php
require 'db.php';

if (isset($_GET['id'])) {
    $animal_id = $_GET['id'];

    $sql = "SELECT id, name, tag_number, breed, dob, health_status FROM animals WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $animal_id);
        $stmt->execute();
        $stmt->bind_result($id, $name, $tag_number, $breed, $dob, $health_status);
        $stmt->fetch();

        // Display animal details
        echo "<h2>Animal Details</h2>";
        echo "<p>ID: {$id}</p>";
        echo "<p>Name: {$name}</p>";
        echo "<p>RFID: {$tag_number}</p>";
        echo "<p>Breed: {$breed}</p>";
        echo "<p>Date of Birth: {$dob}</p>";
        echo "<p>Health Status: {$health_status}</p>";

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "No animal ID provided.";
}

$conn->close();
?>
