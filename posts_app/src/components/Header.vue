<template>
    <header class="bg-gray-100 w-full">
        <nav class="mx-auto flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex focus:bg-lime-300 hover:bg-lime-300 rounded-full p-4">
                <router-link to="/" class="-m-1.5 p-1.5">
                    <span class="sr-only">Posts</span>
                    <div class="h-12 w-12 rounded-full">
                        <RouteIcon class="h-12 w-12 rounded" />
                    </div>
                </router-link>
            </div>
            <div class="flex space-x-4">
                <div class="flex focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4">
                    <router-link :to="{ name: 'posts'}" class="text-sm/6 font-semibold text-gray-900">Postagens <span
                            aria-hidden="true">&rarr;</span></router-link>
                </div>
            </div>
            <div class="flex space-x-4">
                <div v-if="!store.isLoggedIn" class="flex focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4">
                    <router-link :to="{name : 'login'}" class="text-sm/6 font-semibold text-gray-900">Log in <span
                            aria-hidden="true">&rarr;</span></router-link>
                </div>
                <div v-if="!store.isLoggedIn" class="flex focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4">
                    <router-link :to="{name: 'register'}" class="text-sm/6 font-semibold text-gray-900">Register <span
                            aria-hidden="true">&rarr;</span></router-link>
                </div>
                <div v-if="store.isLoggedIn"class="flex focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4">
                    <button @click="logout" class="text-sm/6 font-semibold text-gray-900">Log out <span
                            aria-hidden="true">&rarr;</span></button>
                </div>
            </div>
        </nav>
    </header>
</template>

<script setup>
import RouteIcon from './icons/IconRoute.vue'
import { useAuthStore } from '@/store/auth';
import { useRouter} from "vue-router"

const store = useAuthStore();
const router = useRouter();

const logout = async () => {
    await store.handleLogout()
    router.push({name: 'login'})
}

</script>