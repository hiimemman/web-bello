<?php
require_once('../components/navbar.php')
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Profile - Web-Bello Online!</title>

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

    <!-- Update Profile Section -->

    <section class="border-t-4 border-sky-300 mb-10">
        <div class="container mx-auto grid gap-8 lg:grid-cols-1 px-36 mt-10">
            <form class="p-12 mx-20 bg-white rounded-lg border border-gray-200 shadow-md">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-lg font-semibold leading-7 text-gray-900">
                            Personal Information
                        </h2>
                        <p class="text-sm leading-6 text-gray-600">
                            Stay current and connected with updated personal details.
                        </p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <!-- Change Photo -->
                            <div class="col-span-full">
                                <label for="photo"
                                    class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                                <div class="mt-2 flex items-center gap-x-3">
                                    <img class="h-12 w-12 rounded-full" src="https://via.placeholder.com/150" alt="" />
                                    <div class="inline-flex">
                                        <button type="button"
                                            class="rounded-md bg-white px-5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-100">
                                            <span
                                                class="inline-flex items-center justify-center rounded-full py-0.5 text-gray-700">
                                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125">
                                                    </path>
                                                </svg>

                                                <p class="whitespace-nowrap text-sm">Change</p>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Change Photo -->

                            <!-- Name Input -->
                            <div class="sm:col-span-3">
                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First
                                    name</label>
                                <div class="mt-2">
                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last
                                    name</label>
                                <div class="mt-2">
                                    <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6" />
                                </div>
                            </div>
                            <!-- End of Name Input -->

                            <!-- Contact / Sex / Age -->
                            <div class="sm:col-span-2 sm:col-start-1">
                                <label for="contact"
                                    class="block text-sm font-medium leading-6 text-gray-900">Contact</label>
                                <div class="mt-2">
                                    <input type="text" name="contact" id="contact"
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="sex" class="block text-sm font-medium leading-6 text-gray-900">Sex</label>
                                <div class="mt-2">
                                    <input type="text" name="sex" id="sex"
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="postal-code"
                                    class="block text-sm font-medium leading-6 text-gray-900">Age</label>
                                <div class="mt-2">
                                    <input type="text" name="age" id="age"
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6" />
                                </div>
                            </div>
                            <!-- End of Contact / Sex / Age -->

                            <!-- Complete Address -->
                            <div class="col-span-full">
                                <label for="complete-address"
                                    class="block text-sm font-medium leading-6 text-gray-900">Complete address</label>
                                <div class="mt-2">
                                    <input type="text" name="complete-address" id="complete-address"
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6" />
                                </div>
                            </div>
                            <!-- End of Complete Address -->
                            <!-- Email Address / Password -->
                            <div class="sm:col-span-2 sm:col-start-1">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                    address</label>
                                <div class="mt-2">
                                    <input type="email" name="email" id="email"
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="sex"
                                    class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                <div class="mt-2">
                                    <input type="password" name="password" id="password"
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6" />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="postal-code"
                                    class="block text-sm font-medium leading-6 text-gray-900">Confirm password</label>
                                <div class="mt-2">
                                    <input type="password" name="confirm-password" id="confirm-password"
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6" />
                                </div>
                            </div>
                            <!-- End of Email Address / Password -->
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                        Cancel
                    </button>
                    <button type="submit"
                        class="rounded-md bg-sky-800 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-950 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- End of Update Profile Section -->

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