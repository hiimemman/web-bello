<?php
require_once('../components/navbar.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Announcements - Web-Bello Online!</title>

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
            </div>
        </div>
        <!-- End of Intro Header -->
    </header>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 flex h-screen w-full">
    <div class="mx-auto w-full px-4 lg:px-12">
        <!-- Start coding here -->
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id ="tblHOA">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3" onClick ="addTableSorting(tblHOA)">Email</th>
                            <th scope="col" class="px-4 py-3" onClick ="addTableSorting(tblHOA)">Month</th>
                            <th scope="col" class="px-4 py-3" onClick ="addTableSorting(tblHOA)">Amount</th>
                            <th scope="col" class="px-4 py-3" onClick ="addTableSorting(tblHOA)">Balance</th>
                            <th scope="col" class="px-4 py-3" onClick ="addTableSorting(tblHOA)">Receipt</th>
                            <th scope="col" class="px-4 py-3" onClick ="addTableSorting(tblHOA)">Status</th>
                            <th scope="col" class="px-4 py-3" onClick ="addTableSorting(tblHOA)">Date Created</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id ="usersTblBody">
                        
                          
                            
                         
                        
                    </tbody>
                </table>
            </div>

            </div>
</div>
</section>


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
                    <li>
                        <a class="text-gray-700 font-medium transition hover:text-gray-700/75"
                            href="/web-bello/pages/monthly-due.php">
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
    

<!-- HIDDEN BUTTON -->
<button data-modal-target="updateProductModal" data-modal-toggle="updateProductModal" class="hidden block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" id ="updateHiddenButton">
  Toggle modal
</button>


<!-- UPDATE MODAL -->
<div id="updateProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Monthly Due
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateProductModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div id ="updateModalBody">

            </div>
            
          
                    <div>
                        <label for="amountUpdateFix" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                        <input type="text" disabled name="amountUpdateFix" id="amountUpdateFix"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
            </div>
            
            <form action="#" id ="updateHoaInformation">
                
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <input type ="hidden" name ="idUpdate" id ="idUpdate" >
                    <div>
                        <label for="balanceUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Balance</label>
                        <input type="text" name="balanceUpdate" id="balanceUpdate"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>

                   
                    <div>
                        <label for="statusUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select id="statusUpdate" name ="statusUpdate"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="paid">Paid</option>
                            <option value="unpaid">Unpaid</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-center">
                    <button type="submit" class="w-full focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 ">
                        Update 
                    </button>
                    
            </form>
        </div>
    </div>
</div>

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script defer>

//table body
const usersTblBody = document.querySelector('#usersTblBody');
//form
//const frmRegisterHOA = document.querySelector('#frmRegisterHOA');

//search input
//const searchInput = document.querySelector('#searchInput');

//update modal
const updateProductModal =document.querySelector('#updateProductModal')

//triggerbutton
const updateHiddenButton =document.querySelector('#updateHiddenButton')

//Update form modal 
const updateHoaInformation = document.querySelector('#updateHoaInformation')

//MODAL FIELDS
const idUpdate =document.querySelector('#idUpdate')
const statusUpdate =document.querySelector('#statusUpdate')
const amountUpdateFix = document.querySelector('#amountUpdateFix')
const balanceUpdate = document.querySelector('#balanceUpdate')




//update modal
const updateModal = (button) =>{
    console.log("This is the button")
    console.log(button);
    //const dataJson = button.getAttribute('data-user');
    //const content = JSON.parse(button)
    //console.log(content)

updateHiddenButton.click()

// const firstnameUpdate =document.querySelector('#firstnameUpdate')
// const lastnameUpdate =document.querySelector('#lastnameUpdate')
// const emailUpdate = document.querySelector('#emailUpdate')
// const addressUpdate = document.querySelector('#addressUpdate')
// const roleUpdate =document.querySelector('#roleUpdate')
// const statusUpdate =document.querySelector('#statusUpdate')

//set the value of input fields
idUpdate.value = button.payment_id;
amountUpdateFix.value = button.amount;
statusUpdate.value = button.status;
balanceUpdate.value = button.balance;
}


//Onload
window.onload = function(){
    loadTable();
}

//load table
const loadTable = async function() {
    const formData = new FormData()
    formData.append('UserId', <?php echo $result[0]['id']?>)
    console.log([...formData.entries()]);
  const getUsers = await fetch("../api/monthly-due/all-monthly-due-per-id.php",{
    method: "POST",
    body: formData
  });
  const response = await getUsers.json();
  
  console.log("response: "+response.responseStatus);
  console.log("content: " +JSON.stringify(response.responseContent))

  if (response.responseStatus === 'success') {
    let content = '';

    response.responseContent.forEach((contents) => {
      let contentStatus = '<span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Unpaid</span>';

      if (contents.status === 'paid') {
        contentStatus = '<span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Paid</span>';
      }

      content += `
        <tr class="border-b dark:border-gray-700">
          <td class="px-4 py-3">${contents.user_email}</td>
          <td class="px-4 py-3">${contents.month}</td>
          <td class="px-4 py-3">${contents.amount}</td>
          <td class="px-4 py-3">${contents.balance}</td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex-shrink-0 h-10 w-16">
                <a href="${contents.receipt_url}" data-zoomable>
                  <img class="h-10 w-16" src="${contents.receipt_url}" alt="Receipt Image">
                </a>
              </div>
            </div>
          </td>
          <td class="px-4 py-3">${contentStatus}</td>
          <td class="px-4 py-3">${contents.created_at}</td>
          <td class="px-4 py-3 flex items-center justify-end">
            <div class="inline-flex rounded-md shadow-sm" role="group">
              <button id="btnView${contents.id}" type="button" data-modal-toggle="updateProductModal" class="update-button px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" data-user='${JSON.stringify(contents)}'>
                Update
              </button>
            </div>
          </td>
        </tr>
      `;
    });

    usersTblBody.innerHTML = content;

    // Attach event listener to table body
    usersTblBody.addEventListener('click', function(event) {
      const target = event.target;

      if (target.classList.contains('update-button')) {
        const user = JSON.parse(target.getAttribute('data-user'));
        updateModal(user);
      } else if (target.classList.contains('delete-button')) {
        const user = JSON.parse(target.getAttribute('data-user'));
        deleteModal(user);
      }
    });
  }
};




//submit edit hoa
updateHoaInformation.addEventListener('submit', async (event) =>{
    event.preventDefault()
    formData = new FormData(updateHoaInformation)
    // uncomment this to print all the content of formData
    for (const [key, value] of formData.entries()) {
  console.log(`${key}: ${value}`);
}

//fetch data
const request =  await fetch("../api/monthly-due/all-monthly-due-update.php",{
    method: "POST",
    body:formData,
  });

//get the response

const response = await request.json();
console.log(response)
if(response.responseStatus === 'success'){
    //reload table
    location.reload();
    localStorage.setItem('showToast', 'true');
    localStorage.setItem('showToastMessage', response.responseMessage)
    }
})


//sort table
const addTableSorting = (tableElement) => {
  const thElements = tableElement.querySelectorAll('th');
 
  thElements.forEach((thElement) => {
    thElement.addEventListener('click', () => {
      const isAscending = thElement.getAttribute('data-order') === 'asc';
      const columnIndex = Array.from(thElement.parentNode.children).indexOf(thElement);
      const tbodyElement = tableElement.querySelector('tbody');
      const rows = Array.from(tbodyElement.querySelectorAll('tr'));

      const sortedRows = rows.sort((a, b) => {
        const aCellValue = a.children[columnIndex].textContent.trim();
        const bCellValue = b.children[columnIndex].textContent.trim();
        
        if (aCellValue < bCellValue) {
          return isAscending ? -1 : 1;
        }
        if (aCellValue > bCellValue) {
          return isAscending ? 1 : -1;
        }
        return 0;
      });

      tbodyElement.append(...sortedRows);

      thElement.setAttribute('data-order', isAscending ? 'desc' : 'asc');
    });
  });
};


//search function
searchInput.addEventListener('input', () => {
  const searchValue = searchInput.value.toLowerCase().trim();
  const rows = usersTblBody.querySelectorAll('tr');

  rows.forEach((row) => {
    const cols = Array.from(row.querySelectorAll('td'));

    if (cols.some((col) => col.textContent.toLowerCase().includes(searchValue))) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
});

//Delete Modal

const deleteModal = async (button) =>{
    const dataJson = button.getAttribute('data-user');
    const user = JSON.parse(dataJson);
    console.log(user)

    formData = new FormData();
    formData.append('IdDelete', user.payment_id)
    const request =  await fetch("../api/monthly-due/monthly-due-delete.php",{
    method: "POST",
    body:formData,
    });

    const response = await request.json();
    console.log(response)
    if(response.responseStatus === 'success'){
        location.reload();
   localStorage.setItem('showToast', 'true');
    localStorage.setItem('showToastMessage', response.responseMessage)
    }
}

//Update modal




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