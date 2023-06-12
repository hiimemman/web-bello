<?php
require_once('../components/navbar.php')
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Announcements - Web-Bello Online!</title>

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
                        Hello, Lincoln!
                    </h1>

                    <p class="mt-1.5 text-lg text-gray-500">
                        Welcome to your Web-Bello Online account!
                    </p>
                </div>
            </div>
        </div>
        <!-- End of Intro Header -->
    </header>

    <!-- Announcement Section -->

    <section class="border-t-4 border-sky-300">
        <div class="container mx-auto grid gap-8 lg:grid-cols-1 p-6 mt-10">
            <article
                class="p-12 mx-20 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-5 text-gray-500">
                    <span
                        class="bg-purple-100 text-purple-700 text-md font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                        Announcement
                    </span>
                    <span class="text-sm">2023-06-09 01:36:10</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <img class="w-7 h-7 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                            alt="Bonnie Green avatar" />
                        <span class="font-medium dark:text-white"> John Doe </span>
                    </div>
                </div>
                <h2 class="mt-6 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Our first project with React
                </h2>
                <p id="announcementText" class="font-normal line-clamp-2 text-lg text-gray-500 dark:text-gray-400">
                    Static websites are now used to bootstrap lots of websites and are
                    becoming the basis for a variety of tools that even influence both
                    web designers and developers influence both web designers and
                    developers. Lorem ipsum dolor sit amet, consectetur adipisicing
                    elit. Architecto delectus cum velit dignissimos minus nesciunt
                    numquam, magni laborum sapiente debitis amet, provident fugiat odio
                    cupiditate blanditiis eaque illo voluptatum quis! Lorem ipsum dolor
                    sit amet consectetur adipisicing elit. Corrupti quia assumenda
                    provident omnis dicta velit quibusdam reiciendis rerum, perspiciatis
                    nostrum molestias at aut. Minima quasi saepe maxime quas quibusdam
                    ipsa!
                </p>
                <a id="readMoreLink" href="#"
                    class="mb-5 inline-flex items-center font-medium text-lg text-primary-600 dark:text-primary-500 hover:underline">
                    See more...
                </a>
                <div class="flex justify-center">
                    <img alt="image" src="https://via.placeholder.com/1920x1080"
                        class="mt-8 h-auto w-auto object-cover" />
                </div>
                <div class="flex items-center">
                    <button class="flex py-2 text-white rounded-full focus:outline-none">
                        <svg class="h-6 w-6 text-blue-700" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z">
                            </path>
                        </svg>
                        <span class="inline-flex items-center justify-center px-2.5 py-0.5 text-emerald-700">
                            <p class="whitespace-nowrap text-sm">1</p>
                        </span>
                    </button>
                </div>
            </article>
        </div>
    </section>

    <!-- End of Announcement Section -->

    <!-- Footer -->
    <footer class="bg-gray-100">
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
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

    <script>
    // Place the JavaScript code here
    const announcementText = document.getElementById("announcementText");
    const readMoreLink = document.getElementById("readMoreLink");

    // Check if the text exceeds the line clamp height
    const checkTextLength = () => {
        const lineHeight = parseFloat(
            getComputedStyle(announcementText).lineHeight
        );
        const maxHeight = lineHeight * 2; // Maximum height for line clamp of 3
        const actualHeight = announcementText.scrollHeight;

        if (actualHeight > maxHeight) {
            readMoreLink.style.display = "inline-flex";
        } else {
            readMoreLink.style.display = "none";
        }
    };

    // Toggle line clamp and check text length on load
    window.addEventListener("load", () => {
        checkTextLength();
    });

    // Toggle line clamp and check text length on click
    readMoreLink.addEventListener("click", (event) => {
        event.preventDefault(); // Prevent default behavior of the <a> tag
        announcementText.classList.toggle("line-clamp-2");
        checkTextLength();
    });
    </script>
</body>

</html>