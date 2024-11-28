<template>

    <Header />

    <h1>Un nouveau commentaire</h1>

    <form @submit.prevent class="max-w-sm mx-auto">
        <div>
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Lien</label>
            <input v-model="commentaire_lien" @blur="LinkPreview" type="text" id="small-input"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div v-if="linkPreview">
            <img :src="linkPreview.image" alt="Aperçu de l'image" class="w-full h-auto mt-4">
            <p>{{ linkPreview.title }}</p>
        </div>
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Commentaire</label>
        <textarea v-model="commentaire_contenu" id="message" rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Laissez un commentaire..."></textarea>
        <!-- 
        <button type="submit"
            class="cursor-pointer w-44 h-12 bg-blue-600 text-white rounded-lg hover:bg-blue-700 hover:shadow-lg transition-all group active:w-11 active:h-11 active:rounded-full active:duration-300 ease-in-out">
            <span class="group-active:hidden">Poster</span>
        </button> -->
        <button @click="CreerCom"
            style="box-shadow: inset 0 2px 4px 0 rgb(2 6 23 / 0.3), inset 0 -2px 4px 0 rgb(203 213 225);"
            class="inline-flex cursor-pointer items-center gap-1 rounded border border-slate-300 bg-gradient-to-b from-slate-50 to-slate-200 px-4 py-2 font-semibold hover:opacity-90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-300 focus-visible:ring-offset-2 active:opacity-100">
            Poster
        </button>

    </form>
</template>

<script>
import Header from '@/components/Header.vue';

export default {

    components: {
        Header
    },

    data() {
        return {
            user: {},
            commentaire_lien: '',
            commentaire_contenu: '',
            linkPreview: null,
        };
    },
    mounted() {


    },

    created() {
        this.fetchProfile();
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
                console.log(this.user);
            } catch (error) {
                alert(error.message);
            }
        },

        CreerCom() {
            if (!this.commentaire_lien || !this.commentaire_contenu) {
                alert("Tous les champs sont obligatoires.");
                return;
            }

            const requestOptions = {
                method: "POST",
                headers: { 
                    "Content-Type": "application/json",
                    // 'Authorization': 'Bearer ' + token,
                 },
                body: JSON.stringify({
                    commentaire_lien: this.commentaire_lien,
                    commentaire_contenu: this.commentaire_contenu,
                    users_id: this.user.id,
                    image_url: this.linkPreview ? this.linkPreview.image : '',
                    title_url: this.linkPreview ? this.linkPreview.title : '',
                })
            };

            fetch(`http://127.0.0.1:8000/api/commentaire`, requestOptions)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur lors de l\'envoi du commentaire');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Success:', data);

                    this.commentaire_lien = '';
                    this.commentaire_contenu = '';
                    this.linkPreview = null;

                    alert('Commentaire créé avec succès !');
                    this.$router.push({name: 'ListeCommentaire'})

                })
                .catch(error => {
                    console.error('Error:', error);

                });
        },

        LinkPreview() {
            if (this.commentaire_lien) {
                fetch(`https://api.linkpreview.net/?key=36d706063950a2fa58a56b8da98e2c72&q=${this.commentaire_lien}`)
                    .then(response => response.json())
                    .then(data => {
                        this.linkPreview = data;
                    })
                    .catch(error => console.error('Error fetching link preview:', error));
            }
        }
    }
};
</script>
