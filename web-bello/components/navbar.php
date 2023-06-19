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
    </style>

    <nav class="fixed bg-white dark:bg-gray-900 top-0 left-0 right-0 shadow-lg z-10">
        <div class="container mx-auto flex flex-wrap max-w-7xl items-center justify-between py-10 lg:px-8">
            <div class="flex lg:flex-1 px-6">
                <a href="/web-bello/pages/user-index.php" class="-m-1.5 p-1.5">
                    <span class="sr-only"></span>
                    <h2 class="drop-shadow text-lg tracking-wider font-medium dark:text-white">
                        WEB-BELLO
                    </h2>
                </a>
            </div>

            <div class="flex lg:hidden px-6">
                <button data-collapse-toggle="navbar-default" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <!-- Nav Links -->
            <div class="hidden lg:flex lg:gap-x-12" id="navbar-default">
            <a href="/web-bello/pages/user-index.php" class="nav-link text-sm font-semibold leading-6 text-gray-900 dark:text-white">Home</a>
            <a href="../api/login/logout.php" class="nav-link text-sm font-semibold leading-6 hover:text-gray-900 text-gray-400 dark:text-gray-600 dark:hover:text-white">Sign out</a>
                <!-- Dropdown menu -->
                <div class="hidden md:ml-8 md:flex md:items-center">
                    <div class="ml-3 relative">
                        <div>
                            <button type="button" class="text-white bg-sky-500 rounded-md px-3 py-2 inline-flex items-center justify-center text-sm font-medium hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-sky-50 focus:ring-white" id="announcements-menu-button".
                            aria-expanded="false" aria-haspopup="true">
                                Announcements
                                <!-- Heroicon name: solid/chevron-down -->
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 3.586L4.707 8.879a1 1 0 0 0 0 1.414l5.293 5.293a1 1 0 0 0 1.414-1.414L7.414 10l4.293-4.293a1 1 0 0 0-1.414-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Dropdown menu items -->
                        <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="announcements-menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">Announcement 1</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">Announcement 2</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">Announcement 3</a>
                                <!-- Add more announcement links as needed -->
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
    <script src="https://cdn.tailwindcss.com" defer></script>

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
</body>

</html>