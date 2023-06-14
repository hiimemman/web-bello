<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <link href='../packages/core/main.css' rel='stylesheet' />
    <link href='../packages/daygrid/main.css' rel='stylesheet' />
    <link href='../packages/timegrid/main.css' rel='stylesheet' />
    <script src='../packages/core/main.js'></script>
    <script src='../packages/daygrid/main.js'></script>
    <script src='../packages/timegrid/main.js'></script>
    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

        .add-schedule-button {
            display: inline-block;
            margin-right: 10px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 400px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-input {
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
        }

        .modal-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .modal-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div id='calendar'></div>
    <button class="add-schedule-button" id="addScheduleBtn">Add Schedule</button>

    <!-- Modal -->
    <div id="addScheduleModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="scheduleForm">
                <label for="title">Title:</label>
                <input type="text" id="title" class="modal-input" required>
                <br>
                <label for="start_date">Start Date:</label>
                <input type="datetime-local" id="start_date" class="modal-input" required>
                <br>
                <label for="end_date">End Date:</label>
                <input type="datetime-local" id="end_date" class="modal-input" required>
                <br>
                <button type="submit" class="modal-button">Add Event</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid', 'timeGrid'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                defaultDate: new Date(),
                navLinks: true,
                editable: true,
                eventLimit: true,
                events: [
                    // event data goes here
                ]
            });
            calendar.render();

            var modal = document.getElementById("addScheduleModal");
            var addScheduleBtn = document.getElementById("addScheduleBtn");
            var closeBtn = document.getElementsByClassName("close")[0];
            var scheduleForm = document.getElementById("scheduleForm");

            addScheduleBtn.onclick = function() {
                modal.style.display = "block";
            }

            closeBtn.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            scheduleForm.addEventListener("submit", function(e) {
                e.preventDefault();

                var titleInput = document.getElementById("title");
                var startDateInput = document.getElementById("start_date");
                var endDateInput = document.getElementById("end_date");

                var title = titleInput.value;
                var start = startDateInput.value;
                var end = endDateInput.value;

                if (title && start && end) {
                    var event = {
                        title: title,
                        start: start,
                        end: end
                    };

                    calendar.addEvent(event);

                    // Reset form inputs
                    titleInput.value = "";
                    startDateInput.value = "";
                    endDateInput.value = "";

                    // Close the modal
                    modal.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>
