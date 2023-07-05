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
                        Stay current and connected with updated personal details.
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

</body>
</html>