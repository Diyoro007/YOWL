<template>
  <div>
    <RouterLink to="/"
      class="bg-[#292929] border-2 border-[#3e3e3e] rounded-lg text-white px-6 py-3 text-base hover:border-[#fff] cursor-pointer transition">
      Retour
    </RouterLink>

    <h2 class="mt-10">Profile</h2>
    <p>Name: {{ user.name }}</p>
    <p>Email: {{ user.email }}</p>
    <!-- <router-link :to="'/users/' + user.id">Edit Profile</router-link> -->
  </div>

  <div>
    <div v-if="filtreCommentUser.length">
      <div v-for="pro in filtreCommentUser" :key="pro.id">
        <!-- <p>{{ pro.user_name }}</p> -->
        <!-- <p>{{ pro.users_id }}</p> -->
        <div
          class="w-72 bg-white rounded-b-lg border-t-8 border-green-400 px-4 py-5 flex flex-col justify-around shadow-md">
          <p class="text-lg font-bold font-sans">{{ pro.commentaire_lien }}</p>
          <div class="py-3">
            <p class="text-gray-400 text-sm overflow-auto text-wrapp">
              {{ pro.commentaire_contenu }}
            </p>
          </div>
          <div class="flex justify-between">
            <i class="fa-regular fa-thumbs-up w-5 h-5 mr-1"></i>
            <span class="mr-5 text-blue-950">{{ pro.likes }}</span>
            <div class="text-sm flex gap-2">
              <RouterLink :to="{ name: 'ProfilUserModif', params: { id: pro.id } }">
                <button class="bg-slate-200 px-2 rounded-xl hover:bg-green-400 transition-colors ease-in-out">
                  modifier
                </button>
              </RouterLink>
              <button @click="delComment(pro.id)"
                class="bg-slate-200 px-2 rounded-xl hover:bg-red-400 transition-colors ease-in-out">
                supprimer
              </button>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { RouterLink } from 'vue-router';

export default {
  data() {
    return {
      // id: this.$router.params.id,
      comment: [],
      user: {}
    };
  },

  created() {
    this.fetchProfile();
  },

  computed: {
    filtreCommentUser() {
      return this.comment.filter(pro => pro.users_id === this.user.id)
      // console.log(this.comment.filter);
    }
  },

  mounted() {
    this.CommentairesUser()
  },

  methods: {
    async fetchProfile() {
      try {
        const token = localStorage.getItem('token');
        if (!token) {
          throw new Error('Token not found');
        }

        const response = await fetch('http://127.0.0.1:8000/api/profile', {
          method: 'GET',
          headers: {
            'Authorization': `Bearer ${token}`
          }
        });

        if (!response.ok) {
          throw new Error('Failed to fetch profile');
        }

        const responseData = await response.json();
        this.user = responseData.data;
      } catch (error) {
        alert(error.message);
      }
    },

    CommentairesUser() {
      fetch(`http://127.0.0.1:8000/api/commentaire`)
        .then(reponse => reponse.json())
        .then(data => {
          this.comment = data;
        })
        .catch(err => console.log(err.message))
    },

    delComment(id) {
      fetch(`http://127.0.0.1:8000/api/commentaire/` + id, { method: 'DELETE' })
        .then(reponse => reponse.json())
    }
  }
};
</script>