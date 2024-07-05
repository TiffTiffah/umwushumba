<?php
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css"> <!-- Your custom CSS styles -->
    <link rel="stylesheet" href="assets/icons/boxicons-master/css/boxicons.css">
    <link rel="stylesheet" href="assets/icons/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Document</title>
</head>

<body>
    <header class="header">
        <div class="header-title">
            <h3>Welcome <span>Farmer!</span></h3>
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
            <form id="milkProductionForm" action="add_milk.php" method="POST">
                <label for="productionDate">Production Date:</label>
                <input type="date" id="productionDate" name="productionDate" required><br><br>

                <label for="morningMilk">Morning Milk (liters):</label>
                <input type="number" id="morningMilk" name="morningMilk" min="0" step="any" required><br><br>

                <label for="eveningMilk">Evening Milk (liters):</label>
                <input type="number" id="eveningMilk" name="eveningMilk" min="0" step="any" required><br><br>

                <div class="form-bottom">
                    <button type="button" class="btn-cancel">Cancel</button>
                    <button type="submit" name="submit" class="btn-submit">Save</button>
                </div>
            </form>
        </div>
    </div>

<!-- Treatment Modal -->
<div id="treatmentModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Treatment</h3>
        <form id="treatmentForm" action="add_treatment.php" method="POST">

            <!-- for all animals or one -->

            


            <label for="treatmentType">Treatment Type:</label>
<select id="treatmentType" name="treatmentType" required>
    <option value="vaccination">Vaccination</option>
    <option value="deworming">Deworming</option>
    <option value="injection">Injection</option>
    <option value="medication">Medication</option>
    <option value="hoof trim">Hoof Trim</option>
    <option value="surgical procedure">Surgical Procedure</option>
    <option value="castration">Castration</option>
    <option value="dental procedure">Dental Procedure</option>
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
<select id="applicationMethod" name="applicationMethod" required>
    <option value="">Select an option</option>
    <option value="Intravenously">Intravenously</option>
    <option value="Orally">Orally</option>
    <option value="Topically">Topically</option>
    <option value="Intramuscular">Intramuscular</option>
</select>
                    </div>

                    <div class="flex-item">
                        <label for="treatmentLocation">Treatment Location:</label>
                        <input type="text" id="treatmentLocation" name="treatmentLocation" required placeholder="Neck, Rump">
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
                        <label for="totalCost">Total Cost(Rwf):</label>
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
                    <button type="submit" name="submit" class="btn-submit">Save</button>
                </div>
        </form>
    </div>
</div>

<!-- Feeding Modal -->
<div id="feedingModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Feeds</h3>
        <form id="feedsForm" action="add_feed.php" method="POST">
            <label for="feedDetails">Feed Details:</label>
            <input type="text" id="feedDetails" name="feedDetails" required>

            <label for="feedWeight">Feed Weight (kg):</label>
            <input type="number" id="feedWeight" name="feedWeight" min="0" step="any" required>

            <label for="feed_cost">Cost (Rwf):</label>
            <input type="number" id="feed_cost" name="feed_cost" min="0" step="any" required>

            <label for="feedingDate">Feeding Date:</label>
            <input type="date" id="feedingDate" name="feedingDate" required>

            <label for="feed_details">Details/Notes:</label>
            <textarea id="feed_details" name="feed_details" rows="4"></textarea>

            
            <div class="form-bottom">
                <button type="button" class="btn-cancel">Cancel</button>
                <button type="submit" name="submit" class="btn-submit">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Task Modal -->
<div id="taskModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Tasks</h3>

        <form id="taskForm" action="add_task.php" method="POST">
            <label for="taskName">Task:</label><br>
            <input type="text" id="taskName" name="taskName" required><br><br>
            
            <label for="dueDate">Due Date:</label><br>
            <input type="date" id="dueDate" name="dueDate" required><br><br>
            
            <div class="form-bottom">
                <button type="button" class="btn-cancel">Cancel</button>
                <button type="submit" name="submit" class="btn-submit">Add Task</button>
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
                <li><a href="dashboard.php" class="active"><i class='bx bx-home'></i>Dashboard</a></li>
                <li><a href="animals.php"><i class="fa-solid fa-cow"></i>Animals</a></li>
                <li><a href="expenses.php"><i class="fa-solid fa-coins"></i>Expenses</a></li>
                <li><a href="equipments.php"><i class='bx bx-wrench'></i>Equipments</a></li>
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

            <div class="stats">
                <div class="card">
                    Total Cows<br><br>
                    <h2>100</h2>
                </div>
                <div class="card">
                    Female Cows<br><br>
                    <h2>60</h2>
                </div>
                <div class="card">
                    Male Cows<br><br>
                    <h2>20</h2>
                </div>
                <div class="card">
                    Calves<br><br>
                    <h2>20</h2>
                </div>
                <div class="card">
                    Health Status
                    <h4>Healthy: 94</h4>
                    <h4>Sick: 6</h4>
                </div>
            </div>

            <div class="lv-2">
                <div class="card">
                    <h4>Animal Distribution</h4>
                    <canvas id="animalDistributionChart"></canvas>
                </div>
                <div class="card">
                    <h4>Milk Production Line Graph</h4>
                    <canvas id="milkProductionChart"></canvas>
                </div>
            </div>

            <div class="lv-4">
                <div class="card">
                    <h4>Expenses Column Bar Chart</h4>
                    <canvas id="expensesChart"></canvas>
                </div>
            </div>

            <div class="lv-4">
                <div class="card">
                    <h4>Animals Inventory</h4>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Animal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addAnimalForm">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" required><br><br>

                                <label for="tag_number">Tag Number:</label>
                                <input type="text" id="tag_number" name="tag_number"><br><br>

                                <label for="tag_color">Tag Color:</label>
                                <input type="text" id="tag_color" name="tag_color"><br><br>

                                <label for="registry_number">Registry Number:</label>
                                <input type="text" id="registry_number" name="registry_number"><br><br>

                                <label for="other_tag_number">Other Tag Number:</label>
                                <input type="text" id="other_tag_number" name="other_tag_number"><br><br>

                                <label for="description">Description:</label><br>
                                <textarea id="description" name="description" rows="4"></textarea><br><br>

                                <label for="gender">Gender:</label>
                                <select id="gender" name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select><br><br>

                                <label for="birth_date">Birth Date:</label>
                                <input type="date" id="birth_date" name="birth_date"><br><br>

                                <label for="type">Type:</label>
                                <input type="text" id="type" name="type"><br><br>

                                <label for="breed">Breed:</label>
                                <input type="text" id="breed" name="breed"><br><br>

                                <label for="coloring">Coloring:</label>
                                <input type="text" id="coloring" name="coloring"><br><br>

                                <label for="weight">Weight:</label>
                                <input type="number" id="weight" name="weight"><br><br>

                                <label for="birth_date">Last Treatment Date:</label>
                                <input type="date" id="birth_date" name="birth_date"><br><br>

                                <button type="submit" class="btn btn-primary mt-3">Add Animal</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        //alerts
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('status')) {
                const status = urlParams.get('status');
                const alert = document.getElementById(status === 'success' ? 'alert' : 'alertError');
                alert.classList.add('show');
                setTimeout(() => {
                    alert.classList.remove('show');
                    setTimeout(() => {
                        alert.style.opacity = 0;
                        // Remove the status from URL
                        history.replaceState(null, '', window.location.pathname);
                    }, 500); // Wait for the slide-out animation to complete
                }, 1000); // Show the alert for 1 second
            }
        });



    document.addEventListener('DOMContentLoaded', function() {
    // Get the modal elements
    const milkProductionModal = document.getElementById('milkProductionModal');
    const treatmentModal = document.getElementById('treatmentModal');
    const feedingModal = document.getElementById('feedingModal');
    const taskModal = document.getElementById('taskModal');

    // Get the button that opens the modal
    const milkProductionLink = document.getElementById('milkProductionLink');
    const treatmentLink = document.getElementById('treatmentLink');
    const feedingLink = document.getElementById('feedingLink');
    const taskLink = document.getElementById('taskLink');

    // Get the <span> element that closes the modal
    const closeButtons = document.querySelectorAll('.close');
    const cancel = document.querySelectorAll('.btn-cancel')

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

    // Event listeners for closing modals
    closeButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            closeModal(milkProductionModal);
            closeModal(treatmentModal);
            closeModal(feedingModal);
            closeModal(taskModal);
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

        document.addEventListener('DOMContentLoaded', function () {
            // Doughnut Chart for Animal Distribution
            const animalDistributionCtx = document.getElementById('animalDistributionChart').getContext('2d');

            const animalDistributionData = {
                labels: ['Female', 'Male'],
                datasets: [{
                    label: 'Animal Distribution',
                    data: [77, 33], // Update with actual data percentages or values
                    backgroundColor: ['rgb(31, 143, 59,0.5)', 'rgb(59, 200, 50,0.5)'], // Colors for cows and pigs
                    borderColor: ['rgb(31, 143, 59)', 'rgb(59, 200, 50)'], // Border colors for cows and pigs
                    borderWidth: 1, // Border width for segments
                    hoverOffset: 4 // Add hover offset for better visibility
                }]
            };

            const animalDistributionOptions = {
                responsive: true,
                cutout: '70%', // Adjust the cutout percentage here (e.g., '80%')
                plugins: {
                    legend: {
                        position: 'bottom',
                        align: 'center',
                        labels: {
                            padding: 20,
                            boxWidth: 12,
                            font: {
                                size: 14
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                        padding: 10,
                        cornerRadius: 5,
                        caretSize: 8
                    }
                }
            };

            const animalDistributionChart = new Chart(animalDistributionCtx, {
                type: 'doughnut',
                data: animalDistributionData,
                options: animalDistributionOptions
            });

            // Line Chart for Milk Production
            const milkProductionCtx = document.getElementById('milkProductionChart').getContext('2d');

            const milkProductionData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Milk Production (liters)',
                    data: [1500, 1700, 1600, 1800, 2000, 2100],
                    borderColor: 'rgb(31, 143, 59)',
                    borderWidth: 0.7,
                    backgroundColor: 'rgb(31, 143, 59,0.5)',
                    fill: true,
                    tension: 0.4
                }]
            };

            const milkProductionOptions = {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Liters'
                        }
                    }
                }
            };

            const milkProductionChart = new Chart(milkProductionCtx, {
                type: 'line',
                data: milkProductionData,
                options: milkProductionOptions
            });
        });

        // Column Bar Chart for Expenses
        const expensesCtx = document.getElementById('expensesChart').getContext('2d');

        const expensesData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Treatment',
                data: [500, 600, 550, 700, 650, 800], // Update with actual treatment expenses data
                backgroundColor: 'rgb(31, 143, 59, 0.6)', // Color for treatment bars
                borderColor: 'rgb(31, 143, 59, 1)', // Border color for treatment bars
                borderWidth: 0.4,
                barThickness: 40 // Adjust bar thickness for better visibility
            }, {
                label: 'Equipments',
                data: [300, 350, 400, 380, 420, 450], // Update with actual equipment expenses data
                backgroundColor: 'rgba(54, 162, 235, 0.6)', // Color for equipment bars
                borderColor: 'rgba(54, 162, 235, 1)', // Border color for equipment bars
                borderWidth: 0.4,
                barThickness: 40 // Adjust bar thickness for better visibility
            }, {
                label: 'Feeds',
                data: [200, 250, 280, 300, 270, 320], // Update with actual feed expenses data
                backgroundColor: 'rgba(75, 192, 192, 0.6)', // Color for feed bars
                borderColor: 'rgba(75, 192, 192, 1)', // Border color for feed bars
                borderWidth: 0.4,
                barThickness: 40 // Adjust bar thickness for better visibility
            }]
        };

        const expensesOptions = {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                },
                tooltip: {
                    enabled: true
                }
            },
            scales: {
                x: {
                    stacked: false, // Do not stack bars on x-axis
                    title: {
                        display: true,
                        text: 'Month'
                    }
                },
                y: {
                    beginAtZero: true, // Start y-axis from zero
                    title: {
                        display: true,
                        text: 'Expenses'
                    }
                }
            }
        };

        const expensesChart = new Chart(expensesCtx, {
            type: 'bar',
            data: expensesData,
            options: expensesOptions
        });

        // Handle modal events
        const myModal = new bootstrap.Modal(document.getElementById('myModal'));

        // Open modal when clicking the "Add" icon
        const addAnimalLink = document.getElementById('addAnimalLink');
        addAnimalLink.addEventListener('click', function (event) {
            event.preventDefault();
            myModal.show();
        });

        // Handle form submission
        const form = document.getElementById('addAnimalForm');
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const formData = new FormData(form);
            for (let [key, value] of formData.entries()) {
                console.log(key + ': ' + value); // Replace with your form submission logic
            }
            myModal.hide(); // Close modal after form submission
        });
    </script>
</body>

</html>
