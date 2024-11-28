<template>
    <header class="border-2">
      <nav class="flex items-center justify-between flex-wrap bg-white p-10 ">
        <RouterLink to="/">
        <img src="../assets/1-removebg-preview.png" style="width: 80px;" class=" mr-10"></RouterLink>
        <form class="form relative ml-10"> 
          <button class="absolute left-2 -translate-y-1/2 top-1/2 p-1">
            <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search"
              class="w-5 h-5 text-gray-700">
              <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </button>
          <input
            class="input rounded-full px-8 py-3 border-2 border-transparent focus:outline-none focus:border-blue-500 placeholder-gray-400 transition-all duration-300 shadow-md"
            placeholder="Search..." required="" type="text" />
          <button type="reset" class="absolute right-3 -translate-y-1/2 top-1/2 p-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </form>
  
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
          <div class="text-sm lg:flex-grow pl-10 ml-20"> <!-- Ajouter une marge à gauche -->
            <RouterLink to="/Commenter">
              <button
                class="relative px-8 py-2 rounded-md bg-white isolation-auto z-10 border-2 border-cyan-700 before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full hover:text-white before:-right-full before:hover:right-0 before:rounded-full before:bg-[#28ABBD] before:-z-10 before:aspect-square before:hover:scale-150 overflow-hidden before:hover:duration-700 inline-flex items-center justify-center px-4 py-3 text-sm font-semibold text-black bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                Commenter
              </button>
            </RouterLink>
          </div>
          <div class="mr-10 w-24">
            <a class="hover:text-cyan-600 hover:font-bold">
              A propos
            </a>
          </div>
  
          <div class="mr-10 w-24">
            <button @click="logout" class="hover:text-cyan-600 hover:font-bold">
              Déconnexion
            </button>
          </div>
  
          <div>
            <RouterLink :to="{name: 'Profile', params: {id: 1}}" >
            <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
              <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                </path>
              </svg>
            </div>
          </RouterLink>
          </div>
        </div>
      </nav>
    </header>
  
    <RouterView />
  </template>
  
  <script setup>
  import { RouterLink, RouterView } from 'vue-router';
  
  
  // data(){
  //   return {
      
  //   }
  // }
  </script>
  
  <script>
  export default {
    data() {
      return{
        user: null,
      }
    },

    methods: {
      logout() {
        
        localStorage.removeItem("token");
        // window.localStorage.clear();
        
        this.$router.push('/login'); 
      }
    }

  }
  </script>
  