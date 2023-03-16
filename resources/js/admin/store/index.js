import axiosClient from "../axios.js";
import { createStore } from "vuex";
import { useRoute, useRouter } from "vue-router";

const store = createStore({
    strict: true,
    state: {
        user: {
            info: [],
            token: localStorage.getItem("user-token"),
        },
    },
    getters: {},
    actions: {
        login({ state, commit }, data) {
            return axiosClient.post("/admin-login", data).then((res) => {
                if (res.data.success) {
                    commit("setUserData", res.data.user);
                    commit("setUserToken", res.data.token);
                }
                return res.data;
            });
        },
    },
    mutations: {
        setUserData: (state, data) => {
            state.user.info = data;
        },
        setUserToken: (state, token) => {
            localStorage.setItem("user-token", token);
            state.user.token = token;
        },
    },
    modules: {},
});

export default store;
