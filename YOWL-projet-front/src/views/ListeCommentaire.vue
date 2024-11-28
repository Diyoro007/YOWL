<template>

    <Header />

    <div class="max-w-2x1">
        <div class="grid grid-cols-4 gap-4 mt-10">



            <div v-for="com in comment" :key="com.id"
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" :src="com.image_url" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{  com.title_url  }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-4">{{ com.commentaire_contenu }}</p>
                    <RouterLink :to="{name : 'CommentaireId', params: {id: com.id}}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Voir plus
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </RouterLink>
                </div>
            </div>


<!-- 
            <div v-for="com in comment" :key="com.id" class="w-72 h-40 flex flex-col justify-center gap-2 bg-white rounded-lg shadow p-2">
                <div class="flex gap-2">
                    <img :src="com.image_url" alt="" class="bg-purple-200 w-24 h-24 shrink-0 rounded-lg" />
                    <div class="flex flex-col">
                        <a href="" class="font-bold italic text-sky-500">{{  com.titre_url  }}</a>
                        <a href="" class="font-bold italic text-sky-500 line-clamp-2">{{  com.title_url  }}</a>
                        <p class="line-clamp-3">
                            {{ com.commentaire_contenu }}
                        </p>
                    </div>
                </div>
                <div class="ml-5">
                    <i class="fa-regular fa-thumbs-up w-5 h-5 mr-1"></i>
                    <span class="mr-5 text-blue-950">{{ com.likes }}</span>
                    <i class="fa-regular fa-thumbs-down w-5 h-5 mr-1"></i>
                    <span class="mr-20">{{ com.dislikes }}</span>
                    <i class="fa-regular fa-bookmark w-5 h-5"></i>
                    <RouterLink :to="{name : 'CommentaireId', params: {id: com.commentaire_id}}" class="text-zinc-600 underline">Voir</RouterLink>
                </div>
            </div>
                    <i class="fa-regular fa-thumbs-up w-5 h-5 mr-1" id="heart"></i>
                    <span class="mr-5 text-blue-950" id="counter"></span>
                    <i class="fa-regular fa-thumbs-down w-5 h-5 mr-1"></i>
                    <span class="mr-20">{{ com.dislikes }}</span>
                    <i class="fa-regular fa-bookmark w-5 h-5"></i>
                    <RouterLink :to="{name : 'CommentaireId', params: {id: com.id}}" class="text-zinc-600 underline">Voir</RouterLink>
                </div>
            </div> -->

        </div>
    </div>
</template>

<script>
import { RouterLink } from 'vue-router';
import Header from '../components/Header.vue';


// import ListeCommentaire from '../components/ListeCommentaire.vue';
export default {
    components: {
        Header,
    },

    data() {
        return {
            comment: [],
            linkPreview: null,
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
                    this.comment = data.reverse();
                })
                .catch(err => console.log(err.message))
        },
    },

}

</script>
