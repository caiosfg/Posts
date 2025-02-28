<template>
    <div class="flex h-full w-full items-center justify-center">
        <form class="m-auto w-2/5 mt-8 border p-6 rounded border-lime-400 shadow shadow-lime-600" @submit="handleSubmit()">
            <div class="flex items-center justify-center">
                <div class="animate-pulse bg-lime-600 p-4 rounded-full w-24 h-24 relative" />    
                <img src="../assets/images/posticon.png" class="w-14 h-14 absolute" alt="post page" >
            </div>
            <div class="mb-5">
                <h3 class="text-3xl font-bold text-lime-700 mb-4 animate-pulse">Cadastre-se agora !</h3>
                <label for="email" class="block mb-2 text-sm font-bold text-lime-900">Email</label>
                <input type="email" id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5"
                    placeholder="name@postit.com" v-model="form.email" required />
            </div>
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-bold text-lime-900">Nome</label>
                <input type="name" id="password" v-model="form.name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5"
                    required />
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-bold text-lime-900">Password</label>
                <input type="password" id="password" v-model="form.password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5"
                    required />
            </div>
            <button type="submit"
                class="text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
    </div>
</template>

<script setup>
import { reactive } from "vue";
import { useRouter } from "vue-router";
import { useAuthStore } from "../store/auth"

const router = useRouter()
const store = useAuthStore()

const form = reactive({
    email: '',
    name: '',
    password: ''
})

const handleSubmit = async () => {  
    const data = await store.handleRegister(form)
    if(store.isLoggedIn){
        router.push({ name: 'posts'})
    }

}
</script>