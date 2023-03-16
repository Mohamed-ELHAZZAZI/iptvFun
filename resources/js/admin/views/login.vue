<template>
    <section class="bg-white dark:bg-gray-900">
        <div
            class="container flex items-center justify-center min-h-screen px-6 mx-auto"
        >
            <form class="w-full max-w-md" method="POST" @submit.prevent="login">
                <img
                    width="32"
                    height="32"
                    class="w-auto h-8 sm:h-10"
                    :src="'/storage/icons/logo.svg'"
                    alt=""
                />

                <h1
                    class="mt-3 mb-8 text-2xl font-semibold text-gray-800 capitalize sm:text-3xl dark:text-white"
                >
                    sign In
                </h1>
                <div
                    v-if="errorMsg"
                    class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                    role="alert"
                >
                    <svg
                        aria-hidden="true"
                        class="flex-shrink-0 inline w-5 h-5 mr-3"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">{{ errorMsg }}</span>
                    </div>
                </div>
                <div class="relative flex items-center">
                    <span class="absolute">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                            />
                        </svg>
                    </span>

                    <input
                        name="email"
                        type="email"
                        class="block w-full py-3 text-gray-700 bg-white border rounded-lg px-11 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-[#dd0066] dark:focus:border-[#dd0066] focus:outline-none focus:ring-1 focus:ring-[#dd0066]"
                        placeholder="Email address"
                        v-model="user_info.email"
                    />
                </div>

                <div class="relative flex items-center mt-4">
                    <span class="absolute">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 mx-3 text-gray-300 dark:text-gray-500"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                            />
                        </svg>
                    </span>

                    <input
                        name="password"
                        type="password"
                        class="block w-full px-10 py-3 text-gray-700 bg-white border rounded-lg dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-[#dd0066] dark:focus:border-[#dd0066] focus:outline-none focus:ring-1 focus:ring-[#dd0066]"
                        placeholder="Password"
                        v-model="user_info.password"
                    />
                </div>

                <div class="mt-6">
                    <button
                        type="submit"
                        class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-[#dd0066] rounded-lg hover:bg-[#cf2474] focus:outline-none focus:ring-opacity-50"
                    >
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </section>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import store from "../store";

const user_info = {
    email: "",
    password: "",
};

const errorMsg = ref("");
const router = useRouter();
function login() {
    errorMsg.value = "";
    store.dispatch("login", user_info).then((res) => {
        if (res.success) {
            router.push({ name: "adminDashboard" });
        } else {
            errorMsg.value = res.error;
        }
    });
}
</script>

<style></style>
