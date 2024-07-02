<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css"> 
    <link rel="stylesheet" href="css/animals.css">
    <link rel="stylesheet" href="assets/icons/boxicons-master/css/boxicons.css">
    <link rel="stylesheet" href="assets/icons/fontawesome/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js library -->
    <title>Animals</title>
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
        </div>
        <div class="menu">
            <ul>
                <li><a href="dashboard.html"><i class='bx bx-home'></i>Dashboard</a></li>
                <li><a href="animals.html" class="active"><i class="fa-solid fa-cow"></i>Animals</a></li>
                <li><a href="tasks.html"><i class='bx bx-task'></i>Tasks</a></li>
                <li><a href="equipments.html"><i class='bx bx-wrench'></i>Equipments</a></li>
                <li><a href="staff.html"><i class='bx bx-group'></i>Staff</a></li>
                <li><a href="#"><i class='bx bx-bar-chart-square'></i>Reports</a></li>
            </ul>
        </div>
    </section>

    <main class="main">
        <div class="container">
            <button class="add-animal-btn"><a href="add_animal.php"><i class='bx bx-plus'></i>Add Animal</a></button>
            <section id="animals-section" class="mt-5">
                <h2>Animals</h2>
                <table id="animals-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>RFID</th>
                            <th>Breed</th>
                            <th>Date of Birth</th>
                            <th>Health Status</th>
                            <th></th> <!-- New column for dropdown menu -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'db.php';

                        $sql = "SELECT id, name, tag_number, breed, dob, health_status FROM animals";
                        if ($stmt = $conn->prepare($sql)) {
                            $stmt->execute();
                            $stmt->bind_result($id, $name, $tag_number, $breed, $dob, $health_status);

                            while ($stmt->fetch()) {
                                echo "<tr>
                                        <td>{$id}</td>
                                        <td><a href='animal_details.php?id={$id}'>{$name}</a></td>
                                        <td>{$tag_number}</td>
                                        <td>{$breed}</td>
                                        <td>{$dob}</td>
                                        <td>{$health_status}</td>
                                        <td>
                                            <div class='dropdown'>
                                                <button class='dropbtn'><i class='fa-solid fa-ellipsis-vertical'></i></button>
                                                <div class='dropdown-content'>
                                                    <a href='#'><i class='fa-regular fa-pen-to-square'></i>&nbsp; Edit</a>
                                                    <a href='#'><i class='bx bx-injection'></i>&nbsp; Treatments</a>
                                                    <a href='#'><i class='bx bx-trash trash-icon'></i>&nbsp; Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                      </tr>";
                            }

                            $stmt->close();
                        } else {
                            echo "Error preparing statement: " . $conn->error;
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
</body>
</html>
