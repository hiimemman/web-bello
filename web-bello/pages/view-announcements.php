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

    <section class="border-t-4 border-sky-300 mb-10">
        <div class="container mx-auto grid gap-8 lg:grid-cols-1 px-24 mt-10">
            <article class="p-12 mx-20 bg-white rounded-lg border border-gray-200 shadow-md">
                <div class="flex justify-between items-center mb-5 text-gray-500">
                    <span
                        class="bg-purple-100 text-purple-700 text-md font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                        Announcements
                    </span>
                    <span class="text-sm">2023-06-09 01:36:10</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <img class="w-7 h-7 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                            alt="Bonnie Green avatar" />
                        <span class="font-medium"> John Doe </span>
                    </div>
                </div>
                <h2 class="mt-6 text-2xl font-bold tracking-tight text-gray-900">
                    Our first project with React
                </h2>
                <p id="announcementText" class="font-normal line-clamp-2 text-lg text-gray-500">
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
                    class="mb-5 inline-flex items-center font-medium text-lg text-primary-600 hover:underline">
                    See more...
                </a>
                <!-- Image -->
                <div class="flex justify-center">
                    <img alt="image" src="https://via.placeholder.com/1920x1080"
                        class="mt-8 h-auto w-auto object-cover" />
                </div>
                <!-- End of Image -->
                <!-- Like Button -->
                <div class="flex items-center">
                    <button id="likeButton" class="flex py-2 text-blue-400 rounded-full focus:outline-none"
                        onclick="toggleLike()">
                        <svg id="likeIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            class="main-grid-item-icon h-6 w-6" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.5">
                            <path
                                d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3" />
                        </svg>
                        <span id="likeCount"
                            class="inline-flex items-center justify-center px-2.5 py-0.5 text-emerald-700">
                            <p class="whitespace-nowrap text-md">1</p>
                        </span>
                    </button>
                </div>
                <!-- End of Like Button -->
                <!-- Comments -->
                <form>
                    <div class="py-2 px-4 mb-4 bg-white rounded-xl border-2 border-gray-400">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="3"
                            class="px-0 w-full text-md text-gray-900 border-0 focus:ring-0 focus:outline-none"
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    <button type="submit" id="postButton"
                        class="text-white bg-sky-800 cursor-not-allowed focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-6 focus:outline-none"
                        disabled>
                        Post comment
                    </button>
                </form>

                <!-- End of Comments -->

                <!-- Reply Section -->

                <article class="p-6 mb-6 text-base border-t border-gray-200 bg-white">
                    <div class="inline-flex">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z">
                            </path>
                        </svg>
                        <h1 class="font-semibold text-xl mb-6 ml-2">Comments</h1>
                    </div>
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-md font-medium text-gray-900">
                                Michael Gough
                            </p>
                            <p class="text-md text-gray-600">
                                <time pubdate datetime="2022-02-08" title="February 8th, 2022">2023-06-12
                                    03:56:33</time>
                            </p>
                        </div>
                    </footer>
                    <p class="text-gray-600">
                        Very straight-to-point article. Really worth time reading. Thank
                        you! But tools are just the instruments for the UX designers. The
                        knowledge of the design tools are as important as the creation of
                        the design strategy.
                    </p>
                </article>

                <!-- End of Reply Section -->
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

    <script>
    let isLiked = false;
    const likeIcon = document.getElementById("likeIcon");

    function toggleLike() {
        if (isLiked) {
            likeIcon.style.fill = "none";
        } else {
            likeIcon.style.fill = "#1D4ED8";
        }

        isLiked = !isLiked;
    }
    </script>

    <!-- Disabled post comment button when textarea is empty -->
    <script>
    const commentInput = document.getElementById("comment");
    const postButton = document.getElementById("postButton");

    commentInput.addEventListener("input", () => {
        if (commentInput.value.trim().length > 0) {
            postButton.classList.remove("bg-sky-800");
            postButton.classList.add("bg-sky-950");
            postButton.removeAttribute("disabled");
            postButton.classList.remove("cursor-not-allowed");
            postButton.classList.add("cursor-pointer");
        } else {
            postButton.classList.remove("bg-sky-950");
            postButton.classList.add("bg-sky-800");
            postButton.setAttribute("disabled", "");
            postButton.classList.remove("cursor-pointer");
            postButton.classList.add("cursor-not-allowed");
        }
    });

    postButton.addEventListener("mouseover", () => {
        if (commentInput.value.trim().length === 0) {
            postButton.classList.remove("cursor-pointer");
            postButton.classList.add("cursor-not-allowed");
        }
    });

    postButton.addEventListener("mouseout", () => {
        if (commentInput.value.trim().length === 0) {
            postButton.classList.remove("cursor-not-allowed");
            postButton.classList.add("cursor-pointer");
        }
    });
    </script>
</body>

</html>