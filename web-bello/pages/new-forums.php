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
    <title>Web-Bello Forums</title>
    <link rel="stylesheet" href="../style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}
</style>
</head>

<body class="bg-white dark:bg-gray-900">
<div class="px-4 mt-4 shadow rounded-lg bg-white dark:bg-dark-second">
                <div class="p-2 border-b border-gray-300 dark:border-dark-third flex space-x-4">
                    <img src="./images/tuat.jpg" alt="Profile picture" class="w-10 h-10 rounded-full">
                    <div class="flex-1 bg-gray-100 rounded-full flex items-center justify-start pl-4 cursor-pointer dark:bg-dark-third text-gray-500 text-lg dark:text-dark-txt">
                        <span>
                            Hello <?php echo $_SESSION['firstname'];?>
                        </span>
                    </div>
                </div>
                           <!-- ROOM -->
            <div class="p-4 mt-4 shadow rounded-lg bg-white dark:bg-dark-second overflow-hidden">
                <div class="flex space-x-4 relative">
                    <div class="w-1/2 lg:w-3/12 flex space-x-2 items-center justify-center border-2 border-blue-200 dark:border-blue-700 rounded-full cursor-pointer">
                        <i class='bx bxs-video-plus text-2xl text-purple-500'></i>
                        <span class="text-sm font-semibold text-blue-500">Create Room</span>
                    </div>
                    <div class="relative cursor-pointer">
                        <img src="./images/avt-3.jpg" alt="Profile picture" class="rounded-full">
                        <span class="bg-green-500 w-3 h-3 rounded-full absolute right-0 top-3/4 border-white border-2"></span>
                    </div>
                    <div class="relative cursor-pointer">
                        <img src="./images/avt-4.jpg" alt="Profile picture" class="rounded-full">
                        <span class="bg-green-500 w-3 h-3 rounded-full absolute right-0 top-3/4 border-white border-2"></span>
                    </div>
                    <div class="relative cursor-pointer">
                        <img src="./images/avt-5.jpg" alt="Profile picture" class="rounded-full">
                        <span class="bg-green-500 w-3 h-3 rounded-full absolute right-0 top-3/4 border-white border-2"></span>
                    </div>
                    <div class="relative cursor-pointer">
                        <img src="./images/avt-2.jpg" alt="Profile picture" class="rounded-full">
                        <span class="bg-green-500 w-3 h-3 rounded-full absolute right-0 top-3/4 border-white border-2"></span>
                    </div>
                    <div class="relative cursor-pointer hidden sm:inline">
                        <img src="./images/avt-3.jpg" alt="Profile picture" class="rounded-full">
                        <span class="bg-green-500 w-3 h-3 rounded-full absolute right-0 top-3/4 border-white border-2"></span>
                    </div>
                    <div class="relative cursor-pointer hidden sm:inline">
                        <img src="./images/avt-4.jpg" alt="Profile picture" class="rounded-full">
                        <span class="bg-green-500 w-3 h-3 rounded-full absolute right-0 top-3/4 border-white border-2"></span>
                    </div>
                    <div class="relative cursor-pointer hidden sm:inline">
                        <img src="./images/avt-5.jpg" alt="Profile picture" class="rounded-full">
                        <span class="bg-green-500 w-3 h-3 rounded-full absolute right-0 top-3/4 border-white border-2"></span>
                    </div>
                    <div class="relative cursor-pointer hidden sm:inline">
                        <img src="./images/avt-7.jpg" alt="Profile picture" class="rounded-full">
                        <span class="bg-green-500 w-3 h-3 rounded-full absolute right-0 top-3/4 border-white border-2"></span>
                    </div>
                    <div class="relative cursor-pointer hidden sm:inline">
                        <img src="./images/avt-3.jpg" alt="Profile picture" class="rounded-full">
                        <span class="bg-green-500 w-3 h-3 rounded-full absolute right-0 top-3/4 border-white border-2"></span>
                    </div>
                    <div class="w-12 h-12 rounded-full hidden lg:grid place-items-center text-2xl text-gray-500 bg-white absolute right-0 top-1/2 transform -translate-y-1/2 border border-gray-200 cursor-pointer hover:bg-gray-100 shadow dark:bg-dark-third dark:border-dark-third dark:text-dark-txt">
                        <i class='bx bxs-chevron-right'></i>
                    </div>
                </div>
            </div>


</body>