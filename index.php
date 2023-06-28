<?php
session_start(); //if there is no session then start session
if (isset($_SESSION['IDUSER'])) {
    header('Location: /web-bello/pages/user-forum.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Welcome to Web-Bello</title>
    <link rel="stylesheet" href="../style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>



<body>
    <style>
        .custom-bg {
            background-image: url('/web-bello/images/palazzo-gradient-1.png');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            height: 100vh;
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
    </style>

    <!-- New Landing Page -->

    <section class="bg-gray-50 custom-bg">
        <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center ">
            <div class="landing-content mx-auto max-w-xl text-center rounded-lg shadow bg-white/80 px-10 py-20">
                <h1 class=" mb-4 text-4xl font-extrabold tracking-tight text-gray-800">
                    Welcome to Web-Bello!
                </h1>

                <p class="mt-4 sm:text-xl/tight text-gray-800 font-normal tracking-wide">
                    The ultimate hub for homeowners to stay connected and informed! With Web-Bello, you can easily
                    connect with your neighbors, stay informed on the latest news and events, and receive important
                    alerts and notifications.
                </p>

                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a class="block w-full rounded bg-sky-950 px-12 py-3 text-sm font-medium tracking-wide text-white shadow hover:bg-sky-700 focus:outline-none focus:ring sm:w-auto lg:w-auto xl:w-auto" href="/web-bello/pages/user-login.php">
                        Resident
                    </a>

                    <a class="block w-full rounded bg-sky-950 px-12 py-3 text-sm font-medium tracking-wide text-white shadow hover:bg-sky-700 focus:outline-none focus:ring sm:w-auto lg:w-auto xl:w-auto" href="/web-bello/pages/index.php">
                        Admin
                    </a>
                    <p class="text-sm font-light text-gray-600">
                        Help us direct you to the right login. Select your role to continue.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- End of New Landing Page -->




    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>