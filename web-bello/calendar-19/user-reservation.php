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

<?php
require_once('../components/navbar.php')
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <!-- Style -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <title>Community Schedules - Web-Bello Online!</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <!-- <style>
    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

    .calendar-toolbar {
            display: flex;
            justify-content: center;
        }

    #calendar .fc-view-container {
        padding: 30px;
        background-color: #efefef;
        -webkit-box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.2);
        box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.2);
    }
    </style> -->
    <div class="content mt-36 mb-12">

        <div class="calendar-toolbar">
            <!-- <a href="../pages/dashboard.php"><button id="Dashboard" class="btn btn-primary mr-3">Return to
                    dashboard</button></a>  -->
            <button id="addScheduleBtn" style="margin-left: 650px; margin-bottom: 10px;" class="btn btn-primary mr-3">New Reservation</button>
        </div>

        <div id='calendar'>
        </div>
    </div>

    <style>
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .calendar-toolbar {
            display: flex;
            justify-content: center;
        }

        #calendar {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
    </style>

<!-- Modal -->
<div id="addScheduleModal" class="modal">
  <div class="modal-content">
    <span class="modal-close">&times;</span>
    <form id="scheduleForm">
      <h1 style="text-align: center;"> <strong>Want to Reserve Palazzo Bello Court?</strong></h1>
      <h3 style="text-align: center; color: grey; margin-bottom: 10px;">Fill out this form, pay the amount to reserve and wait for the admin confirmation. Thank you!</h3>
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control" required>
      </div>
      <!-- <div class="form-group">
        <label for="reserved_by">Name:</label>
        <input type="text" name="reserved_by" id="reserved_by" class="form-control" required>
      </div> -->
      <div class="form-group">
        <label for="start_date">Start Date:</label>
        <input type="datetime-local" name="start_date" id="start_date" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="end_date">End Date:</label>
        <input type="datetime-local" name="end_date" id="end_date" class="form-control" required>
      </div>
      <div class="form-group" id ="imageHolder">
                        
      </div>
            <div class="mb-10">                               
            <label class="block mb-2" for="file_input"><strong>Payment (P100):&nbsp;</strong><span style="color: teal;">Gcash/Paymaya: 09123456789</span></label>
            <input class="block w-full" style="border: 1px solid #555;" aria-describedby="file_input_help" id="image_url" type="file" required>
            <!--<p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>-->
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
    font-size: 20px;
    color: #aaa;
  }

  .modal-close:hover {
    color: #555;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }

  .form-control {
    width: 100%;
    padding: 8px;
    font-size: 16px;
    border-radius: 3px;
    border: 1px solid #ccc;
  }

  .btn {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 3px;
    border: none;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
  }

  .btn:hover {
    background-color: #0056b3;
  }
</style>

    <script>
        // Close the modal when the close button (X) is clicked
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById("addScheduleModal");
            var closeBtn = document.getElementsByClassName("modal-close")[0];

            closeBtn.onclick = function() {
                modal.style.display = "none";
            }
        });

        // Reload the window after scheduling an event
        // document.addEventListener("DOMContentLoaded", function() {
        //     var scheduleForm = document.getElementById("scheduleForm");

        //     scheduleForm.addEventListener("submit", function(e) {
        //         e.preventDefault();
                
        //         // Send the data to the server and handle the response

        //         // Reload the window
        //         location.reload();
        //     });
        // });
    </script>

    <!-- Footer -->
    <footer class="bg-gray-100">
        <div class="relative mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 lg:pt-24">
            <div class="lg:flex lg:items-end lg:justify-between">
                <div>
                    <div class="flex justify-center text-teal-600 lg:justify-start">
                        <a href="/web-bello/pages/user-index.php" class="-m-1.5 p-1.5">
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
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75"
                            href="/web-bello/pages/view-announcements.php">
                            Announcements
                        </a>
                    </li>

                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75"
                            href="/web-bello/pages/view-events.php">
                            Events
                        </a>
                    </li>

                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75"
                            href="/web-bello/pages/view-forums.php">
                            Forums
                        </a>
                    </li>

                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75"
                            href="/web-bello/calendar-19/index.php">
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

    <!-- <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
    <script src='fullcalendar/packages/core/main.js'></script>
    <script src='fullcalendar/packages/interaction/main.js'></script>
    <script src='fullcalendar/packages/daygrid/main.js'></script>

    <script>
    const imageHolder = document.querySelector('#imageHolder')
    const image_url = document.querySelector('#image_url')

    let imageReceivedUrl = ''

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid'],
            defaultDate: '2023-06-12',
            editable: true,
            eventLimit: true, // allow "more" link when too many events,
            events: {
                url: '../api/reservation/all-reservation.php',
                method: 'POST',
                extraParams: {
                    user_id: <?php echo $_SESSION['IDUSER']; ?> // Pass the user ID to the server
                },
                failure: function(xhr, status, error) {
                    console.log(xhr.responseText); // Print the error response
                    alert('Failed to fetch events from the server.' + failure);
                }
            }
        });
        calendar.render();
    });

    document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById("addScheduleModal");
            var addScheduleBtn = document.getElementById("addScheduleBtn");
            var closeBtn = document.getElementsByClassName("close")[0];

            // Open the modal when the button is clicked
            addScheduleBtn.onclick = function() {
                modal.style.display = "block";
            }

            // Close the modal when the close button is clicked
            closeBtn.onclick = function() {
                modal.style.display = "none";
            }

            // Close the modal when clicked outside of it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });

// Update the event listener for form submission
document.getElementById("scheduleForm").addEventListener('submit', async (e) => {
    console.log("1")
    e.preventDefault();
    console.log("2")
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

    // Get the file input element
    let imageFile = document.getElementById("image_url").files[0];

    // Create a FormData object
    let formData = new FormData();

    // Add the form data to the FormData object
    formData.append("title", title);
    formData.append("start_date", start_date);
    formData.append("end_date", end_date);
    formData.append("place" , 'court')
    formData.append("image_url", imageReceivedUrl);

       
    // Print all the form data
    for (let entry of formData.entries()) {
        console.log(entry[0] + ': ' + entry[1]);
    }
        // Send the data to the server using fetch
        // fetch("../api/reservation/add-reservation.php", {
        //     method: "POST",
        //     body: formData
        // })
        // .then(response => response.json())
        // .then(data => {
        //     if (data.status === "success") {
        //         alert("Event reserved successfully.");
        //         // Clear the form
        //         document.getElementById("title").value = "";
        //         document.getElementById("start_date").value = "";
        //         document.getElementById("end_date").value = "";
        //         document.getElementById("image_url").value = "";
        //     } else {
        //         console.error("An error occurred:",  + data.message);
        //     }
        // })
        // .catch(error => {
        //     alert("error: "+error)
        // });
        try{
            const request = await fetch('../api/reservation/add-reservation.php', {
                method :'POST',
                body:formData,
            })
            
            const response = await request.json()

            if(response.status === 'success'){
                alert("Event reserved successfully.");
                    //         // Clear the form
                    //         document.getElementById("title").value = "";
                    //         document.getElementById("start_date").value = "";
                    //         document.getElementById("end_date").value = "";
                    //         document.getElementById("image_url").value = "";
            }else{
                console.error(response.responseContent)
            }
        }catch(e){
            console.error(e)
        }
   

});




        //image move
image_url.addEventListener('change', async (event) =>{
 const selectedFile = event.target.files[0];
    
// Uploading only one file; multiple uploads are not allowed.
  let imageFile = event.target.files[0]; 

   // Create a FormData object.
  formData = new FormData();

  // Add the file to the request.
  formData.append('profileEdit', imageFile, imageFile.name);

try{

const fetchResponse = await fetch("../api/images/move-only-image.php",{
    method: "POST",
    body:formData,
});

const receivedStatus = await fetchResponse.json();
console.log(receivedStatus)

if(receivedStatus.statusCode === 200){
    imageReceivedUrl =receivedStatus.image
let output = ''; 
output += `
 <input type="text" style="display: none;" name="image_url" value="https://web-bello.online/web-bello/savedimages/`+receivedStatus.image+`" />
<img class="m-2 h-auto max-w-xs rounded-lg " src="https://web-bello.online/web-bello/savedimages/`+receivedStatus.image+`" alt="image description">
`;
  
imageHolder.innerHTML = output;
}else{
    alert('error')
}
 


    }catch (e){
    console.log(e)
    }
})

    </script>
</body>

</html>