<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link href='fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Community Schedules - Web-Bello Online!</title>

    <style>
    /* Modal Styles */
    .modal-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        height: 300px;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .modal-container h1 {
        margin-top: 0;
    }

    .modal-container label {
        display: block;
        margin-bottom: 10px;
    }

    .modal-container input[type="text"],
    .modal-container input[type="datetime-local"],
    .modal-container input[type="submit"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }

    .modal-container input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .modal-close {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }
    </style>


</head>

<body>
    <div class="content">
        <button id="addScheduleBtn" class="btn btn-primary">Add Schedule</button>
        <div id='calendar'></div>
    </div>

    <!-- Modal -->
    <div id="addScheduleModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="scheduleForm">
                <h1>Schedule an Event</h1>
                <form id="schedule-form">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" required>
                    <br><br>
                    <label for="start_date">Start Date:</label>
                    <input type="datetime-local" name="start_date" id="start_date" required>
                    <br><br>
                    <label for="end_date">End Date:</label>
                    <input type="datetime-local" name="end_date" id="end_date" required>
                    <br><br>
                    <input type="submit" value="Schedule Event">
                </form>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-100 border-t border-gray-200">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-center text-gray-500">
                <p>&copy; 2023 Web-Bello Online! All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src='fullcalendar/packages/core/main.js'></script>
    <script src='fullcalendar/packages/daygrid/main.js'></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['dayGrid'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: 'get-events.php'
        });

        calendar.render();

        // Modal
        var modal = document.getElementById('addScheduleModal');
        var addScheduleBtn = document.getElementById("addScheduleBtn");
        var closeSpan = document.getElementsByClassName("close")[0];

        addScheduleBtn.onclick = function() {
            modal.style.display = "block";
        }

        closeSpan.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Schedule Form
        var scheduleForm = document.getElementById('scheduleForm');

        scheduleForm.addEventListener('submit', function(event) {
            event.preventDefault();
            var title = document.getElementById('title').value;
            var start_date = document.getElementById('start_date').value;
            var end_date = document.getElementById('end_date').value;

            // Perform AJAX request to save event
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'save-event.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        calendar.addEvent({
                            title: title,
                            start: start_date,
                            end: end_date
                        });
                        modal.style.display = "none";
                    } else {
                        alert('Error saving event. Please try again.');
                    }
                }
            };
            var params = 'title=' + encodeURIComponent(title) + '&start_date=' + encodeURIComponent(start_date) +
                '&end_date=' + encodeURIComponent(end_date);
            xhr.send(params);
        });
    });
    </script>

</body>

</html>
