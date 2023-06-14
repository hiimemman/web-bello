<?php
session_start();
include_once("../connections/connection.php");
$con = connection();
if (!isset($_SESSION['ID'])) {
  header('Location: ../pages/user-login.php');
  exit();
} else {
  $sql = mysqli_query($con, "SELECT * FROM `tbl_residents` WHERE `id` = {$_SESSION['ID']}");
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

    <title>Community Schedules - Web-Bello Online!</title>
<!-- 
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
  </style> -->


</head>

<body>
    <div class="content">
        <button id="addScheduleBtn" class="btn btn-primary">Add Schedule</button>
        <div id='calendar'></div>
    </div>

<!-- Modal -->
<div id="addScheduleModal" class="modal">
  <div class="modal-content">
    <span class="modal-close">&times;</span>
    <form id="scheduleForm">
      <h1>Schedule an Event</h1>
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="start_date">Start Date:</label>
        <input type="datetime-local" name="start_date" id="start_date" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="end_date">End Date:</label>
        <input type="datetime-local" name="end_date" id="end_date" class="form-control" required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Schedule Event</button>
      </div>
    </form>
  </div>
</div>

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

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src='fullcalendar/packages/core/main.js'></script>
    <script src='fullcalendar/packages/interaction/main.js'></script>
    <script src='fullcalendar/packages/daygrid/main.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid'],
            defaultDate: '2023-06-12',
            editable: true,
            eventLimit: true, // allow "more" link when too many events,
            events: {
                url: '../api/schedule/all-sched.php',
                method: 'POST',
                extraParams: {
                    user_id: <?php echo $_SESSION['ID']; ?> // Pass the user ID to the server
                },
                failure: function(xhr, status, error) {
                    console.log(xhr.responseText); // Print the error response
                    alert('Failed to fetch events from the server.' + failure);
                }
            }
        });
        calendar.render();
    });

    document.addEventListener('DOMContentLoaded', function () {
        var modal = document.getElementById("addScheduleModal");
        var addScheduleBtn = document.getElementById("addScheduleBtn");
        var closeBtn = document.getElementsByClassName("close")[0];

        // Open the modal when the button is clicked
        addScheduleBtn.onclick = function () {
            modal.style.display = "block";
        }

        // Close the modal when the close button is clicked
        closeBtn.onclick = function () {
            modal.style.display = "none";
        }

        // Close the modal when clicked outside of it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Handle form submission
        document.getElementById("scheduleForm").addEventListener("submit", function(e) {
            e.preventDefault();

            // Retrieve form data
            let title = document.getElementById("title").value;
            let start_date = document.getElementById("start_date").value;
            let end_date = document.getElementById("end_date").value;

            // Validate the dates
            let currentDate = new Date();
            let startDate = new Date(start_date);
            if (startDate < currentDate) {
                alert("Start date should be in the future.");
                return;
            }

            let endDate = new Date(end_date);
            if (endDate < currentDate) {
                alert("End date should be in the future.");
                return;
            }

            // Send the data to the server
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../api/schedule/sched.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let response = JSON.parse(xhr.responseText);
                        if (response.status === "success") {
                            alert("Event scheduled successfully.");
                            // Clear the form
                            document.getElementById("title").value = "";
                            document.getElementById("start_date").value = "";
                            document.getElementById("end_date").value = "";
                        } else {
                            alert("Error: " + response.message);
                        }
                    } else {
                        alert("An error occurred: " + xhr.status);
                    }
                }
            };
            xhr.send("title=" + encodeURIComponent(title) + "&start_date=" + encodeURIComponent(start_date) + "&end_date=" + encodeURIComponent(end_date));
        });
    });

    function deleteEvent(eventId) {
        if (confirm("Are you sure you want to delete this event?")) {
            // Send the event ID to the server for deletion
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../api/schedule/delete-sched.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let response = JSON.parse(xhr.responseText);
                        if (response.status === "success") {
                            alert("Event deleted successfully.");
                            // Refresh the calendar
                            calendar.refetchEvents();
                        } else {
                            alert("Error: " + response.message);
                        }
                    } else {
                        alert("An error occurred: " + xhr.status);
                    }
                }
            };
            xhr.send("event_id=" + encodeURIComponent(eventId));
        }
    }

    function editEvent(eventId, title, start_date, end_date) {
        // Prompt the user for the new event title
        let newTitle = prompt("Enter the new event title:", title);

        // If the user entered a new title, update the event
        if (newTitle) {
            // Send the updated event data to the server
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../api/schedule/update-sched.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let response = JSON.parse(xhr.responseText);
                        if (response.status === "success") {
                            alert("Event updated successfully.");
                            // Refresh the calendar
                            calendar.refetchEvents();
                        } else {
                            alert("Error: " + response.message);
                        }
                    } else {
                        alert("An error occurred: " + xhr.status);
                    }
                }
            };
            xhr.send("event_id=" + encodeURIComponent(eventId) + "&title=" + encodeURIComponent(newTitle) + "&start_date=" + encodeURIComponent(start_date) + "&end_date=" + encodeURIComponent(end_date));
        }
    }
    </script>
</body>

</html>
