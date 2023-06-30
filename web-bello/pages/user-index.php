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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


    <script src="https://cdn.tailwindcss.com/2.2.19/tailwind.min.js"></script>
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

        .grid-box:hover p {
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

            <!-- Start of Carousel -->

            <div class="flex justify-center mt-10 hover:shadow-xl transition-shadow">
                <div id="carouselExampleIndicators" class="relative" data-te-carousel-init data-te-carousel-slide>
                    <!--Carousel indicators-->
                    <div class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0" data-te-carousel-indicators>
                        <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="0" data-te-carousel-active class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="1" class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none" aria-label="Slide 2"></button>
                        <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="2" class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none" aria-label="Slide 3"></button>
                    </div>

                    <!--Carousel items-->
                    <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                        <!--First item-->
                        <div class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" data-te-carousel-item data-te-carousel-active>
                            <img src="/web-bello/images/banner-3.png" class="block w-full rounded-xl" alt="Banner 1" />
                        </div>
                        <!--Second item-->
                        <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" data-te-carousel-item>
                            <img src="/web-bello/images/banner-2.png" class="block w-full rounded-xl" alt="Banner 2" />
                        </div>
                        <!--Third item-->
                        <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" data-te-carousel-item>
                            <img src="/web-bello/images/banner-1.png" class="block w-full rounded-xl" alt="Banner 3" />
                        </div>
                    </div>

                    <!--Carousel controls - prev item-->
                    <button class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none" type="button" data-te-target="#carouselExampleIndicators" data-te-slide="prev">
                        <span class="inline-block h-8 w-8">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </span>
                        <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
                    </button>
                    <!--Carousel controls - next item-->
                    <button class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none" type="button" data-te-target="#carouselExampleIndicators" data-te-slide="next">
                        <span class="inline-block h-8 w-8">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </span>
                        <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
                    </button>
                </div>
            </div>

            <!-- End of Carousel -->
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

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <a class="block rounded-xl border border-gray-300 p-4 shadow-sm hover:shadow-xl transition-shadow focus:outline-none focus:ring grid-box" href="/web-bello/pages/monthly-due.php">
                        <span class="flex items-center justify-center rounded-lg p-3">
                            <svg class="h-12 w-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z">
                                </path>
                            </svg>
                        </span>

                        <p class="mt-2 text-sm font-medium tracking-wider text-center">
                            MANAGE DUES
                        </p>
                    </a>

                    <a class="block rounded-xl border border-gray-300 p-4 shadow-sm hover:shadow-xl transition-shadow focus:outline-none focus:ring grid-box" href="/web-bello/pages/profile.php">
                        <span class="flex items-center justify-center rounded-lg p-3">
                            <svg class="h-12 w-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10">
                                </path>
                            </svg>
                        </span>

                        <p class="mt-2 text-sm font-medium tracking-wider text-center">
                            UPDATE PROFILE
                        </p>
                    </a>

                    <a class="block rounded-xl border border-gray-300 p-4 shadow-sm hover:shadow-xl transition-shadow focus:outline-none focus:ring grid-box" href="/web-bello/pages/view-announcements.php">
                        <span class="flex items-center justify-center rounded-lg p-3">
                            <svg class="h-12 w-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46">
                                </path>
                            </svg>
                        </span>

                        <p class="mt-2 text-sm font-medium tracking-wider text-center">
                            VIEW ANNOUNCEMENTS
                        </p>
                    </a>

                    <a class="block rounded-xl border border-gray-300 p-4 shadow-sm hover:shadow-xl transition-shadow focus:outline-none focus:ring grid-box" href="/web-bello/pages/view-events.php">
                        <span class="flex items-center justify-center rounded-lg p-3">
                            <svg class="h-12 w-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z">
                                </path>
                            </svg>
                        </span>

                        <p class="mt-2 text-sm font-medium tracking-wider text-center">
                            VIEW EVENTS
                        </p>
                    </a>

                    <a class="block rounded-xl border border-gray-300 p-4 shadow-sm hover:shadow-xl transition-shadow focus:outline-none focus:ring grid-box" href="/web-bello/pages/view-forums.php">
                        <span class="flex items-center justify-center rounded-lg p-3">
                            <svg class="h-12 w-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z">
                                </path>
                            </svg>
                        </span>

                        <p class="mt-2 text-sm font-medium tracking-wider text-center">
                            VIEW FORUMS
                        </p>
                    </a>

                    <a class="block rounded-xl border border-gray-300 p-4 shadow-sm hover:shadow-xl transition-shadow focus:outline-none focus:ring grid-box" href="/web-bello/calendar-19/index.php">
                        <span class="flex items-center justify-center rounded-lg p-3">
                            <svg class="h-12 w-12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12">
                                </path>
                            </svg>
                        </span>

                        <p class="mt-2 text-sm font-medium tracking-wider text-center">
                            VIEW SCHEDULES
                        </p>
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
                <div class="w-full md:w-1/2 hover:shadow-xl transition-shadow">
                    <img class="rounded-lg h-full w-full object-cover" src="../images/about.jpg" alt="About Us Image">
                </div>
                <div class="w-full md:w-1/2 px-4 flex items-center">
                    <div class="max-w-md mx-auto text-center md:text-left">
                        <h2 class="text-3xl font-bold text-gray-800 text-center mt-4">About Us</h2>
                        <p class="mt-4 text-gray-700 tracking-wide text-md">We are Web-Bello Online, an online platform
                            dedicated to providing a seamless and convenient experience for homeowners in Palazzo Bello
                            Subdivision. Our mission is to create a vibrant community by offering various services and
                            resources to our valued residents.</p>
                        <p class="mt-4 text-gray-700 tracking-wide text-md">With Web-Bello Online, you can easily manage
                            your dues, update your profile, stay informed about announcements and events, and
                            participate in community forums.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of About Us Section -->

    <!-- Mission Vision Statement Section -->

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="text-center mb-20">
                <h1 class="sm:text-3xl title-font text-3xl font-bold text-gray-900 mb-4">
                    Our Commitment: Mission & Vision
                </h1>
                <p class="leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500 tracking-wide text-md">
                    Discover our unwavering commitment to excellence and our visionary
                    goals that drive our homeowners association forward. Learn more
                    about our mission and vision for a thriving community.
                </p>
                <div class="flex mt-6 justify-center">
                    <div class="w-16 h-1 rounded-full bg-sky-900 inline-flex"></div>
                </div>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-1/2 w-full ">
                    <div class="h-full bg-gray-100 p-8 rounded-xl hover:shadow-xl transition-shadow">
                        <a class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                                <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z">
                                </path>
                            </svg>
                            <span class="flex-grow flex flex-col pl-4 mb-4">
                                <span class="title-font text-2xl font-medium text-gray-900">OUR MISSION</span>
                            </span>
                        </a>

                        <p class="leading-relaxed mb-6 tracking-wide text-gray-700">
                            Our mission is to provide a safe, inclusive, and welcoming
                            environment where residents can enjoy a high quality of life. We
                            aim to foster a strong sense of community, promote a healthy
                            lifestyle, and provide top-notch amenities and services that
                            enhance the well-being of our residents.
                        </p>
                    </div>
                </div>
                <div class="p-4 md:w-1/2 w-full ">
                    <div class="h-full bg-gray-100 p-8 rounded-xl hover:shadow-xl transition-shadow">
                        <a class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                                <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z">
                                </path>
                            </svg>
                            <span class="flex-grow flex flex-col pl-4 mb-4">
                                <span class="title-font text-2xl font-medium text-gray-900">OUR VISION</span>
                            </span>
                        </a>

                        <p class="leading-relaxed mb-6 tracking-wide text-gray-700">
                            Our vision is to create a subdivision that sets the standard for
                            exceptional living. We envision a community where neighbors come
                            together to support and inspire each other, where children grow
                            up in a nurturing environment, and where residents can enjoy a
                            balanced and fulfilling lifestyle. We strive to be a model
                            subdivision that others aspire to emulate.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End of Mission Vision Statement Section -->

    <!-- Contact Us section -->

    <section class="bg-gray-200" id="contact">
        <div class="container px-6 py-16 mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 text-center">Contact Us</h2>
            <div class="flex flex-col md:flex-row mt-12 items-center">
                <div class="w-full md:w-1/2">
                    <div class="max-w-lg mx-auto">
                        <div class="bg-white rounded-lg shadow-md p-6 mb-6 hover:shadow-xl transition-shadow">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Contact Number</h3>
                            <p class="text-gray-600">09123456789</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-6 mb-6 hover:shadow-xl transition-shadow">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Location</h3>
                            <p class="text-gray-600">Palazzo Bello, Carsadang Imus Cavite, Philippines</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-6 mb-6 hover:shadow-xl transition-shadow">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Facebook Page</h3>
                            <a href="https://www.facebook.com/pages/Palazzo-Bello/259135290785585" target="_blank" class="text-blue-500 hover:underline">Visit our Facebook Page</a>
                        </div>
                        <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300" onclick="location.href='mailto:your-email@example.com';">Send Email</button>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-8 md:mt-0">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.6192040335823!2d120.9226916169621!3d14.421285300000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d2e5e14e944f%3A0xa386a3d3dc5d8a64!2sPalazzo%20Bello%2C%20Imus%2C%20Cavite!5e1!3m2!1sen!2sph!4v1687189807400!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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



    <script defer>
        // Show a notification
        Swal.fire({
            title: 'Welcome back, <?php echo $result[0]['firstname'] ?>',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            background: '#00ff00' // Green background color
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
</body>

</html>