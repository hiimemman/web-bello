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

    <style>
        body {
            background-color: #1a202c;
        }

        .content {
            color: #fff;
        }

        footer {
            background-color: #2d3748;
            color: #fff;
        }

        footer a,
        footer a:hover {
            color: #fff;
        }
    </style>

    <title>Community Schedules - Web-Bello Online!</title>

</head>

<body>
    <div class="content">
        <div id='calendar'></div>
    </div>

    <!-- Add Event Modal -->
    <div id="addEventModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEventModalLabel">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add event form goes here -->
                    <form>
                        <div class="form-group">
                            <label for="eventName">Event Name</label>
                            <input type="text" class="form-control" id="eventName" placeholder="Enter event name">
                        </div>
                        <div class="form-group">
                            <label for="eventDate">Event Date</label>
                            <input type="date" class="form-control" id="eventDate">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addEventBtn">Add Event</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Add Event Modal -->

    <!-- Remove Event Modal -->
    <div id="removeEventModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="removeEventModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeEventModalLabel">Remove Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove this event?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="removeEventBtn">Remove Event</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Remove Event Modal -->

    <footer class="bg-gray-900">
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

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src='fullcalendar/packages/core/main.js'></script>
    <script src='fullcalendar/packages/interaction/main.js'></script>
    <script src='fullcalendar/packages/daygrid/main.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
                    failure: function (xhr, status, error) {
                        console.log(xhr.responseText); // Print the error response
                        alert('Failed to fetch events from the server.' + failure);
                    }
                }
            });
            calendar.render();

            // Add Event Button Click Handler
            $('#addEventBtn').on('click', function () {
                var eventName = $('#eventName').val();
                var eventDate = $('#eventDate').val();
                // Add your logic to handle the new event here
                // You can use the eventName and eventDate variables to get the values from the form
                // Example: calendar.addEvent({ title: eventName, start: eventDate });
                // After adding the event, close the modal
                $('#addEventModal').modal('hide');
            });

            // Remove Event Button Click Handler
            $('#removeEventBtn').on('click', function () {
                // Add your logic to remove the selected event here
                // Example: calendar.getEventById(eventId).remove();
                // After removing the event, close the modal
                $('#removeEventModal').modal('hide');
            });
        });
    </script>
</body>

</html>
