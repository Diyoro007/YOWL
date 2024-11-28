import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { createWebHistory, createRouter } from "vue-router";
import Dashboard from "@/views/Dashboard.vue";
import Login from "@/components/Login.vue";
import Register from "@/components/Register.vue";

const app = createApp(App)

app.use(router)

app.mount('#app')
