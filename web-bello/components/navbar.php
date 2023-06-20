<?php
session_start(); //if there is no session then start session
include_once("../connections/connection.php");
$con = connection();
if (!isset($_SESSION['IDUSER'])) {
    header('Location: /web-bello/pages/user-login.php');
    exit();
} else {

    $sql = mysqli_query($con, "SELECT * FROM `tbl_residents` WHERE `id` = {$_SESSION['IDUSER']}");

    //store in result

    $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);

    // Get the current URL
    $url = $_SERVER['REQUEST_URI'];

    // Extract the page name from the URL
    $pageName = basename($url, '.php');

    // Remove hyphens and replace them with spaces
    $pageName = str_replace('-', ' ', $pageName);
    $pageName = strtoupper($pageName);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="stylesheet" href="../style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
<style>
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
    

    <nav class="fixed bg-white dark:bg-gray-900 top-0 left-0 right-0 shadow-lg z-10">
        <div class="container mx-auto flex flex-wrap max-w-7xl items-center justify-between py-10 lg:px-8">
            <div class="flex lg:flex-1 px-6">
                <a href="/web-bello/pages/user-index.php" class="-m-1.5 p-1.5">
                    <span class="sr-only"></span>
                    <h2 class="drop-shadow text-lg tracking-wider font-medium text-gray-900 dark:text-white">
                        WEB-BELLO
                    </h2>
                </a>
            </div>

            <div class="flex lg:hidden px-6">
                <button data-collapse-toggle="navbar-default" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                    aria-controls="navbar-default" aria-expanded="false" @click="open = !open">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <!-- Nav Links -->
            <div class="hidden lg:flex lg:gap-x-12" id="navbar-default" x-data="{ open: false }"
                :class="{ 'flex': open, 'hidden': !open }"
                @click.away="open = false">
                <ul class="lg:flex flex-col lg:flex-row list-none lg:ml-auto">
                    <li class="nav-item">
                        <a href="/web-bello/pages/user-index.php"
                            class="nav-link text-sm font-semibold leading-6 text-gray-900 dark:text-white flex items-center">
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/web-bello/pages/user-index.php#about"
                            class="nav-link text-sm font-semibold leading-6 text-gray-900 dark:text-white flex items-center">
                            <span>About Us</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/web-bello/pages/user-index.php#contact"
                            class="nav-link text-sm font-semibold leading-6 text-gray-900 dark:text-white flex items-center">
                            <span>Contacts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../api/login/logout.php"
                            class="nav-link text-sm font-semibold leading-6 hover:text-gray-900 dark:hover:text-white text-gray-400 dark:text-gray-400 flex items-center">
                            <span>Sign out</span>
                        </a>
                    </li>
                </ul>

                <div class="relative" x-data="{ open: false }">
                    <button type="button"
                        class="text-sm font-semibold leading-6 text-white flex items-center focus:outline-none"
                        @click="open = !open" aria-expanded="false" aria-haspopup="true">
                        <span>
                            <svg class="h-6 w-6 text-gray-900 dark:text-white hover:text-gray-600 dark:hover:text-gray-400"
                                fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25"></path>
                            </svg>
                        </span>
                    </button>
                
                    <div x-show="open" @click.away="open = false" class="absolute right-0 py-2 w-48 bg-white dark:bg-gray-900 rounded-md shadow-lg z-10"
                        :class="{ 'hidden': !open }" id="dropdownMenu">
                        <!-- Dropdown items here -->

                        <a href="/web-bello/pages/view-announcements.php"
                            class="dropdown-item text-sm font-semibold leading-6 text-gray-900 dark:text-white block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800">
                            Announcements
                        </a>
                        <a href="/web-bello/pages/view-events.php"
                            class="dropdown-item text-sm font-semibold leading-6 text-gray-900 dark:text-white block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800">
                            Events
                        </a>
                        <a href="/web-bello/pages/view-forums.php"
                            class="dropdown-item text-sm font-semibold leading-6 text-gray-900 dark:text-white block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800">
                            Forums
                        </a>
                        <a href="/web-bello/calendar-19/index.php"
                            class="dropdown-item text-sm font-semibold leading-6 text-gray-900 dark:text-white block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800">
                            Schedules
                        </a>
                        <a href="/web-bello/pages/monthly-due.php"
                            class="dropdown-item text-sm font-semibold leading-6 text-gray-900 dark:text-white block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800">
                            Manage Dues
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script defer>
    //Dark theme toggle 
    let themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    let themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    let log = document.getElementById("#log")

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
            '(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    let themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {

        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        // if set via local storage previously
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }

            // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }

    });
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
            '(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownTrigger = document.getElementById('dropdownTrigger');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownTrigger.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        // Hide the dropdown when clicking outside of it
        document.addEventListener('click', function(event) {
            const targetElement = event.target;
            if (!dropdownTrigger.contains(targetElement) && !dropdownMenu.contains(targetElement)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
    </script>

    <script>
    // Check if dark mode is preferred by the user
    const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

    // Set the HTML class based on the user's preference
    document.documentElement.classList.add(prefersDarkMode ? 'dark' : 'light');
    </script>

</body>

</html>