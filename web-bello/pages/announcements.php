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
    <style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}
</style>

<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white dark:bg-gray-900">

    <!-- Forum page with sidebar and navbar -->

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
            </div>
        </div>
        <!-- End of Intro Header -->
    </header>


    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

   
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