<?php
session_start(); //if there is no session then start session
if (isset($_SESSION['IDUSER'])) {
  header('Location: /web-bello/pages/user-index.php');
  exit();
}
?>


<!--<!DOCTYPE html>-->
<!--<html lang="en">-->

<!--<head>-->

<!--    <meta charset="UTF-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Web-Bello Login</title>-->
<!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />-->

<!--</head>-->

<!--<body>-->
<!-- Try Login Form -->

<!-- <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg"
                    alt="logo">
                Flowbite
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="#">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                        required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="#"
                                class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot
                                password?</a>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                            in</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? <a href="#"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section> -->
<!-- Old user login -->

<!--<div class="flex justify-center items-center h-screen " style="background-image: url('../images/family-logo.png');">-->
<!--    <form class="w-96 p-5" id="frmLogin" action="#">-->
<!--        <div class="mt-3">-->
<!--            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>-->
<!--            <input type="text" id="email"-->
<!--                class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400"-->
<!--                placeholder="sample@gmail.com" required>-->
<!--            <p class="mt-2 text-sm text-gray-600 dark:text-gray-500 hidden"><span class="font-medium">Oops!</span>-->
<!--                Username already taken!</p>-->
<!--        </div>-->
<!--        <div class="mt-3">-->
<!--            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>-->
<!--            <input type="password" id="password"-->
<!--                class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400"-->
<!--                required>-->
<!--            <p class="mt-2 text-sm text-gray-600 dark:text-gray-500 hidden"><span class="font-medium">Oops!</span>-->
<!--                Username already taken!</p>-->
<!--        </div>-->
<!--        <button type="submit"-->
<!--            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-3 w-full">Log-->
<!--            In</button>-->
<!--    </form>-->
<!--</div>-->



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <title>Login to Web-Bello</title>
  <link rel="stylesheet" href="../style.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

  <style>
    .custom-bg {
      background-image: url('/web-bello/images/palazzo-gradient-1.png');
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
      animation: fade-in 0.2s ease-in-out;
    }
  </style>

  <!-- Old Login -->

  <div class="flex justify-center items-center h-screen custom-bg">

    <form class="w-96 p-5 bg-gray-100 rounded-lg" id="frmLogin" action="#">
      <a href="https://web-bello.online/">
        <i class="fas fa-home home-icon"></i>
      </a>

      <div class="text-center text-gray-900"><strong>Login to your account</strong></div>
      <div id="errorDiv">

      </div>
      <div class="mt-3">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
        <input type="text" id="email" class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400" placeholder="sample@gmail.com" required>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-500 hidden"><span class="font-medium">Oops!</span>
          Username already taken!</p>
      </div>
      <div class="mt-3 relative">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
        <input type="password" id="password" class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400" required>
        <div class="flex items-center mt-2">
          <input type="checkbox" id="show-password" class="mr-2" onclick="togglePassword()">
          <label for="show-password" class="text-sm text-gray-900 font-medium cursor-pointer">Show
            password</label>
        </div>
      </div>
      <button type="submit" class="custom-signin-btn mt-4">Log
        In</button>
      <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="text-blue-500 hover:text-blue-700 focus:outline-none" type="button">

        Forgot password?
      </button>
    </form>


  </div>


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



  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>


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

  <script defer>
    const email = document.querySelector('#email');

    const password = document.querySelector('#password');

    const frmLogin = document.querySelector('#frmLogin');


    const frmGetPassword = document.querySelector('#frmGetPassword')

    const formContent = document.querySelector('#formContent')

    const emailRecovery = document.querySelector('#emailRecovery')

    const errorDiv = document.querySelector('#errorDiv')

    let otpHolder = '';
    frmLogin.addEventListener('submit', async (event) => {
      event.preventDefault()
      formData = new FormData();
      formData.append('email', email.value)
      formData.append('password', password.value)
      const fetchResponse = await fetch("../api/login/user-login.php", {
        method: "POST",
        body: formData,
      });

      const getResponse = await fetchResponse.json();
      console.log(getResponse)
      if (getResponse.responseStatus === 'success') {
        window.location = '/web-bello/pages/user-forum.php';
      } else {
        errorDiv.innerHTML = ` <div class="mt - 2 flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
  <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
  <span class="sr-only">Info</span>
  <div>
    <span class="font-medium">Wrong email or password !</span>
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
                formData.append('user_position', 'RESIDENT')
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

</html>