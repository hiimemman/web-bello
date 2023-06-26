<?php
session_start();//if there is no session then start session
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

        @media screen and (min-width: 768px) {
            .landing-content {
                max-width: 720px;
                margin: 0 auto;
            }
        }

        @media screen and (min-width: 992px) {
            .landing-content {
                max-width: 960px;
                margin: 0 auto;
            }
        }

        @media screen and (min-width: 1200px) {
            .landing-content {
                max-width: 1140px;
                margin: 0 auto;
            }
        }
    </style>
    
    <!-- LANDING PAGE SECTION PLUS LOGIN FORM -->

    <section class="bg-white dark:bg-gray-900 custom-bg">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="landing-content max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-white">
                    Welcome to Web-Bello!</h1>
                <p class="landing-content max-w-2xl mb-6 font-medium text-white lg:mb-8 md:text-lg lg:text-xl dark:text-white">
                    The
                    ultimate hub for homeowners to stay connected and informed! With Web-Bello, you can easily connect
                    with your neighbors, stay informed on the latest news and events, and receive important alerts and
                    notifications.</p>
                    
                    <!--<button style="color: white; class="p-4 rounded-lg landing-content">About Us</button>-->
            </div>
            <div class="landing-content lg:mt-0 lg:col-span-5 lg:flex">
                <div
                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Sign in to your account
                        </h1>
                        
                        <div class="space-y-4 md:space-y-6">
                            <a href="/web-bello/pages/user-login.php">
                                <button type="submit" class="custom-signin-btn">
                                    Click here
                                </button>
                            </a>

                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Or <a href="/web-bello/pages/index.php"
                                    class="custom-text-btn">Log in</a> as administrator.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Payments tool for software companies</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">From checkout to global sales tax compliance, companies around the world use Flowbite to simplify their payment stack.</p>
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                Get started
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                Speak to Sales
            </a> 
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="mockup">
        </div>                
    </div>
</section>
    <!-- END OF LANDING PAGE SECTION PLUS LOGIN FORM -->
    

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>