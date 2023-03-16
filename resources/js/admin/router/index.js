import { createRouter, createWebHistory } from "vue-router";
import store from "../store";
import dashboard from "../views/dashboard.vue";
import users from "../views/users.vue";
import login from "../views/login.vue";
let admin = "/admin/";
const routes = [
    {
        path: admin + "/",
        redirect: admin + "users",
        meta: { RequiresAuth: true },
        name: "adminDashboard",
        component: dashboard,
        children: [
            { path: admin + "users", name: "adminUsers", component: users },
        ],
    },
    {
        path: admin + "login",
        component: login,
        meta: { RequiresGuest: true },
        name: "adminlogin",
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.RequiresAuth && !store.state.user.token) {
        next({ name: "adminlogin" });
    } else if (store.state.user.token && to.meta.RequiresGuest) {
        next({ name: "adminDashboard" });
    } else {
        next();
    }
});

export default router;
