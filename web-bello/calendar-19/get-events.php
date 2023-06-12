<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Schedule Event</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
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
    });
  </script>
</head>
<body>
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
</body>
</html>