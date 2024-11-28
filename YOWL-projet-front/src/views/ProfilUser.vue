<template>
    <div class="text-red">
        Profil
    </div>
    <div v-if="filtreComment.length">
        <div v-for="pro in filtreComment" :key="pro.id">
            <!-- <p>{{ pro.user_name }}</p> -->
            <p>{{ pro.users_id }}</p>
            <div
                class="w-72 bg-white rounded-b-lg border-t-8 border-green-400 px-4 py-5 flex flex-col justify-around shadow-md">
                <p class="text-lg font-bold font-sans">{{ pro.commentaire_lien }}</p>
                <div class="py-3">
                    <p class="text-gray-400 text-sm">
                        {{ pro.commentaire_contenu }}
                    </p>
                </div>
                <div class="flex justify-between">
                    <i class="fa-regular fa-thumbs-up w-5 h-5 mr-1"></i>
                    <span class="mr-5 text-blue-950">{{ pro.likes }}</span>
                    <div class="text-sm flex gap-2">
                        <RouterLink :to="{name: 'ProfilUserModif', params: {id: pro.id}}">
                        <button class="bg-slate-200 px-2 rounded-xl hover:bg-green-400 transition-colors ease-in-out">
                            modifier
                        </button></RouterLink>
                        <button @click="delComment(pro.id)" class="bg-slate-200 px-2 rounded-xl hover:bg-red-400 transition-colors ease-in-out">
                            supprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <p>Aucun commentaire</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            id: this.$route.params.id,
            user: {
                id: '1',
                name: 'Stone_Tillman'
            },
            comment: [],
        }
    },

    computed: {
        filtreComment() {
            return this.comment.filter(pro => pro.users_id === this.user.id)
        }
    },

    mounted() {
        this.listeComment();
    },

    methods: {
        listeComment() {
            fetch(`http://127.0.0.1:8000/api/commentaire`)
                .then(reponse => reponse.json())
                .then(data => {
                    this.comment = data;
                })
                .catch(err => console.log(err.message))
        },

        delComment(id){
            fetch(`http://127.0.0.1:8000/api/commentaire/` + id, {method: 'DELETE'})
                .then(reponse => reponse.json())
        }

    },



}
</script>