<?php
require_once('../components/navbar.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<header class=" border-b-4 border-sky-300">
        <!-- Intro Header -->
        <div class="container mt-32 mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="text-center sm:text-left">
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                        HOA Officials
                    </h1>
                    <p class="mt-1.5 text-lg text-gray-500">
                    Introducing the Esteemed Officials of Palazzo Bello: Dedicated to Serving Your Community
                    </p>
                </div>
            </div>
        </div>
        <!-- End of Intro Header -->
    </header>

<div id="officials">
  <div class="official">
    <img src="../savedimages/profile.png" alt="President">
    <h3>John Doe</h3>
    <p>President</p>
  </div>

  <div class="official">
    <img src="../savedimages/profile.png" alt="Vice President">
    <h3>Jane Smith</h3>
    <p>Vice President</p>
  </div>

  <div class="official">
    <img src="../savedimages/profile.png" alt="Secretary">
    <h3>Michael Johnson</h3>
    <p>Secretary</p>
  </div>

  <div class="official treasurer">
    <img src="../savedimages/profile.png" alt="Treasurer">
    <h3>Sarah Wilson</h3>
    <p>Treasurer</p>
  </div>

  <div class="official auditor">
    <img src="../savedimages/profile.png" alt="Auditor">
    <h3>Robert Davis</h3>
    <p>Auditor</p>
  </div>

  <div class="official">
    <img src="../savedimages/profile.png" alt="Board Member">
    <h3>Emily Brown</h3>
    <p>Board Member</p>
  </div>

  <div class="official">
    <img src="../savedimages/profile.png" alt="Board Member">
    <h3>David Wilson</h3>
    <p>Board Member</p>
  </div>

  <div class="official">
    <img src="../savedimages/profile.png" alt="Board Member">
    <h3>Jennifer Lee</h3>
    <p>Board Member</p>
  </div>

  <div class="official">
    <img src="../savedimages/profile.png" alt="Board Member">
    <h3>William Johnson</h3>
    <p>Board Member</p>
  </div>

  <div class="official">
    <img src="../savedimages/profile.png" alt="Board Member">
    <h3>Amy Davis</h3>
    <p>Board Member</p>
  </div>

  <div class="official">
    <img src="../savedimages/profile.png" alt="Board Member">
    <h3>Christopher Smith</h3>
    <p>Board Member</p>
  </div>
</div>

<style>
#officials {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.official {
  text-align: center;
  margin: 20px;
}

.official img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
}

.official h3 {
  margin-top: 10px;
}

.official p {
  margin-top: 5px;
}
</style>

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
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75"
                            href="/web-bello/calendar-19/index.php">
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
</body>
</html>