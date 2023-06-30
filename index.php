<?php
session_start(); //if there is no session then start session

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - Welcome to Web-Bello</title>
    <link rel="stylesheet" href="../style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <style>
    .custom-bg {
        background-image: url("../src/assets/images/landing-bg.png");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        height: 100%;
    }

    .custom-signin-btn {
        width: 100%;
        color: white;
        background-color: #003049;
        border: none;
        border-radius: 0.375rem;
        font-weight: 500;
        font-size: 0.875rem;
        padding: 0.625rem 1.25rem;
        text-align: center;
        outline: none;
    }

    .custom-signin-btn:hover {
        background-color: #023e8a;
    }

    .custom-signin-btn:focus {
        outline-width: 4px;
        outline-color: #caf0f8;
    }

    .custom-text-btn {
        font-weight: 500;
        color: #003049;
        text-decoration: none;
    }

    .custom-text-btn:hover {
        text-decoration: underline;
        color: #023e8a;
    }

    @keyframes fade-in {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .landing-content {
        animation: fade-in 2s ease-in-out;
    }

    /* Navbar */

    :root {
        --underline-color: #000000;
        /* Set the underline color to white */
    }

    @media (prefers-color-scheme: dark) {
        :root {
            --underline-color: #ffffff;
        }
    }

    .nav-link {
        position: relative;
        display: inline-block;
        line-height: 2;
    }

    .nav-link::before {
        content: "";
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: transparent;
        transition: background-color 0.3s ease-in-out;
    }

    .nav-link:hover::before {
        background-color: var(--underline-color);
    }

    /**Added CSS */
    @media (max-width: 1023px) {
        #navbar-default.flex {
            display: block;
        }

        #navbar-default.hidden {
            display: none;
        }

        .nav-link {
            display: block;
            padding: 1rem;
        }
    }

    @media (min-width: 1024px) {
        .nav-item {
            margin-left: 2rem;
        }

        .nav-item:first-child {
            margin-left: 0;
        }
    }
    </style>

    <!-- NavBar Static -->

    <nav class="fixed bg-white dark:bg-gray-900 top-0 left-0 right-0 shadow-lg z-10">
        <div class="container mx-auto flex flex-wrap max-w-7xl items-center justify-between py-10 lg:px-8">
            <div class="flex lg:flex-1 px-6">
                <a href="https://web-bello.online/" class="-m-1.5 p-1.5">
                    <span class="sr-only"></span>
                    <h2 class="drop-shadow text-lg tracking-wider font-medium text-gray-900 dark:text-white">
                        WEB-BELLO
                    </h2>
                </a>
            </div>

            <div class="flex lg:hidden px-6">
                <button id="menu-toggle" type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <!-- Nav Links -->
            <div class="hidden lg:flex lg:gap-x-12">
                <ul class="lg:flex flex-col lg:flex-row list-none lg:ml-auto">
                    <li class="nav-item">
                        <a href="/index.php#about"
                            class="nav-link text-sm font-semibold leading-6 text-gray-900 dark:text-white flex items-center">
                            <span>About us</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/index.php#contact"
                            class="nav-link text-sm font-semibold leading-6 text-gray-900 dark:text-white flex items-center">
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Mobile menu, show/hide based on menu open state -->
    <div class="hidden" role="dialog" aria-modal="true" id="menu">
        <div class="fixed inset-0 z-10">
            <div
                class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white dark:bg-gray-900 px-6 py-10 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="https://web-bello.online/" class="-m-1.5 p-1.5">
                        <span class="sr-only">Web-Bello</span>
                        <h2 class="drop-shadow text-lg tracking-wider font-medium text-gray-900 dark:text-white">
                            WEB-BELLO
                        </h2>
                    </a>
                    <button type="button" id="close-menu" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="/index.php#about"
                                class="-mx-3 text-sm font-semibold leading-6 text-gray-900 dark:text-white block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800">
                                About us
                            </a>
                            <a href="/index.php#about"
                                class="-mx-3 text-sm font-semibold leading-6 text-gray-900 dark:text-white block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800">
                                Contact
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Mobile menu, show/hide based on menu open state -->

    <!-- End of NavBar Static -->

    <!-- New Landing Page -->

    <section class="bg-gray-50 custom-bg">
        <div class="mx-auto max-w-screen-xl px-4 pt-8 pb-4 mt-24 lg:flex lg:h-screen lg:items-center">
            <div
                class="landing-content mx-auto max-w-xl text-center rounded-lg shadow bg-white/80 px-10 py-20 h-full sm:h-auto">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-800">
                    Welcome to Web-Bello!
                </h1>

                <p class="mt-4 sm:text-xl/tight text-gray-800 font-normal tracking-wide">
                    The ultimate hub for homeowners to stay connected and informed! With
                    Web-Bello, you can easily connect with your neighbors, stay informed
                    on the latest news and events, and receive important alerts and
                    notifications.
                </p>

                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a class="block w-full rounded bg-sky-950 px-12 py-3 text-sm font-medium tracking-wide text-white shadow hover:bg-sky-700 focus:outline-none focus:ring sm:w-auto lg:w-auto xl:w-auto"
                        href="/web-bello/pages/user-login.php">
                        Resident
                    </a>

                    <a class="block w-full rounded bg-sky-950 px-12 py-3 text-sm font-medium tracking-wide text-white shadow hover:bg-sky-700 focus:outline-none focus:ring sm:w-auto lg:w-auto xl:w-auto"
                        href="/web-bello/pages/index.php">
                        Admin
                    </a>
                    <p class="text-sm font-light text-gray-600">
                        Select your appropriate login type to continue.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- End of New Landing Page -->

    <!-- About Us Section -->
    <section class="bg-gray-100" id="about">
        <div class="container px-6 py-16 mx-auto">
            <div class="flex flex-wrap items-stretch md:items-center mt-8">
                <div class="w-full md:w-1/2 hover:shadow-xl transition-shadow">
                    <img class="rounded-lg h-full w-full object-cover" src="/web-bello/images/about.jpg"
                        alt="About Us Image" />
                </div>
                <div class="w-full md:w-1/2 px-4 flex items-center">
                    <div class="max-w-md mx-auto text-center md:text-left">
                        <h2 class="text-3xl font-bold text-gray-800 text-center mt-4">
                            About Us
                        </h2>
                        <p class="mt-4 text-gray-700 tracking-wide text-md">
                            We are Web-Bello Online, an online platform dedicated to
                            providing a seamless and convenient experience for homeowners in
                            Palazzo Bello Subdivision. Our mission is to create a vibrant
                            community by offering various services and resources to our
                            valued residents.
                        </p>
                        <p class="mt-4 text-gray-700 tracking-wide text-md">
                            With Web-Bello Online, you can easily manage your dues, update
                            your profile, stay informed about announcements and events, and
                            participate in community forums.
                        </p>
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
                <div class="p-4 md:w-1/2 w-full">
                    <div class="h-full bg-gray-100 p-8 rounded-xl hover:shadow-xl transition-shadow">
                        <a class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                                <path
                                    d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z">
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
                <div class="p-4 md:w-1/2 w-full">
                    <div class="h-full bg-gray-100 p-8 rounded-xl hover:shadow-xl transition-shadow">
                        <a class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                                <path
                                    d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z">
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
                            <h3 class="text-xl font-bold text-gray-800 mb-2">
                                Contact Number
                            </h3>
                            <p class="text-gray-600">09123456789</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-6 mb-6 hover:shadow-xl transition-shadow">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Location</h3>
                            <p class="text-gray-600">
                                Palazzo Bello, Carsadang Imus Cavite, Philippines
                            </p>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-6 mb-6 hover:shadow-xl transition-shadow">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">
                                Facebook Page
                            </h3>
                            <a href="https://www.facebook.com/pages/Palazzo-Bello/259135290785585" target="_blank"
                                class="text-blue-500 hover:underline">Visit our Facebook Page</a>
                        </div>
                        <button type="button"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300"
                            onclick="location.href='mailto:your-email@example.com';">
                            Send Email
                        </button>
                    </div>
                </div>
                <div class="w-full md:w-1/2 mt-8 md:mt-0">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.6192040335823!2d120.9226916169621!3d14.421285300000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d2e5e14e944f%3A0xa386a3d3dc5d8a64!2sPalazzo%20Bello%2C%20Imus%2C%20Cavite!5e1!3m2!1sen!2sph!4v1687189807400!5m2!1sen!2sph"
                        width="100%" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                        <a href="https://web-bello.online/" class="-m-1.5 p-1.5">
                            <span class="sr-only"></span>
                            <h2 class="drop-shadow text-lg tracking-wider font-medium">
                                WEB-BELLO
                            </h2>
                        </a>
                    </div>

                    <p class="mx-auto mt-6 max-w-md text-center leading-relaxed text-gray-500 lg:text-left">
                        Connect, engage, and stay informed with your neighbors, access the
                        latest news and events, all at your fingertips.
                    </p>
                </div>

                <ul class="mt-12 flex flex-wrap justify-center gap-6 md:gap-8 lg:mt-0 lg:justify-end lg:gap-12">
                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75" href="/index.php#about">
                            About us
                        </a>
                    </li>

                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75"
                            href="/index.php#contact">
                            Contact
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

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>

    <script>
    // Check if dark mode is preferred by the user
    const prefersDarkMode = window.matchMedia(
        "(prefers-color-scheme: dark)"
    ).matches;

    // Set the HTML class based on the user's preference
    document.documentElement.classList.add(
        prefersDarkMode ? "dark" : "light"
    );
    </script>

    <script>
    const menuToggle = document.getElementById("menu-toggle");
    menuToggle.addEventListener("click", () => {
        document.getElementById("menu").classList.toggle("hidden");
    });

    const closeMenu = document.getElementById("close-menu");
    closeMenu.addEventListener("click", () => {
        document.getElementById("menu").classList.toggle("hidden");
    });
    </script>
</body>

</html>