<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>โปรไฟล์</title>

    {{-- CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Js --}}

    <script src="/js/init-alpine.js"></script>

    <link rel="icon" type="/img/svg" href="img/icon.svg" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>

</head>

<body class="font-prompt">
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                    SUNDAY FLOWER
                </a>
                <ul class="mt-6">
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="/employee-2">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span class="ml-4">หนัาหลัก</span>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors text-gray-800  duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="/employee-proflie">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="ml-4">โปรไฟล์</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
        <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
            x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
            x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
            @keydown.escape="closeSideMenu">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                    SUNDAY FLOWER
                </a>
                <ul class="mt-6">
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="/employee-2">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span class="ml-4">หน้าหลัก</span>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors text-gray-800  duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="/employee-profile">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="ml-4">โปรไฟล์</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="flex flex-col flex-1 w-full">
            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                <div
                    class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
                    <!-- Mobile hamburger -->
                    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                        @click="toggleSideMenu" aria-label="Menu">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Search input -->
                    <div class="flex justify-center flex-1 lg:mr-32">
                        <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                            <div class="absolute inset-y-0 flex items-center pl-2">
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input
                                class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input h-9"
                                type="text" placeholder="Search for projects" aria-label="Search" />
                        </div>
                    </div>
                    <ul class="flex items-center flex-shrink-0 space-x-6">
                        <!-- Profile menu -->
                        <li class="relative">
                            <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                                @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account"
                                aria-haspopup="true">
                                <img class="object-cover w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                                    alt="" aria-hidden="true" />
                            </button>
                            <template x-if="isProfileMenuOpen">
                                <ul x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu"
                                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                                    aria-label="submenu">
                                    <li class="flex">
                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                            href="#">
                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                </path>
                                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                            href="#">
                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currennColor">
                                                <path
                                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                            <span>Log out</span>
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>
                </div>
            </header>
            <!-- Profile -->
            <main class="h-full overflow-y-auto">
                <div class="px-6 mx-auto grid">
                    <form class="h-100% text-center flex mt-6 m-auto ">
                        <div class="w-568px bg-white h-974px rounded-lg shadow-lg ">
                            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 pt-16">
                                โปรไฟล์
                            </h2>
                            <div class="flex justify-center  ">
                            </div>
                            <div class="w-500px mx-auto  ">
                                <div class=" pt-15px w-350px m-auto ">
                                    <div class="bg-neutral-300   h-50px mb-3">
                                        <label for="">
                                            วันเดือนปีเกิด :
                                        </label>
                                        <input class="bg-neutral-300 rounded-lg h-30px mt-2" type="text"
                                            placeholder="นาย ตู่ จันทร์อังคาร" disabled>
                                    </div>
                                    <div class="bg-neutral-300  h-50px mb-3">
                                        <label for="">
                                            ตำบล:
                                        </label>
                                        <input class="bg-neutral-300 rounded-lg h-30px mt-2" type="text"
                                            placeholder="2323232323" disabled>
                                    </div>
                                    <div class="bg-neutral-300  h-50px mb-3">
                                        <label for="">
                                            อำเภอ:
                                        </label>
                                        <input class="bg-neutral-300 rounded-lg h-30px mt-2" type="text"
                                            placeholder="นายก" disabled>
                                    </div>
                                    <div class="bg-neutral-300  h-50px mb-3">
                                        <label for="">
                                            จังหวัด:
                                        </label>
                                        <input class="bg-neutral-300 rounded-lg h-30px mt-2" type="text"
                                            placeholder="นายก" disabled>
                                    </div>
                                    <div class="bg-neutral-300  h-50px mb-3">
                                        <label for="">
                                            ที่อยู่:
                                        </label>
                                        <input class="bg-neutral-300 rounded-lg h-30px mt-2" type="text"
                                            placeholder="นายก" disabled>
                                    </div>
                                    <div class="bg-neutral-300  h-50px mb-3">
                                        <label for="">
                                            ถนน:
                                        </label>
                                        <input class="bg-neutral-300 rounded-lg h-30px mt-2" type="text"
                                            placeholder="นายก" disabled>
                                    </div>
                                    <div class="bg-neutral-300  h-50px mb-3">
                                        <label for="">
                                            หมู่บ้าน:
                                        </label>
                                        <input class="bg-neutral-300 rounded-lg h-30px mt-2" type="text"
                                            placeholder="นายก" disabled>
                                    </div>
                                    <div class="bg-neutral-300  h-50px mb-3">
                                        <label for="">
                                            ไปรษณีย์:
                                        </label>
                                        <input class="bg-neutral-300 rounded-lg h-30px mt-2" type="text"
                                            placeholder="นายก" disabled>
                                    </div>
                                </div>
                                <button class="bg-pink w-145px h-30px rounded-lg mt-150px text-white"><a href="/employee-profile-editor">แก้ไข</a></button>
                            </div>
                            <div class="wu">
                                <div>

                                </div>
                            </div>
                        </div>
                        <div class=" ml-4">
                            <div class="w-568px bg-white h-477px rounded-lg shadow-lg ">
                                <div class="flex justify-center  ">
                                    <div class=" w-40 h-40">
                                        <img src="img/hd.jpeg" class="object-cover rounded-full h-full w-full mt-12">
                                    </div>
                                </div>
                                <div class="w-500px mx-auto  ">
                                    <div class=" pt-15px w-350px m-auto ">
                                        <div class="bg-neutral-300 h-50px mb-3">
                                            <label for="">
                                                ชื่อ:
                                            </label>
                                            <input class="bg-neutral-300 rounded-lg h-30px mt-2" type="text"
                                                placeholder="นาย ตู่ จันทร์อังคาร" disabled>
                                        </div>
                                        <div class="bg-neutral-300  h-50px mb-3">
                                            <label for="">
                                                เลขผู้ใช้งาน:
                                            </label>
                                            <input class="bg-neutral-300 rounded-lg h-30px mt-2" type="text"
                                                placeholder="2323232323" disabled>
                                        </div>
                                        <div class="bg-neutral-300  h-50px mb-3">
                                            <label for="">
                                                ตำแหน่ง:
                                            </label>
                                            <input class="bg-neutral-300 rounded-lg h-30px mt-2" type="text"
                                                placeholder="นายก" disabled>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="w-568px bg-white h-476px mt-20px  rounded-lg shadow-lg ">
                                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 pt-10">
                                    บัตรประชาชน
                                </h2>
                                  <div class=" w-350px h-150px m-auto border-4 border-green-000 p-8 text-center mt-24" >
                                      <img class="h-20 w-20 m-auto -mt-4" src="/img/hook-1727484.svg" alt="">
                                      <h1 class="text-xl text-green-000 ">อัปโหลดสำเร็จ</h1>
                                  </div>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
