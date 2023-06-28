<?php
session_start(); //if there is no session then start session
include_once("../connections/connection.php");
$con = connection();


if (isset($_SESSION['ID'])) {
  header('Location: /web-bello/pages/dashboard.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <title>Admin Login - Web-Bello Online</title>
  <link rel="stylesheet" href="../style.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

  <style>
    .custom-bg {
      background-image: url('/web-bello/images/palazzo-1.png');
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      height: 100vh;
    }

    .custom-signin-btn {
      width: 100%;
      color: white;
      background-color: #003049;
      border: none;
      border-radius: 0.375rem;
      font-weight: 500;
      font-size: 0.875rem;
      padding: 0.625rem 1.25rem;
      text-align: center;
      outline: none;
    }

    .custom-signin-btn:hover {
      background-color: #023e8a;
    }

    .custom-signin-btn:focus {
      outline-width: 4px;
      outline-color: #caf0f8;
    }

    .custom-text-btn {
      font-weight: 500;
      color: #003049;
      text-decoration: none;
    }

    .custom-text-btn:hover {
      text-decoration: underline;
      color: #023e8a;
    }


    @keyframes fade-in {
      0% {
        opacity: 0;
      }

      100% {
        opacity: 1;
      }
    }

    .landing-content {
      animation: fade-in 2s ease-in-out;
    }
  </style>

  <!-- New admin login page design -->

  <div class="bg-white">
    <div class="flex justify-center h-screen">
      <div class="hidden bg-cover lg:block lg:w-2/3 custom-bg">
        <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-70">
          <div>
            <h2 class="drop-shadow text-2xl font-bold text-white sm:text-3xl">
              Sign in with your admin credentials
            </h2>

            <p class="drop-shadow max-w-xl mt-3 text-white tracking-wide">
              Please sign in using your admin credentials to access the admin dashboard and manage
              association operations securely and efficiently.
            </p>
          </div>
        </div>
      </div>

      <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
        <div class="flex-1">
          <div class="text-center">
            <div class="flex justify-center mx-auto">
              <h2 class="drop-shadow text-lg tracking-wider font-medium text-gray-900">
                WEB-BELLO
              </h2>
            </div>

            <p class="mt-3 text-gray-500">Sign in with your admin credentials</p>
          </div>

          <div class="mt-8 mx-6">
            <form id="frmLogin" action="#">
              <div>
                <label for="email" class="block mb-2 text-sm text-gray-600">Email Address</label>
                <input type="email" name="email" id="email" placeholder="example@gmail.com" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" required />
              </div>

              <div class="mt-6">
                <div class="flex justify-between mb-2">
                  <label for="password" class="text-sm text-gray-600">Password</label>
                  <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" type="button" href="#" class="tracking-wide text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline">
                    Forgot password?
                  </button>
                </div>

                <input type="password" name="password" id="password" placeholder="Your Password" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" required />

                <!-- If wrong email or password is typed -->
                <div id="errorDiv"></div>
                <!-- End of If wrong email or password is typed -->

                <div class="flex items-center mt-2">
                  <input type="checkbox" id="show-password" class="mr-2 text-gray-400" onclick="togglePassword()" />
                  <label for="show-password" class="text-sm text-gray-600 cursor-pointer">Show
                    password</label>
                </div>
              </div>

              <div class="mt-6">
                <button class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-sky-950 rounded-lg hover:bg-sky-800 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50" type="submit">
                  Sign in
                </button>
              </div>
            </form>

            <a href="https://web-bello.online/" class="flex items-center text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline mt-2 text-sm text-center tracking-wide"><svg class="h-3 w-3 inline-flex me-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
              </svg>Click here to go back</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- End of new admin login page design -->



  <!-- Main modal -->
  <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Recover password
          </h3>
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <div id="formContent">
          <form id="frmGetPassword">
            <!-- Modal body -->
            <div class="p-6 space-y-6">

              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                address</label>
              <input type="email" id="emailRecovery" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required>

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
              <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
          </form>
        </div>

      </div>
    </div>
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


  <script>
    function togglePassword() {
      var passwordInput = document.getElementById("password");
      var showPasswordCheckbox = document.getElementById("show-password");
      if (showPasswordCheckbox.checked) {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
    }
  </script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
  <script defer>
    const email = document.querySelector('#email');

    const password = document.querySelector('#password');

    const frmLogin = document.querySelector('#frmLogin');


    const frmGetPassword = document.querySelector('#frmGetPassword')

    const formContent = document.querySelector('#formContent')

    const emailRecovery = document.querySelector('#emailRecovery')

    let otpHolder = '';
    frmLogin.addEventListener('submit', async (event) => {
      event.preventDefault()
      formData = new FormData();
      formData.append('email', email.value)
      formData.append('password', password.value)
      const fetchResponse = await fetch("../api/login/login.php", {
        method: "POST",
        body: formData,
      });

      const getResponse = await fetchResponse.json();
      console.log(getResponse)
      if (getResponse.responseStatus === 'success') {
        window.location = '/web-bello/pages/dashboard.php';
      } else {
        errorDiv.innerHTML = ` <div class="mt-2 flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                  <svg 
                                    aria-hidden="true" 
                                    class="flex-shrink-0 inline w-5 h-5 mr-3" 
                                    fill="currentColor" 
                                    viewBox="0 0 20 20" 
                                    xmlns="http://www.w3.org/2000/svg">
                                      <path 
                                        fill-rule="evenodd" 
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" 
                                        clip-rule="evenodd">
                                      </path>
                                  </svg>
                                  <span class="sr-only">Info</span>
                                  <div>
                                    <span class="font-medium">Wrong email or password!</span>
                                  </div>
                                </div>`
      }
    })


    const generateRandomString = () => {
      const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      let randomString = '';

      for (let i = 0; i < 6; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        randomString += characters[randomIndex];
      }

      return randomString;
    };


    frmGetPassword.addEventListener('submit', async (event) => {
      console.log("test")
      event.preventDefault()
      let otpGet = generateRandomString()
      const formData = new FormData(frmGetPassword);
      formData.append('otp', otpGet)
      otpHolder = otpGet;



      const request = await fetch("../api/email/send-otp-forgot-password.php", {
        method: "POST",
        body: formData,
      });

      const response = await request.json();

      if (response.responseStatus === 'success') {

        formContent.innerHTML = `
            <form id ="frmOTP">
            <div class="p-6 space-y-6">
             <label for="otp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter OTP</label>
            <input type="otp" id="otpInput" name ="otp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
             </div>
              <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button  type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
            </form>`

        const frmOTP = document.querySelector('#frmOTP')
        const otp = document.querySelector('#otpInput')

        frmOTP.addEventListener('submit', async (event) => {
          event.preventDefault()

          console.log(otpGet)
          console.log(otp.value)

          //otp input match the otp that sent to email
          if (otpGet == otp.value) {
            formContent.innerHTML = `
            <form id ="frmNewPassword">
            <div class="p-6 space-y-6">
             <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter New password</label>
            <input type="text" id="new_password" name ="new_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
             </div>
              <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button  type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
            </form>`

            const frmNewPassword = document.querySelector('#frmNewPassword')
            let new_password = document.querySelector('#new_password')

            frmNewPassword.addEventListener('submit', async (event) => {
              event.preventDefault()
              try {
                const formData = new FormData();
                formData.append('email', emailRecovery.value);
                formData.append('new_password', new_password.value)
                formData.append('user_position', 'HOA')
                // Print input fields name and value
                for (const [name, value] of formData) {
                  console.log(
                    `Field Name: ${name}, Field Value: ${value}`
                  );
                }
                // Print all content of FormData
                for (const entry of formData.entries()) {
                  console.log(entry);
                }
                const request = await fetch(
                  '../api/email/new-password.php', {
                    method: 'POST',
                    body: formData,
                  })

                const response = await request.json()
                if (response.responseStatus === 'success') {
                  localStorage.setItem('showToast', 'true');
                  localStorage.setItem('showToastMessage',
                    'You password has been updated')
                  location.reload()
                } else {
                  localStorage.setItem('showToast', 'true');
                  localStorage.setItem('showToastMessage',
                    'Error invalid password')
                  location.reload()
                }
              } catch (e) {
                console.log(e)
              }
            })
          }


        })
      }
    })
  </script>

  <script>
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