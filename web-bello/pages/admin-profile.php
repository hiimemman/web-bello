<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['ID'])) {
    header('Location: /web-bello/pages/index.php');
    exit();
}

include_once("../connections/connection.php");
$con = connection();

$ID = $_SESSION['ID'];

$sql = "SELECT * FROM tbl_hoa WHERE id = '$ID'";
$result = mysqli_query($con, $sql);

if ($result) {
    $user = mysqli_fetch_assoc($result);

    // Assign the fetched values to variables
    $Firstname = $user['firstname'];
    $Lastname = $user['lastname'];
    $Position = $user['position'];
    $Address = $user['address'];
    $Contact = $user['contact'];
    $Email = $user['email'];
    $Image = $user['image_url'];
} else {
    echo "Error fetching user data: " . mysqli_error($con);
}

  // Get the current URL
  $url = $_SERVER['REQUEST_URI'];

  // Extract the page name from the URL
  $pageName = basename($url, '.php');

  // Remove hyphens and replace them with spaces
  $pageName = str_replace('-', ' ', $pageName);
  $pageName = strtoupper($pageName);
?>

<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-Bello Admin | Profile</title>
    <link rel="stylesheet" href="../style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .profile-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

            /* Dark mode styles */
    html.dark {
        /* Add your dark mode styles here */
        /* For example, you can update background colors, text colors, etc. */
        /* Use CSS variables to easily switch between light and dark mode */
        background-color: #1a202c;
        color: #f7fafc;
    }
    </style>

    <script>
        // Function to toggle dark mode
        function toggleDarkMode() {
            const html = document.querySelector('html');
            html.classList.toggle('dark');
        }
    </script>

</head>

<body>

<div class="antialiased bg-gray-50 dark:bg-gray-900">
    <nav class="bg-white border-b border-gray-300 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50 ">
      <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
          <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation" aria-controls="drawer-navigation" class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
            <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Toggle sidebar</span>
          </button>
          <a href="https://web-bello.online/web-bello/pages/dashboard.php" class="flex items-center justify-between mr-4">
            <!-- <img
              src="https://flowbite.s3.amazonaws.com/logo.svg"
              class="mr-3 h-8"
              alt="Flowbite Logo"
            /> -->
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Web-Bello</span>
          </a>



        </div>
        <h3 class="text-3xl font-bold dark:text-white mx-auto"><?php echo $pageName; ?></h3>
        <div class="flex items-center lg:order-2">
          <button type="button" data-drawer-toggle="drawer-navigation" aria-controls="drawer-navigation" class="p-2 mr-1 text-gray-500 rounded-lg md:hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
            <span class="sr-only">Toggle search</span>
            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path clip-rule="evenodd" fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
              </path>
            </svg>
          </button>
          <!-- Notifications -->
          <button type="button" data-dropdown-toggle="notification-dropdown" class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
            <span class="sr-only">View notifications</span>
            <!-- Bell icon -->
            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
              </path>
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700 rounded-xl" id="notification-dropdown">
            <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-600 dark:text-gray-300">
              Notifications
            </div>
            <div id="notifDiv">




            </div>
            <a href="#" class="block py-2 text-md font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-600 dark:text-white dark:hover:underline">
              <div class="inline-flex items-center">
                <svg aria-hidden="true" class="mr-2 w-4 h-4 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                  <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                </svg>
                View all
              </div>
            </a>
          </div>

          <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
          </button>
          <!-- Apps -->

          <button type="button" class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full" src="<?php echo $result[0]['image_url'] ?>" alt="user photo" />
          </button>
          <!-- Dropdown menu -->
          <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl" id="dropdown">
            <div class="py-3 px-4">


              <span class="block text-sm font-semibold text-gray-900 dark:text-white"><?php echo $result[0]['firstname'] . ' ' . $result[0]['lastname'] ?></span></span>
              <span class="block text-sm text-gray-900 truncate dark:text-white"><?php echo $result[0]['email'] ?></span>
            </div>
            <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
              <!--<li>-->
              <!--  <a-->
              <!--    href="#"-->
              <!--    class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"-->
              <!--    >My profile</a-->
              <!--  >-->
              <!--</li>-->
              <li>
                <a href="../pages/profiles.php" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Account
                  settings</a>
              </li>
            </ul>

            <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
              <li>
                <a href="/web-bello/pages/logout.php" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                  out</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

     <!-- Sidebar -->

     <aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-300 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidenav" id="drawer-navigation">
      <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        <form action="#" method="GET" class="md:hidden mb-2">
          <label for="sidebar-search" class="sr-only">Search</label>
          <div class="relative">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
              <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                </path>
              </svg>
            </div>
            <input type="text" name="search" id="sidebar-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" />
          </div>
        </form>

        <!-- Sidebar Navigation -->

        <ul class="pt-5 mt-6 space-y-2 border-t border-gray-300 dark:border-gray-700">
          <li>
            <a href="/web-bello/pages/dashboard.php" id="linkDashboard" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
              <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z">
                </path>
              </svg>

              <span class="ml-3">Dashboard</span>
            </a>
          </li>




          <li>
            <a href="/web-bello/pages/hoa-official.php" id="linkHoa" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
              <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z">
                </path>
              </svg>

              <span class="ml-3">Homeowner</span>
            </a>
          </li>


          <li>
            <a href="/web-bello/pages/resident-information.php" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
              <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z">
                </path>
              </svg>
              <span class="ml-3">Residents</span>
            </a>
          </li>

          <li>
            <a href="/web-bello/pages/announcements.php" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
              <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z">
                </path>
              </svg>
              <span class="ml-3">Announcements</span>
            </a>
          </li>

          <li>
            <a href="/web-bello/pages/forums.php" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
              <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z">
                </path>
              </svg>
              <span class="ml-3">Forums</span>
            </a>
          </li>

          <li>
            <a href="/web-bello/pages/dues.php" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
              <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z">
                </path>
              </svg>
              <span class="ml-3">Monthly Dues</span>
            </a>
          </li>

          <li>
            <a href="/web-bello/pages/collection-schedule.php" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
              <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z">
                </path>
              </svg>
              <span class="ml-3">Schedules</span>
            </a>
          </li>

          <li>
            <a href="/web-bello/pages/court-reservations.php" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
              <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z">
                </path>
              </svg>
              <span class="ml-3">Reservation</span>
            </a>
          </li>

          <li>
            <a href="/web-bello/pages/logout.php" id="linkLogout" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
              <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75">
                </path>
              </svg>

              <span class="ml-3">Logout</span>

            </a>
          </li>

        </ul>

        <!-- End of Sidebar Navigation -->

      </div>

    </aside>

    <main class="p-4 md:ml-64 h-auto pt-20">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">

      </div>
    </main>
  </div>


    <header class=" border-b-4 border-sky-300">
        <!-- Intro Header -->
        <div class="container mt-32 mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="text-center sm:text-left">
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                        Update your personal information
                    </h1>
                    <p class="mt-1.5 text-lg text-gray-500">
                        Stay current and connected with updated personal details.
                    </p>
                </div>
            </div>
        </div>
        <!-- End of Intro Header -->
    </header>

    <section>
        

            <!-- <form action="" method="POST" id ="frmRegisterHOA">
            <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"> -->
                        <!-- Profile Picture -->
                        <!-- <div class="sm:col-span-2">
                        <div class="profile-image" id="imageHolder">
                            <img src="<?php //echo $Image; ?>" alt="Profile Picture">
                        </div>

                        <div class="mt-4">
                            <label for="file_input" class="text-sm font-medium text-gray-700">Change Profile Picture</label>
                            <input type="file" id="image_url" name="image_url" accept="image/*" class="mt-1">
                        </div>
                        </div>
                        <div class="sm:col-span-2">
                        <button type="submit" style="border: 2px solid gray;">
                            Change Profile</button>
                        </div>
                        </div>
                    </div>
            </form> -->
        
        <div class="container mx-auto grid gap-8 lg:grid-cols-1 mt-10 mb-10">
            <form action="../api/profile/profile.php" method="POST" id="frmUpdateProfile"
                class="p-12 bg-white rounded-lg border border-gray-200 shadow-md" enctype="multipart/form-data">
                <!-- Profile Picture -->
                <div class="sm:col-span-2" id="frmRegisterHOA">
                        <div class="profile-image" id="imageHolder">
                            <img src="<?php echo $Image; ?>" alt="Profile Picture">
                         </div>

                        <div class="mt-4">
                            <label for="image_url" class="text-sm font-medium text-gray-700">Change Profile Picture</label>
                            <input type="file" id="image_url" name="image_url" accept="image/*" class="mt-1">
                        </div>
                        </div>
                        </div>

                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                        

                            <!-- First name -->
                            <div class="sm:col-span-3">
                                <div class="form-group">
                                    <label for="firstname"
                                        class="label block text-sm font-medium leading-6 text-gray-900">First
                                        name</label>
                                    <input type="text" name="firstname" value="<?php echo $Firstname; ?>"
                                        class="input-field block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>
                            <!-- Last name -->
                            <div class="sm:col-span-3">
                                <div class="form-group">
                                    <label for="lastname"
                                        class="label block text-sm font-medium leading-6 text-gray-900">Last
                                        name</label>
                                    <input type="text" name="lastname" value="<?php echo $Lastname; ?>"
                                        class="input-field block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>
                            <!-- Contact -->
                            <div class="sm:col-span-2 sm:col-start-1">
                                <div class="form-group">
                                    <label for="contact"
                                        class="label block text-sm font-medium leading-6 text-gray-900">Contact</label>
                                    <input type="text" name="contact" value="<?php echo $Contact; ?>"
                                        class="input-field block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>
                            <!-- Position -->
                            <div class="sm:col-span-2">
                                <div class="form-group">
                                    <label for="position"
                                        class="label block text-sm font-medium leading-6 text-gray-900">Position</label>
                                        <input type="text" name="position" value="<?php echo $Position; ?>"
                                        class="input-field block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6"
                                        required>
                                        <select name="position" id=""><?php echo $Position; ?>
                                        <option value="Admin">Admin</option>
                                        <option value="President">President</option>
                                        <option value="Vice President">Vice President</option>
                                        <option value="Secretary">Secretary</option>
                                        <option value="Treasurer">Treasurer</option>
                                        <option value="Board Member">Board Member</option>
                                        </select>
                                </div>
                            </div>
                            <!-- Age
                            <div class="sm:col-span-2">
                                <div class="form-group">
                                    <label for="age"
                                        class="label block text-sm font-medium leading-6 text-gray-900">Age</label>
                                    <input type="text" name="age" value="<?php //echo $Age; ?>"
                                        class="input-field block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div> -->
                            <!-- Complete Address -->
                            <div class="col-span-full">
                                <div class="form-group">
                                    <label for="address"
                                        class="label block text-sm font-medium leading-6 text-gray-900">Complete
                                        address</label>
                                    <input type="text" name="address" value="<?php echo $Address; ?>"
                                        class="input-field block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>
                            <!-- Email Address -->
                            <div class="sm:col-span-2 sm:col-start-1">
                                <div class="form-group">
                                    <label for="email"
                                        class="label block text-sm font-medium leading-6 text-gray-900">Email
                                        address</label>
                                    <input type="text" name="email" value="<?php echo $Email; ?>"
                                        class="input-field block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>

                            <!-- Password -->
<div class="sm:col-span-2">
  <div class="form-group">
    <label for="password" class="label block text-sm font-medium leading-6 text-gray-900">Password</label>
    <div class="relative">
      <input type="password" name="password" id="password" class="input-field block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6" required>
      <button type="button" class="password-toggle absolute inset-y-0 right-0 px-2 flex items-center focus:outline-none" onclick="togglePasswordVisibility('password')">
        <span class="password-icon">Show</span>
      </button>
    </div>
  </div>
</div>

<!-- Confirm Password -->
<div class="sm:col-span-2">
  <div class="form-group">
    <label for="password1" class="label block text-sm font-medium leading-6 text-gray-900">Confirm password</label>
    <div class="relative">
      <input type="password" name="password1" id="password1" class="input-field block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-200 sm:text-sm sm:leading-6" required>
      <button type="button" class="password-toggle absolute inset-y-0 right-0 px-2 flex items-center focus:outline-none" onclick="togglePasswordVisibility('password1')">
        <span class="password-icon">Show</span>
      </button>
    </div>
  </div>
</div>


<script>
  function togglePasswordVisibility(inputId) {
    const passwordInput = document.getElementById(inputId);
    const passwordToggle = passwordInput.nextElementSibling;
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      passwordToggle.innerHTML = "Hide";
    } else {
      passwordInput.type = "password";
      passwordToggle.innerHTML = "Show";
    }
  }
</script>


                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit"
                        class="submit-btn rounded-md bg-sky-800 px-10 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-950 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- End of Test Code -->


    <!-- TOASTER -->


    <div id="toast-success"
        class="hidden fixed flex items-center w-full max-w-xs p-4 mb-4 bottom-5 left-5 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
        role="alert">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">Item moved successfully.</div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
            data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
</body>

</html>


<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js"></script>


<script defer>
const frmRegisterHOA = document.querySelector('#frmRegisterHOA');
const image_url = document.querySelector('#image_url')
const imageHolder = document.querySelector('#imageHolder')


frmRegisterHOA.addEventListener('submit', async (event) =>{
    event.preventDefault()
    formData = new FormData(frmRegisterHOA)
    // formData.append('editor_email',emailEditor.value)
// uncomment this to print all the content of formData
    for (const [key, value] of formData.entries()) {
  console.log(`${key}: ${value}`);
}

//fetch data
  const request =  await fetch("../api/admin/admin-pofile-pic.php",{
    method: "POST",
    body:formData,
  });

//get the response

const response = await request.json();
console.log(response)
if(response.responseStatus === 'success'){
    //reload table
    location.reload()
    localStorage.setItem('showToast', 'true');
    localStorage.setItem('showToastMessage', response.responseMessage)
}

})

frmUpdateProfile.addEventListener('submit', async (event) => {
    event.preventDefault()
    formData = new FormData(frmUpdateProfile)
    // formData.append('password', 'default1234')
    // uncomment this to print all the content of formData
    for (const [key, value] of formData.entries()) {
        console.log(`${key}: ${value}`);
    }

    //fetch data
    const request = await fetch("../api/admin/admin-profiles.php", {
        method: "POST",
        body: formData,
    });

    //get the response

    const response = await request.json();



    if (response.responseStatus === 'success') {
        //reload table
        console.log("responseContent")
        location.reload();
        localStorage.setItem('showToast', 'true');
        localStorage.setItem('showToastMessage', response.responseMessage)
        window.location.href = "https://web-bello.online/web-bello/pages/admin-profiles.php"

        // Close the profile window

    }

})

//image move
image_url.addEventListener('change', async (event) =>{
 const selectedFile = event.target.files[0];
    
// Uploading only one file; multiple uploads are not allowed.
  let imageFile = event.target.files[0]; 

   // Create a FormData object.
  formData = new FormData();

  // Add the file to the request.
  formData.append('profileEdit', imageFile, imageFile.name);

try{

const fetchResponse = await fetch("../api/images/move-only-image.php",{
    method: "POST",
    body:formData,
});

const receivedStatus = await fetchResponse.json();
console.log(receivedStatus)

if(receivedStatus.statusCode === 200){

let output = ''; 
output += `
 <input type="text" style="display: none;" name="image_url" value="https://web-bello.online/web-bello/savedimages/`+receivedStatus.image+`" />
<img class="m-2 h-auto max-w-xs rounded-lg " src="https://web-bello.online/web-bello/savedimages/`+receivedStatus.image+`" alt="image description">
`;
  
imageHolder.innerHTML = output;
}else{
    alert('error')
}
 


    }catch (e){
    console.log(e)
    }
})



// Call showToast when the page loads
document.addEventListener('DOMContentLoaded', showToast);
</script>
<script defer>
    window.onload = () => {
      const drawerNavigation = document.querySelector('#drawer-navigation');
      if (drawerNavigation) {
        drawerNavigation.click();
      }
    };
  </script>


  <script defer>
    const linkUser = document.querySelector('#linkUsers')
    const linkDashboard = document.querySelector('#linkDashboard')
    const linklinkHoa = document.querySelector('#linkHoa')
    const linkLogout = document.querySelector('#linkLogout')
    const linkResident = document.querySelector('#linkResident')
    //designs

    const selectedDesign =
      "block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"

    const notSelectedDesign =
      "block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"

    //get current url
    let currentPage = 'dashboard.php'

    let currentUrl = window.location.href;

    // Get the index of the last slash in the URL
    let lastSlashIndex = currentUrl.lastIndexOf("/");

    // Get the substring of the URL starting from the last slash index
    let lastPartOfUrl = currentUrl.substr(lastSlashIndex + 1);

    currentPage = lastPartOfUrl

    // if(currentPage === 'dashboard.php'){
    //   linkDashboard.className = selectedDesign;
    //   linkUser.className = notSelectedDesign;
    //   linklinkHoa.className = notSelectedDesign;
    //   linkResident.className =notSelectedDesign;

    // }

    // if(currentPage === 'users.php'){
    //   linkDashboard.className = notSelectedDesign;
    //   linkUser.className = selectedDesign;
    //   linklinkHoa.className = notSelectedDesign;
    //   linkResident.className =notSelectedDesign;

    // }

    // if(currentPage === 'hoa-official.php'){
    //   linkDashboard.className = notSelectedDesign;
    //   linkUser.className = notSelectedDesign;
    //   linklinkHoa.className = selectedDesign;
    //   linkResident.className =notSelectedDesign;

    // }

    // if(currentPage === 'resident-information.php'){
    //   linkDashboard.className = notSelectedDesign;
    //   linkUser.className = notSelectedDesign;
    //   linklinkHoa.className = notSelectedDesign;
    //   linkResident.className = selectedDesign;
    // }
  </script>
  <script defer>
    //Dark theme toggle 
    let themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    let themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

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


  <script defer>
    const notifDiv = document.querySelector('#notifDiv')



    const getAllForums = async () => {

      let content = ''
      const request = await fetch('../api/forum/all-forum.php');

      const response = await request.json()
      console.log(response)
      console.log(notifDiv)
      response.responseContent.map((forums) => {
        content += `  
                      <a
                href="#"
                class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600"
              >
                
                     
                    </svg>
                  </div>
                </div>
                <div class="pl-3 w-full">
                  <div
                    class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"
                  >
                    <span class="font-semibold text-gray-900 dark:text-white"
                      >` + forums.editor_email + `</span
                    >
                    has created a
                    <span class="font-medium text-gray-900 dark:text-white"
                      >
                    ` + forums.category + `
                    </span>
                  </div>
                  <div
                    class="text-xs font-medium text-primary-600 dark:text-primary-500"
                  >
                    ` + getTimeAgo(forums.created_at) + `
                  </div>
                </div>
              </a>
                      `
      })

      notifDiv.innerHTML = content
    }

    window.onload = getAllForums()

    function getTimeAgo(datetimeString) {
      const datetime = new Date(datetimeString.replace(/-/g, '/'));
      const timeDifference = Date.now() - datetime.getTime();

      // Adjust for the Philippine time zone (UTC+8)
      const offsetMilliseconds = 8 * 60 * 60 * 1000;
      const adjustedTimeDifference = timeDifference - offsetMilliseconds;

      // Calculate the time difference in minutes, hours, days, and seconds
      const seconds = Math.floor(adjustedTimeDifference / 1000);
      const minutes = Math.floor(seconds / 60);
      const hours = Math.floor(minutes / 60);
      const days = Math.floor(hours / 24);

      // Handle negative time difference (less than a minute)
      if (seconds < 1) {
        return "0 second(s) ago";
      } else if (minutes < 1) {
        return seconds + " second(s) ago";
      }

      // Determine the appropriate time interval to display
      if (days >= 1) {
        return days + " day(s) ago";
      } else if (hours >= 1) {
        return hours + " hour(s) ago";
      } else {
        return minutes + " minute(s) ago";
      }
    }
  </script>
</body>

</html>