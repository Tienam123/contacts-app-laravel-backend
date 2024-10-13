import {createRouter,createWebHistory} from "vue-router";
import AboutPage from "../pages/AboutPage.vue";
import HomePage from "../pages/HomePage.vue";
import BlogPage from "../pages/BlogPage.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes:[
        {
            path:'/',
            component:()=>import('../pages/HomePage.vue'),
        },
        {
            path:'/about',
            component:()=>import('../pages/AboutPage.vue'),
        },
        {
            path:'/blog',
            component:()=>import('../pages/BlogPage.vue'),
        }
    ]
})


export default router;
