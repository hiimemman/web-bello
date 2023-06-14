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
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-100">
        <img src="../" alt="" srcset="">
        <div class="relative mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 lg:pt-24">
            <div class="lg:flex lg:items-end lg:justify-between">
                <div>
                    <div class="flex justify-center text-teal-600 lg:justify-start">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only"></span>
                            <h2 class="drop-shadow text-lg tracking-wider font-medium">
                                WEB-BELLO
                            </h2>
                        </a>
                    </div>

                    <p class="mx-auto mt-6 max-w-md text-center leading-relaxed text-gray-500 lg:text-left">Connect,
                        engage, and stay informed with your neighbors, access the latest news and events, all at your
                        fingertips.
                    </p>
                </div>

                <ul class="mt-12 flex flex-wrap justify-center gap-6 md:gap-8 lg:mt-0 lg:justify-end lg:gap-12">
                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75" href="/">
                            Announcements
                        </a>
                    </li>

                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75" href="/">
                            Events
                        </a>
                    </li>

                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75" href="/">
                            Forums
                        </a>
                    </li>

                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75" href="/">
                            Schedules
                        </a>
                    </li>
                </ul>
            </div>

            <p class="mt-12 text-center text-sm text-gray-500 lg:text-right">
                Copyright &copy; 2023. All rights reserved.
            </p>
        </div>
    </footer>
    <!-- End of Footer-->
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

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
      document.getElementById("schedule-form").addEventListener("submit", function(e) {
        e.preventDefault();

        // Retrieve form data
        let title = document.getElementById("title").value;
        let start_date = document.getElementById("start_date").value;
        let end_date = document.getElementById("end_date").value;

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

      // Close the modal when the close button is clicked
      document.getElementById("modal-close").addEventListener("click", function() {
        document.getElementById("modal-container").style.display = "none";
      });
    });

function openModal() {
      document.getElementById("modal-container").style.display = "block";
    }

    </script>
</body>

</html>