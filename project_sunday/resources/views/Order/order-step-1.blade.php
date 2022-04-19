<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>รายการ</title>

    {{-- CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Js --}}

    <script src="/js/init-alpine.js"></script>
    <script src="/js/popup-ouput.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

    <link rel="icon" type="/img/svg" href="/img/icon.svg" />
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

                        <a class="inline-flex items-center w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 "
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
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('Profile.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="ml-4">โปรไฟล์</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
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
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
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
                        <button
                            class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            @click="togglePagesMenu" aria-haspopup="true">
                            <span class="inline-flex items-center">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-align-center">
                                    <path
                                        d="m20.772 10.155-1.368-4.104A2.995 2.995 0 0 0 16.559 4H7.441a2.995 2.995 0 0 0-2.845 2.051l-1.368 4.104A2 2 0 0 0 2 12v5c0 .738.404 1.376 1 1.723V21a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-2h12v2a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-2.277A1.99 1.99 0 0 0 22 17v-5a2 2 0 0 0-1.228-1.845zM7.441 6h9.117c.431 0 .813.274.949.684L18.613 10H5.387l1.105-3.316A1 1 0 0 1 7.441 6zM5.5 16a1.5 1.5 0 1 1 .001-3.001A1.5 1.5 0 0 1 5.5 16zm13 0a1.5 1.5 0 1 1 .001-3.001A1.5 1.5 0 0 1 18.5 16z">
                                    </path>
                                </svg>
                                <span class="ml-4">เพิ่มเส้นทางขนส่ง</span>
                            </span>
                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <template x-if="isPagesMenuOpen">
                            <ul x-transition:enter="transition-all ease-in-out duration-300"
                                x-transition:enter-start="opacity-25 max-h-0"
                                x-transition:enter-end="opacity-100 max-h-xl"
                                x-transition:leave="transition-all ease-in-out duration-300"
                                x-transition:leave-start="opacity-100 max-h-xl"
                                x-transition:leave-end="opacity-0 max-h-0"
                                class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                aria-label="submenu">
                                <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="{{ route('transport.index') }}">จังหวัด</a>
                                </li>
                                <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="{{ route('city.index') }}">
                                        อำเภอ
                                    </a>
                                </li>
                                <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="{{ route('subdistrict.index') }}">
                                        ตำบล
                                    </a>
                                </li>
                            </ul>
                        </template>
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

                        <a class="inline-flex items-center w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 "
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
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('Profile.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="ml-4">โปรไฟล์</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
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
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
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
                    class="container flex items-center justify-end h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
                    <!-- Mobile hamburger -->
                    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                        @click="toggleSideMenu" aria-label="Menu">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div class="flex justify-center flex-1 lg:mr-32">
                       
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
                                    src="{{ asset('img/Profile/' . Auth::user()->Path_imageProfile) }}" alt=""
                                    aria-hidden="true" />
                            </button>
                            <template x-if="isProfileMenuOpen">
                                <ul x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu"
                                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                                    aria-label="submenu">
                                    <li class="flex">
                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                            href="{{ route('Profile.show', Auth::user()->id) }}">
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
            <!-- Form Order -->
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        รายการ
                    </h2>
                    <div class="grid  gap-6 mb-86 md:grid-cols-2 xl:grid-cols-4 p-3">
                        <div class=" w-200px px-3  m-auto">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
                                for="grid-first-name">
                                ชื่อ
                            </label>
                            <div class="appearance-none block  text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white w-200px mr-32 dark:text-white"
                                id="grid-first-name">{{ $customer->name }}</div>
                        </div>
                        <div class="w-200px px-3   m-auto">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
                                for="grid-first-name">
                                จังหวัด
                            </label>
                            <div class="appearance-none block  text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white w-200px mr-32 dark:text-white"
                                id="grid-first-name">{{ $customer->province }}</div>
                        </div>
                        <div class="w-200px px-3  m-auto">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
                                for="grid-first-name">
                                เบอร์โทร
                            </label>
                            <div class="appearance-none block  text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white w-200px mr-32 dark:text-white"
                                id="grid-first-name">{{ $customer->phone }}</div>
                        </div>
                        <div class="w-200px   mt-6   m-auto">
                            <button class="bg-pink rounded mb-6 m-auto w-150px text-center p-1 text-white   "
                                type="button" onclick="toggleModal('modal-id')">
                                เพิ่มรายการส่ง
                            </button>
                        </div>
                    </div>
                    <div class="hidden   fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center w-full m-auto  "
                        id="modal-id">
                        <div class="relative w-auto my-6 mx-auto max-w-3xl">
                            <!--content-->
                            <div
                                class="border-0 rounded-lg shadow-lg relative flex flex-col xl:w-full xl:h-full  bg-white outline-none focus:outline-none md:w-500px  md:h-500px sm:h-500px  ss:h-500px">
                                <!--header-->
                                <div
                                    class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                                    <h3 class="text-3xl font-semibold">
                                        เพิ่มรายการส่ง
                                    </h3>
                                    <button
                                        class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                        onclick="toggleModal('modal-id')">
                                        <span
                                            class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                            ×
                                        </span>
                                    </button>
                                </div>
                                <!--body-->
                                <div class="relative p-6 flex-auto xd:overflow-auto sm:overflow-auto ss:overflow-auto">
                                    <form action="{{ route('FormOrder.store') }}" method="post">
                                        @csrf
                                        
                                            <div class="grid  gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2 ">
                                                <div class="w-full px-3 mb-6 md:mb-0">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="grid-first-name">
                                                        ชื่อ
                                                    </label>
                                                    <input
                                                        class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white "
                                                        id="grid-first-name" type="text" placeholder="ชื่อ - นามสกุล"
                                                        name="name" />
                                                        @if ($errors->any('name'))
                                                        <p class="text-red-500 text-xs italic text-center">{{$errors->first('name')}}</p>
                                                        @endif
                                                </div>
                                                <div class="w-full  px-3 mb-6 md:mb-0 ">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="grid-first-name">
                                                        จังหวัด
                                                    </label>
                                                    <select
                                                        class="provinces appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                        id="grid-first-name" type="text" placeholder="" name="province" id="provinces">
                                                        <option value="">---เลือก----</option>
                                                        @foreach($province as $row)
                                                        <option value="{{$row->id}}">{{$row->province}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="w-full  px-3 mb-6 md:mb-0 ">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="grid-first-name">
                                                        อำเภอ
                                                    </label>
                                                    <select
                                                        class="city appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                        id="grid-first-name" type="text" placeholder="" name="city">
                                                        <option value="">---เลือก----</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="w-full px-3 mb-6 md:mb-0 ">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="grid-first-name">
                                                        เบอร์โทร
                                                    </label>
                                                    <input
                                                        class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                        id="telInput" onkeypress="addSpace()" type="tel" placeholder="" name="phone" maxlength="11" />
                                                </div>
                                            </div>
                                        <div class="grid  gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2 ">
                                            <div class="w-full  px-3 mb-6 md:mb-0 ">
                                                <label
                                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="grid-first-name">
                                                    ประเภท
                                                </label>
                                                <select
                                                    class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                    id="grid-first-name" type="text" placeholder="" name="type">
                                                    <option value="">---เลือก----</option>
                                                    <option value="พัสดุภัณฑ์">พัสดุภัณฑ์</option>
                                                    <option value="ดอกไม้">ดอกไม้</option>
                                                    <option value="มอเตอร์ไซต์">มอเตอร์ไซต์</option>
                                                    <option value="สัตว์เลี้ยง">สัตว์เลี้ยง</option>
                                                </select>
                                            </div>
                                            <div class="w-full px-3 mb-6 md:mb-0 ">
                                                <label
                                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="grid-first-name">
                                                    รายการ
                                                </label>
                                                <input
                                                    class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                    id="grid-first-name" type="text" placeholder="" name="list" />
                                            </div>
                                            <div class="w-full  px-3 mb-6 md:mb-0 ">
                                                <label
                                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="grid-first-name">
                                                    จำนวน
                                                </label>
                                                <input
                                                    class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                    id="grid-first-name" type="text" placeholder="" name="quantity" />
                                            </div>
                                            <div class="w-full  px-3 mb-6 md:mb-0 ">
                                                <label
                                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="grid-first-name">
                                                    ราคา
                                                </label>
                                                <input
                                                    class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                    id="grid-first-name" type="text" placeholder="" name="price" />
                                                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                            </div>
                                        </div>

                                </div>
                                <!--footer-->
                                <div
                                    class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                                    <button
                                        class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        type="reset" onclick="toggleModal('modal-id')">
                                        ยกเลิก
                                    </button>
                                    <button
                                        class="bg-pink text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                        ยืนยัน
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop">
                    </div>

                    <!-- New Table -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs p-3">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold text-center tracking-wide  text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">ลำดับ</th>
                                        <th class="px-4 py-3">รายการ</th>
                                        <th class="px-4 py-3">จำนวน</th>
                                        <th class="px-4 py-3">ชื่อผู้รับ</th>
                                        <th class="px-4 py-3">ที่อยู่</th>
                                        <th class="px-4 py-3">เบอร์โทร</th>
                                        <th class="px-4 py-3">ราคา</th>
                                        <th class="px-4 py-3"></th>
                                    </tr>
                                </thead>
                                @php
                                    $cost = 0;
                                    $i = 1;
                                    $total = 0;
                                @endphp
                                @foreach ($customer->orders as $order)
                                    @php
                                        $total = $order->price * $order->quantity
                                    @endphp
                                    @php
                                        $cost = $total + $cost;
                                    @endphp
                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 text-center">
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3 text-xs">
                                               
                                                    <!-- Avatar with inset shadow -->
                                                    <div class="text-center">
                                                        <p class="font-semibold">{{ $i++ }}</p>
                                                    </div>
                                               
                                            </td>
                                            <td class="px-4 py-3 text-xs">{{ $order->list }}</td>
                                            <td class="px-4 py-3 text-xs">
                                                <div class="px-2 py-1 font-semibold leading-tight rounded-full">
                                                    {{ $order->quantity }} </div>
                                            </td>
                                            <td class="px-4 py-3 text-xs">{{ $order->name }}</td>
                                            <td class="px-4 py-3 text-xs">
                                                {{ $order->city }},{{ $order->province }}
                                            </td>
                                            <td class="px-4 py-3 text-xs">{{ $order->phone }}</td>
                                           
                                            <td class="px-4 py-3 text-xs">{{$total }}</td>
                                            <td class="flex px-4 py-3 text-xs ">
                                                <a class="w-6 h-6 mr-2"
                                                    href="{{ route('FormOrder.edit', $order->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>

                                                <form action="{{ route('FormOrder.destroy', $order->id, $customer) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button id="" class="w-6 h-6"><svg
                                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg></button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>


                    <form method="post" action="{{ route('save') }} ">
                        @csrf
                        <div class="mb-4 flex m-auto flex-row-reverse p-3 dark:text-white">
                            บาท
                            <input
                                class="h-30px  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white text-center w-150px "
                                type="text" placeholder="{{ $cost }}" disabled />
                            <label > ทั้งหมด : </label>
                            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                            <input type="hidden" name="total" value="{{ $cost }}">
                        </div>
                        <div class="mr-auto flex  flex-row-reverse  m-auto p-3">
                            <div class="h-30px bg-pink rounded mb-6 ml-3 w-100px text-center p-1">
                                <button class="text-white "> ยืนยัน </button>
                            </div>
                            <div class="h-30px bg-pink rounded mb-6 w-100px text-center p-1">
                                <a class="text-white" href="/dist/order.html">
                                    ย้อนกลับ
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </main>
        </div>
    </div>
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
    <script>
    function addSpace(){
        var inputValue = document.getElementById("telInput").value;
        var inputValueLength = inputValue.length;
        
        if(inputValueLength == 3 ){
            document.getElementById("telInput").value = inputValue+"-"; 
        }
    }
    </script>
    <script type="text/javascript">
  $('.provinces').change(function() {
      if($(this).val()!=''){
          var select=$(this).val();
          var _token=$('input[name="_token"]').val();
          $.ajax({
              url:"{{route('fetch')}}",
              method:'GET',
              data:{select:select,_token:_token},
              success:function(result){
                    $('.city').html(result);
              }
          });
      }
  });
</script>
</body>

</html>
