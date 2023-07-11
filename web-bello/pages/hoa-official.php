<?php 
require_once('../components/navbarDashboard.php')
?>

<style>
    th {
  cursor: pointer;
  position: relative;
}

th::after {
  content: "";
  display: inline-block;
  width: 0;
  height: 0;
  margin-left: 5px;
  vertical-align: middle;
  transition: all 0.2s ease;
}

th.sort-asc::after {
  content: "";
  display: inline-block;
  width: 0;
  height: 0;
  margin-left: 5px;
  vertical-align: middle;
  border-left: 4px solid transparent;
  border-right: 4px solid transparent;
  border-bottom: 4px solid currentColor;
}

th.sort-desc::after {
  content: "";
  display: inline-block;
  width: 0;
  height: 0;
  margin-left: 5px;
  vertical-align: middle;
  border-left: 4px solid transparent;
  border-right: 4px solid transparent;
  border-top: 4px solid currentColor;
}
</style>

<body class ="-ml-96">
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 flex h-screen w-full">
    <div class="mx-auto w-full px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" id ="searchInput"  />
                        </div>
                    </form>
                </div>

               
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                   <button type="button" class="flex: items-center justify-center focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" >New Official</button>
                    <div class="flex items-center space-x-3 w-full md:w-auto">
                        <!-- <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                            Actions
                        </button>
                        <div id="actionsDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass Edit</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete all</a>
                            </div>
                        </div>
                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                            Filter
                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button> -->
                        <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Choose brand</h6>
                            <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                <li class="flex items-center">
                                    <input id="apple" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Apple (56)</label>
                                </li>
                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Microsoft (16)</label>
                                </li>
                                <li class="flex items-center">
                                    <input id="razor" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="razor" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Razor (49)</label>
                                </li>
                                <li class="flex items-center">
                                    <input id="nikon" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="nikon" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Nikon (12)</label>
                                </li>
                                <li class="flex items-center">
                                    <input id="benq" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="benq" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">BenQ (74)</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id ="tblHOA">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3" onClick ="addTableSorting(tblHOA)"></th>
                            <th scope="col" class="px-4 py-3" onClick ="addTableSorting(tblHOA)">Full Name</th>
                            <th scope="col" class="px-4 py-3" onClick ="addTableSorting(tblHOA)">Email</th>
                            <th scope="col" class="px-4 py-3" onClick ="addTableSorting(tblHOA)">Role</th>
                            <th scope="col" class="px-4 py-3" onClick ="addTableSorting(tblHOA)">Address</th>
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



    </section>

    <!-- Add home owners modal -->
<!-- MODALS -->




<!-- Add new modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">

        <!-- Modal content -->
        
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add new official</h3>
                <form class="space-y-6" action="#" id ="frmRegisterHOA">
                    <div>
                        <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                        <input type="firstname" name="firstname" id="firstname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required>
                    </div>
                    <div>
                        <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
                        <input type="lastname" name="lastname" id="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required>
                    </div>
                    <div>
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                            <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option selected>Choose a role</option>
                            <option value="admin">Admin</option>
                            <option value="president">President</option>
                            <option value="vice president">Vice President</option>
                            <option value="secretary">Secretary</option>
                            <option value="treasurer">Treasurer</option>
                            <option value="auditor">Auditor</option>
                            <option value="board member">Board member</option>
                            </select>
                    </div>
                    <div>
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <input type="address" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required>
                    </div>
                    <div>
                        <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact</label>
                        <input type="contact" name="contact" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required>
                    </div>
                    <div id ="imageHolder">
                        
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Image</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="image_url" accept="image/*" type="file" required>
                        <!--<p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>-->
                    </div>
                    <button type="submit" class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-blue-800">Create Account</button>
                   
                </form>
            </div>
        </div>
    </div>
</div> 

<!-- DELETE MODAL -->


    <!-- SHOW DELETE MODAL HERE -->
    <div id ="divShowDeleteModalHere">

    </div>
    

<!-- UPDATE MODAL -->
<div id="updateProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Hoa
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateProductModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div id ="updateModalBody">

            </div>
            <form action="#" id ="updateHoaInformation">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <input type ="hidden" name ="idUpdate" id ="idUpdate" >
                    <div>
                        <label for="firstnameUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                        <input type="text" name="firstnameUpdate" id="firstnameUpdate"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>

                    <div>
                        <label for="lastnameUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
                        <input type="text" name="lastnameUpdate" id="lastnameUpdate"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>

                    <div>
                        <label for="emailUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" name="emailUpdate" id="emailUpdate"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>

                    <div>
                        <label for="addressUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <input type="text" name="addressUpdate" id="addressUpdate"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                    
                    <div>
                        <label for="roleUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select id="roleUpdate" name ="roleUpdate"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="admin">Admin</option>
                            <option value="president">President</option>
                            <option value="vice president">Vice President</option>
                            <option value="secretary">Secretary</option>
                            <option value="treasurer">Treasurer</option>
                            <option value="auditor">Auditor</option>
                            <option value="board member">Board member</option>
                        </select>
                    </div>
                    <div>
                        <label for="statusUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select id="statusUpdate" name ="statusUpdate"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
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



<!-- HIDDEN BUTTON -->
<button data-modal-target="updateProductModal" data-modal-toggle="updateProductModal" class="hidden block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" id ="updateHiddenButton">
  Toggle modal
</button>




<script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script defer>

//table body
const usersTblBody = document.querySelector('#usersTblBody');
//form
const frmRegisterHOA = document.querySelector('#frmRegisterHOA');

//search input
const searchInput = document.querySelector('#searchInput');

//update modal
const updateProductModal =document.querySelector('#updateProductModal')

//triggerbutton
const updateHiddenButton =document.querySelector('#updateHiddenButton')

//Update form modal 
const updateHoaInformation = document.querySelector('#updateHoaInformation')

//MODAL FIELDS
const idUpdate =document.querySelector('#idUpdate')
const firstnameUpdate =document.querySelector('#firstnameUpdate')
const lastnameUpdate =document.querySelector('#lastnameUpdate')
const emailUpdate = document.querySelector('#emailUpdate')
const addressUpdate = document.querySelector('#addressUpdate')
const roleUpdate =document.querySelector('#roleUpdate')
const statusUpdate =document.querySelector('#statusUpdate')
const image_url = document.querySelector('#image_url')
const imageHolder = document.querySelector('#imageHolder')

//div
const divShowDeleteModalHere = document.querySelector('#divShowDeleteModalHere')
 
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

        content += `<tr class="border-b dark:border-gray-700">
    <td class="px-4 py-3">
        <div class="flex items-center">
            <div class="w-10 h-10 rounded-full overflow-hidden">
            <a href="`+users.image_url+`">
                <img src="`+users.image_url+`" alt="User Image">
            </a>
            </div>
        </div>
    </td>
    <td class="px-4 py-3">`+users.firstname+" "+users.lastname+`</td>
    <td class="px-4 py-3">`+users.email+`</td>
    <td class="px-4 py-3">`+users.role+`</td>
    <td class="px-4 py-3">`+users.address+`</td>
    <td class="px-4 py-3">`+user+`</td>
    <td class="px-4 py-3">`+users.created_at+`</td>
    <td class="px-4 py-3 flex items-center justify-end">
        <div class="inline-flex rounded-md shadow-sm" role="group">
            <button id="btnView`+users.id+`" type="button" data-modal-toggle="updateProductModal" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" data-user='`+JSON.stringify(users)+`' onclick="updateModal(this)">
                Edit
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" id="btnDelete`+users.id+`" data-user='`+JSON.stringify(users)+`' onclick="deleteModal(this)">
                Delete
            </button>
        </div>
    </td>
</tr>
        `
    })
   

    usersTblBody.innerHTML = content;

  }
}//end of onload


frmRegisterHOA.addEventListener('submit', async (event) =>{
    event.preventDefault()
    formData = new FormData(frmRegisterHOA)
    formData.append('password', 'default1234')
// uncomment this to print all the content of formData
    for (const [key, value] of formData.entries()) {
  console.log(`${key}: ${value}`);
}

//fetch data
  const request =  await fetch("../api/hoa/register-hoa.php",{
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


//submit edit hoa
updateHoaInformation.addEventListener('submit', async (event) =>{
    event.preventDefault()
    formData = new FormData(updateHoaInformation)
    // uncomment this to print all the content of formData
//     for (const [key, value] of formData.entries()) {
//   console.log(`${key}: ${value}`);
// }

//fetch data
const request =  await fetch("../api/hoa/update-hoa.php",{
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
    let  continueDelete = false

    const deleteModalContent = `<div id="deleteModal" tabindex="-1" aria-hidden="false" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto bg-opacity-50 bg-black">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
            <div class="flex justify-center items-center space-x-4">
                <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    No, cancel
                </button>
                <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                    Yes, I'm sure
                </button>
            </div>
        </div>
    </div>
</div>`

divShowDeleteModalHere.innerHTML = deleteModalContent

if(continueDelete){
    
    try{
        formData = new FormData();
    formData.append('IdDelete', user.id)
    const request =  await fetch("../api/hoa/delete-hoa.php",{
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
    }catch(e){
        alert(e)
    }
}

    
}

//Update modal



const updateModal = (button) =>{

    const dataJson = button.getAttribute('data-user');
    const user = JSON.parse(dataJson);
console.log(user)

updateHiddenButton.click()

// const firstnameUpdate =document.querySelector('#firstnameUpdate')
// const lastnameUpdate =document.querySelector('#lastnameUpdate')
// const emailUpdate = document.querySelector('#emailUpdate')
// const addressUpdate = document.querySelector('#addressUpdate')
// const roleUpdate =document.querySelector('#roleUpdate')
// const statusUpdate =document.querySelector('#statusUpdate')

//set the value of input fields
idUpdate.value = user.id;
firstnameUpdate.value = user.firstname;
lastnameUpdate.value = user.lastname;
emailUpdate.value = user.email;
addressUpdate.value = user.address;
roleUpdate.value = user.role;
statusUpdate.value = user.status;

}



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

// Call showToast when the page loads
document.addEventListener('DOMContentLoaded', showToast);





</script>


</body>