<?php
require_once('../components/navbar.php')
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to Web-Bello Online!</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <style>
        .grid-box {
            background-color: #ffffff;
            transition: background-color 0.3s;
            border: solid 2 gray;
        }

        .grid-box:hover {
            background-color: #1b263b;
        }

        .grid-box:hover svg {
            stroke: #fff;
        }

        .grid-box:hover h2 {
            color: #fff;
        }
    </style>

    <header class=" border-b-4 border-sky-300">
        <!-- Intro Header -->
        <div class="container mt-32 mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="text-center sm:text-left">
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                        Hello, <?php echo $result[0]['firstname']; ?>!
                    </h1>

                    <p class="mt-1.5 text-lg text-gray-500">
                        Welcome to your Web-Bello Online account!
                    </p>
                </div>
            </div>
        </div>
        <!-- End of Intro Header -->
    </header>

    <!-- Hero Section -->

    <section class="bg-sky-50">
        <div class="container px-6 py-16 mx-auto text-center">
            <div class="max-w-lg mx-auto">
                <h1 class="text-3xl font-bold text-gray-800 lg:text-4xl">Welcome to Palazzo Bello
                    Subdivision!</h1>
                <p class="mt-6 text-gray-700 tracking-wide text-md text-center w-full">Discover a remarkable residential
                    experience in the
                    heart of Imus with Palazzo Bello Subdivision by Landmass Development Corporation.</p>

            </div>

            <div class="flex justify-center mt-10">
                <img class="object-cover w-full h-96 rounded-xl lg:w-4/5 hover:shadow-lg" src="/web-bello/images/banner-1.png" />
            </div>
        </div>
    </section>

    <!-- End of Hero Section -->

    <!-- New Content Section -->
    <section>
        <div class="max-w-screen-xl mx-auto px-4 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-16">
            <div class="grid grid-cols-1 gap-y-8 lg:grid-cols-2 lg:gap-x-16">
                <div class="mx-auto max-w-lg text-center lg:mx-0 ltr:lg:text-left rtl:lg:text-right lg:text-left">
                    <h2 class="text-3xl font-bold sm:text-4xl">
                        Community Reminder
                    </h2>

                    <p class="mt-4 text-gray-700 tracking-wide text-md">
                        Dear homeowners, we want to remind you of your crucial role in fulfilling your financial
                        responsibilities to the association. Please review your account to ensure all dues are up to
                        date. Maintaining a healthy homeowner's association requires your active participation.
                        Together, let's create a vibrant community. Thank you for your cooperation!
                    </p>
                    <p class="mt-4 text-gray-700 tracking-wide text-md">We appreciate your attention to your account and
                        ensuring that all dues are paid promptly. Your
                        commitment to the association is instrumental in fostering a thriving community. If you have any
                        questions or need assistance regarding your payment status, please don't hesitate to reach out
                        to us. Thank you for your continued support!</p>





                </div>

                <!-- Grid Boxes -->

                <div class="grid grid-cols-2 gap-4 sm:grid-cols-2">
                    <a class="block rounded-xl border border-gray-300 p-4 shadow-sm hover:shadow-xl transition-shadow focus:outline-none focus:ring grid-box" href="/web-bello/pages/monthly-due.php">
                        <span class="flex items-center justify-center rounded-lg p-3">
                            <svg class="h-12 w-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z">
                                </path>
                            </svg>
                        </span>

                        <h2 class="mt-2 font-medium tracking-wider text-center">
                            MANAGE DUES
                        </h2>
                    </a>

                    <a class="block rounded-xl border border-gray-300 p-4 shadow-sm hover:shadow-xl transition-shadow focus:outline-none focus:ring grid-box" href="/web-bello/pages/profile.php">
                        <span class="flex items-center justify-center rounded-lg p-3">
                            <svg class="h-12 w-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10">
                                </path>
                            </svg>
                        </span>

                        <h2 class="mt-2 font-medium tracking-wider text-center">
                            UPDATE PROFILE
                        </h2>
                    </a>

                    <a class="block rounded-xl border border-gray-300 p-4 shadow-sm hover:shadow-xl transition-shadow focus:outline-none focus:ring grid-box" href="/web-bello/pages/view-announcements.php">
                        <span class="flex items-center justify-center rounded-lg p-3">
                            <svg class="h-12 w-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46">
                                </path>
                            </svg>
                        </span>

                        <h2 class="mt-2 font-medium tracking-wider text-center">
                            VIEW ANNOUNCEMENTS
                        </h2>
                    </a>

                    <a class="block rounded-xl border border-gray-300 p-4 shadow-sm hover:shadow-xl transition-shadow focus:outline-none focus:ring grid-box" href="/web-bello/pages/view-events.php">
                        <span class="flex items-center justify-center rounded-lg p-3">
                            <svg class="h-12 w-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z">
                                </path>
                            </svg>
                        </span>

                        <h2 class="mt-2 font-medium tracking-wider text-center">
                            VIEW EVENTS
                        </h2>
                    </a>

                    <a class="block rounded-xl border border-gray-300 p-4 shadow-sm hover:shadow-xl transition-shadow focus:outline-none focus:ring grid-box" href="/web-bello/pages/view-forums.php">
                        <span class="flex items-center justify-center rounded-lg p-3">
                            <svg class="h-12 w-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z">
                                </path>
                            </svg>
                        </span>

                        <h2 class="mt-2 font-medium tracking-wider text-center">
                            VIEW FORUMS
                        </h2>
                    </a>

                    <a class="block rounded-xl border border-gray-300 p-4 shadow-sm hover:shadow-xl transition-shadow focus:outline-none focus:ring grid-box" href="/web-bello/calendar-19/index.php">
                        <span class="flex items-center justify-center rounded-lg p-3">
                            <svg class="h-12 w-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12">
                                </path>
                            </svg>
                        </span>

                        <h2 class="mt-2 font-medium tracking-wider text-center">
                            VIEW SCHEDULES
                        </h2>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End of New Content Section-->

 <!-- About Us Section -->
 <section class="bg-gray-100" id="about">
    <div class="container px-6 py-16 mx-auto">
        
        <div class="flex flex-wrap items-stretch md:items-center mt-8">
            <div class="w-full md:w-1/2">
                <img class="rounded-lg h-full w-full object-cover" src="../images/about.jpg" alt="About Us Image">
            </div>
            <div class="w-full md:w-1/2 px-4 flex items-center">
                <div class="max-w-md mx-auto text-center md:text-left">
                <h2 class="text-3xl font-bold text-gray-800 text-center">About Us</h2>
                    <p class="mt-4 text-gray-600">We are Web-Bello Online, an online platform dedicated to providing a seamless and convenient experience for homeowners in Palazzo Bello Subdivision. Our mission is to create a vibrant community by offering various services and resources to our valued residents.</p>
                    <p class="mt-4 text-gray-600">With Web-Bello Online, you can easily manage your dues, update your profile, stay informed about announcements and events, and participate in community forums.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of About Us Section -->

<!-- Contact Us section -->
<section class="bg-gray-200" id="contact">
    <div class="container px-6 py-16 mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 text-center">Contact Us</h2>
        <div class="flex flex-col md:flex-row mt-12 items-center">
            <div class="w-full md:w-1/2 text-center md:text-left">
                <form action="mailto:contact@webbelloonline.com" method="POST" enctype="text/plain" class="max-w-lg mx-auto mt-8">
                    <div class="flex flex-col mb-6">
                        <label for="name" class="text-gray-800">Name</label>
                        <input type="text" id="name" name="name" class="bg-white border border-gray-300 px-4 py-2 mt-2 rounded-lg" required>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="email" class="text-gray-800">Email</label>
                        <input type="email" id="email" name="email" class="bg-white border border-gray-300 px-4 py-2 mt-2 rounded-lg" required>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="message" class="text-gray-800">Message</label>
                        <textarea id="message" name="message" rows="5" class="bg-white border border-gray-300 px-4 py-2 mt-2 rounded-lg" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">Send Message</button>
                </form>
            </div>
            <div class="w-full md:w-1/2 mt-8 md:mt-0">
                <div class="flex items-center space-x-4 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                    <span class="text-gray-800">123 Main Street, Palazzo Bello</span>
                </div>
                <div class="flex items-center space-x-4 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                    <span class="text-gray-800">+1 (123) 456-7890</span>
                </div>
                <div class="flex items-center space-x-4 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span class="text-gray-800">contact@webbelloonline.com</span>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- End of contact us section -->


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
</body>

</html>