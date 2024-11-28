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
                <RouterLink to="/Dashboard"
                    class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                    <i class="far fa-file float-left mx-2"></i>
                    Users
                    <span><i class="fa fa-angle-down float-right"></i></span>
                </RouterLink>
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

        <main class="bg-white-300 flex-1 p-3 overflow-hidden">
            <div class="max-w-1x1">
        <div class="grid grid-cols-3 gap-3 mt-10">
            <div v-for="com in comment" :key="com.id" class="w-72 h-40 flex flex-col justify-center gap-2 bg-white rounded-lg shadow p-2">
                <div class="flex gap-2">
                    <img :src="com.image_url" alt="" class="bg-purple-200 w-24 h-24 shrink-0 rounded-lg" />
                    <div class="flex flex-col">
                        <a href="" class="font-bold italic text-sky-500">{{  com.title_url  }}</a>
                        <p class="line-clamp-3">
                            {{ com.commentaire_contenu }}
                        </p>
                    </div>
                </div>
                <div class="ml-5">
                    <i class="fa-regular fa-thumbs-up w-5 h-5 mr-1" id="heart"></i>
                    <span class="mr-5 text-blue-950" id="counter"></span>
                    <i class="fa-regular fa-thumbs-down w-5 h-5 mr-1"></i>
                    <span class="mr-20">{{ com.dislikes }}</span>
                    <i class="fa-regular fa-bookmark w-5 h-5"></i>
                    <RouterLink :to="{name : 'CommentaireId', params: {id: com.id}}" class="text-zinc-600 underline">Voir</RouterLink>
                </div>
            </div>

        </div>
    </div>
        </main>
    </div>
     
</template>

<script>
    import  DashAdmin  from "@/components/DashAdmin.vue";
import { RouterLink } from "vue-router";
    export default {
        component: {
            DashAdmin,
        },

        data(){
        return {
            comment: [],
            linkPreview: null,
        }
        },
        mounted() {
            this.listeComment();
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
            listeComment(){
            fetch(`http://127.0.0.1:8000/api/commentaire`)
            .then(reponse => reponse.json())
            .then(data => {
                this.comment = data;
                console.log(data);
            })
            .catch(err => console.log(err.message))
            }
    },
        
    }
        
    
</script>

