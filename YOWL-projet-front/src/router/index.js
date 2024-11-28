import { createRouter, createWebHistory } from 'vue-router'
import ListeCommentaire from '../views/ListeCommentaire.vue'
import LoginView from '../views/LoginView.vue'
import ProfileView from '../views/ProfileView.vue'
import Dashboard from '@/views/Dashboard.vue'
import Dashcommt from '@/views/Dashcommt.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'ListeCommentaire',
      component: ListeCommentaire,
      meta: {
        authRequired: 'true',
      },
    },

    {
      path: '/CommentaireId/:id',
      name: 'CommentaireId',
      component: () => import('../views/CommentaireId.vue'),
      meta: {
        authRequired: 'true',
      },
    },

    {
      path: '/Commenter',
      name: 'Commenter',
      component: () => import('../views/Commenter.vue'),
      meta: {
        authRequired: 'true',
      },
    },

    {
      path: '/ProfilUser/:id',
      name: 'ProfilUser',
      component: () => import('../views/ProfilUser.vue'),
      meta: {
        authRequired: 'true',
      },
    },

    {
      path: '/ProfilUserModif/:id',
      name: 'ProfilUserModif',
      component: () => import('../views/ProfilUserModif.vue'),
      meta: {
        authRequired: 'true',
      },
    },
    
    {
      path: '/Register',
      name: 'RegisterView',
      component: () => import('../views/RegisterView.vue')
    },

    {
      path: '/Dashboard',
      name: 'Dashboard',
      component: Dashboard,
      meta: {
        authRequired: true,
        adminRequired: true,
      }

    },

    {
      path: '/Dashcommt',
      name: 'Dashcommt',
      component: Dashcommt,
      meta: {
        authRequired: true,
        adminRequired: true,
      }
    },
    
    
    {
      path: '/Login',
      name: 'LoginView',
      component: LoginView
    },

    {
      path: '/Profile',
      name: 'Profile',
      component: ProfileView,
      meta: {
        authRequired: 'true',
      },
    },

    {
      path: '/Acceuil',
      name: 'AcceuilView',
      component: () => import('../views/AcceuilView.vue')
    },

  ],

})

router.beforeEach(async (to, from, next) => {
  if (to.meta.authRequired) {
    const token = localStorage.getItem('token');

    if (token) {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/profile', {
          headers: new Headers({
            'Authorization': 'Bearer ' + token,
            'Content-Type': 'application/json',
          }),
        });
        const data = await response.json();
        const statut = data.data.id;
        const role = data.data.role; 

        if (statut) {
          if (to.meta.adminRequired && role !== 'admin') {
            next({ name: 'Profile' }); 
          } else {
            next();
          }
        } else {
          next({ name: 'AcceuilView' });
        }
      } catch (error) {
        console.error('Error fetching profile:', error);
        next({ name: 'AcceuilView' });
      }
    } else {
      next({ name: 'AcceuilView' });
    }
  } else {
    next();
  }
});

export default router

