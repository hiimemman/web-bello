<?php
session_start();
include_once("../connections/connection.php");
$con = connection();
if (!isset($_SESSION['IDUSER'])) {
    header('Location: ../pages/user-login.php');
    exit();
} else {
    $sql = mysqli_query($con, "SELECT * FROM `tbl_residents` WHERE `id` = {$_SESSION['IDUSER']}");
    $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    $url = $_SERVER['REQUEST_URI'];
    $pageName = basename($url, '.php');
    $pageName = str_replace('-', ' ', $pageName);
    $pageName = strtoupper($pageName);
}
?>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <title>Community Schedules - Web-Bello Online!</title>

    <style>
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
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
    <div class="content flex flex-col items-center justify-center min-h-screen">
        <h1 class="text-center mt-6 mb-6">COMMUNITY SCHEDULES</h1>

        <div class="calendar-toolbar">
            <a href="../pages/dashboard.php"><button id="Dashboard" class="btn btn-primary mr-3">Return to
                    dashboard</button></a>
            <button id="addScheduleBtn" class="btn btn-primary mr-3">Add schedule</button>
        </div>
        <div id="calendar"></div>
    </div>

    <!-- Modal -->
    <div id="addScheduleModal" class="modal">
        <div class="modal-content">
            <span class="modal-close">&times;</span>
            <form id="scheduleForm">
                <h1>Schedule an Event</h1>
                <div class="form-group.">
<label for="title">Title</label>
<input type="text" class="form-control" id="title" name="title" required>
</div>
<div class="form-group">
<label for="start">Start Date and Time</label>
<input type="datetime-local" class="form-control" id="start" name="start" required>
</div>
<div class="form-group">
<label for="end">End Date and Time</label>
<input type="datetime-local" class="form-control" id="end" name="end" required>
</div>
<div class="form-group">
<label for="description">Description</label>
<textarea class="form-control" id="description" name="description"></textarea>
</div>
<div class="form-group">
<label for="color">Color</label>
<input type="color" class="form-control" id="color" name="color" value="#3a87ad">
</div>
<button type="submit" class="btn btn-primary">Save</button>
</form>
</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src='fullcalendar/packages/core/main.js'></script>
<script src='fullcalendar/packages/daygrid/main.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['dayGrid'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            defaultView: 'dayGridMonth',
            defaultDate: new Date(),
            editable: true,
            selectable: true,
            selectHelper: true,
            events: {
                // your events data
                url: '../api/reservation/all-reservation.php',
                method: 'POST',
                extraParams: {
                    user_id: <?php echo $_SESSION['IDUSER']; ?> // Pass the user ID to the server
                },
                failure: function(xhr, status, error) {
                    console.log(xhr.responseText); // Print the error response
                    alert('Failed to fetch events from the server.' + failure);
                }
            },
            select: function (info) {
                $('#addScheduleModal').css('display', 'block');
                $('#start').val(info.startStr);
                $('#end').val(info.endStr);
            },
            eventClick: function (info) {
                // handle event click
            }
        });

        calendar.render();

        // Close modal when clicked on close button or outside modal content
        var modal = document.getElementById('addScheduleModal');
        var closeBtn = document.getElementsByClassName('modal-close')[0];

        closeBtn.onclick = function () {
            modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Submit form on scheduleForm submit
        $('#scheduleForm').submit(function (e) {
            e.preventDefault();

            var title = $('#title').val();
            var start = $('#start').val();
            var end = $('#end').val();
            var description = $('#description').val();
            var color = $('#color').val();

            // Perform AJAX request to save the event
            $.ajax({
                url: 'save-event.php',
                type: 'POST',
                data: {
                    title: title,
                    start: start,
                    end: end,
                    description: description,
                    color: color
                },
                success: function (response) {
                    // Handle the response
                    if (response.status === 'success') {
                        // Event saved successfully, update the calendar
                        calendar.addEvent({
                            title: title,
                            start: start,
                            end: end,
                            description: description,
                            color: color
                        });

                        // Close the modal
                        modal.style.display = "none";
                    } else {
                        // Handle the error
                        console.log('Error:', response.message);
                    }
                },
                error: function (xhr, status, error) {
                    // Handle the error
                    console.log('Error:', error);
                }
            });
        });
    });
</script>
</body>
</html>