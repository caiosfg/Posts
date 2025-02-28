<template>
    <div class="bg-black h-screen">
        <div class="mx-auto p-12 flex flex-col items-center justify-center">
            <div class="w-1/2">
                <div>
                    <Post />
                </div>
                <div class="bg-white rounded-b-lg p-4">
                    <input type="text" placeholder="comente....." class="p-2 w-full">
                </div>
            </div>
            <div class="w-1/2">
                <button class="flex items-center justify-center w-full focus:bg-lime-200 hover:bg-lime-300 rounded p-4 mt-4 font-bold">
                    Adicione um post
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import Post from '../components/Post.vue'

export default {
    components: {
        Post
    }
    // ...
}

</script>