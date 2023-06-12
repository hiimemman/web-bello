<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Schedule Event</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // Handle form submission
      $("#schedule-form").submit(function(e) {
        e.preventDefault();

        // Retrieve form data
        var title = $("#title").val();
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        // Send the data to the server
        $.ajax({
          type: "POST",
          url: "../api/schedule/sched.php",
          data: { title: title, start_date: start_date, end_date: end_date },
          dataType: "json",
          success: function(response) {
            if (response.status === "success") {
              alert("Event scheduled successfully.");
              // Clear the form
              $("#title").val("");
              $("#start_date").val("");
              $("#end_date").val("");
            } else {
              alert("Error: " + response.message);
            }
          },
          error: function(xhr, status, error) {
            alert("An error occurred: " + error);
          }
        });
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