<template>
    <header class="bg-[#164e63]">
                <div class="flex justify-between">
                    <div class="p-1 mx-3 inline-flex items-center">
                        <i class="fas fa-bars pr-2 text-white" @click="sidebarToggle()"></i>
                        <h1 class="text-white p-2">Logo</h1>
                    </div>
                    <div class="p-1 flex flex-row items-center">
                        <img @click="profileToggle()" class="inline-block h-8 w-8 rounded-full"
                            src="https://therichpost.com/wp-content/uploads/2021/03/avatar2.png" alt="">
                        <a href="#" @click="profileToggle()"
                            class="text-white p-2 no-underline hidden md:block lg:block">Jassa The Rich</a>
                        <div id="ProfileDropDown"
                            class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                            <ul class="list-reset">
                                <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My
                                        account</a></li>
                                <li><a href="#"
                                        class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a>
                                </li>
                                <li>
                                    <hr class="border-t mx-2 border-grey-ligght">
                                </li>
                                <li><a href="/Login"
                                        class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
    </header>
<div class="flex flex-1">
    <!--Sidebar-->
    <aside id="sidebar"
        class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

        <ul class="list-reset flex flex-col">
            <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
                <a href="/"
                    class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                    <i class="fas fa-tachometer-alt float-left mx-2"></i>
                    Dashboard
                    <span><i class="fas fa-angle-right float-right"></i></span>
                </a>
            </li>
            <li class="w-full h-full py-3 px-2">
                <a href="#"
                    class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                    <i class="far fa-file float-left mx-2"></i>
                    Users
                    <span><i class="fa fa-angle-down float-right"></i></span>
                </a>
                <ul class="list-reset -mx-2 bg-white-medium-dark">
                    <li class="border-t mt-2 border-light-border w-full h-full px-2 py-3">
                        <router-link
                            class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline"
                            to="/login">Login Page
                            <span><i class="fa fa-angle-right float-right"></i></span></router-link>
                    </li>
                    <li class="border-t border-light-border w-full h-full px-2 py-3">
                        <router-link
                            class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline"
                            to="/register">Register Page
                            <span><i class="fa fa-angle-right float-right"></i></span></router-link>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
    <!--/Sidebar-->
    <!--Main-->
    <main class="bg-white-300 flex-1 p-3 overflow-hidden">

        <div class="flex flex-col">
            <!-- Stats Row Starts Here -->
         

            <!-- /Stats Row Ends Here -->

            <!-- Card Sextion Starts Here -->
            <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                <!-- card -->

                <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                    <div class="px-6 py-2 border-b border-light-grey">
                        <div class="font-bold text-xl">Trending Categories</div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-grey-darkest">
                            <thead class="bg-grey-dark text-white text-normal">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Current</th>
                                    <th scope="col">Change</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <button
                                            class="bg-blue-500 hover:bg-blue-800 text-white font-light py-1 px-2 rounded-full">
                                            Twitter
                                        </button>
                                    </td>
                                    <td>4500</td>
                                    <td>4600</td>
                                    <td>
                                        <span class="text-green-500"><i
                                                class="fas fa-arrow-up"></i>5%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>
                                        <button
                                            class="bg-primary hover:bg-primary-dark text-white font-light py-1 px-2 rounded-full">
                                            Facebook
                                        </button>
                                    </td>
                                    <td>10000</td>
                                    <td>3000</td>
                                    <td>
                                        <span class="text-red-500"><i
                                                class="fas fa-arrow-down"></i>65%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">3</th>
                                    <td>
                                        <button
                                            class="bg-success hover:bg-success-dark text-white font-light py-1 px-2 rounded-full">
                                            Amazon
                                        </button>
                                    </td>
                                    <td>10000</td>
                                    <td>3000</td>
                                    <td>
                                        <span class="text-red-500"><i
                                                class="fas fa-arrow-down"></i>65%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">4</th>
                                    <td>
                                        <button
                                            class="bg-blue-500 hover:bg-blue-800 text-white font-light py-1 px-2 rounded-full">
                                            Microsoft
                                        </button>
                                    </td>
                                    <td>10000</td>
                                    <td>3000</td>
                                    <td>
                                        <span class="text-green-500"><i
                                                class="fas fa-arrow-up"></i>65%</span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /card -->

            </div>
            <!-- /Cards Section Ends Here -->

            <!-- Progress Bar -->
            <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 mt-2">
                <div class="rounded overflow-hidden shadow bg-white mx-2 w-full pt-2">
                    <div class="px-6 py-2 border-b border-light-grey">
                        <div class="font-bold text-xl">Progress Among Projects</div>
                    </div>
                    <div class="">
                        <div class="w-full">

                            <div class="shadow w-full bg-grey-light">
                                <div class="bg-blue-500 text-xs leading-none py-1 text-center text-white"
                                    style="width: 45%">45%
                                </div>
                            </div>


                            <div class="shadow w-full bg-grey-light mt-2">
                                <div class="bg-teal-500 text-xs leading-none py-1 text-center text-white"
                                    style="width: 55%">55%
                                </div>
                            </div>


                            <div class="shadow w-full bg-grey-light mt-2">
                                <div class="bg-orange-500 text-xs leading-none py-1 text-center text-white"
                                    style="width: 65%">65%
                                </div>
                            </div>


                            <div class="shadow w-full bg-grey-300 mt-2">
                                <div class="bg-red-800 text-xs leading-none py-1 text-center text-white"
                                    style="width: 75%">75%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-10">
                <div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="zoul in users" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ zoul.id }} 
                                </th>
                                <td class="px-6 py-4">
                                    {{ zoul.name }} 
                                </td>
                                <td class="px-6 py-4">
                                    {{ zoul.email }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    
                                    <button @click="userDelete(zoul.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            
        </div>    
    </main>
    <!--/Main-->
</div>
<!--Footer-->
<footer class="bg-grey-darkest text-white p-2">
    <div class="flex flex-1 mx-auto">&copy; 2021</div>
    <div class="flex flex-1 mx-auto">Distributed by: <a href="https://therichpost.com/"
            target=" _blank">Jassa</a></div>
</footer>
<!--/footer-->
</template>