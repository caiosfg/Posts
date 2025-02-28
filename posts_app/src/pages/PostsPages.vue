<template>
    <div class="bg-black h-screen">
        <div class="mx-auto p-12 flex flex-col items-center justify-center">
            <div v-if="createPost" class="w-1/2">
                <CreatePost @publish="submitBtn($event)" @cancel="toggleCancel()" />
            </div>
            <div v-else class="w-full flex flex-col items-center justify-center overflow-y-scroll space-y-6" :class="{'pt-4': posts.length > 2, 'posts': posts.length >= 1}">
                <div class="w-1/2" v-for="post in posts" :key="post.id">
                    <div>
                        <Post :post-file="post" @refresh="getAllPosts()" />
                    </div>
                </div>
            </div>
            <div v-if="!createPost && user && user.isLoggedIn" class="w-1/2">
                <button @click="createPost = true"
                    class="flex items-center justify-center w-full bg-lime-100 focus:bg-lime-200 hover:bg-lime-300 rounded p-4 mt-4 font-bold">
                    Adicione um post
                </button>
            </div>
            <div v-else class="w-1/2 flex items-center justify-center">
                <h3 class="text-white text-3xl font-bold">Realize o login</h3>
            </div>
        </div>
    </div>
</template>

<script>
import Post from '../components/Post.vue'
import CreatePost from '../components/CreatePost.vue'
import { allPosts, createPosts } from '@/http/posts-api'
import { useAuthStore } from '@/store/auth';


export default {
    components: {
        Post,
        CreatePost
    },
    data() {
        return {
            posts: [],
            createPost: false,
        };
    },
    async mounted() {
        this.getAllPosts()
    },
    computed: {
        user() {
            const store = useAuthStore();
            return store
        }
    },
    methods: {
        async submitBtn(event) {
            const { title, description } = event

            console.log(this.user.user)

            const data = await createPosts({
                name: title,
                description: description,
                read: false,
                user_id: this.user.user.id
            });

            if(data.status === 201) {
                await this.getAllPosts();
                this.createPost = false;
            }

            console.log('data', data);
        },
        toggleCancel() {
            this.createPost = false;
        },
        async getAllPosts() {
            const { data } = await allPosts()
            this.posts = data?.data
        }
    }
}

</script>

<style scoped>
.posts {
    height: 80vh;
}
</style>