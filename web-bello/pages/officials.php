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
  <!-- <div class="official">
    <img src="../savedimages/profile.png" alt="President">
    <h3>John Doe</h3>
    <p>President</p>
  </div> -->
</div>

<style>
.official-card {
  display: inline-block;
  perspective: 1000px;
  margin: 20px;
}

.official-card:hover .official {
  transform: rotateY(180deg);
}

.official {
  width: 150px;
  height: 200px;
  position: relative;
  transform-style: preserve-3d;
  transition: transform 0.5s;
}

.official img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  position: absolute;
  top: 0;
  left: 0;
  backface-visibility: hidden;
}

.official h3,
.official p {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  margin: 0;
  padding: 0;
  backface-visibility: hidden;
}

.official h3 {
  margin-top: 10px;
}

.official p {
  margin-top: 5px;
}

.official-card:hover .official h3,
.official-card:hover .official p {
  color: white;
}

.official-card:hover .official {
  background-color: teal;
}

.official-card:hover .official img {
  opacity: 0;
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

    <script defer>
        const officials = document.querySelector('#officials');

        //Onload
window.onload = function(){
    loadTable();
}

//load table
const loadTable = async function(){
    //api
  const getUsers =  await fetch("../api/hoa/all-hoa.php");
  const response = await getUsers.json();
    console.log(response)
  if(response.responseStatus === 'OK'){

    let content = '';
    response.responseContent.map((users)=>{
        //by default inactive
        let user = '<span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Inactive</span>'

        //change the badge color to active if active
        if(users.status === 'Active'){
          user =  '<span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Active</span>'
        }
        if(users.role !== 'admin'){

        content += `
        <div class="official-card">
        <div class="official">
        <img src="`+users.image_url+`" alt="President">
        <h3>`+users.firstname+" "+users.lastname+`</h3>
        <p style="color: teal;">`+users.role+`</p>
        </div>
        </div>`
        }
    })
   

    officials.innerHTML = content;

  }
}//end of onload
    </script>
</body>
</html>