<template>
    <Header />

    <RouterLink to="/"
      class="bg-[#292929] border-2 border-[#3e3e3e] rounded-lg text-white px-6 py-3 text-base hover:border-[#fff] cursor-pointer transition mt-10">
      Retour
    </RouterLink>
    <div class="flex flex-row min-h-screen justify-center items-center">
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg" :src="comId.image_url" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ comId.title_url
                        }}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-4">{{ comId.commentaire_contenu
                    }}</p> <br>

                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-4">{{ comId.commentaire_lien }}
                </p>


            </div>
        </div>
    </div>
</template>


<script>
import Header from '@/components/Header.vue';

export default {

    components: {
        Header
    },

    data() {
        return {
            id: this.$route.params.id,
            comId: {
                commentaire_contenu: '',
                commentaire_lien: '',
                // user_name: '',
                likes: '',
                dislikes: '',
                image_url: '',
                title_url: ''
            }
        }
    },

    methods: {
        CommentaireId() {
            fetch(`http://127.0.0.1:8000/api/commentaire/` + this.id)
                .then(reponse => reponse.json())
                .then(data => {
                    this.comId = data
                })
                .catch(err => console.log(err.message))
        }
    },

    mounted() {
        this.CommentaireId();
    }
}
</script>