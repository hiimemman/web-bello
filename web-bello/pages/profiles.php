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
} else {
    echo "Error fetching user data: " . mysqli_error($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-Bello | Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #0B0B0E;
        color: #fff;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #333333;
    }

    h1 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .input-field {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        background-color: #fff;
        color: #000;
    }

    .column-container {
        display: flex;
        justify-content: space-between;
    }

    .column {
        width: 48%;
    }

    .submit-btn {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #000;
        color: #fff;
        font-weight: bold;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }
</style>

</head>

<body>
    <a href="https://web-bello.online/web-bello/pages/dashboard.php"><button style="border: 2px white solid;" class="mt-3 ml-3">Go back to dashboard</button></a>
    <div class="container">
        <h1>Profile
        
        </h1>
        
        
             
        <form action="../pages/profiles.php" method="POST" id="frmUpdateProfile">
        <div class="column-container">
    <div class="column">
        <div class="form-group">
            <label for="firstname" class="label">First Name:</label>
            <input type="text" name="firstname" value="<?php echo $Firstname; ?>" class="input-field">
        </div>

        <div class="form-group">
            <label for="address" class="label">Address:</label>
            <input type="text" name="address" value="<?php echo $Address; ?>" class="input-field">
        </div>

        <div class="form-group">
            <label for="email" class="label">Email:</label>
            <input type="email" name="email" value="<?php echo $Email; ?>" class="input-field">
        </div>
    </div>

    <div class="column">
        <div class="form-group">
            <label for="lastname" class="label">Last Name:</label>
            <input type="text" name="lastname" value="<?php echo $Lastname; ?>" class="input-field">
        </div>

        <div class="form-group">
            <label for="position" class="label">Position</label>
            <select name="position" id="" class="input-field">
                            <option value="Admin">Admin</option>
                            <option value="Board Member">Board Member</option>
            </select>
        </div>

        <div class="form-group">
            <label for="contact" class="label">Contact:</label>
            <input type="text" name="contact" value="<?php echo $Contact; ?>" class="input-field">
        </div>

        <div class="form-group">
            <label for="password" class="label">Password:</label>
            <input type="password" name="password" class="input-field" required>
        </div>

        <div class="form-group">
            <label for="password1" class="label">Confirm Password:</label>
            <input type="password" name="password1" class="input-field" required>
        </div>

    </div>
</div>

            <input type="submit" value="Save Changes" class="submit-btn">
        </form>
    </div>

    

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
</body>

</html>


    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js"></script>


<script defer>

frmUpdateProfile.addEventListener('submit', async (event) =>{
    event.preventDefault()
    formData = new FormData(frmUpdateProfile)
    // formData.append('password', 'default1234')
// uncomment this to print all the content of formData
    for (const [key, value] of formData.entries()) {
  console.log(`${key}: ${value}`);
}

//fetch data
  const request =  await fetch("../api/admin/profiles.php",{
    method: "POST",
    body:formData,
  });

//get the response

const response = await request.json();

if(response.responseStatus === 'success'){
    //reload table
   location.reload();
   localStorage.setItem('showToast', 'true');
   localStorage.setItem('showToastMessage', response.responseMessage)

    // Close the profile window
    window.location.href = "https://web-bello.online/web-bello/pages/dashboard.php";
}

})


//submit edit hoa
updateHoaInformation.addEventListener('submit', async (event) =>{
    event.preventDefault()
    formData = new FormData(updateHoaInformation)
    // uncomment this to print all the content of formData
//     for (const [key, value] of formData.entries()) {
//   console.log(`${key}: ${value}`);
// }

//fetch data
const request =  await fetch("../api/admin/profiles.php",{
    method: "POST",
    body:formData,
  });

//get the response

const response = await request.json();

if(response.responseStatus === 'success'){
    //reload table
    location.reload();
   localStorage.setItem('showToast', 'true');
   localStorage.setItem('showToastMessage', response.responseMessage)
}

})

//toaster 
const showToast = () => {
  const toast = document.getElementById('toast-success')
  const showToastFlag = localStorage.getItem('showToast')
  const showToastMessage = localStorage.getItem('showToastMessage')
  if (showToastFlag === 'true') {
    const toastMessage = toast.querySelector('.font-normal')
    toastMessage.textContent = showToastMessage
    toast.classList.remove('hidden');
    
    setTimeout(() => {
      toast.classList.add('hidden');
      localStorage.removeItem('showToast');
      localStorage.removeItem('showToastMessage')
    }, 3000);
  }
};

// Call showToast when the page loads
document.addEventListener('DOMContentLoaded', showToast);

</script>
</body>
</html>