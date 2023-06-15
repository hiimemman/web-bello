<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['IDUSER'])) {
    header('Location: /web-bello/pages/user-login.php');
    exit();
}

include_once("../connections/connection.php");
$con = connection();

$ID = $_SESSION['IDUSER'];

$sql = "SELECT * FROM tbl_residents WHERE id = '$ID'";
$result = mysqli_query($con, $sql);

if ($result) {
    $user = mysqli_fetch_assoc($result);

    // Assign the fetched values to variables
    $Firstname = $user['firstname'];
    $Lastname = $user['lastname'];
    $Sex = $user['sex'];
    $Age = $user['age'];
    $Address = $user['address'];
    $Contact = $user['contact'];
    $Email = $user['email'];
} else {
    echo "Error fetching user data: " . mysqli_error($con);
}
?>

<?php
require_once('../components/navbar.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-Bello | Profile</title>

    <script src="https://cdn.tailwindcss.com"></script>



</head>

<body>
    <!-- Test Code -->

    <header class=" border-b-4 border-sky-300">
        <!-- Intro Header -->
        <div class="container mt-32 mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="text-center sm:text-left">
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                        Update your personal information
                    </h1>
                    <p class="mt-1.5 text-lg text-gray-500">
                        Stay current and connected with updated personal details.
                    </p>
                </div>
            </div>
        </div>
        <!-- End of Intro Header -->
    </header>

    <section>
        <div class="container mx-auto grid gap-8 lg:grid-cols-1 px-36 mt-10">
            <form action="../pages/profile.php" method="POST" id="frmUpdateProfile" class="p-12 mx-20 bg-white rounded-lg border border-gray-200 shadow-md">

                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <!-- First name -->
                            <div class="sm:col-span-3 container">
                                <div class="form-group">
                                    <label for="firstname" class="label block text-sm font-medium leading-6 text-gray-900">First
                                        Name</label>
                                    <input type="text" name="firstname" value="<?php echo $Firstname; ?>" class="input-field block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <!-- Last name -->
                            <div class="sm:col-span-3 container">
                                <div class="form-group">
                                    <label for="firstname" class="label block text-sm font-medium leading-6 text-gray-900">Last
                                        Name</label>
                                    <input type="text" name="lastname" value="<?php echo $Lastname; ?>" class="input-field block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <!-- Sex -->

                        </div>
                    </div>
                </div>

                <div class=" grid grid-cols-1 md:grid-cols-2 gap-4">


                    <div class="form-group">
                        <label for="sex" class="label">Sex:</label>
                        <input type="text" name="sex" value="<?php echo $Sex; ?>" class="input-field">
                    </div>

                    <div class="form-group">
                        <label for="address" class="label">Address:</label>
                        <input type="text" name="address" value="<?php echo $Address; ?>" class="input-field">
                    </div>

                    <div class="form-group">
                        <label for="email" class="label">Email:</label>
                        <input type="email" name="email" value="<?php echo $Email; ?>" class="input-field">
                    </div>



                    <div class="form-group">
                        <label for="age" class="label">Age:</label>
                        <input type="text" name="age" value="<?php echo $Age; ?>" class="input-field">
                    </div>

                    <div class="form-group">
                        <label for="contact" class="label">Contact:</label>
                        <input type="text" name="contact" value="<?php echo $Contact; ?>" class="input-field">
                    </div>

                    <div class="form-group">
                        <label for="password" class="label">Password:</label>
                        <input type="password" name="password" class="input-field" required>
                    </div>

                    <div class="form-group">
                        <label for="password1" class="label">Confirm Password:</label>
                        <input type="password" name="password1" class="input-field" required>
                    </div>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Save
                    Changes</button>

            </form>
        </div>
    </section>



    <!-- <a href="https://web-bello.online/web-bello/pages/user-index.php">
        <button style="border: 2px white solid;" class="mt-3 ml-3">Go back to announcement</button>
    </a>
    <div class="container mt-24">
        <h1 class="text-3xl font-bold">Edit Profile</h1>
        
    </div> -->

    <!-- End of Test Code -->

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
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75" href="/web-bello/pages/view-announcements.php">
                            Announcements
                        </a>
                    </li>

                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75" href="/web-bello/pages/view-events.php">
                            Events
                        </a>
                    </li>

                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75" href="/web-bello/pages/view-forums.php">
                            Forums
                        </a>
                    </li>

                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75" href="/web-bello/calendar-19/index.php">
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

    <!-- TOASTER -->


    <div id="toast-success" class="hidden fixed flex items-center w-full max-w-xs p-4 mb-4 bottom-5 left-5 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">Item moved successfully.</div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
</body>

</html>


<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js"></script>


<script defer>
    frmUpdateProfile.addEventListener('submit', async (event) => {
        event.preventDefault()
        formData = new FormData(frmUpdateProfile)
        // formData.append('password', 'default1234')
        // uncomment this to print all the content of formData
        for (const [key, value] of formData.entries()) {
            console.log(`${key}: ${value}`);
        }

        //fetch data
        const request = await fetch("../api/profile/profile.php", {
            method: "POST",
            body: formData,
        });

        //get the response

        const response = await request.json();



        if (response.responseStatus === 'success') {
            //reload table
            console.log("responseContent")
            location.reload();
            localStorage.setItem('showToast', 'true');
            localStorage.setItem('showToastMessage', response.responseMessage)
            window.location.href = "https://web-bello.online/web-bello/pages/user-index.php"

            // Close the profile window

        }

    })


    //submit edit hoa
    updateHoaInformation.addEventListener('submit', async (event) => {
        event.preventDefault()
        formData = new FormData(updateHoaInformation)
        // uncomment this to print all the content of formData
        //     for (const [key, value] of formData.entries()) {
        //   console.log(`${key}: ${value}`);
        // }

        //fetch data
        const request = await fetch("../api/residents/update-residents.php", {
            method: "POST",
            body: formData,
        });

        //get the response

        const response = await request.json();

        if (response.responseStatus === 'success') {
            //reload table
            location.reload();

            localStorage.setItem('showToast', 'true');
            localStorage.setItem('showToastMessage', response.responseMessage)
        }

    })

    //toaster 
    const showToast = () => {
        const toast = document.getElementById('toast-success')
        const showToastFlag = localStorage.getItem('showToast')
        const showToastMessage = localStorage.getItem('showToastMessage')
        if (showToastFlag === 'true') {
            const toastMessage = toast.querySelector('.font-normal')
            toastMessage.textContent = showToastMessage
            toast.classList.remove('hidden');

            setTimeout(() => {
                toast.classList.add('hidden');
                localStorage.removeItem('showToast');
                localStorage.removeItem('showToastMessage')
            }, 3000);
        }
    };

    // Call showToast when the page loads
    document.addEventListener('DOMContentLoaded', showToast);
</script>
</body>

</html>