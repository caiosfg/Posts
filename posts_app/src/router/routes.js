import PostsPages from "@/pages/PostsPages.vue";
import LoginPage from "@/pages/LoginPage.vue";
import RegisterPage from "@/pages/RegisterPage.vue";
import CommentsPage from "@/pages/Comments.vue"
import Index from "@/pages/Index.vue";

const routes = [
    {
        path: "/",
        component: Index,
        name: 'home'
    },
    {
        path: "/posts",
        component: PostsPages,
        name: 'posts'
    },
    {
        path: "/login",
        component: LoginPage,
        name: 'login'
    },
    {
        path: "/register",
        component: RegisterPage,
        name: 'register'
    },
    {
        path: "/comments",
        component: CommentsPage,
        name: 'comments'
    }
]


export default routes