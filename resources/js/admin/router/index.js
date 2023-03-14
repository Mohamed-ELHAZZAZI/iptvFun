import { createRouter, createWebHistory } from "vue-router";
import dashboard from "../views/dashboard.vue";
import users from "../views/users.vue";
let admin = "/admin/";
const routes = [
    {
        path: admin + "dashboard",
        component: dashboard,
        name: "adminDashboard",
    },
    {
        path: admin + "users",
        component: users,
        name: "adminUsers",
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
