<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tasks.css"> <!-- Your custom CSS styles -->
    <link rel="stylesheet" href="assets/icons/boxicons-master/css/boxicons.css">
    <link rel="stylesheet" href="assets/icons/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
                <li><a href="dashboard.php"><i class='bx bx-home'></i>Dashboard</a></li>
                <li><a href="animals.php"><i class="fa-solid fa-cow"></i>Animals</a></li>
                <li><a href="expenses.php"  class="active"><i class="fa-solid fa-coins"></i></i>Expenses</a></li>
                <li><a href="equipments.php"><i class='bx bx-wrench'></i>Equipments</a></li>
                <li><a href="#"><i class='bx bx-bar-chart-square'></i>Reports</a></li>
            </ul>
        </div>
    </section>

    <main class="main">
        <div class="container">
            <div class="left-side">
                <div class="t-top">
        
                  <div></div>
        
                  <div id="taskModal" class="modal">
                    <div class="modal-content">
                      <span class="close" onclick="closeModal()">&times;</span>
                      <h2>Add New Task</h2>
                      <form id="taskForm">
                          <label for="taskName">Task:</label><br>
                          <input type="text" id="taskName" name="taskName" required><br><br>
                          
                          <label for="dueDate">Due Date:</label><br>
                          <input type="date" id="dueDate" name="dueDate" required><br><br>
                          
                          <button type="submit">Add Task</button>
                      </form>
                    </div>
                  </div>
        
                  <div class="add-task-btn">
                      <button onclick="openModal()"><i class='bx bx-plus'></i>Add Task</button>
                  </div>
              </div>
        
        
                  <div class="page-content">
                      <div class="task-header">Today Tasks</div>
                  
                      <div class="tasks-wrapper">
                        <div class="task">
                          <input class="task-item" name="task" type="checkbox" id="item-1" checked>
                          <label for="item-1">
                            <span class="label-text">Checking animals health </span>
                          </label>
                          
                        </div>
                        <div class="task">
                          <input class="task-item" name="task" type="checkbox" id="item-2" checked>
                          <label for="item-2">
                            <span class="label-text">Feeding the cows</span>
                          </label>
                          
                        </div>
                        <div class="task">
                          <input class="task-item" name="task" type="checkbox" id="item-3">
                          <label for="item-3">
                            <span class="label-text">Vaccination</span>
                          </label>
                          
                        </div>
                        <div class="task">
                          <input class="task-item" name="task" type="checkbox" id="item-4">
                          <label for="item-4">
                            <span class="label-text">Cleaning of the cow shades</span>
                          </label>
                          
                        </div>
                        <div class="task">
                          <input class="task-item" name="task" type="checkbox" id="item-5">
                          <label for="item-5">
                            <span class="label-text">Collecting cow's feed</span>
                          </label>
                          
                        </div>
        
                        
                        <div class="task-header upcoming">Upcoming Tasks</div>
                        <div class="task">
                          <input class="task-item" name="task" type="checkbox" id="item-7">
                          <label for="item-7">
                            <span class="label-text">Cleaning of the cow shades</span>
                          </label>
                          
                        </div>
                        <div class="task">
                          <input class="task-item" name="task" type="checkbox" id="item-8">
                          <label for="item-8">
                            <span class="label-text">Collecting cow's feed</span>
                          </label>
                          
                        </div>
                        <div class="task">
                          <input class="task-item" name="task" type="checkbox" id="item-9">
                          <label for="item-9">
                            <span class="label-text">Calves care</span>
                          </label>
                          
                        </div>
                        <div class="task">
                          <input class="task-item" name="task" type="checkbox" id="item-10">
                          <label for="item-10">
                            <span class="label-text">Cleaning of the cow shades</span>
                          </label>
                          
                        </div>
                      </div>
                  </div>
        
              </div>
        
        
        
        
                    <div class="right-sidey">
                      <div class="calendar-container">
                          <div class="calendar-header">
                            <button id="prev-month"><i class="fas fa-chevron-left"></i></button>
                            <div id="month-year"></div>
                            <button id="next-month"><i class="fas fa-chevron-right"></i></button>
                          </div>
                          <div id="calendar"></div>
                        </div>
            
                        <div class="task-progress">
                          <h4>Tasks Progress</h4>
                          <div class="chart">
                              <div id="chart">
                              </div>
                          </div>
            
                        </div>
            
                  </div>
        
            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>

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



    milkProductionForm.addEventListener('submit', function(event) {
        event.preventDefault();
        // Handle milk production form submission logic here
        closeModal(milkProductionModal);
    });

    treatmentForm.addEventListener('submit', function(event) {
        event.preventDefault();
        // Handle treatment form submission logic here
        closeModal(treatmentModal);
    });

    feedingForm.addEventListener('submit', function(event) {
        event.preventDefault();
        // Handle feeding form submission logic here
        closeModal(feedingModal);
    });

    taskForm.addEventListener('submit', function(event) {
        event.preventDefault();
        // Handle task form submission logic here
        closeModal(taskModal);
    });
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




const calendarHeader = document.getElementById('month-year');
const calendarContainer = document.getElementById('calendar');
const prevMonthButton = document.getElementById('prev-month');
const nextMonthButton = document.getElementById('next-month');

let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();

// Function to generate calendar
function generateCalendar() {
const currentDate = new Date();

const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();

const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

let calendarHTML = '';

// Add month and year to calendar header
calendarHeader.textContent = getMonthName(currentMonth) + ' ' + currentYear;

// Add days of the week headers
calendarHTML += '<div class="day-header">' + daysOfWeek.join('</div><div class="day-header">') + '</div>';

// Add empty cells for days before the first day of the month
for (let i = 0; i < firstDayOfMonth; i++) {
calendarHTML += '<div class="day"></div>';
}

// Add days of the month
for (let day = 1; day <= daysInMonth; day++) {
const isCurrentDay = day === currentDate.getDate() && currentMonth === currentDate.getMonth() && currentYear === currentDate.getFullYear();
const classList = isCurrentDay ? 'day current-day' : 'day current-month-day';
calendarHTML += `<div class="${classList}">${day}</div>`;
}

calendarContainer.innerHTML = calendarHTML;
}

// Function to get month name
function getMonthName(month) {
const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
return months[month];
}

// Event listener for previous month button
prevMonthButton.addEventListener('click', () => {
if (currentMonth === 0) {
currentMonth = 11;
currentYear--;
} else {
currentMonth--;
}
generateCalendar();
});

// Event listener for next month button
nextMonthButton.addEventListener('click', () => {
if (currentMonth === 11) {
currentMonth = 0;
currentYear++;
} else {
currentMonth++;
}
generateCalendar();
});

// Generate calendar when the page loads
generateCalendar();




//task progress chart
document.addEventListener("DOMContentLoaded", function() {
      var options = {
        chart: {
          height: 250,
          type: "radialBar"
        },
        labels: ["Tasks Completed"],
        series: [20],
        colors: ["#45a049"],
        plotOptions: {
          radialBar: {
            hollow: {
              margin: 10,
              size: "70%"
            },
            dataLabels: {
              showOn: "always",
              name: {
                offsetY: -10,
                show: true,
                color: "#888",
                fontSize: "12px",
                fontFamily: 'Montserrat'
              },
              value: {
                offsetY: -2,
                color: "#111",
                fontSize: "15px",
                fontWeight: "bold",
                fontFamily: 'Montserrat',
                show: true
              }
            }
          }
        },
        stroke: {
          lineCap: "round"
        }
      };

      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
    });


//task modal
// Get the modal
var modal = document.getElementById('taskModal');

// Function to open the modal
function openModal() {
modal.style.display = 'block';
}

// Function to close the modal
function closeModal() {
modal.style.display = 'none';
}

// Close the modal when clicking outside of it
window.onclick = function(event) {
if (event.target == modal) {
    closeModal();
}
}

// Handle form submission
document.getElementById('taskForm').addEventListener('submit', function(event) {
event.preventDefault();

// Get task details
var taskName = document.getElementById('taskName').value;
var dueDate = document.getElementById('dueDate').value;

// You can perform further actions here, such as adding the task to a list or sending it to a server

// For demonstration purposes, log the task details to the console
console.log('Task Name:', taskName);
console.log('Due Date:', dueDate);

// Close the modal
closeModal();
});
    </script>
</body>
</html>