<?php
// db.php - Database connection
require 'db.php';
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
            <div class="dropdown">
                <button class="icon dropbtn">
                    <i class='bx bx-add-to-queue'></i>
                </button>
                <div class="dropdown-content">
                    <a href="#" id="milkProductionLink"><i class='bx bx-droplet'></i>&nbsp; Milk Production</a>
                    <a href="#" id="treatmentLink"><i class='bx bx-injection'></i>&nbsp; Treatment</a>
                    <a href="#" id="feedingLink"><i class='bx bx-cookie'></i>&nbsp; Feeds</a>
                    <a href="#" id="taskLink"><i class='bx bx-task'></i>&nbsp; Tasks</a>
                </div>
            </div>
            <a href="#" class="icon"><i class='bx bx-bell'></i></a>
            <a href="#" class="icon"><i class='bx bx-user'></i></a>
        </div>

        <!-- Milk Production Modal -->
<div id="milkProductionModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Milk Production</h3>
        <form id="milkProductionForm">
            <label for="productionDate">Production Date:</label>
            <input type="date" id="productionDate" name="productionDate" required><br><br>

            <label for="morningMilk">Morning Milk (liters):</label>
            <input type="number" id="morningMilk" name="morningMilk" min="0" step="any" required><br><br>

            <label for="eveningMilk">Evening Milk (liters):</label>
            <input type="number" id="eveningMilk" name="eveningMilk" min="0" step="any" required><br><br>

            <div class="form-bottom">
            <button type="" class="btn-cancel">Cancel</button>
            <button type="submit" class="btn-submit">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Treatment Modal -->
<div id="treatmentModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Treatment</h3>
        <form id="treatmentForm">

            <!-- for all animals or one -->

            


               <label for="treatmentType">Treatment Type:</label>
                <select id="treatmentType" name="treatmentType" required>
                        <option value="vaccination">Vaccination</option>
                        <option value="deworming">Deworming</option>
                        <option value="injection">Injection</option>
                        <option value="other">Other</option>
                </select>



                <label for="productDetails">Details/Product:</label>
                <input type="text" id="productDetails" name="productDetails" required>

                
                
                

                <div class="flex-container">
                    <div class="flex-item">
                        <label for="batchNumber">Batch Number:</label>
                        <input type="text" id="batchNumber" name="batchNumber" required>
                    </div>
                    <div class="flex-item">
                        <label for="dosage">Dosage:</label>
                        <input type="text" id="dosage" name="dosage" required>
                    </div>
                </div>

                <div class="flex-container">
                    <div class="flex-item">
                        <label for="applicationMethod">Application Method:</label>
                        <input type="text" id="applicationMethod" name="applicationMethod" required>
                    </div>

                    <div class="flex-item">
                        <label for="treatmentLocation">Treatment Location:</label>
                        <input type="text" id="treatmentLocation" name="treatmentLocation" required>
                    </div>

                
                </div>

                <div class="flex-container">
                    <div class="flex-item">
                        <label for="treatmentDate">Treatment Date:</label>
                        <input type="date" id="treatmentDate" name="treatmentDate" required>
                    </div>

                    <div class="flex-item">
                        <label for="boosterDate">Booster Date:</label>
                        <input type="date" id="boosterDate" name="boosterDate">
                    </div>

                </div>

                <div class="flex-container">
                    <div class="flex-item">
                        <label for="technician">Technician:</label>
                <input type="text" id="technician" name="technician" required>
                    </div>

                    <div class="flex-item">
                        <label for="totalCost">Total Cost:</label>
                <input type="number" id="totalCost" name="totalCost" min="0" step="any" required>
                    </div>

                </div>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4"></textarea>

                <fieldset>
                    <legend>Apply to:</legend>
                    <label>
                        <input type="radio" name="animalSelection" value="all" checked> All Animals
                    </label>
                    <label>
                        <input type="radio" name="animalSelection" value="specific"> Specific Animals
                    </label>
                </fieldset>

                <label for="animalList" id="animalListLabel" style="display:none;">Select Animal:</label>
                <select id="animalList" name="animalList" style="display:none;">
                    <option value="animal1">Animal 1</option>
                    <option value="animal2">Animal 2</option>
                    <option value="animal3">Animal 3</option>
                    <!-- Populate options dynamically from the database -->
                </select>

                
                <div class="form-bottom">
                    <button type="button" class="btn-cancel">Cancel</button>
                    <button type="submit" class="btn-submit">Save</button>
                </div>
        </form>
    </div>
</div>

<!-- Feeding Modal -->
<div id="feedingModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Feeds</h3>
        <form id="feedsForm">
            <label for="feedDetails">Feed Details:</label>
            <input type="text" id="feedDetails" name="feedDetails" required>

            <label for="feedWeight">Feed Weight (kg):</label>
            <input type="number" id="feedWeight" name="feedWeight" min="0" step="any" required>

            <label for="cost">Cost (Rwf):</label>
            <input type="number" id="cost" name="cost" min="0" step="any" required>

            <label for="feedingDate">Feeding Date:</label>
            <input type="date" id="feedingDate" name="feedingDate" required>

            <label for="details">Details/Notes:</label>
            <textarea id="details" name="details" rows="4"></textarea>

            
            <div class="form-bottom">
                <button type="button" class="btn-cancel">Cancel</button>
                <button type="submit" class="btn-submit">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Task Modal -->
<div id="taskModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Tasks</h3>

        <form id="taskForm">
            <label for="taskName">Task:</label><br>
            <input type="text" id="taskName" name="taskName" required><br><br>
            
            <label for="dueDate">Due Date:</label><br>
            <input type="date" id="dueDate" name="dueDate" required><br><br>
            
            <div class="form-bottom">
                <button type="button" class="btn-cancel">Cancel</button>
                <button type="submit" class="btn-submit">Add Task</button>
            </div>
        </form>

    </div>
</div>


    </header>

    <section class="sidebar">
        <div class="logo">
            <img src="umwushumba.png" alt="logo">
            <!-- <h3>UMWUSHUMBA</h3> -->
        </div>
        <div class="menu">
            <ul>
                <li><a href="dashboard.php"><i class='bx bx-home'></i>Dashboard</a></li>
                <li><a href="animals.php" ><i class="fa-solid fa-cow"></i>Animals</a></li>
                <li><a href="expenses.php"><i class="fa-solid fa-coins"></i>Expenses</a></li>
                <li><a href="equipments.php" class="active"><i class='bx bx-wrench'></i>Equipments</a></li>
                <li><a href="#"><i class='bx bx-bar-chart-square'></i>Reports</a></li>
            </ul>
        </div>
    </section>

    <main class="main">
        <div class="container">
            <?php
            if (isset($_GET['status'])) {
                if ($_GET['status'] == 'success') {
                    echo "<p id='alert' class='alert'>Record added successfully!</p>";
                } else if ($_GET['status'] == 'error') {
                    echo "<p id='alertError' class='alert error'>Error adding record: {$_GET['message']}</p>";
                }
            }
            ?>

            <button class="add-animal-btn" id="equipmentLink"><i class='bx bx-plus'></i>Add Equipment</button>

            <!-- Equipment Modal -->
<!-- Equipment Modal -->
<div id="equipmentModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Add Equipment</h3>
        <form id="equipmentForm" action="add_equipment.php" method="POST">
            <label for="equipmentName">Equipment Name:</label>
            <input type="text" id="equipmentName" name="equipmentName" required>
            
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="0" required>
            
            <label for="price">Price (Rwf):</label>
            <input type="number" id="price" name="price" min="0" step="any" required>
            
            <label for="personInCharge">Person In Charge:</label>
            <input type="text" id="personInCharge" name="personInCharge" required>
            
            <label for="additionalInfo">Additional Info:</label>
            <textarea id="additionalInfo" name="additionalInfo" rows="4"></textarea>
            
            <div class="form-bottom">
                <button type="button" class="btn-cancel">Cancel</button>
                <button type="submit" class="btn-submit" name="submit">Save</button>
            </div>
        </form>
    </div>
</div>

            
            
  

<section id="animals-section" class="mt-5">
                <h2>Equipment Inventory</h2>
                <table id="animals-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Equipment Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Person In Charge</th>
                            <th>Additional Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch data from database
                        $query = "SELECT * FROM equipment";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['equipment_name'] . "</td>";
                                echo "<td>" . $row['quantity'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>" . $row['person_in_charge'] . "</td>";
                                echo "<td>" . $row['additional_info'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No equipment found</td></tr>";
                        }
                        // Close the database connection
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </section>
            
        </div>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Get the modal elements
    const milkProductionModal = document.getElementById('milkProductionModal');
    const treatmentModal = document.getElementById('treatmentModal');
    const feedingModal = document.getElementById('feedingModal');
    const taskModal = document.getElementById('taskModal');
    const equipmentModal = document.getElementById('equipmentModal');

    // Get the button that opens the modal
    const milkProductionLink = document.getElementById('milkProductionLink');
    const treatmentLink = document.getElementById('treatmentLink');
    const feedingLink = document.getElementById('feedingLink');
    const taskLink = document.getElementById('taskLink');
    const equipmentLink = document.getElementById('equipmentLink');


    // Get the <span> element that closes the modal
    const closeButtons = document.querySelectorAll('.close');
    const cancel = document.querySelectorAll('.btn-cancel');

    // Function to open modals
    function openModal(modal) {
        modal.style.display = 'block';
    }

    // Function to close modals
    function closeModal(modal) {
        modal.style.display = 'none';
    }

    // Event listeners for opening modals
    milkProductionLink.addEventListener('click', function(event) {
        event.preventDefault();
        openModal(milkProductionModal);
    });

    treatmentLink.addEventListener('click', function(event) {
        event.preventDefault();
        openModal(treatmentModal);
    });

    feedingLink.addEventListener('click', function(event) {
        event.preventDefault();
        openModal(feedingModal);
    });

    taskLink.addEventListener('click', function(event) {
        event.preventDefault();
        openModal(taskModal);
    });

    equipmentLink.addEventListener('click', function(event) {
        event.preventDefault();
        openModal(equipmentModal);
    });

    // Event listeners for closing modals
    closeButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            closeModal(milkProductionModal);
            closeModal(treatmentModal);
            closeModal(feedingModal);
            closeModal(taskModal);
            closeModal(equipmentModal);
        });
    });

    cancel.forEach(function(button) {
        button.addEventListener('click', function() {
            closeModal(milkProductionModal);
            closeModal(treatmentModal);
            closeModal(feedingModal);
            closeModal(taskModal);
        });
    });


    // Close modal if user clicks outside of it
    window.addEventListener('click', function(event) {
        if (event.target == milkProductionModal) {
            closeModal(milkProductionModal);
        }
        if (event.target == treatmentModal) {
            closeModal(treatmentModal);
        }
        if (event.target == feedingModal) {
            closeModal(feedingModal);
        }
        if (event.target == taskModal) {
            closeModal(taskModal);
        }
        if (event.target == equipmentModal) {
            closeModal(equipmentModal);
        }
    });

    // Prevent modal from closing if user clicks inside the modal content
    milkProductionModal.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    treatmentModal.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    feedingModal.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    taskModal.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    equipmentModal.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    // Handle form submissions if needed
    const milkProductionForm = document.getElementById('milkProductionForm');
    const treatmentForm = document.getElementById('treatmentForm');
    const feedingForm = document.getElementById('feedingForm');
    const taskForm = document.getElementById('taskForm');



    // milkProductionForm.addEventListener('submit', function(event) {
    //     event.preventDefault();
    //     // Handle milk production form submission logic here
    //     closeModal(milkProductionModal);
    // });

    // treatmentForm.addEventListener('submit', function(event) {
    //     event.preventDefault();
    //     // Handle treatment form submission logic here
    //     closeModal(treatmentModal);
    // });

    // feedingForm.addEventListener('submit', function(event) {
    //     event.preventDefault();
    //     // Handle feeding form submission logic here
    //     closeModal(feedingModal);
    // });

    // taskForm.addEventListener('submit', function(event) {
    //     event.preventDefault();
    //     // Handle task form submission logic here
    //     closeModal(taskModal);
    // });
});

// Toggle visibility of animal select based on radio button selection
document.querySelectorAll('input[name="animalSelection"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            var animalListLabel = document.getElementById('animalListLabel');
            var animalList = document.getElementById('animalList');

            if (this.value === 'specific') {
                animalListLabel.style.display = 'block';
                animalList.style.display = 'block';
            } else {
                animalListLabel.style.display = 'none';
                animalList.style.display = 'none';
            }
        });
    });
        </script>
        
</body>
</html>