<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milk Production</title>
    <style>
        .alert {
            position: fixed;
            top: 20px;
            right: -300px;
            padding: 20px;
            background-color: green;
            color: white;
            border-radius: 5px;
            z-index: 1000;
            transition: right 0.5s ease, opacity 0.5s ease;
        }
        .alert.show {
            right: 20px;
            opacity: 1;
        }
        .alert.error {
            background-color: red;
        }
    </style>
</head>
<body>
    <h1>Milk Production Data</h1>

    <div id="alert" class="alert">Record added successfully!</div>
    <div id="alertError" class="alert error">Error adding record!</div>

    <!-- Other content and form elements -->

    <script>
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
                    }, 500); // Wait for the slide-out animation to complete
                }, 1000); // Show the alert for 1 second
            }
        });
    </script>
</body>
</html>
