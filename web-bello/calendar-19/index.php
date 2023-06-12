<?php
session_start();
include_once("../connections/connection.php");
$con = connection();
if (!isset($_SESSION['IDUSER'])) {
  header('Location: ../web-bello/pages/user-login.php');
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
  <title>Community Schedule</title>
</head>
<body>
  <div class="content">
    <div id='calendar'></div>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src='fullcalendar/packages/core/main.js'></script>
  <script src='fullcalendar/packages/interaction/main.js'></script>
  <script src='fullcalendar/packages/daygrid/main.js'></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid' ],
        defaultDate: '2023-06-12',
        editable: true,
        eventLimit: true, // allow "more" link when too many events,
        events: {
          url: '../api/schedule/all-sched.php',
          method: 'POST',
          extraParams: {
            user_id: <?php echo $_SESSION['IDUSER']; ?> // Pass the user ID to the server
          },
          failure: function(xhr, status, error) {
            console.log(xhr.responseText); // Print the error response
            alert('Failed to fetch events from the server.'+failure);
          }
        }
      });
      calendar.render();
    });
  </script>
</body>
</html>
