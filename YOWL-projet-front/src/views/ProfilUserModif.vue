<template>
    <h1>Modifier le commentaire</h1>

    <form @submit.prevent class="max-w-sm mx-auto">
        <div>
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Lien</label>
            <input v-model="comId.commentaire_lien" @blur="LinkPreview" type="text" id="small-input"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div v-if="linkPreview">
            <img :src="linkPreview.image" alt="Aperçu de l'image" class="w-full h-auto mt-4">
            <p>{{ linkPreview.title }}</p>
        </div>
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Commentaire</label>
        <textarea v-model="comId.title_url" id="message" rows="4"
            class="hidden block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Laissez un commentaire..."></textarea>
            <textarea v-model="comId.image_url" id="message" rows="4"
            class="hidden block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Laissez un commentaire..."></textarea>
            <textarea v-model="comId.commentaire_contenu" id="message" rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Laissez un commentaire..."></textarea>
        
    
        <button @click="UpdateComment" type="submit"
            style="box-shadow: inset 0 2px 4px 0 rgb(2 6 23 / 0.3), inset 0 -2px 4px 0 rgb(203 213 225);"
            class="inline-flex cursor-pointer items-center gap-1 rounded border border-slate-300 bg-gradient-to-b from-slate-50 to-slate-200 px-4 py-2 font-semibold hover:opacity-90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-300 focus-visible:ring-offset-2 active:opacity-100">
            Modifier
        </button>
    </form>
</template>

<script>
export default {
    data() {
        return {
            id: this.$route.params.id,
            comId: {
                commentaire_contenu: '',
                commentaire_lien: '',
                image_url: '',
                title_url: '',
                users_id:''
            },
            linkPreview: null,
        }
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


        CommentaireId() {
            fetch(`http://127.0.0.1:8000/api/commentaire/` + this.id)
                .then(reponse => reponse.json())
                .then(data => {
                    this.comId = data
                })
                .catch(err => console.log(err.message))
        },

        UpdateComment() {
            const requestOptions = {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    commentaire_lien: this.comId.commentaire_lien,
                    commentaire_contenu: this.comId.commentaire_contenu,
                    users_id: this.comId.users_id   ,
                    image_url: this.comId.image_url,
                    title_url: this.comId.title_url
                })
            }

            fetch(`http://127.0.0.1:8000/api/commentaire/` + this.id, requestOptions)
                .then(reponse => {
                    if (reponse.ok) {
                        return reponse.json()
                    } else {
                        throw new Error("Something went wrong")
                    }
                })
                .then(data => (this.comId = data))

                .catch(error => console.error('Error:', error));
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


    },

    mounted() {
        this.CommentaireId();
    },

    
}
</script>