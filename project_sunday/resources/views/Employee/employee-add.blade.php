<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>เพิ่มข้อมูลพนักงาน</title>

    {{-- CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Js --}}

    <script src="/js/init-alpine.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="icon" type="/img/svg" href="img/icon.svg" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <style>
        .custom-file input[type='file'] {
            display: none;
        }

        .custom-file label {
            cursor: pointer;
        }

    </style>

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
                            href="{{ route('projects.index') }}">
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

                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors  duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('Profile.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="ml-4">โปรไฟล์</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-gray-800 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('Employee.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                            <span class="ml-4">ข้อมูลพนักงาน</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">

                        <a class="inline-flex items-center w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('FormOrder.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-layout">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="3" y1="9" x2="21" y2="9"></line>
                                <line x1="9" y1="21" x2="9" y2="9"></line>
                            </svg>
                            <span class="ml-4">ฟอร์มออเดอร์</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('service.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-align-center">
                                <line x1="18" y1="10" x2="6" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="18" y1="18" x2="6" y2="18"></line>
                            </svg>
                            <span class="ml-4">รายงานการบริการ</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('customer-systems.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="ml-4">ข้อมูลลูกค้า</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('summary.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                            <span class="ml-4">สรุป</span>
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
                            href="{{ route('projects.index') }}">
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

                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors   duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('Profile.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="ml-4">โปรไฟล์</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-gray-800 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('Employee.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                            <span class="ml-4">ข้อมูลพนักงาน</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">

                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('FormOrder.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-layout">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="3" y1="9" x2="21" y2="9"></line>
                                <line x1="9" y1="21" x2="9" y2="9"></line>
                            </svg>
                            <span class="ml-4">ฟอร์ออเดอร์</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('service.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-align-center">
                                <line x1="18" y1="10" x2="6" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="18" y1="18" x2="6" y2="18"></line>
                            </svg>
                            <span class="ml-4">รายงานการบริการ</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('customer-systems.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="ml-4">ข้อมูลลูกค้า</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('summary.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                            <span class="ml-4">สรุป</span>
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
                        <li class="flex mr-10">
                            <button
                                class="absolute top-6  w-10 h-5 md:w-12 md:h-6 rounded-2xl bg-white flex items-center transition duration-300 focus:outline-none shadow"
                                onclick="toggleTheme()">
                                <div id="switch-toggle"
                                    class="w-6 h-6 md:w-7 md:h-7 relative rounded-full transition duration-500 transform bg-yellow-500 -translate-x-2 p-1 text-white ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                            </button>
                        </li>
                        <!-- Profile menu -->
                        <li class="relative">
                            <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                                @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account"
                                aria-haspopup="true">
                                <img class="object-cover w-8 h-8 rounded-full"
                                    src="{{ asset('img/Profile/'.Auth::user()->Path_imageProfile) }}"
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
                                            href="{{route('Profile.show',Auth::user()->id)}}">
                                            @csrf
                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                </path>
                                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span>เปลี่ยนรหัสผ่าน</span>
                                        </a>
                                    </li>
                                    <li class="flex">
                                    <form method="POST" action="{{ route('logout') }}">
                                         @csrf
                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                            href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currennColor">
                                                <path
                                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                            <span>ออกจากระบบ</span>
                                        </a>
                                    </form>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>
                </div>
            </header>
            <!-- Employeee Information -->
            <main class="h-full overflow-y-auto">
                <form action="{{route('Employee.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container px-6 mx-auto grid">
                        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            เพิ่มข้อมูลพนักงาน
                        </h2>
                        <div class="bg-white rounded-lg shadow-lg dark:bg-gray-800 h-full">
                            <div class="m-auto rounded-md p-5">
                                <div class="grid  text-center m-auto">
                                    <div class="m-auto w-40 h-40  ">
                                        <img src="" class="object-cover rounded-full h-full w-full " id="imag_s">
                                    </div>
                                    <div class="rounded-md bg-pink h-30px w-150px m-auto custom-file mt-5 mb-5">
                                        <div class=" text-white mt-1">
                                            <label class="mt-1" for="imag">อัปโหลดภาพ</label>
                                        </div>
                                        <input type="file" id="imag" accept="image/png, image/ipg, image/jpeg">
                                    </div>
                                </div>
                                <div class=" grid  gap-6 mb-8 md:grid-cols-1 xl:grid-cols-3 ">
                                    <div class="bg-235  w-300px m-auto dark:bg-gray-900 rounded-lg">
                                        <div class="p-2 ml-4">
                                            <label class=" dark:text-white"  for="">
                                                ชื่อ :
                                            </label> 
                                                <input class="bg-235 w-200px dark:bg-gray-900" type="text"  placeholder="กรอก ชื่อ-นามสกุล" name="name">
                                            </div>
                                            <div class="text-center text-xs mt-2" >
                                                @if ($errors->any('name'))
                                                    <span class="text-rose-600">{{$errors->first('name')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bg-235  w-300px m-auto dark:bg-gray-900 rounded-lg">
                                            <div class="p-2 ml-4">
                                                <label class=" dark:text-white" for="">
                                                    ตำแหน่ง :
                                                </label>
                                                <select
                                                    class="bg-235 w-150px text-center dark:bg-gray-900 dark:text-white"
                                                    id="grid-first-name" type="text" placeholder="" name="role">
                                                    <option value="">---เลือก----</option>
                                                    <option value="admin">แอดมิน</option>
                                                    <option value="employee">พนักงานขนส่ง</option>
                                                </select>
                                            </div>
                                            <div class="text-center text-xs mt-2" >
                                                @if ($errors->any('role'))
                                                    <span class="text-rose-600">{{$errors->first('role')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bg-235  w-300px m-auto dark:bg-gray-900 rounded-lg">
                                            <div class="p-2 ml-4">
                                                <label class=" dark:text-white" for="">
                                                    ประชาชน :
                                                </label>
                                                <input class="bg-235 w-155px dark:bg-gray-900" type="text" placeholder="9-9999-99999-99-9" name="Idcard" >
                                            </div>
                                            <div class="text-center text-xs mt-2" >
                                                @if ($errors->any('Idcard'))
                                                    <span class="text-rose-600">{{$errors->first('Idcard')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bg-235  w-300px m-auto dark:bg-gray-900 rounded-lg">
                                            <div class="p-2 ml-4">
                                                <label class=" dark:text-white" for="">
                                                    วันเกิด :
                                                </label>
                                                <input class="bg-235 w-200px dark:bg-gray-900 dark:text-white" type="date" placeholder="12/12/2512" name="birthday">
                                            </div>
                                            <div class="text-center text-xs mt-2" >
                                                @if ($errors->any('birthday'))
                                                    <span class="text-rose-600">{{$errors->first('birthday')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bg-235  w-300px m-auto dark:bg-gray-900 rounded-lg">
                                            <div class="p-2 ml-4">
                                                <label class=" dark:text-white" for="">
                                                    ถนน :
                                                </label>
                                                <input class="bg-235 w-200px dark:bg-gray-900" type="text"placeholder="พระราม5" name="road">
                                            </div>
                                        </div>
                                        <div class="bg-235  w-300px m-auto dark:bg-gray-900 rounded-lg">
                                            <div class="p-2 ml-4">
                                                <label class=" dark:text-white" for="">
                                                    เลขที่บ้าน :
                                                </label>
                                                <input class="bg-235 w-150px dark:bg-gray-900" type="text"placeholder="121/1" name="address">
                                            </div>
                                        </div>
                                        <div class="bg-235  w-300px m-auto dark:bg-gray-900 rounded-lg">
                                            <div class="p-2 ml-4">
                                                <label class=" dark:text-white" for="">
                                                    ตำบล :
                                                </label>
                                                <input class="bg-235 w-200px dark:bg-gray-900" type="text"placeholder="พระราม" name="sub">
                                            </div>
                                            <div class="text-center text-xs mt-2" >
                                                @if ($errors->any('sub'))
                                                    <span class="text-rose-600">{{$errors->first('sub')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bg-235  w-300px m-auto dark:bg-gray-900 rounded-lg">
                                            <div class="p-2 ml-4">
                                                <label class=" dark:text-white" for="">
                                                    อำเภอ :
                                                </label>
                                                <input class="bg-235 w-200px dark:bg-gray-900" type="text"placeholder="เมือง" name="city" >
                                            </div>
                                            <div class="text-center text-xs mt-2" >
                                                @if ($errors->any('city'))
                                                    <span class="text-rose-600">{{$errors->first('city')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bg-235  w-300px m-auto dark:bg-gray-900 rounded-lg">
                                            <div class="p-2 ml-4">
                                                <label class=" dark:text-white" for="">
                                                    จังหวัด :
                                                </label>
                                                <input class="bg-235 w-200px dark:bg-gray-900" type="text"placeholder="กรุงเทพ" name="province">
                                                <input type="hidden" value="123456789" name="password">
                                                <input type="hidden" value="sunday11" name="IDuser">
                                            </div>
                                            <div class="text-center text-xs mt-2" >
                                                @if ($errors->any('province'))
                                                    <span class="text-rose-600">{{$errors->first('province')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bg-235  w-300px m-auto dark:bg-gray-900 rounded-lg">
                                            <div class="p-2 ml-4">
                                                <label class=" dark:text-white" for="">
                                                    ไปรษณีย์ :
                                                </label>
                                                <input class="bg-235 w-150px dark:bg-gray-900" type="text"placeholder="" name="zipcode" size="5" maxlength="5">
                                            </div>
                                            <div class="text-center text-xs mt-2" >
                                                @if ($errors->any('zipcode'))
                                                    <span class="text-rose-600">{{$errors->first('zipcode')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bg-235  w-300px m-auto dark:bg-gray-900 rounded-lg">
                                            <div class="p-2 ml-4">
                                                <label class=" dark:text-white" for="">
                                                    เบอร์โทร :
                                                </label>
                                                <input class="bg-235 w-150px dark:bg-gray-900" type="tel"placeholder="0588888" name="phone" size="10" maxlength="10" >
                                            </div>
                                            <div class="text-center text-xs mt-2" >
                                                @if ($errors->any('phone'))
                                                    <span class="text-rose-600">{{$errors->first('phone')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bg-235  w-300px m-auto dark:bg-gray-900 rounded-lg">
                                            <div class="p-2 ml-4">
                                                <label class=" dark:text-white" for="">
                                                    อีเมล์ :
                                                </label>
                                                <input class="bg-235 w-200px dark:bg-gray-900" type="text"placeholder="example@gmail.com" name="email" >
                                            </div>
                                            <div class="text-center text-xs mt-2" >
                                                @if ($errors->any('email'))
                                                    <span class="text-rose-600">{{$errors->first('email')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-10  h-full mb-9">
                                    <div class="grid  gap-6 mb-8 md:grid-cols-1 xl:grid-cols-2">
                                        <div class=" grid  text-center h-200px w-380px m-auto">
                                            <h1 class="font-bold dark:text-white mb-5">บัตรประชาชน ด้านหน้า</h1>
                                            <div class="bg-white rounded-md  border-indigo-600 shadow-lg dark:bg-gray-900">
                                                <img src="/img/image-alt.svg" id="display_image"
                                                class=" h-200px w-380px m-auto">
                                            </div>
                                            <div class="rounded-md bg-pink h-30px w-150px m-auto custom-file mt-3">
                                                <div class=" text-white mt-1">
                                                    <label for="image_input">อัปโหลดภาพ</label>
                                                </div>
                                                <input type="file" id="image_input"
                                                    accept="image/png, image/ipg, image/jpeg"
                                                    name="image_front">
                                            </div>
                                            <div class="text-center text-xs mt-2" >
                                                @if ($errors->any('image_front'))
                                                    <span class="text-rose-600">{{$errors->first('image_front')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class=" grid  text-center h-200px w-380px m-auto">
                                            <h1 class="font-bold dark:text-white mb-5">บัตรประชาชน ด้านหลัง</h1>
                                            <div
                                                class="bg-white rounded-md  border-indigo-600  shadow-lg dark:bg-gray-900">
                                                <img src="/img/image-alt.svg" id="display_images"
                                                    class="h-200px w-380px m-auto">
                                            </div>
                                            <div class="rounded-md bg-pink h-30px w-150px m-auto custom-file mt-3">
                                                <div class=" text-white mt-1">
                                                    <label for="image_inputs">อัปโหลดภาพ</label>
                                                </div>
                                                <input type="file" id="image_inputs"
                                                    accept="image/png, image/ipg, image/jpeg"
                                                    name="image_Back">
                                            </div>
                                            <div class="text-center text-xs mt-2" >
                                                @if ($errors->any('image_Back'))
                                                    <span class="text-rose-600">{{$errors->first('image_Back')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-36 ">
                                        <button class="bg-rose-600 w-100px h-30px rounded-md text-white  mb-6 mt-6">ยกเลิก</button>
                                        <button class="bg-pink w-100px h-30px rounded-md text-white  mb-6 mt-6">บันทึก</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>
    <script>
        $(function() {
            $("#image_input").change(function(event) {
                var x = URL.createObjectURL(event.target.files[0]);
                $("#display_image").attr("src", x);
                console.log(event)
            })
        })
        $(function() {
            $("#image_inputs").change(function(event) {
                var x = URL.createObjectURL(event.target.files[0]);
                $("#display_images").attr("src", x);
                console.log(event)
            })
        })
        $(function() {
            $("#imag").change(function(event) {
                var x = URL.createObjectURL(event.target.files[0]);
                $("#imag_s").attr("src", x);
                console.log(event)
            })
        })
    </script>
     <script>
        const switchToggle = document.querySelector('#switch-toggle');
        const html = document.querySelector('html');
        let isDarkmode = false
        const localDarkmode = JSON.parse(localStorage.getItem('isDarkmode'))
        const darkIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
</svg>`
        const lightIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
</svg>`
        // Jika ada isDarkmode di localstorage 
        if (localDarkmode) {
            isDarkmode = localDarkmode
            html.classList.add('dark')
        } else {
            html.classList.remove('dark')
        }

        function toggleTheme() {
            isDarkmode = !isDarkmode
            localStorage.setItem('isDarkmode', isDarkmode)
            switchTheme()
        }

        function switchTheme() {
            if (isDarkmode) {
                html.classList.add('dark')
                switchToggle.classList.remove('bg-yellow-500', '-translate-x-2')
                switchToggle.classList.add('bg-gray-700', 'translate-x-full')
                setTimeout(() => {
                    switchToggle.innerHTML = darkIcon
                }, 250);
            } else {
                html.classList.remove('dark')
                switchToggle.classList.add('bg-yellow-500', '-translate-x-2')
                switchToggle.classList.remove('bg-gray-700', 'translate-x-full')
                setTimeout(() => {
                    switchToggle.innerHTML = lightIcon
                }, 250);
            }
        }
        switchTheme()
    </script>
</body>

</html>
