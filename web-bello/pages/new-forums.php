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



</body>