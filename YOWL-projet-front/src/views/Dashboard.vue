<template>
    <!--Container -->
    <div class="mx-auto bg-grey-400">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <DashAdmin />
            <!--Header Section Starts Here-->
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
            <!--/Header-->

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
                            <a href="/Dashcommt"
                                class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="far fa-file float-left mx-2"></i>
                                Commentaire
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
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                            <div
                                class="shadow-lg bg-[#FF4500] border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
                                <div class="p-4 flex flex-col">
                                    <a href="#" class="no-underline text-white text-2xl">
                                        $244
                                    </a>
                                    <a href="#" class="no-underline text-white text-lg">
                                        like
                                    </a>
                                </div>
                            </div>

                            <div
                                class="shadow bg-[#22d3ee] border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                                <div class="p-4 flex flex-col">
                                    <a href="#" class="no-underline text-white text-2xl">
                                        {{ comment.length }}
                                    </a>
                                    <a href="#" class="no-underline text-white text-lg">
                                       Total Comments
                                    </a>
                                </div>
                            </div>

                            <div
                                class="shadow bg-[#22d3ee] border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                                <div class="p-4 flex flex-col">
                                    <a href="#" class="no-underline text-white text-2xl">
                                       $410 
                                    </a>
                                    <a href="#" class="no-underline text-white text-lg">
                                        dislikes
                                    </a>
                                </div>
                            </div>

                            <div
                                class="shadow bg-[#fbbf24] border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
                                <div class="p-4 flex flex-col">
                                    <a href="#" class="no-underline text-white text-2xl">
                                        {{ users.length }}
                                    </a>
                                    <a href="#" class="no-underline text-white text-lg">
                                        Total Users
                                    </a>
                                </div>
                            </div>

                            <div
                                class="shadow bg-[#22c55e] border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
                                <div class="p-4 flex flex-col">
                                    <a href="#" class="no-underline text-white text-2xl">
                                        500
                                    </a>
                                    <a href="#" class="no-underline text-white text-lg">
                                        Total Products
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- /Stats Row Ends Here -->

                        <!-- Card Sextion Starts Here -->
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                            <!-- card -->

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

            <!--Footer-->
            <!-- <footer class="bg-grey-darkest text-white p-2">
                <div class="flex flex-1 mx-auto">&copy; 2021</div>
                <div class="flex flex-1 mx-auto">Distributed by: <a href="https://therichpost.com/"
                        target=" _blank">Jassa</a></div>
            </footer> -->
            <!--/footer-->
        </div>
    </div>
</div>

</template>
<script>
import  DashAdmin  from "@/components/DashAdmin.vue";
import { comment } from "postcss";
export default {
    component: {
        DashAdmin,
    },
    data() {
        return {
            users: [],
            comment:[]
        }
    },
    mounted() {
        fetch("http://127.0.0.1:8000/api/users").then(response => response.json()).then(dat => {
            this.users = dat.data
            console.log(this.users);
        }),

        this.listeComment()
        
    },
    

    methods: {
        sidebarToggle() {
            var sidebar = document.getElementById('sidebar');

            if (sidebar.style.display === "none") {
                sidebar.style.display = "block";
            } else {
                sidebar.style.display = "none";
            }
        },
        profileToggle() {
            var profileDropdown = document.getElementById('ProfileDropDown');
            if (profileDropdown.style.display === "block") {
                profileDropdown.style.display = "none";
            } else {
                profileDropdown.style.display = "block";
            }
        },
        userDelete(event) {
        fetch(`http://127.0.0.1:8000/api/users/${event}`,{
            method : 'DELETE',
        })
        .then(response => response.json())
        .then(data => console.log(data))
    },
    listeComment(){
            fetch(`http://127.0.0.1:8000/api/commentaire`)
            .then(reponse => reponse.json())
            .then(data => {
                this.comment = data;
                console.log(data);
            })
            .catch(err => console.log(err.message))
            }
    }
}
</script>