import { createRouter, createWebHashHistory } from 'vue-router'
import routes from "./routes"
import { useAuthStore } from "../store/auth"

const router = createRouter({
    routes,
    history: createWebHashHistory(),
})

// router.beforeEach(async (to, from) => {
//     const store = useAuthStore()
//     if (!store.isLoggedIn) {
//         return {
//             name: "login",
//             query: {
//                 redirect: to.fullPath
//             }
//         }
//     } else if (store.isLoggedIn) {
//         return { name: 'posts' }
//     }
// })

export default router

