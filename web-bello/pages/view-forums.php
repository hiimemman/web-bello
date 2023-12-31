<?php
require_once('../components/navbar.php')
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forums - Web-Bello Online!</title>

    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body>
    <style>
        .grid-box {
            background-color: #ffffff;
            transition: background-color 0.3s;
            border: solid 2 gray;
        }

        .grid-box:hover {
            background-color: #1b263b;
        }

        .grid-box:hover svg {
            stroke: #fff;
        }

        .grid-box:hover h2 {
            color: #fff;
        }
    </style>

    <header class=" border-b-4 border-sky-300">
        <!-- Intro Header -->
        <div class="container mt-32 mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="text-center sm:text-left">
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                        Hello, <?php echo $result[0]['firstname']; ?>!
                    </h1>

                    <p class="mt-1.5 text-lg text-gray-500">
                        Welcome to your Web-Bello Online account!
                    </p>
                </div>
                <div class="flex space-x-2">
                <button type="button" id="postButton" class="px-6 py-2 text-white bg-sky-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm focus:outline-none" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal">
                Post Forum
                </button>
                </div>
            </div>
        </div>
        <!-- End of Intro Header -->
    </header>

    <!-- Forums Section -->
    <!-- <form class="space-y-6" action="#" id ="frmRegisterHOA">
    <div class="mt-10">
    <div class="flex items-center justify-between">
        <textarea id="content" name="content" rows="2" class="flex-grow px-2 py-2 mr-2 text-md text-gray-900 bg-white border border-gray-400 rounded-lg focus:outline-none" placeholder="What's on your mind?" required></textarea>
        <div class="flex space-x-2">
        <button type="submit" id="postButton" class="px-6 py-2 text-white bg-sky-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm focus:outline-none">
                Post Forum
            </button>
            <button type="button" class="px-4 py-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600" onClick="triggerInputClick(` + forum.id + `)">
                <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                </svg>
                <span class="ml-1">Upload</span>
            </button>
        </div>
    </div>
</div> -->
    <!-- Announcement Section -->
    <main class="px-6 mx-auto max-w-screen-xl" id="forumMain">
        <!-- FORUM -->



    </main>






    <!-- End of Announcement Section -->

    <!-- Footer -->
    <footer class="bg-gray-100 mt-12">
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
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75" href="/web-bello/pages/view-announcements.php">
                            Announcements
                        </a>
                    </li>

                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75" href="/web-bello/pages/view-events.php">
                            Events
                        </a>
                    </li>

                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75" href="/web-bello/pages/view-forums.php">
                            Forums
                        </a>
                    </li>

                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75" href="/web-bello/calendar-19/index.php">
                            Schedules
                        </a>
                    </li>
                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75" href="/web-bello/pages/monthly-due.php">
                            Monthly Due
                        </a>
                    </li>
                </ul>
            </div>

            <p class="mt-12 text-center text-sm text-gray-500 lg:text-right">
                Copyright &copy; 2023. All rights reserved.
            </p>
        </div>
    </footer>
    <!-- End of Footer-->


    <!-- TOASTER -->
<div id="toast-success" class="hidden fixed flex items-center w-full max-w-xs p-4 mb-4 bottom-5 left-5 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
  <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
    </svg>
    <span class="sr-only">Check icon</span>
  </div>
  <div class="ml-3 text-sm font-normal">Item moved successfully.</div>
  <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
    <span class="sr-only">Close</span>
    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
    </svg>
  </button>
</div>
<!-- END OF TOASTER -->
    
    <!-- Add new modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">

        <!-- Modal content -->
         <input type ="hidden" name ="emailEditor" id ="emailEditor" value ="<?php echo $result[0]['email']?>">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Forum</h3>
                <form class="space-y-6" action="#" id ="frmRegisterHOA">
                    
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="title" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required>
                    </div>
                    <div>
                    <label for="message_body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Message</label>
                        <textarea id="message_body" name ="message_body" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Write your post here..."></textarea>
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="category" name ="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="Forum">Forum</option>
                            
                            </select>
                    </div>
                    <div id ="imageHolder">
                        
                    </div>
                    <div>
                                                
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Image</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="image_url" type="file">
                        <!--<p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>-->

                    </div>
                    
                    <button type="submit" class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-blue-800">Create Forum</button>
                   
                </form>
            </div>
        </div>
    </div>
</div> 


    <script>
        const menuToggle = document.getElementById("menu-toggle");
        menuToggle.addEventListener("click", () => {
            document.getElementById("menu").classList.toggle("hidden");
        });

        const closeMenu = document.getElementById("close-menu");
        closeMenu.addEventListener("click", () => {
            document.getElementById("menu").classList.toggle("hidden");
        });
    </script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

    <script>
        // Place the JavaScript code here
        const announcementText = document.getElementById("announcementText");
        const readMoreLink = document.getElementById("readMoreLink");

        // Check if the text exceeds the line clamp height
        const checkTextLength = () => {
            const lineHeight = parseFloat(
                getComputedStyle(announcementText).lineHeight
            );
            const maxHeight = lineHeight * 2; // Maximum height for line clamp of 3
            const actualHeight = announcementText.scrollHeight;

            if (actualHeight > maxHeight) {
                readMoreLink.style.display = "inline-flex";
            } else {
                readMoreLink.style.display = "none";
            }
        };

        // Toggle line clamp and check text length on load
        window.addEventListener("load", () => {
            checkTextLength();
        });

        // Toggle line clamp and check text length on click
        readMoreLink.addEventListener("click", (event) => {
            event.preventDefault(); // Prevent default behavior of the <a> tag
            announcementText.classList.toggle("line-clamp-2");
            checkTextLength();
        });
    </script>

    <script>
        let isLiked = false;
        const likeIcon = document.getElementById("likeIcon");

        function toggleLike() {
            if (isLiked) {
                likeIcon.style.fill = "none";
            } else {
                likeIcon.style.fill = "#1D4ED8";
            }

            isLiked = !isLiked;
        }
    </script>

    <!-- Disabled post comment button when textarea is empty -->
    <script>
        const commentInput = document.getElementById("comment");
        const postButton = document.getElementById("postButton");

        commentInput.addEventListener("input", () => {
            if (commentInput.value.trim().length > 0) {
                postButton.classList.remove("bg-sky-800");
                postButton.classList.add("bg-sky-950");
                postButton.removeAttribute("disabled");
                postButton.classList.remove("cursor-not-allowed");
                postButton.classList.add("cursor-pointer");
            } else {
                postButton.classList.remove("bg-sky-950");
                postButton.classList.add("bg-sky-800");
                postButton.setAttribute("disabled", "");
                postButton.classList.remove("cursor-pointer");
                postButton.classList.add("cursor-not-allowed");
            }
        });

        postButton.addEventListener("mouseover", () => {
            if (commentInput.value.trim().length === 0) {
                postButton.classList.remove("cursor-pointer");
                postButton.classList.add("cursor-not-allowed");
            }
        });

        postButton.addEventListener("mouseout", () => {
            if (commentInput.value.trim().length === 0) {
                postButton.classList.remove("cursor-not-allowed");
                postButton.classList.add("cursor-pointer");
            }
        });
    </script>

    <script defer>
        const forumMain = document.querySelector('#forumMain')



        const badgeAnnouncement =
            '<span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Announcement</span>';
        const badgeCollectingSchedule =
            '<span class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Collecting Schedule</span>'
        const badgeEvents =
            '<span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Events</span>'
        const badgeForum =
            '<span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Forum</span>'
        const badgeNews =
            '<span class="bg-purple-100 text-purple-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">News</span>'
        window.onload = function() {
            getAllForum()
        }

        const getAllForum = async () => {



            const request = await fetch('../api/forum/all-forums-user.php')

            const response = await request.json()
            content = ''
            response.responseContent.map((forum) => {


                let categoryBadge = badgeAnnouncement;
                if (forum.category === 'Announcement') {
                    categoryBadge = badgeAnnouncement
                }
                if (forum.category === 'Collecting Schedule') {
                    categoryBadge = badgeCollectingSchedule
                }
                if (forum.category === 'Events') {
                    categoryBadge = badgeEvents
                }
                if (forum.category === 'Forum') {
                    categoryBadge = badgeForum
                }
                if (forum.category === 'News') {
                    categoryBadge = badgeNews
                }
                let commentImage = ""
                //check image
                if (forum.image_url !== "") {
                    commentImage += `<img class="h-auto max-w-xs  rounded-lg  m-2" src="` + forum
                        .image_url + `" alt="image description">`
                }
                content += `
    <section>
    
        <div class="container mx-auto grid gap-8 lg:grid-cols-1 mt-10">
            <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md">
                <div class="flex justify-between items-center mb-5 text-gray-500">
                    <span
                        class="bg-orange-100 text-orange-700 text-sm font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                        Forums
                    </span>
                    <span class="text-sm">` + forum
                    .created_at + `</span>
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <img class="w-7 h-7 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                            alt="Bonnie Green avatar" />
                        <span class="font-medium"> ` + forum.editor_email + ` </span>
                    </div>
                </div>
                <div class="text-justify py-2">
                <h2 class="mt-6 text-2xl font-bold tracking-tight text-gray-900">
                ` + forum
                    .title + `
                </div>
                <h2>
                ` + forum.message_body + `
                </h2>
                

                <!-- Image -->
                <div class="flex justify-center">
                    <a href="` + forum.image_url + `" title="Click to view full image">
                    <img alt="image" src="` + forum.image_url +
                    `" class="mt-8 h-auto w-auto object-cover" style="width: 470px; height: 400px;"/>
                    </a>
                </div>
                <!-- End of Image -->
                <!-- Like Button -->
                <div class="flex items-center">
                                    <button class="flex items-center px-3 py-2 text-blue-500 rounded-full focus:outline-none" id ="btnLike` +
                    forum.id +
                    `"onClick ="likedButtonClicked(` + forum.id + `)">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        width="24"
                                        height="24"
                                        class="h-6 w-6"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                    >
                                        <path
                                        d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"
                                        />
                                    </svg>
                                      <span id="likeCount` + forum.id + `" class="text-md ml-2">` + forum.like_count + `</span>
                                    </button>
                </div>
                <!-- End of Like Button -->
                <!-- Comments -->
                <form id ="addComment">
                    <div id ="commentSection` + forum.id + `">
                
                    </div>
                <input type="text" style="display: none;" name="user_id" value="<?php echo $result[0]['id']; ?>">
                <input type="text" style="display: none;" name="forum_id" value="` + forum.id + `">
                <input type="text" style="display: none;" name="user_email" value="<?php echo $result[0]['email']; ?>">
                <input type="text" style="display: none;" name="user_full_name" value="<?php echo $result[0]['firstname'] . ' ' . $result[0]['lastname']; ?>">

                    <div class="py-2 px-4 mb-4 bg-white rounded-xl border-2 border-gray-400">
                        <label for="comment_text" class="sr-only">Your comment</label>
                        <textarea id="comment_text" name ="comment_text" rows="3"
                            class="px-0 w-full text-md text-gray-900 border-0 focus:ring-0 focus:outline-none"
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    <div class ="mt-2" id ="imageHolder` + forum.id + `">

                    </div>
                    <div class="flex items-center">
                        <button type="submit" id="postButton" class="text-white bg-sky-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 focus:outline-none">
                            Post comment
                        </button>
                        <div class="flex pl-0 space-x-1 sm:pl-2">
                            <input style="display: none;" id="imageUrl` + forum.id +
                    `" type="file" onchange="changeProfile()" />
                            <button type="button" class="mb-0 inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600" onClick="triggerInputClick(` +
                    forum.id + `)">
                            <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1">Upload image</span>
                            </button>
                        </div>
                        </div>

                </form>

                <!-- End of Comments -->

                <!-- Reply Section -->

                
                <!-- End of Reply Section -->
            </article>
        </div>
    </section>


    `;

            })





            forumMain.innerHTML = content;


            // const addComment = document.querySelector('#addComment')

            // addComment.addEventListener('submit', async (e) => {
            //     e.preventDefault();

            //     const formData = new FormData(e.target);
            //     const request = await fetch(
            //         'https://web-bello.online/web-bello/api/comment/add-comment-per-forum.php', {
            //             method: 'POST',
            //             body: formData,
            //         })

            //     const response = await request.json()

            //     if (response.responseStatus === 'success') {

            //         getAllForum()
            //     }

            //     for (const [key, value] of formData.entries()) {
            //         console.log(key, value);
            //     }
            // });

            const addCommentForms = document.querySelectorAll('[id^="addComment"]');

addCommentForms.forEach((addComment) => {
    addComment.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);
        const request = await fetch('https://web-bello.online/web-bello/api/comment/add-comment-per-forum.php', {
            method: 'POST',
            body: formData,
        });

        const response = await request.json();

        if (response.responseStatus === 'success') {
            getAllForum();
        }

        for (const [key, value] of formData.entries()) {
            console.log(key, value);
        }
    });
});





            response.responseContent.map((forum) => {
                let content = getcommentPerForum(forum.id)
            })

        }
const getcommentPerForum = async (id) => {
            let idForum = id
  const commentSectionId = document.querySelector('#commentSection' + id);
  const formData = new FormData();
  formData.append('ForumId', id);

  const request = await fetch('../api/comment/get-all-comment-per-forum.php', {
    method: "POST",
    body: formData,
  });

  const response = await request.json();
  if (response.responseStatus === 'success') {
    console.log(response.responseContent);
    let contents = '';
    const commentLimit = 2; // Set the limit of comments to display
    const commentsToShow = response.responseContent.slice(0, commentLimit);
    commentsToShow.map((comments) => {
      console.log(comments);

      let commentImaged = "";
      // Check image
      if (comments.image_url !== "") {
        commentImaged += `<img class="h-auto max-w-xs rounded-lg m-2" src="` + comments.image_url + `" alt="image description">`;
      }

      contents += `
        <article class="p-6 mb-6 text-base border-t border-gray-200 bg-white">
          <div class="inline-flex">
          </div>
          <footer class="flex justify-between items-center mb-2">
            <div class="flex items-center">
              <p class="inline-flex items-center mr-3 text-md font-medium text-gray-900">
                ` + comments.user_full_name + `
              </p>
              <p class="text-md text-gray-600">
                <time pubdate datetime="2022-02-08" title="February 8th, 2022">` + comments.created_at + `</time>
              </p>
            </div>
          </footer>
          <p class="text-gray-600">
            ` + comments.comment_text + `
          </p>
          ` + commentImaged + `
        </article>
      `;
    });

    if (response.responseContent.length > commentLimit) {
      contents += `<button type ="button" onclick="showAllComments(`+idForum+`)">View All Comments</button>`;
    }

    commentSectionId.innerHTML = contents;
  }
  

};

const showAllComments = (idForum) => {
  // Call the getcommentPerForum function again without a comment limit
  // Pass the necessary ID as an argument
  getcommentPerForum(idForum);
};
    </script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
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
        let currentUploadInputId = 0;
        const triggerInputClick = (id) => {
            currentUploadInputId = id;
            const uploadId = document.querySelector('#imageUrl' + id)
            uploadId.click();
        }



        const changeProfile = async () => {

            let fileupload = document.getElementById('imageUrl' + currentUploadInputId); // fileupload
            let imageHolder = document.getElementById('commentSection' + currentUploadInputId)
            console.log(imageHolder)
            // Picking up files from the input .  .  .
            let files = fileupload.files;

            // Uploading only one file; multiple uploads are not allowed.
            let imageFile = files[0];

            // Create a FormData object.
            formData = new FormData();

            // Add the file to the request.
            formData.append('profileEdit', imageFile, imageFile.name);

            try {

                const fetchResponse = await fetch("../api/images/move-only-image.php", {
                    method: "POST",
                    body: formData,
                });

                const receivedStatus = await fetchResponse.json();
                console.log(receivedStatus)

                if (receivedStatus.statusCode === 200) {
                    console.log("pumasok dito")
                    let output = '';
                    let checkIfBlankImage = ""

                    if (receivedStatus.image !== "") {
                        checkIfBlankImage +=
                            `<img class="m-2 h-auto max-w-xs transition-all duration-300 rounded-lg blur-sm hover:blur-none" src="https://web-bello.online/web-bello/savedimages/` +
                            receivedStatus.image + `" alt="image description">`
                    }
                    output += `
 <input type="text" style="display: none;" name="image_url" value="https://web-bello.online/web-bello/savedimages/` +
                        receivedStatus.image + `" />
` + checkIfBlankImage + `
`;

                    imageHolder.innerHTML = output;
                } else {
                    alert('error')
                }



            } catch (e) {
                console.log(e)
            }
        }

        //liked button
        const likedButtonClicked = async (id) => {
            const likeButton = document.querySelector('#btnLike' + id)
            const likeButtonCounter = document.querySelector('#likeCount' + id)


            let counter = parseInt(likeButtonCounter.innerHTML)

            counter++;


            try {
                formData = new FormData()

                formData.append('forumID', id);
                formData.append('userID', '<?php echo $result[0]['id']; ?>')
                formData.append('likedCount', counter)

                const request = await fetch("../api/forum/update-forum-like.php", {
                    method: "POST",
                    body: formData,
                });
                const response = await request.json()
                console.log(response)
                if (response.responseStatus === 'success') {
                    likeButtonCounter.innerHTML = response.responseContent[0].like_count
                    likeButton.disabled = true;
                    likeButton.classList.add('cursor-not-allowed')
                }

            } catch (e) {
                console.log(e)
            }


        }




        const frmRegisterHOA = document.querySelector('#frmRegisterHOA');
        const image_url = document.querySelector('#image_url')
        const imageHolder = document.querySelector('#imageHolder')

        frmRegisterHOA.addEventListener('submit', async (event) =>{
        event.preventDefault()
        formData = new FormData(frmRegisterHOA)
        formData.append('editor_email',emailEditor.value)
        // uncomment this to print all the content of formData
        for (const [key, value] of formData.entries()) {
        console.log(`${key}: ${value}`);
        }

        //fetch data
        const request =  await fetch("../api/forum/add-forum.php",{
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
    </script>



</body>

</html>