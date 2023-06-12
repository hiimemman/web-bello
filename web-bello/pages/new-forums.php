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
    <link rel="stylesheet" href="../tailwind/tailwind.css">
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
                
                <!-- LIST POST -->
                
                <main id="forumMain">
                <!-- FORUM -->



                </main>            
                

<!-- POST -->
<div class="shadow bg-white dark:bg-dark-second dark:text-dark-txt mt-4 rounded-lg">
    <!-- POST AUTHOR -->
    <div class="flex items-center justify-between px-4 py-2">
        <div class="flex space-x-2 items-center">
            <div class="relative">
                <img src="" alt="Profile picture" class="w-10 h-10 rounded-full">
                <span class="bg-green-500 w-3 h-3 rounded-full absolute right-0 top-3/4 border-white border-2"></span>
            </div>
            <div>
                <div class="font-semibold">
                    John Doe
                </div>
                <span class="text-sm text-gray-500">38m</span>
            </div>
        </div>
        <div class="w-8 h-8 grid place-items-center text-xl text-gray-500 hover:bg-gray-200 dark:text-dark-txt dark:hover:bg-dark-third rounded-full cursor-pointer">
            <i class='bx bx-dots-horizontal-rounded'></i>
        </div>
    </div>
    <!-- END POST AUTHOR -->

    <!-- POST CONTENT -->
    <div class="text-justify px-4 py-2">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, autem earum cum ullam odio, molestias maxime aperiam in id aspernatur vel ratione odit molestiae minus ipsa obcaecati quia! Doloribus, illum.
    </div>
    <!-- END POST CONTENT -->

    <!-- POST IMAGE -->
    <div class="py-2">
        <img src="./images/post.png" alt="Post image">
    </div>
    <!-- END POST IMAGE -->

    <!-- POST REACT -->
    <div class="px-4 py-2">
        <div class="flex items-center justify-between">
            <div class="flex flex-row-reverse items-center">
                <span class="ml-2 text-gray-500 dark:text-dark-txt">999</span>
                <span class="rounded-full grid place-items-center text-2xl -ml-1 text-red-800">
                    <i class='bx bxs-angry'></i>
                </span>
                <span class="rounded-full grid place-items-center text-2xl -ml-1 text-red-500">
                    <i class='bx bxs-heart-circle'></i>
                </span>
                <span class="rounded-full grid place-items-center text-2xl -ml-1 text-yellow-500">
                    <i class='bx bx-happy-alt'></i>
                </span>
            </div>
            <div class="text-gray-500 dark:text-dark-txt">
                <span>90 comments</span>
                <span>66 Shares</span>
            </div>
        </div>
    </div>
    <!-- END POST REACT -->

    <!-- POST ACTION -->
    <div class="py-2 px-4">
        <div class="border border-gray-200 dark:border-dark-third border-l-0 border-r-0 py-1">
            <div class="flex space-x-2">
                <div class="w-1/3 flex space-x-2 justify-center items-center hover:bg-gray-100 dark:hover:bg-dark-third text-xl py-2 rounded-lg cursor-pointer text-gray-500 dark:text-dark-txt">
                    <i class='bx bx-like'></i>
                    <span class="text-sm font-semibold">Like</span>
                </div>
                <div class="w-1/3 flex space-x-2 justify-center items-center hover:bg-gray-100 dark:hover:bg-dark-third text-xl py-2 rounded-lg cursor-pointer text-gray-500 dark:text-dark-txt">
                    <i class='bx bx-comment'></i>
                    <span class="text-sm font-semibold">Comment</span>
                </div>
                <div class="w-1/3 flex space-x-2 justify-center items-center hover:bg-gray-100 dark:hover:bg-dark-third text-xl py-2 rounded-lg cursor-pointer text-gray-500 dark:text-dark-txt">
                    <i class='bx bx-share bx-flip-horizontal'></i>
                    <span class="text-sm font-semibold">Share</span>
                </div>
            </div>
        </div>
    </div>
    <!-- END POST ACTION -->

    <!-- LIST COMMENT -->
    <div class="py-2 px-4">
        <!-- COMMENT -->
        <div class="flex space-x-2">
            <img src="./images/avt-5.jpg" alt="Profile picture" class="w-9 h-9 rounded-full">
            <div>
                <div class="bg-gray-100 dark:bg-dark-third p-2 rounded-2xl text-sm">
                    <span class="font-semibold block">John Doe</span>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                </div>
                <div class="p-2 text-xs text-gray-500 dark:text-dark-txt">
                    <span class="font-semibold cursor-pointer">Like</span>
                    <span>.</span>
                    <span class="font-semibold cursor-pointer">Reply</span>
                    <span>.</span>
                    10m
                </div>
                <!-- COMMENT -->
                <div class="flex space-x-2">
                    <img src="./images/avt-7.jpg" alt="Profile picture" class="w-9 h-9 rounded-full">
                    <div>
                        <div class="bg-gray-100 dark:bg-dark-third p-2 rounded-2xl text-sm">
                            <span class="font-semibold block">John Doe</span>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </div>
                        <div class="p-2 text-xs text-gray-500 dark:text-dark-txt">
                            <span class="font-semibold cursor-pointer">Like</span>
                            <span>.</span>
                            <span class="font-semibold cursor-pointer">Reply</span>
                            <span>.</span>
                            10m
                        </div>
                    </div>
                </div>
                <!-- END COMMENT -->
            </div>
        </div>
        <!-- END COMMENT -->
        <!-- COMMENT -->
        <div class="flex space-x-2">
            <img src="./images/avt-5.jpg" alt="Profile picture" class="w-9 h-9 rounded-full">
            <div>
                <div class="bg-gray-100 dark:bg-dark-third p-2 rounded-2xl text-sm">
                    <span class="font-semibold block">John Doe</span>
                    <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In voluptate ipsa animi corrupti unde, voluptatibus expedita suscipit, itaque, laudantium accusantium aspernatur officia repellendus nihil mollitia soluta distinctio praesentium nulla eos?</span>
                </div>
                <div class="p-2 text-xs text-gray-500 dark:text-dark-txt">
                    <span class="font-semibold cursor-pointer">Like</span>
                    <span>.</span>
                    <span class="font-semibold cursor-pointer">Reply</span>
                    <span>.</span>
                    10m
                </div>
                <!-- COMMENT -->
                <div class="flex space-x-2">
                    <img src="./images/avt-7.jpg" alt="Profile picture" class="w-9 h-9 rounded-full">
                    <div>
                        <div class="bg-gray-100 dark:bg-dark-third p-2 rounded-2xl text-sm">
                            <span class="font-semibold block">John Doe</span>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </div>
                        <div class="p-2 text-xs text-gray-500 dark:text-dark-txt">
                            <span class="font-semibold cursor-pointer">Like</span>
                            <span>.</span>
                            <span class="font-semibold cursor-pointer">Reply</span>
                            <span>.</span>
                            10m
                        </div>
                    </div>
                </div>
                <!-- END COMMENT -->
            </div>
        </div>
        <!-- END COMMENT -->
    </div>
    <!-- END LIST COMMENT -->

    <!-- COMMENT FORM -->
    <div class="py-2 px-4">
        <div class="flex space-x-2">
            <img src="./images/tuat.jpg" alt="Profile picture" class="w-9 h-9 rounded-full">
            <div class="flex-1 flex bg-gray-100 dark:bg-dark-third rounded-full items-center justify-between px-3">
                <input type="text" placeholder="Write a comment..." class="outline-none bg-transparent flex-1">
                <div class="flex space-x-0 items-center justify-center">
                    <span class="w-7 h-7 grid place-items-center rounded-full hover:bg-gray-200 cursor-pointer text-gray-500 dark:text-dark-txt dark:hover:bg-dark-second text-xl"><i class='bx bx-smile'></i></span>
                    <span class="w-7 h-7 grid place-items-center rounded-full hover:bg-gray-200 cursor-pointer text-gray-500 dark:text-dark-txt dark:hover:bg-dark-second text-xl"><i class='bx bx-camera'></i></span>
                    <span class="w-7 h-7 grid place-items-center rounded-full hover:bg-gray-200 cursor-pointer text-gray-500 dark:text-dark-txt dark:hover:bg-dark-second text-xl"><i class='bx bxs-file-gif'></i></span>
                    <span class="w-7 h-7 grid place-items-center rounded-full hover:bg-gray-200 cursor-pointer text-gray-500 dark:text-dark-txt dark:hover:bg-dark-second text-xl"><i class='bx bx-happy-heart-eyes'></i></span>
                </div>
            </div>
        </div>
    </div>
    <!-- END COMMENT FORM -->
</div>
<!-- END POST -->

</div>

<!-- END LIST POST -->
                
</div>
<script src="./static/app.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script defer>
    const forumMain = document.querySelector('#forumMain')
    
    
    
    const badgeAnnouncement = '<span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Announcement</span>';
    const badgeCollectingSchedule = '<span class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Collecting Schedule</span>'
    const badgeEvents = '<span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Events</span>'
    const badgeForum = '<span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Forum</span>'
    const badgeNews = '<span class="bg-purple-100 text-purple-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">News</span>'
    window.onload = function() {
        getAllForum()
    }

    const getAllForum = async () => {
        
        

        const request = await fetch('../api/forum/all-forums-only.php')

        const response = await request.json()
        content = ''
        
        if(response.responseContent.length <= 0){
            console.log("Pumasok")
            forumMain.innerHTML = `
           <h2 class ="text-white">NO DATA FOUND </h2>
            `
        }
        
        response.responseContent.map((forum) => {
            
           
            let categoryBadge = badgeAnnouncement;
            if(forum.category === 'Announcement'){
                categoryBadge = badgeAnnouncement
            }
            if(forum.category === 'Collecting Schedule'){
                categoryBadge = badgeCollectingSchedule
            }
            if(forum.category === 'Events'){
                categoryBadge = badgeEvents
            }
            if(forum.category === 'Forum'){
                categoryBadge = badgeForum
            }
            if(forum.category === 'News'){
                categoryBadge = badgeNews
            }

// CONTENTS FORM            
content += `  
<!-- POST -->
<div class="shadow bg-white dark:bg-dark-second dark:text-dark-txt mt-4 rounded-lg">
    <!-- POST AUTHOR -->
    <div class="flex items-center justify-between px-4 py-2">
        <div class="flex space-x-2 items-center">
            <div class="relative">
                <img src="` + forum.image_url + `" alt="` + forum.editor_email + `" class="w-10 h-10 rounded-full">
                
            </div>
            <div>
                <div class="font-semibold">
                ` + forum.editor_email + ` `+categoryBadge+`
                </div>
                
                <span class="text-sm text-gray-500">`+ forum.created_at + `</span>
            </div>
        </div>
        <div class="w-8 h-8 grid place-items-center text-xl text-gray-500 hover:bg-gray-200 dark:text-dark-txt dark:hover:bg-dark-third rounded-full cursor-pointer">
            <i class='bx bx-dots-horizontal-rounded'></i>
        </div>
    </div>
    <!-- END POST AUTHOR -->

    <!-- POST CONTENT -->
    <div class="text-justify px-4 py-2">
    <h2 class="text-gray-500 dark:text-gray-400"><strong>` + forum.title + `</strong></h2>
    ` + forum.message_body + `
    </div>
    <!-- END POST CONTENT -->

    <!-- POST IMAGE -->
    <div class="py-2">
        <img class="w-full" src="` + forum.image_url + `">
    </div>
    <!-- END POST IMAGE -->

    <!-- POST REACT -->
    <div class="px-4 py-2">
        <div class="flex items-center justify-between">
            <div class="flex flex-row-reverse items-center">
                <span class="ml-2 text-gray-500 dark:text-dark-txt" id="likeCount`+forum.id+`">👍 `+forum.like_count+`</span>
                <span class="rounded-full grid place-items-center text-2xl -ml-1 text-red-800">
                    <i class='bx bxs-angry'></i>
                </span>
                <span class="rounded-full grid place-items-center text-2xl -ml-1 text-red-500">
                    <i class='bx bxs-heart-circle'></i>
                </span>
                <span class="rounded-full grid place-items-center text-2xl -ml-1 text-yellow-500">
                    <i class='bx bx-happy-alt'></i>
                </span>
            </div>
        </div>
    </div>
    <!-- END POST REACT -->

    <!-- POST ACTION -->
    <div class="py-2 px-4">
        <div class="border border-gray-200 dark:border-dark-third border-l-0 border-r-0 py-1">
            <div class="flex space-x-2">
                <div class="w-1/3 flex space-x-2 justify-center items-center hover:bg-gray-100 dark:hover:bg-dark-third text-xl py-2 rounded-lg cursor-pointer text-gray-500 dark:text-dark-txt">
                    <i class='bx bx-like'></i>
                    <button id="btnLike`+forum.id+`" onClick="likedButtonClicked(`+forum.id+`)">
                    <span class="text-sm font-semibold">Like</span>
                    </button>
                </div>
                <div class="w-1/3 flex space-x-2 justify-center items-center hover:bg-gray-100 dark:hover:bg-dark-third text-xl py-2 rounded-lg cursor-pointer text-gray-500 dark:text-dark-txt">
                    <i class='bx bx-comment'></i>
                    <span class="text-sm font-semibold">Comment</span>
                </div>
                <div class="w-1/3 flex space-x-2 justify-center items-center hover:bg-gray-100 dark:hover:bg-dark-third text-xl py-2 rounded-lg cursor-pointer text-gray-500 dark:text-dark-txt">
                    <i class='bx bx-share bx-flip-horizontal'></i>
                    <span class="text-sm font-semibold">Share</span>
                </div>
            </div>
        </div>
    </div>
    <!-- END POST ACTION -->

    <!-- LIST COMMENT -->
    <div class="py-2 px-4">
        <!-- COMMENT -->
        <div class="flex space-x-2">
            <img src="./images/avt-5.jpg" alt="Profile picture" class="w-9 h-9 rounded-full">
            <div>
                <div class="bg-gray-100 dark:bg-dark-third p-2 rounded-2xl text-sm">
                    <span class="font-semibold block">John Doe</span>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                </div>
                <div class="p-2 text-xs text-gray-500 dark:text-dark-txt">
                    <span class="font-semibold cursor-pointer">Like</span>
                    <span>.</span>
                    <span class="font-semibold cursor-pointer">Reply</span>
                    <span>.</span>
                    10m
                </div>
                <!-- COMMENT -->
                <div class="flex space-x-2">
                    <img src="./images/avt-7.jpg" alt="Profile picture" class="w-9 h-9 rounded-full">
                    <div>
                        <div class="bg-gray-100 dark:bg-dark-third p-2 rounded-2xl text-sm">
                            <span class="font-semibold block">John Doe</span>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </div>
                        <div class="p-2 text-xs text-gray-500 dark:text-dark-txt">
                            <span class="font-semibold cursor-pointer">Like</span>
                            <span>.</span>
                            <span class="font-semibold cursor-pointer">Reply</span>
                            <span>.</span>
                            10m
                        </div>
                    </div>
                </div>
                <!-- END COMMENT -->
            </div>
        </div>
        <!-- END COMMENT -->
        <!-- COMMENT -->
        <div class="flex space-x-2">
            <img src="./images/avt-5.jpg" alt="Profile picture" class="w-9 h-9 rounded-full">
            <div>
                <div class="bg-gray-100 dark:bg-dark-third p-2 rounded-2xl text-sm">
                    <span class="font-semibold block">John Doe</span>
                    <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In voluptate ipsa animi corrupti unde, voluptatibus expedita suscipit, itaque, laudantium accusantium aspernatur officia repellendus nihil mollitia soluta distinctio praesentium nulla eos?</span>
                </div>
                <div class="p-2 text-xs text-gray-500 dark:text-dark-txt">
                    <span class="font-semibold cursor-pointer">Like</span>
                    <span>.</span>
                    <span class="font-semibold cursor-pointer">Reply</span>
                    <span>.</span>
                    10m
                </div>
                <!-- COMMENT -->
                <div class="flex space-x-2">
                    <img src="./images/avt-7.jpg" alt="Profile picture" class="w-9 h-9 rounded-full">
                    <div>
                        <div class="bg-gray-100 dark:bg-dark-third p-2 rounded-2xl text-sm">
                            <span class="font-semibold block">John Doe</span>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </div>
                        <div class="p-2 text-xs text-gray-500 dark:text-dark-txt">
                            <span class="font-semibold cursor-pointer">Like</span>
                            <span>.</span>
                            <span class="font-semibold cursor-pointer">Reply</span>
                            <span>.</span>
                            10m
                        </div>
                    </div>
                </div>
                <!-- END COMMENT -->
            </div>
        </div>
        <!-- END COMMENT -->
    </div>
    <!-- END LIST COMMENT -->

    <!-- COMMENT FORM -->
    <div class="py-2 px-4">
        <div class="flex space-x-2">
            <img src="./images/tuat.jpg" alt="Profile picture" class="w-9 h-9 rounded-full">
            <div class="flex-1 flex bg-gray-100 dark:bg-dark-third rounded-full items-center justify-between px-3">
                <input type="text" placeholder="Write a comment..." class="outline-none bg-transparent flex-1">
                <div class="flex space-x-0 items-center justify-center">
                    <span class="w-7 h-7 grid place-items-center rounded-full hover:bg-gray-200 cursor-pointer text-gray-500 dark:text-dark-txt dark:hover:bg-dark-second text-xl"><i class='bx bx-smile'></i></span>
                    <span class="w-7 h-7 grid place-items-center rounded-full hover:bg-gray-200 cursor-pointer text-gray-500 dark:text-dark-txt dark:hover:bg-dark-second text-xl"><i class='bx bx-camera'></i></span>
                    <span class="w-7 h-7 grid place-items-center rounded-full hover:bg-gray-200 cursor-pointer text-gray-500 dark:text-dark-txt dark:hover:bg-dark-second text-xl"><i class='bx bxs-file-gif'></i></span>
                    <span class="w-7 h-7 grid place-items-center rounded-full hover:bg-gray-200 cursor-pointer text-gray-500 dark:text-dark-txt dark:hover:bg-dark-second text-xl"><i class='bx bx-happy-heart-eyes'></i></span>
                </div>
            </div>
        </div>
    </div>
    <!-- END COMMENT FORM -->
</div>
<!-- END POST -->

</div>

<!-- END LIST POST -->
       `;
       
        })





        forumMain.innerHTML = content;
        
        
      



       
       response.responseContent.map((forum) => {
         let content = getcommentPerForum(forum.id)
       })   
        
    }
    
    const getcommentPerForum = async (id) =>{
        const commentSectionId = document.querySelector('#commentSection' + id);
        formData = new FormData();
        formData.append('ForumId', id);
      
        const request = await fetch('../api/comment/get-all-comment-per-forum.php',{
            method:"POST",
            body:formData,
        })
        
        const response = await request.json()
        if(response.responseStatus === 'success'){
           console.log(response.responseContent)
          let contents = '';
            response.responseContent.map((comments)=>{
                console.log(comments)
               contents += `
              
                <div class="flex items-center ml-2">
                
                
                
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">` + comments.user_full_name + `</p>
                            <div class ="flex items-end ml-auto">
                             <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="` + comments
                            .created_at + `"
                                                title="` + comments
                            .created_at + `">` + comments
                            .created_at + `</time></p>
                            
                            </div>
                            
                </div>
                
                <p class="text-gray-500 dark:text-gray-400 ml-2">` + comments
                .comment_text + `</p>
                <img class="h-auto max-w-xs transition-all duration-300 rounded-lg blur-sm hover:blur-none m-2" src="`+comments.image_url+`" alt="image description">
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                
            `
            })
             commentSectionId.innerHTML = contents
        }
    }
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
  const  triggerInputClick = (id) => {
    currentUploadInputId = id;
    const uploadId = document.querySelector('#imageUrl'+id)
    uploadId.click();
  }
  
  
  
const changeProfile = async() =>{
 
  let fileupload = document.getElementById('imageUrl'+currentUploadInputId);// fileupload
  let imageHolder = document.getElementById('commentSection'+currentUploadInputId)
    console.log(imageHolder)
 // Picking up files from the input .  .  .
 let files = fileupload.files;

 // Uploading only one file; multiple uploads are not allowed.
  let imageFile = files[0]; 

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
    console.log("pumasok dito")
let output = ''; 
output += `
 <input type="text" style="display: none;" name="image_url" value="https://web-bello.online/web-bello/savedimages/`+receivedStatus.image+`" />
<img class="m-2 h-auto max-w-xs transition-all duration-300 rounded-lg blur-sm hover:blur-none" src="https://web-bello.online/web-bello/savedimages/`+receivedStatus.image+`" alt="image description">
`;
  
imageHolder.innerHTML = output;
}else{
    alert('error')
}
 


    }catch (e){
    console.log(e)
    }
}
</script>
<script defer>
    //liked button
    const likedButtonClicked = async (id) =>{
        const likeButton = document.querySelector('#btnLike'+id)
        const likeButtonCounter = document.querySelector('#likeCount'+id)
        
        
        let counter = parseInt(likeButtonCounter.innerHTML)
        
        counter++;
    
        
        try{
            formData = new FormData()
        
            formData.append('forumID', id);
            formData.append('userID','<?php echo $result[0]['id']; ?>')
            formData.append('likedCount', counter)
            
            const request = await fetch("../api/forum/update-forum-like.php",{
                method: "POST",
                body:formData,
            });
            const response = await request.json()
            console.log(response)
            if(response.responseStatus === 'success'){
                likeButtonCounter.innerHTML = response.responseContent[0].like_count
                likeButton.disabled = true;
                likeButton.classList.add('cursor-not-allowed')
            }

        }catch(e){
            console.log(e)
        }
     
     
    }
</script>

</body>