<?php
require 'db.php'; // Ensure your database connection is in this file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $tag_number = $_POST['tag_number'];
    $breed = $_POST['breed'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $progeny = $_POST['progeny'];
    $number_of_kids = isset($_POST['number_of_kids']) ? $_POST['number_of_kids'] : null;
    $health_status = $_POST['health_status'];
    $last_vaccine = $_POST['last_vaccine'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO animals (name, tag_number, breed, gender, dob, progeny, number_of_kids, health_status, last_vaccine) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssiss", $name, $tag_number, $breed, $gender, $dob, $progeny, $number_of_kids, $health_status, $last_vaccine);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css"> <!-- Your custom CSS styles -->
    <link rel="stylesheet" href="assets/icons/boxicons-master/css/boxicons.css">
    <link rel="stylesheet" href="assets/icons/fontawesome/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js library -->
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="header-title">
            <h3></h3>
        </div>
        <div class="side-icons">
            <a href="#" class="icon" id="addAnimalLink" data-bs-toggle="modal" data-bs-target="#myModal">
                <i class='bx bx-add-to-queue'></i>
            </a>
            <a href="#" class="icon"><i class='bx bx-bell'></i></a>
            <a href="#" class="icon"><i class='bx bx-envelope'></i></a>
            <a href="#" class="icon"><i class='bx bx-user'></i></a>
        </div>
    </header>

    <section class="sidebar">
        <div class="logo">
            <img src="umwushumba.png" alt="logo">
            <!-- <h3>UMWUSHUMBA</h3> -->
        </div>
        <div class="menu">
            <ul>
                <li><a href="dashboard.html"><i class='bx bx-home'></i>Dashboard</a></li>
                <li><a href="animals.php" class="active"><i class="fa-solid fa-cow"></i>Animals</a></li>
                <li><a href="tasks.html"><i class='bx bx-task'></i>Tasks</a></li>
                <li><a href="equipments.html"><i class='bx bx-wrench'></i>Equipments</a></li>
                <li><a href="staff.html"><i class='bx bx-group'></i>Staff</a></li>
                <li><a href="#"><i class='bx bx-bar-chart-square'></i>Reports</a></li>
            </ul>
        </div>
    </section>

    <main class="main">
        <div class="container">


                    <h2>New Animal</h2>
                    <form id="animal-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label for="name">Names:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="tag_number">RFID:</label>
                        <input type="text" id="tag_number" name="tag_number">
                        </div>

                        <div class="form-group"> 
                            <label for="breed">Breed:</label>
                            <input type="text" id="breed" name="breed" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender:</label>
                        <select id="gender" name="gender">
                            <option ></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            
                        </select>
                        </div>

                        <div class="form-group">
                            <label for="dob">Birth Date:</label>
                            <input type="date" id="dob" name="dob" required>
                        </div>

                        <div class="form-group">
                            <label for="progeny">Progeny:</label>
                            <select id="progeny" name="progeny" required>
                                <option value="default" selected disabled>Select</option>
                                <option value="progeny_yes">Yes</option>
                                <option value="progeny_no">No</option>
                            </select>
                        </div>
                        
                        <div id="yes_progeny" class="form-group hidden">
                            <label for="number_of_kids">Number of Kids:</label>
                            <input type="number" id="number_of_kids" name="number_of_kids">
                        </div>
                        
                        <div id="no_progeny" class="form-group hidden">
                            <!-- Add content for 'No' option if needed -->
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label for="health_status">Health Status:</label>
                            <input type="text" id="health_status" name="health_status" required>
                        </div>

                        <div class="form-group">
                            <label for="last_vaccine">Last Vaccination Date:</label>
                            <input type="date" id="last_vaccine" name="last_vaccine" required>
                        </div>
                      
                        
                        <button type="submit" class="btn btn-primary">Add Animal</button>
                    </form>


        </div>
    </main>
<script>
   document.addEventListener('DOMContentLoaded', function() {
            const progenySelect = document.getElementById('progeny');
            const yesProgeny = document.getElementById('yes_progeny');
            const noProgeny = document.getElementById('no_progeny');

            progenySelect.addEventListener('change', function() {
                if (progenySelect.value === 'progeny_yes') {
                    yesProgeny.classList.remove('hidden');
                    noProgeny.classList.add('hidden');
                } else if (progenySelect.value === 'progeny_no') {
                    yesProgeny.classList.add('hidden');
                    noProgeny.classList.remove('hidden');
                } else {
                    yesProgeny.classList.add('hidden');
                    noProgeny.classList.add('hidden');
                }
            });
        });
</script>
  
</body>
</html>
