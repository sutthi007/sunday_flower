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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

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
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-gray-800 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="{{ route('FormOrder.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            <span class="ml-4">เพิ่มออเดอร์</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('Profile.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                </path>
                            </svg>
                            <span class="ml-4">โปรไฟล์</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <button
                            class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            @click="togglePagesMenu" aria-haspopup="true">
                            <span class="inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
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
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800  dark:hover:text-gray-200">
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
                                <a class="w-full" href="{{ route('provinceTo.index') }}">
                                    จังหวัดส่งต่อ
                                </a>
                            </li>
                            </ul>
                        </template>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('customer-systems.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="ml-4">ข้อมูลลูกค้า</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('Employee.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span class="ml-4">ข้อมูลพนักงาน</span>
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
                            <span class="ml-4">อัตราค่าบริการ</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="/expenses">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="ml-4">รายการใช่จ่าย</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <button
                            class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            @click="togglePagesMenus" aria-haspopup="true">
                            <span class="inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                </svg>
                                <span class="ml-4">สรุป</span>
                            </span>

                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <template x-if="isPagesMenuOpens">
                            <ul x-transition:enter="transition-all ease-in-out duration-300"
                                x-transition:enter-start="opacity-25 max-h-0"
                                x-transition:enter-end="opacity-100 max-h-xl"
                                x-transition:leave="transition-all ease-in-out duration-300"
                                x-transition:leave-start="opacity-100 max-h-xl"
                                x-transition:leave-end="opacity-0 max-h-0"
                                class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                aria-label="submenu">
                                <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="{{ route('sumAccount') }}">สรุปรายงานบัญชี</a>
                                </li>
                                <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="{{ route('sumTransport') }}">
                                        สรุปรายงานขนส่ง
                                    </a>
                                </li>
                            </ul>
                        </template>
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
                            <span class="ml-4">หนัาหลัก</span>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-gray-800 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="{{ route('FormOrder.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            <span class="ml-4">เพิ่มออเดอร์</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('Profile.index') }}">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                </path>
                            </svg>
                            <span class="ml-4">โปรไฟล์</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <button
                            class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            @click="togglePagesMenu" aria-haspopup="true">
                            <span class="inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
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
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800  dark:hover:text-gray-200">
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
                                <a class="w-full" href="{{ route('provinceTo.index') }}">
                                    จังหวัดส่งต่อ
                                </a>
                            </li>
                            </ul>
                        </template>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('customer-systems.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="ml-4">ข้อมูลลูกค้า</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="{{ route('Employee.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span class="ml-4">ข้อมูลพนักงาน</span>
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
                            <span class="ml-4">อัตราค่าบริการ</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="/expenses">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="ml-4">รายการใช่จ่าย</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <button
                            class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            @click="togglePagesMenus" aria-haspopup="true">
                            <span class="inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                </svg>
                                <span class="ml-4">สรุป</span>
                            </span>

                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <template x-if="isPagesMenuOpens">
                            <ul x-transition:enter="transition-all ease-in-out duration-300"
                                x-transition:enter-start="opacity-25 max-h-0"
                                x-transition:enter-end="opacity-100 max-h-xl"
                                x-transition:leave="transition-all ease-in-out duration-300"
                                x-transition:leave-start="opacity-100 max-h-xl"
                                x-transition:leave-end="opacity-0 max-h-0"
                                class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                aria-label="submenu">
                                <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="{{ route('sumAccount') }}">สรุปรายงานบัญชี</a>
                                </li>
                                <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="{{ route('sumTransport') }}">
                                        สรุปรายงานขนส่ง
                                    </a>
                                </li>
                            </ul>
                        </template>
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
                                    class="absolute right-0 w-40 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
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
                                              <svg
                                              class="w-4 h-4 mr-3"
                                              aria-hidden="true"
                                              fill="none"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              viewBox="0 0 24 24"
                                              stroke="currentColor"
                                            >
                                              <path
                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                                              ></path>
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
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
                                for="grid-first-name">
                                ชื่อ
                            </label>
                            <div class="appearance-none block  text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white w-200px mr-32 dark:text-white"
                                id="grid-first-name">{{ $customer->name }}</div>
                        </div>
                        <div class="w-200px px-3   m-auto">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
                                for="grid-first-name">
                                จังหวัด
                            </label>
                            <div class="appearance-none block  text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white w-200px mr-32 dark:text-white"
                                id="grid-first-name">{{ $customer->province }}</div>
                        </div>
                        <div class="w-200px px-3  m-auto">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
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
                                class="border-0 rounded-lg shadow-lg relative flex flex-col   bg-white outline-none focus:outline-none xl:w-700px xl:h-500px md:w-500px  md:h-500px sm:h-500px  ss:h-500px">
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
                                                    ชื่อ-ผู้รับ
                                                </label>
                                                <input
                                                    class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white "
                                                    id="grid-first-name" type="text" placeholder="ชื่อ - นามสกุล"
                                                    name="name" />
                                                @if ($errors->any('name'))
                                                    <p class="text-red-500 text-xs italic text-center">
                                                        {{ $errors->first('name') }}</p>
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
                                                    id="grid-first-name" type="text" placeholder="" name="province"
                                                    id="provinces">
                                                    <option value="">---เลือกจังหวัด----</option>
                                                    @foreach ($province as $row)
                                                        <option value="{{ $row->id }}">{{ $row->province }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->any('province'))
                                                <p class="text-red-500 text-xs italic text-center">
                                                    {{ $errors->first('province') }}</p>
                                            @endif
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
                                                    <option value="">---เลือกอำเภอ----</option>
                                                </select>
                                                @if ($errors->any('city'))
                                                <p class="text-red-500 text-xs italic text-center">
                                                    {{ $errors->first('city') }}</p>
                                            @endif
                                            </div>
                                            <div class="w-full px-3 mb-6 md:mb-0 ">
                                                <label
                                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="grid-first-name">
                                                    เบอร์โทร
                                                </label>
                                                <input
                                                    class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                    id="telInput" onkeypress="addSpace()" type="tel" placeholder=""
                                                    name="phone" maxlength="11" />
                                                    @if ($errors->any('phone'))
                                                    <p class="text-red-500 text-xs italic text-center">
                                                        {{ $errors->first('phone') }}</p>
                                                @endif
                                            </div>
                                            <div class="w-full px-3 mb-6 md:mb-0 ">
                                                <label
                                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="grid-first-name">
                                                    เบอร์โทรสำรอง(ถ้ามี)
                                                </label>
                                                <input
                                                    class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                    id="telInput" onkeypress="addSpaces()" type="tels" placeholder=""
                                                    name="phone_one" maxlength="11" />
                                            </div>
                                            <div class=" w-full px-3 mb-6 md:mb-0 ">
                                                <div class="flex">
                                                    <input class="mr-4" type="checkbox" id="myCheck" onclick="myFunction()" name="sendto" value="ส่งต่อ">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="grid-first-name">
                                                        ส่งต่อ
                                                    </label>
                                                </div>
                                                <div class=" w-full px-3 mb-6 md:mb-0 " id="text" style="display:none">
                                                    <label
                                                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        id="showthis" name="showthis" size="50" type="text"
                                                        value="text here">
                                                        ราคาส่งต่อ
                                                    </label>
                                                    <input
                                                        class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                        name="price_sendto" >
                                                </div>
                                                <div class=" w-full px-3 mb-6 md:mb-0 " id="texts" style="display:none">
                                                        <label
                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                            id="showthis" name="showthis" size="50" type="text"
                                                            value="text here">
                                                            จังหวัดส่งต่อ
                                                        </label>
                                                        <select
                                                        class=" appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                        id="grid-first-name" type="text" placeholder="" name="provinces_to"
                                                        id="provinces">
                                                        <option value="">---เลือกจังหวัด----</option>
                                                        @foreach ($provinces_to as $row)
                                                            <option value="{{ $row->id }}">{{ $row->provinces_to }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
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
                                                    onchange="yesnoCheck(this);"
                                                    class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                    id="grid-first-name" type="text" placeholder="" name="type">
                                                    <option value="">---เลือก----</option>
                                                    <option value="พัสดุภัณฑ์">พัสดุภัณฑ์</option>
                                                    <option value="ดอกไม้">ดอกไม้</option>
                                                    <option value="ผักและผลไม้">ผักและผลไม้</option>
                                                    <option value="มอเตอร์ไซต์">มอเตอร์ไซต์</option>
                                                    <option value="สัตว์เลี้ยง">สัตว์เลี้ยง</option>
                                                </select>
                                                @if ($errors->any('type'))
                                                <p class="text-red-500 text-xs italic text-center">
                                                    {{ $errors->first('type') }}</p>
                                            @endif
                                            </div>
                                            <div class=" w-full px-3 mb-6 md:mb-0 " style="display:block;" id="ifYes">
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
                                                <div class="flex">
                                                    <div class="mr-2">
                                                        <label
                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                            for="grid-first-name">
                                                            จำนวน
                                                        </label>
                                                        <input
                                                            class="appearance-none block w-200px text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                            id="grid-first-name" type="text" placeholder=""
                                                            name="quantity" />
                                                            @if ($errors->any('quantity'))
                                            <p class="text-red-500 text-xs italic text-center">
                                                {{ $errors->first('quantity') }}</p>
                                        @endif
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                            for="grid-first-name">
                                                            หน่วย
                                                        </label>
                                                        <input
                                                            class="appearance-none block  w-20 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                            id="grid-first-name" type="text" placeholder="" name="amount" />
                                                            @if ($errors->any('amount'))
                                                            <p class="text-red-500 text-xs italic text-center">
                                                                {{ $errors->first('amount') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
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
                                                @if ($errors->any('price'))
                                                <p class="text-red-500 text-xs italic text-center">
                                                    {{ $errors->first('price') }}</p>
                                            @endif

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
                                        class="text-x font-semibold text-center tracking-wide  text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">ลำดับ</th>
                                        <th class="px-4 py-3">รายการ</th>
                                        <th class="px-4 py-3">จำนวน</th>
                                        <th class="px-4 py-3">ชื่อผู้รับ</th>
                                        <th class="px-4 py-3">ที่อยู่</th>
                                        <th class="px-4 py-3"></th>
                                        <th class="px-4 py-3">จุดลง</th>
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
                                        $total = $order->price * $order->quantity;
                                    @endphp
                                    @php
                                        $cost = ($total + $cost) + ($order->price_to*$order->quantity);
                                    @endphp
                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 text-center">
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3 text-x">{{ $i++ }} </td>
                                            @if($order->list == null)
                                            <td class="px-4 py-3 text-x">{{$order->type}}</td>
                                            @else
                                            <td class="px-4 py-3 text-x">{{$order->type}},{{ $order->list }}</td>
                                            @endif

                                            <td class="px-4 py-3 text-x">

                                                    {{ $order->quantity }} {{$order->amount}}
                                            </td>
                                            <td class="px-4 py-3 text-x">{{ $order->name }}</td>
                                            <td class="px-4 py-3 text-x">
                                                {{ $order->province->province}}
                                            </td>
                                            <td class="px-4 py-3 text-x">{{ $order->sendto}} </td>
                                            @if($order->provinces_tos_id == null)
                                                <td class="px-4 py-3 text-x">
                                                    {{ $order->city->city}}
                                                </td>
                                            @else
                                                <td class="px-4 py-3 text-x">
                                                    {{ $order->provinces_tos->provinces_to}}
                                                </td>
                                            @endif
                                            <td class="px-4 py-3 text-x">{{ $order->phone }}</td>

                                            <td class="px-4 py-3 text-x">{{ $total }}</td>
                                            <td class="flex px-4 py-3 text-x ">
                                                <a class="w-6 h-6 mr-2"
                                                    href="{{ route('editOrder', $order->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>

                                                <form
                                                    action="{{ route('FormOrder.destroy', $order->id, $customer) }}"
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
                            <label> ทั้งหมด : </label>
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
        function addSpace() {
            var inputValue = document.getElementById("telInput").value;
            var inputValueLength = inputValue.length;

            if (inputValueLength == 3) {
                document.getElementById("telInput").value = inputValue + "-";
            }
        }
        function addSpaces() {
            var inputValue = document.getElementById("telInputs").value;
            var inputValueLength = inputValue.length;

            if (inputValueLength == 3) {
                document.getElementById("telInputs").value = inputValue + "-";
            }
        }
    </script>
    <script type="text/javascript">
        $('.provinces').change(function() {
            if ($(this).val() != '') {
                var select = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('fetch') }}",
                    method: 'GET',
                    data: {
                        select: select,
                        _token: _token
                    },
                    success: function(result) {
                        $('.city').html(result);
                    }
                });
            }
        });
    </script>
    <script>
        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            var texts = document.getElementById("texts");
            if (checkBox.checked == true) {
                text.style.display = "block";
                texts.style.display = "block";
            } else {
                text.style.display = "none";
                texts.style.display = "none";
            }
        }
    </script>
    <script>
        function yesnoCheck(that) {
            if (that.value == "ดอกไม้") {
                document.getElementById("ifYes").style.display = "none";
            } else if (that.value == "มอเตอร์ไซต์"){
                document.getElementById("ifYes").style.display = "none";
            } else{
                document.getElementById("ifYes").style.display = "block";
            }
        }
    </script>
</body>

</html>
