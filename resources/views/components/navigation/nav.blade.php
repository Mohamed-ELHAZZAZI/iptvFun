<nav class="relative bg-white dark:bg-gray-900">
    <div
        class="container px-6 py-4 mx-auto flex justify-between items-center sm:gap-3 gap-1"
    >
        <div class="flex items-center w-full md:w-auto justify-between">
            <a
                href="#"
                class="flex items-center gap-2 text-gray-700 dark:text-gray-200 font-bold text-lg"
            >
                <img
                    width="28"
                    height="28"
                    class="w-auto h-7 sm:h-8"
                    src="{{ asset('/storage/icons/logo.svg') }}"
                    alt=""
                />
                Iptv-Fun
            </a>

            <!-- Mobile menu button -->
            <div class="flex md:hidden">
                <button
                id="navigationToggle"
                    type="button"
                    class="text-gray-500 mr-3 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                    aria-label="toggle menu"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 8h16M4 16h16"
                        />
                    </svg>

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6 hidden"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div
                id="navigationList"
                class="absolute opacity-0 -translate-x-full top-14 inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white dark:bg-gray-900 md:bg-transparent md:dark:bg-transparent md:mt-0 md:p-0 md:top-0 md:relative md:w-auto md:opacity-100 md:translate-x-0 md:flex md:items-center"
            >
                <div class="flex flex-col md:flex-row md:mx-6">
                    <a
                        class="my-2 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-[#f83584] dark:hover:text-[#f83584] md:mx-4 md:my-0 hover:bg-[#00000014] dark:hover:bg-[#ffffff0a] px-2 py-1 rounded"
                        href="#"
                        >Home</a
                    >
                    <a
                        class="my-2 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-[#f83584] dark:hover:text-[#f83584] md:mx-4 md:my-0 hover:bg-[#00000014] dark:hover:bg-[#ffffff0a] px-2 py-1 rounded"
                        href="#"
                        >Shop</a
                    >
                    <a
                        class="my-2 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-[#f83584] dark:hover:text-[#f83584] md:mx-4 md:my-0 hover:bg-[#00000014] dark:hover:bg-[#ffffff0a] px-2 py-1 rounded"
                        href="#"
                        >Contact</a
                    >
                    <a
                        class="my-2 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-[#f83584] dark:hover:text-[#f83584] md:mx-4 md:my-0 hover:bg-[#00000014] dark:hover:bg-[#ffffff0a] px-2 py-1 rounded"
                        href="#"
                        >About</a
                    >
                </div>
            </div>
        </div>
        
        <button
            aria-label="Change to dark/light mode"
            id="changeDarkMode"
            class="py-1.5 px-1.5 mr-4 text-gray-500 transition-colors duration-300 transform border rounded-lg hover:bg-gray-100 focus:outline-none dark:border-gray-500 dark:hover:bg-gray-800"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5 sm:w-6 sm:h-6"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"
                ></path>
            </svg>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 hidden h-5 sm:w-6 sm:h-6"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                ></path>
            </svg>
        </button>
    </div>
</nav>