import { defineStore } from 'pinia'
import { computed, ref } from 'vue';
import { getUser, login, logout, register } from '@/http/v2/auth-api';

export const useAuthStore = defineStore("authStore", () => {
    const user = ref(null)

    const isLoggedIn =  computed(() => !! user.value);
    const me =  computed(() => user.value);

    const fetchUser = async () => {
        try {
            const { data } = await getUser()
            user.value = data
        } catch (error) {
            user.value = null
        }

    }

    const handleLogin = async (credentials) => {
        try {
            const { data } = await login(credentials)
            user.value = data
        } catch (error) {
            user.value = null
        }

    }

    const handleRegister = async (newUser) => {
        try {
            await register(newUser)
            await handleLogin({
                email: newUser.email,
                password: newUser.password
            })

        } catch (error) {
            console.log("🚀 ~ handleRegister ~ error:", error)
        }
    }

    const handleLogout = async () => {
        await logout()
        user.value = null
    }

    return {
        user,
        isLoggedIn,
        fetchUser,
        handleLogin,
        handleRegister,
        handleLogout
    }
})