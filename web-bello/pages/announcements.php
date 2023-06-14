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

require_once('../components/navbar.php')
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

    <!-- Forum page with sidebar and navbar -->


    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
        aria-label="Sidenav">
        <div
            class="overflow-y-auto py-5 px-3 h-full bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <ul class="space-y-2">
                <li>
                    <a href="/web-bello/pages/announcements.php"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group" >

                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46">
                            </path>
                        </svg>
                        <span class="ml-3">Announcements</span>
                    </a>
                </li>

            </ul>
            <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
                <!--<li>-->
                <!--    <a href="#"-->
                <!--        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">-->

                <!--        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"-->
                <!--            xmlns="http://www.w3.org/2000/svg" aria-hidden="true"-->
                <!--            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">-->
                <!--            <path stroke-linecap="round" stroke-linejoin="round"-->
                <!--                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z">-->
                <!--            </path>-->
                <!--        </svg>-->
                <!--        <span class="ml-3">News</span>-->
                <!--    </a>-->
                <!--</li>-->
                <li>
                    <a href="/web-bello/pages/events.php"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">

                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z">
                            </path>
                        </svg>
                        <span class="ml-3">Events</span>
                    </a>
                </li>
                <li>
                    <a href="/web-bello/pages/forums.php"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                        
                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z">
                            </path>
                        </svg>
                        
                        <span class="ml-3">Forums</span>
                    </a>
                </li>
                <li>
                    <a href="/web-bello/pages/collecting-schedule.php"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">

                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12">
                            </path>
                        </svg>
                        <span class="ml-3">Collecting Schedules</span>
                    </a>
                </li>
               
            </ul>
        </div>

        <!-- <div
            class="hidden absolute bottom-0 left-0 justify-center p-4 space-x-4 w-full lg:flex bg-white dark:bg-gray-800 z-20 border-r border-gray-200 dark:border-gray-700">
            <a href="#"
                class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                    </path>
                </svg>
            </a>
            <a href="#" data-tooltip-target="tooltip-settings"
                class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <div id="tooltip-settings" role="tooltip"
                class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                Settings page
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div> -->
    </aside>
<h1 class="text-gray-500 dark:text-gray-400">This is result id<?php echo $_SESSION['IDUSER']; ?></h1>
    <main class="px-6 sm:ml-64 h-auto" id="forumMain">
        <!-- FORUM -->



    </main>

    <!-- End of Forum page with sidebar and navbar -->
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
        
        

        const request = await fetch('../api/forum/all-announcement.php')

        const response = await request.json()
        content = ''
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
            let commentImage = ""
            //check image
            if(forum.image_url !== ""){
                commentImage += `<img class="h-auto max-w-xs  rounded-lg  m-2" src="`+forum.image_url+`" alt="image description">`
            }
            content += `  <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700 mb-5">
            <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-4 mb-4">
                <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                                                class="mr-2 w-6 h-6 rounded-full"
                                                src="` + forum
                            .image_url + `"
                                                alt="` + forum.editor_email + `">` + forum.editor_email + `</p>
                                                `+categoryBadge+`
                                       
                         
                        </div>
                         <p class="text-sm text-gray-600 dark:text-gray-400 mr-2"><time pubdate datetime="` + forum
                            .created_at + `"
                                                title="` + forum
                            .created_at + `">` + forum
                            .created_at + `</time></p>
                               
                    </footer>
                
                </article>
                

        <h2 class="text-gray-500 dark:text-gray-400"><strong>` + forum
                .title + `</strong></h2>
                    <p class="text-gray-500 dark:text-gray-400"> </p>
                `+commentImage+`
                 <div class="flex items-center">
                                    <button class="flex items-center px-3 py-2 bg-blue-500 text-white rounded-full focus:outline-none" id ="btnLike`+forum.id+`"onClick ="likedButtonClicked(`+forum.id+`)">
                                    👍
                                      <span id="likeCount`+forum.id+`" class="text-sm">`+forum.like_count+`</span>
                                    </button>
                </div>
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                <h2 class="text-gray-500 dark:text-gray-400 m-1"><strong>Comments</h2>
                
                


            </div>
            <form action="https://web-bello.online/web-bello/api/comment/add-comment-per-forum.php" method="POST">
            <div id ="commentSection`+forum.id+`">
                
            </div>
   <input type="text" style="display: none;" name="user_id" value="<?php echo $result[0]['id']; ?>">
        <input type="text" style="display: none;" name="forum_id" value="`+forum.id+`">
        <input type="text" style="display: none;" name="user_email" value="<?php echo $result[0]['email']; ?>">
        <input type="text" style="display: none;" name="user_full_name" value="<?php echo $result[0]['firstname'] . ' ' . $result[0]['lastname']; ?>">
   <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
       <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
           <label for="comment_text" class="sr-only">Your comment</label>
           
           <textarea id="comment_text" name ="comment_text" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required></textarea>
       </div>
       <div class ="mt-2" id ="imageHolder`+forum.id+`">
        </div>
       <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
           <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
               Post comment
           </button>
           <div class="flex pl-0 space-x-1 sm:pl-2">
            <input  style="display: none;" id = "imageUrl`+forum.id+`"type ="file" onchange="changeProfile()" />
            
               <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600" onClick = "triggerInputClick(`+forum.id+`)">
                   <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
                   <span class="sr-only">Upload image</span>
               </button>
           </div>
       </div>
   </div>
</form>

        </div>
        
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

                let commentImaged = ""
            //check image
            if(comments.image_url !== ""){
                console.log("pumasok dito")
                commentImaged += `<img class="h-auto max-w-xs  rounded-lg  m-2" src="`+comments.image_url+`" alt="image description">`
            }

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
                `+commentImaged+`
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
let checkIfBlankImage =""

if(receivedStatus.image !== ""){
    checkIfBlankImage += `<img class="m-2 h-auto max-w-xs transition-all duration-300 rounded-lg blur-sm hover:blur-none" src="https://web-bello.online/web-bello/savedimages/`+receivedStatus.image+`" alt="image description">`
}
output += `
 <input type="text" style="display: none;" name="image_url" value="https://web-bello.online/web-bello/savedimages/`+receivedStatus.image+`" />
`+checkIfBlankImage+`
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