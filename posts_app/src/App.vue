<script>
import PostPage from '../src/pages/PostsPages.vue'

export default {
    components: {
      PostPage
    }
}
</script>

<template>
  <div class="h-full w-full flex flex-col justify-between">
    <header-app />
    <main class="h-full">
      <PostPage />
    </main>
  </div>
</template>

<style scoped>
</style>
